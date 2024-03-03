<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $defaultRoles = [
            ['name' => 'Admin'],
            ['name' => 'Developer']
        ];

        $defaultUsers = [
            ['role_id' => 1, 'email' => 'admin@coalition.com', 'password' => 'admin@123'],
            ['role_id' => 2, 'email' => 'user1@coalition.com', 'password' => 'user1@123'],
            ['role_id' => 2, 'email' => 'user2@coalition.com', 'password' => 'user2@123'],
        ];

        foreach($defaultRoles as $role) {
            // Insert the default roles when a new instance of the application is deployed
            Role::create($role);
        }

        foreach($defaultUsers as $user) {
            // Insert the default roles when a new instance of the application is deployed
            User::create($user);
        }
    }
}
