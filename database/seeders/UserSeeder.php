<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // $users = User::factory()
        // ->count(10)
        // ->create();
        // $role = Role::findByName('panel_user');
        // $role->users()->attach($users);

        // $admins = User::factory()
        // ->count(2)
        // ->create();
        // $role = Role::findByName('super_admin');
        // $role->users()->attach($admins);

        // Create a new user
        $user = User::create([
            'name' => 'User',
            'email' => 'user@example.com',
            'password' => bcrypt('password'),
            'email_verified_at' => now(), // Marks the user as email verified
            'remember_token' => Str::random(10), // Generates a random remember token
        ]);

        // Assign a role to the user
        $role = Role::findByName('panel_user');
        $user->assignRole($role);

        // Create a new super user
        $superadmin = User::create([
            'name' => 'Bastomi Adi Nugroho',
            'email' => 'bastomi@example.com',
            'password' => bcrypt('password'),
            'email_verified_at' => now(), // Marks the user as email verified
            'remember_token' => Str::random(10), // Generates a random remember token
        ]);

        // Assign a role to the user
        $role = Role::findByName('super_admin');
        $superadmin->assignRole($role);
    }
}
