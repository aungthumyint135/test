<?php

namespace App\Http\Controllers\Role;

use App\Foundation\Routing\Controller;
use App\Services\Role\RoleService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class RoleController extends Controller
{
    public RoleService $service;

    public function __construct(RoleService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (!Gate::allows('RoleListing')) {
            abort(403);
        }

        if ($request->wantsJson()) {
            $collection = $this->service->getRoles($request);
            return response()->json($collection);
        }

        return view('role.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Gate::allows('RoleCreate')) {
            abort(403);
        }

        $permissions = $this->service->getPermissions();
        $permissionGrp = $this->service->getPermissionGroups();

        return view('role.create', [
            'permissions' => $permissions,
            'permissionGroups' => $permissionGrp
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!Gate::allows('RoleCreate')) {
            abort(403);
        }

        $this->validate($request, [
            'permissions' => 'required|array',
            'remark' => 'nullable|min:3|max:500',
            'name' => 'required|min:3|max:100|unique:roles,name',
        ]);

        $response = $this->service->createRole($request);

        if ($response) {
            return redirect()->route('roles.index')->with('success', 'New role has been created.');
        }

        return redirect()->back()->withInput()->with('failed', 'New role creation was failed.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (!Gate::allows('RoleUpdate')) {
            abort(403);
        }

        $role = $this->service->getRoleByUuid($id);
        $permissionGrp = $this->service->getPermissionGroups();
        $rolePrivileges = $this->service->getRolePrivilegeByRoleId($role->id);

        return view('role.edit', [
            'role' => $role,
            'rolePrivilege' => $rolePrivileges,
            'permissionGroups' => $permissionGrp,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        if (!Gate::allows('RoleUpdate')) {
            abort(403);
        }

        $role = $this->service->getRoleByUuid($id);

        $this->validate($request, [
            'permissions' => 'nullable|array',
            'description' => 'nullable|min:3|max:500',
            'name' => "min:3|max:100|" . Rule::unique('roles', 'name')
                    ->ignore($role->id, 'id'),
        ]);

        $response = $this->service->updateRole($request, $role);

        if ($response) {
            return redirect()->route('roles.index')->with('success', 'The role has been updated.');
        }

        return redirect()->back()->withInput()->with('failed', 'The role update process has been failed.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (!Gate::allows('RoleDelete')) {
            abort(403);
        }

        $role = $this->service->getRoleByUuid($id);

        $response = $this->service->deleteRole($role->id);

        return response()->json(['status' => $response]);
    }

}
