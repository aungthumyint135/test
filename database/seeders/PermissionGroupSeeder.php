<?php

namespace Database\Seeders;

use App\Models\PermissionGroup\PermissionGroup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PermissionGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $date = date('Y-m-d H:i:s');

        $groups = [
            [
                'id' => 1,
                'uuid' => Str::uuid()->toString(),
                'name' => 'Staff Mgmt',
                'group' => 1,
                'gp_type' => config('constant.pg_type.setting'),
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'id' => 2,
                'uuid' => Str::uuid()->toString(),
                'name' => 'Role Mgmt',
                'group' => 2,
                'gp_type' => config('constant.pg_type.setting'),
                'created_at' => $date,
                'updated_at' => $date,
            ],


        ];

        foreach ($groups as $group) {
            PermissionGroup::query()->insert($group);
        }
    }
}
