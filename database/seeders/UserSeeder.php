<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'username' => 'superadmin',
                'name' => 'Super Administrator',
                'email' => 'superadmin@company.com',
                'password' => Hash::make('password123'),
                'full_name' => 'Super Administrator',
                'role' => 'super_admin',
                'is_active' => true,
            ],
            [
                'username' => 'admin',
                'name' => 'Administrator',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('password'),
                'full_name' => 'Administrator',
                'role' => 'admin',
                'is_active' => true,
            ],
            [
                'username' => 'editor',
                'name' => 'Editor',
                'email' => 'editor@company.com',
                'password' => Hash::make('password123'),
                'full_name' => 'Editor',
                'role' => 'editor',
                'is_active' => true,
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
