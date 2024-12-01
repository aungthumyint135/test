<?php

namespace App\Services\Role;

use App\Repositories\Permission\PermissionRepositoryInterface;
use App\Repositories\PermissionGroup\PermissionGroupRepositoryInterface;
use App\Repositories\Role\RoleRepositoryInterface;
use App\Repositories\RolePrivilege\RolePrivilegeRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;
use App\Services\CommonService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class RoleService extends CommonService
{
    protected UserRepositoryInterface $userRepository;

    protected RoleRepositoryInterface $roleRepository;

    protected PermissionRepositoryInterface $permissionRepository;

    protected RolePrivilegeRepositoryInterface $rolePrivilegeRepository;

    protected PermissionGroupRepositoryInterface $permissionGroupRepository;

    public function __construct(
        RoleRepositoryInterface $roleRepository,
        UserRepositoryInterface $userRepository,
        PermissionRepositoryInterface $permissionRepository,
        RolePrivilegeRepositoryInterface $rolePrivilegeRepository,
        PermissionGroupRepositoryInterface $permissionGroupRepository
    ) {
        $this->roleRepository = $roleRepository;
        $this->userRepository = $userRepository;
        $this->permissionRepository = $permissionRepository;
        $this->rolePrivilegeRepository = $rolePrivilegeRepository;
        $this->permissionGroupRepository = $permissionGroupRepository;
    }

    public function getPermissions(array $options = [])
    {
        return $this->permissionRepository->getAll($options);
    }

    public function getPermissionGroups()
    {
        $permissions = $this->permissionGroupRepository->all([
            'with' => ['permissions'],
            'order_by' => ['id' => 'asc'],
            'status' => config('constant.is_published.yes'),
        ]);

        return collect($permissions)->groupBy('group');
    }

    public function getRolePrivilegeByRoleId($roleId)
    {
        return $this->rolePrivilegeRepository->getDataByOptions(['role_id' => $roleId]);
    }

    public function createRole(Request $request): bool
    {
        $input = array_filter($request->only(['name', 'remark']));

        try {

            DB::beginTransaction();

            $input['guard_name'] = 'web';
            $input['uuid'] = Str::uuid()->toString();
            $input['status'] = config('constant.is_published.yes');

            $role = $this->roleRepository->insert($input);
            $permissions = $this->getInputPermissions($request, $role->id);

            if (! empty($permissions)) {
                $role->syncPermissions($permissions);
            }

            DB::commit();

        } catch (Exception $exception) {
            DB::rollBack();

            return false;
        }

        return true;
    }

    protected function getInputPermissions(Request $request, $roleId): array
    {
        $result = [];
        $permissions = $request->get('permissions');
        if (empty($permissions)) {
            return $result;
        }

        foreach ($permissions as $index => $permission) {
            $permissions = [];
            $groupId = $index;

            if (($permission['full'] ?? false) === 'on') {
                $data = $this->getPermissions(['group_id' => $groupId])->pluck('name')->toArray();
                if (! empty($data)) {
                    $rolePrivilege = $this->rolePrivilegeRepository->getDataByOptions([
                        'role_id' => $roleId,
                        'permission_group_id' => $groupId,
                    ]);

                    if ($rolePrivilege) {
                        $this->rolePrivilegeRepository->update(['full' => 1], $rolePrivilege->id);
                    } else {
                        $this->rolePrivilegeRepository->insert([
                            'full' => 1,
                            'role_id' => $roleId,
                            'permission_group_id' => $groupId,
                        ]);
                    }
                }

                $permissions[] = $data;
            }

            if (($permission['view'] ?? false) === 'on') {
                $data = $this->getPermissions([
                    'group_id' => $groupId,
                    'type' => config('constant.permissions.view'),
                ])->pluck('name')->toArray();

                if (! empty($data)) {
                    $rolePrivilege = $this->rolePrivilegeRepository->getDataByOptions([
                        'role_id' => $roleId,
                        'permission_group_id' => $groupId,
                    ]);

                    if ($rolePrivilege) {
                        $this->rolePrivilegeRepository->update(['view' => 1], $rolePrivilege->id);
                    } else {
                        $this->rolePrivilegeRepository->insert([
                            'view' => 1,
                            'role_id' => $roleId,
                            'permission_group_id' => $groupId,
                        ]);
                    }
                }

                $permissions[] = $data;
            }

            if (($permission['edit'] ?? false) === 'on') {
                $data = $this->getPermissions([
                    'group_id' => $groupId,
                    'type' => [
                        config('constant.permissions.edit'),
                        config('constant.permissions.disable'),
                        config('constant.permissions.approve'),
                    ],
                ])->pluck('name')->toArray();

                if (! empty($data)) {
                    $rolePrivilege = $this->rolePrivilegeRepository->getDataByOptions([
                        'role_id' => $roleId,
                        'permission_group_id' => $groupId,
                    ]);

                    if ($rolePrivilege) {
                        $this->rolePrivilegeRepository->update(['edit' => 1], $rolePrivilege->id);
                    } else {
                        $this->rolePrivilegeRepository->insert([
                            'edit' => 1,
                            'role_id' => $roleId,
                            'permission_group_id' => $groupId,
                        ]);
                    }
                }

                $permissions[] = $data;
            }

            $result[] = Arr::flatten($permissions);
        }

        if (! empty($result)) {
            return Arr::flatten($result);
        }

        return $result;
    }

    /**
     * @return bool
     */
    public function updateRole(Request $request, $role)
    {
        $input = $request->only(['name', 'remark', 'status', 'reason']);

        try {
            DB::beginTransaction();
            $this->roleRepository->update($input, $role->id);
            $this->rolePrivilegeRepository->destroyByOptions(['role_id' => $role->id]);
            $permissions = $this->getInputPermissions($request, $role->id);
            $permissions = array_unique($permissions);
            $role->syncPermissions($permissions);
            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();

            return false;
        }

        return true;
    }

    public function deleteRole($roleId)
    {
        $staffs = $this->userRepository->all(['role_id' => $roleId]);

        if ($staffs->isNotEmpty()) {
            throw ValidationException::withMessages(['message' => 'You cannot delete this role']);
        }

        try {

            DB::beginTransaction();

            $this->roleRepository->destroy($roleId);

            DB::commit();

        } catch (Exception $exception) {
            DB::rollBack();

            return false;
        }

        return true;
    }

    /**
     * @return mixed
     */
    public function getRoleByUuid($uuid)
    {
        $role = $this->roleRepository->getDataByUuid($uuid);

        if (! $role) {
            abort(404);
        }

        return $role;
    }

    public function getRoles(Request $request): array
    {
        $data = $this->roleRepository->all($this->params($request));

        $total = $this->roleRepository->totalCount($this->params($request, ['search']));

        return [
            'data' => $data,
            'count' => $total,
        ];
    }
}
