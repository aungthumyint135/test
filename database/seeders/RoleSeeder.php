<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'guard_name' => 'web',
            'name' => 'super-admin',
            'uuid' => Str::uuid()->toString(),
            'status' => 1
        ])->givePermissionTo(Permission::all());
    }
}
