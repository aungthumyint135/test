<?php

namespace Database\Seeders;

use App\Models\User\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::query()->create([
            'uuid' => Str::uuid(),
            'name' => 'administrator',
            'email' => 'aungthumyint@mct.com.sg',
            'password' => env('ADMIN_PASSWORD'),
            'role_id' => 1
        ])->assignRole('super-admin');
    }
}
