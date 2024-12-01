<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        $view = config('constant.permissions.view');
        $edit = config('constant.permissions.edit');
        $create = config('constant.permissions.create');
        $disable = config('constant.permissions.disable');

        $permissions = [

            ['guard_name' => 'web', 'name' => 'StaffListing', 'uuid' => Str::uuid()->toString(), 'permission_group_id' => 1, 'type' => $view],
            ['guard_name' => 'web', 'name' => 'StaffCreate', 'uuid' => Str::uuid()->toString(), 'permission_group_id' => 1, 'type' => $create],
            ['guard_name' => 'web', 'name' => 'StaffUpdate', 'uuid' => Str::uuid()->toString(), 'permission_group_id' => 1, 'type' => $edit],
            ['guard_name' => 'web', 'name' => 'StaffDelete', 'uuid' => Str::uuid()->toString(), 'permission_group_id' => 1, 'type' => $disable],

            ['guard_name' => 'web', 'name' => 'RoleListing', 'uuid' => Str::uuid()->toString(), 'permission_group_id' => 2, 'type' => $view],
            ['guard_name' => 'web', 'name' => 'RoleCreate', 'uuid' => Str::uuid()->toString(), 'permission_group_id' => 2, 'type' => $create],
            ['guard_name' => 'web', 'name' => 'RoleUpdate', 'uuid' => Str::uuid()->toString(), 'permission_group_id' => 2, 'type' => $edit],
            ['guard_name' => 'web', 'name' => 'RoleDelete', 'uuid' => Str::uuid()->toString(), 'permission_group_id' => 2, 'type' => $disable],


        ];

        $permissions = array_filter($permissions);

        foreach ($permissions as $permission) {
            Permission::query()->insert($permission);
        }
    }
}
