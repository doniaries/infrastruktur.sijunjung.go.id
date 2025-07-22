<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        // Buat roles
        $superAdmin = Role::updateOrCreate(['name' => 'super_admin', 'guard_name' => 'web']);
        $petugas = Role::updateOrCreate(['name' => 'petugas', 'guard_name' => 'web']);
        $pengguna = Role::updateOrCreate(['name' => 'pengguna', 'guard_name' => 'web']);

        // Get all permissions
        $permissions = Permission::all();

        // Assign all permissions to super_admin
        $superAdmin->syncPermissions($permissions);

        // Assign specific permissions to adminit
        // You can customize these permissions based on your needs
        $adminITPermissions = $permissions->filter(function ($permission) {
            // Exclude some super admin specific permissions if needed
            return !str_contains($permission->name, 'shield');
        });
        $petugas->syncPermissions($adminITPermissions);

        // Assign limited permissions to pengguna
        // You can customize these permissions based on your needs
        $penggunaPermissions = $permissions->filter(function ($permission) {
            return str_contains($permission->name, 'view') || str_contains($permission->name, 'list');
        });
        $pengguna->syncPermissions($penggunaPermissions);


        // Reset cache
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
    }
}