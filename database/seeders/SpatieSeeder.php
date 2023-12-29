<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class SpatieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'view_classes']);
        Permission::create(['name' => 'view_any_classes']);
        Permission::create(['name' => 'create_classes']);
        Permission::create(['name' => 'update_classes']);
        Permission::create(['name' => 'restore_classes']);
        Permission::create(['name' => 'restore_any_classes']);
        Permission::create(['name' => 'replicate_classes']);
        Permission::create(['name' => 'reorder_classes']);
        Permission::create(['name' => 'delete_classes']);
        Permission::create(['name' => 'delete_any_classes']);
        Permission::create(['name' => 'force_delete_classes']);
        Permission::create(['name' => 'force_delete_any_classes']);
        Permission::create(['name' => 'view_role']);
        Permission::create(['name' => 'view_any_role']);
        Permission::create(['name' => 'create_role']);
        Permission::create(['name' => 'update_role']);
        Permission::create(['name' => 'delete_role']);
        Permission::create(['name' => 'delete_any_role']);
        Permission::create(['name' => 'view_section']);
        Permission::create(['name' => 'view_any_section']);
        Permission::create(['name' => 'create_section']);
        Permission::create(['name' => 'update_section']);
        Permission::create(['name' => 'restore_section']);
        Permission::create(['name' => 'restore_any_section']);
        Permission::create(['name' => 'replicate_section']);
        Permission::create(['name' => 'reorder_section']);
        Permission::create(['name' => 'delete_section']);
        Permission::create(['name' => 'delete_any_section']);
        Permission::create(['name' => 'force_delete_section']);
        Permission::create(['name' => 'force_delete_any_section']);
        Permission::create(['name' => 'view_student']);
        Permission::create(['name' => 'view_any_student']);
        Permission::create(['name' => 'create_student']);
        Permission::create(['name' => 'update_student']);
        Permission::create(['name' => 'restore_student']);
        Permission::create(['name' => 'restore_any_student']);
        Permission::create(['name' => 'replicate_student']);
        Permission::create(['name' => 'reorder_student']);
        Permission::create(['name' => 'delete_student']);
        Permission::create(['name' => 'delete_any_student']);
        Permission::create(['name' => 'force_delete_student']);
        Permission::create(['name' => 'force_delete_any_student']);

        // create roles and assign created permissions

        // or may be done by chaining
        $role = Role::create(['name' => 'panel_user'])
            ->givePermissionTo([
                'view_classes',
                'view_any_classes',
                'view_section',
                'view_any_section',
                'view_student',
                'view_any_student',
            ]);

        $role = Role::create(['name' => 'super_admin'])
            ->givePermissionTo([
                'view_classes',
                'view_any_classes',
                'create_classes',
                'update_classes',
                'restore_classes',
                'restore_any_classes',
                'replicate_classes',
                'reorder_classes',
                'delete_classes',
                'delete_any_classes',
                'force_delete_classes',
                'force_delete_any_classes',
                'view_role',
                'view_any_role',
                'create_role',
                'update_role',
                'delete_role',
                'delete_any_role',
                'view_section',
                'view_any_section',
                'create_section',
                'update_section',
                'restore_section',
                'restore_any_section',
                'replicate_section',
                'reorder_section',
                'delete_section',
                'delete_any_section',
                'force_delete_section',
                'force_delete_any_section',
                'view_student',
                'view_any_student',
                'create_student',
                'update_student',
                'restore_student',
                'restore_any_student',
                'replicate_student',
                'reorder_student',
                'delete_student',
                'delete_any_student',
                'force_delete_student',
                'force_delete_any_student',
            ]);

        //$role = Role::create(['name' => 'superadmin']);
        //$role->givePermissionTo(Permission::all());

    }
}
