<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User::factory()
        //     ->count(10)
        //     ->create();

        $users = User::factory()
        ->count(10)
        ->create();
        $role = Role::findByName('user');
        $role->users()->attach($users);

        $admins = User::factory()
        ->count(2)
        ->create();
        $role = Role::findByName('super_admin');
        $role->users()->attach($admins);
    }
}
