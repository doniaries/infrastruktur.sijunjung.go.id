<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buat roles
        $superAdmin = Role::updateOrCreate(['name' => 'super_admin', 'guard_name' => 'web']);
        $petugas = Role::updateOrCreate(['name' => 'petugas', 'guard_name' => 'web']);
        $pengguna = Role::updateOrCreate(['name' => 'pengguna', 'guard_name' => 'web']);

        // Pastikan permissions lapor ada
        Permission::firstOrCreate(['name' => 'view_lapor', 'guard_name' => 'web']);
        Permission::firstOrCreate(['name' => 'view_any_lapor', 'guard_name' => 'web']);
        Permission::firstOrCreate(['name' => 'create_lapor', 'guard_name' => 'web']);
        Permission::firstOrCreate(['name' => 'widget_StatsLaporan', 'guard_name' => 'web']);

        // Get all permissions
        $permissions = Permission::all();

        // Assign all permissions to super_admin
        $superAdmin->syncPermissions($permissions);

        // Assign specific permissions to petugas (kecuali shield / pengaturan admin)
        $petugasPermissions = $permissions->filter(function ($permission) {
            return !str_contains($permission->name, 'shield') && !str_contains($permission->name, 'role');
        });
        $petugas->syncPermissions($petugasPermissions);

        // Assign HANYA lapor permissions untuk role pengguna (pegawai ASN)
        // Dibatasi: tidak bisa akses BTS, Jorong, Nagari, OPD, Peralatan, Inventaris, User, Role, dll.
        $penggunaPermissions = $permissions->filter(function ($permission) {
            return in_array($permission->name, ['view_lapor', 'view_any_lapor', 'create_lapor', 'widget_StatsLaporan']);
        });
        $pengguna->syncPermissions($penggunaPermissions);

        // Reset cache
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
    }
}
