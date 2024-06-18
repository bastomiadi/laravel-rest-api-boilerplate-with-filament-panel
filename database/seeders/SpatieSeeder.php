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

        Permission::create(['name' => 'view_products']);
        Permission::create(['name' => 'view_any_products']);
        Permission::create(['name' => 'create_products']);
        Permission::create(['name' => 'update_products']);
        Permission::create(['name' => 'restore_products']);
        Permission::create(['name' => 'restore_any_products']);
        Permission::create(['name' => 'replicate_products']);
        Permission::create(['name' => 'reorder_products']);
        Permission::create(['name' => 'delete_products']);
        Permission::create(['name' => 'delete_any_products']);
        Permission::create(['name' => 'force_delete_products']);
        Permission::create(['name' => 'force_delete_any_products']);

        Permission::create(['name' => 'view_categories']);
        Permission::create(['name' => 'view_any_categories']);
        Permission::create(['name' => 'create_categories']);
        Permission::create(['name' => 'update_categories']);
        Permission::create(['name' => 'restore_categories']);
        Permission::create(['name' => 'restore_any_categories']);
        Permission::create(['name' => 'replicate_categories']);
        Permission::create(['name' => 'reorder_categories']);
        Permission::create(['name' => 'delete_categories']);
        Permission::create(['name' => 'delete_any_categories']);
        Permission::create(['name' => 'force_delete_categories']);
        Permission::create(['name' => 'force_delete_any_categories']);

        Permission::create(['name' => 'view_reviews']);
        Permission::create(['name' => 'view_any_reviews']);
        Permission::create(['name' => 'create_reviews']);
        Permission::create(['name' => 'update_reviews']);
        Permission::create(['name' => 'restore_reviews']);
        Permission::create(['name' => 'restore_any_reviews']);
        Permission::create(['name' => 'replicate_reviews']);
        Permission::create(['name' => 'reorder_reviews']);
        Permission::create(['name' => 'delete_reviews']);
        Permission::create(['name' => 'delete_any_reviews']);
        Permission::create(['name' => 'force_delete_reviews']);
        Permission::create(['name' => 'force_delete_any_reviews']);

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

                'view_products',
                'view_any_products',
                'create_products',
                'update_products',
                'restore_products',
                'restore_any_products',
                'replicate_products',
                'reorder_products',
                'delete_products',
                'delete_any_products',
                'force_delete_products',
                'force_delete_any_products',

                'view_categories',
                'view_any_categories',
                'create_categories',
                'update_categories',
                'restore_categories',
                'restore_any_categories',
                'replicate_categories',
                'reorder_categories',
                'delete_categories',
                'delete_any_categories',
                'force_delete_categories',
                'force_delete_any_categories',

                'view_reviews',
                'view_any_reviews',
                'create_reviews',
                'update_reviews',
                'restore_reviews',
                'restore_any_reviews',
                'replicate_reviews',
                'reorder_reviews',
                'delete_reviews',
                'delete_any_reviews',
                'force_delete_reviews',
                'force_delete_any_reviews',
                
            ]);

        //$role = Role::create(['name' => 'superadmin']);
        //$role->givePermissionTo(Permission::all());

    }
}
