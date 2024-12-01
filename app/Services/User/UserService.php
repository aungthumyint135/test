<?php

namespace App\Services\User;

use App\Repositories\Permission\PermissionRepositoryInterface;
use App\Repositories\Role\RoleRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;
use App\Services\CommonService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserService extends CommonService
{
    protected RoleRepositoryInterface $roleRepository;

    protected UserRepositoryInterface $userRepository;

    protected PermissionRepositoryInterface $permissionRepository;

    public function __construct(
        RoleRepositoryInterface $roleRepository,
        UserRepositoryInterface $userRepository
    ) {
        $this->roleRepository = $roleRepository;
        $this->userRepository = $userRepository;
    }

    public function getStaffs(Request $request): array
    {
        $params = array_merge($this->params($request, [], [
            'status' => config('constant.status.active'),
            'with' => 'role',
        ]), $request->all());

        $data = $this->userRepository->all($params);

        $total = $this->userRepository->totalCount($params);

        return ['data' => $data, 'count' => $total];
    }

    public function createUser(Request $request): bool
    {
        try {
            DB::beginTransaction();

            $input = $this->getInput($request);

            $user = $this->userRepository->insert($input);

            $role = $this->roleRepository->getDataByUuid($request->get('role_id'));

            if ($role) {
                $user->syncRoles([$role->name]);
            }

            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();

            return false;
        }

        return true;
    }

    protected function getInput(Request $request)
    {
        $input = array_filter($request->only([
            'name', 'email', 'password', 'role_id',
        ]));

        if (! empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        }

        return $input;
    }

    public function updateStaff(Request $request, $user): bool
    {
        try {
            DB::beginTransaction();

            $input = $this->getInput($request);

            $this->userRepository->update($input, $user->id);

            $role = $this->roleRepository->getDataByUuid($request->get('role_id'));

            if ($role) {
                $user->syncRoles([$role->name]);
            }

            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();

            return false;
        }

        return true;
    }

    //    protected function assignPermissions($user, $deptId): void
    //    {
    //        $deptPermissions = $this->departmentPermissionRepository->all(['department_id' => $deptId]);
    //
    //        if ($deptPermissions->isNotEmpty()) {
    //            $permissionIds = $deptPermissions->pluck('permission_id')->toArray();
    //
    //            $permissions = Permission::query()->whereIn('id', $permissionIds)->get();
    //
    //            if ($permissions->isNotEmpty()) {
    //                $permissions = $permissions->pluck('name')->toArray();
    //                $permissions[] = ['TaskListing'];
    //
    //                $user->givePermissionTo($permissions);
    //            }
    //        }
    //    }

    public function updateUser(Request $request, $user): bool
    {
        try {
            DB::beginTransaction();

            $input = $this->getInput($request);

            $this->userRepository->update($input, $user->id);

            $role = $this->roleRepository->getDataByUuid($request->get('role_id'));

            if ($role) {
                $user->syncRoles([$role->name]);
            }

            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();

            return false;
        }

        return true;
    }

    public function deleteUser($id): bool
    {
        try {
            DB::beginTransaction();

            $this->userRepository->update(['status' => 0], $id);

            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();

            return false;
        }

        return true;
    }

    public function getStaffByUuid(string $id)
    {
        $user = $this->userRepository->getDataByUuid($id);

        if (! $user) {
            abort(404);
        }

        return $user;
    }

    public function updateProfile(Request $request): bool
    {
        $input = $this->qualifyProfileData($request);

        try {
            DB::beginTransaction();

            $this->userRepository->update($input, auth()->id());

            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();

            return false;
        }

        return true;
    }

    protected function qualifyProfileData(Request $request)
    {
        $input = array_filter($request->only([
            'name', 'update_password', 'password',
        ]));

        if (! empty($input['update_password'])) {
            unset($input['update_password']);
            $input['password'] = Hash::make($input['password']);
        }

        return $input;
    }

    public function getRoles()
    {
        return $this->roleRepository->all(['status' => config('constant.is_published.yes')]);
    }
}
