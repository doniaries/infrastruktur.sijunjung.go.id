<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use BezhanSalleh\FilamentShield\Support\Utils;
use Spatie\Permission\PermissionRegistrar;

class ShieldSeeder extends Seeder
{
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $rolesWithPermissions = '[{"name":"super_admin","guard_name":"web","permissions":["view_bts","view_any_bts","create_bts","update_bts","restore_bts","restore_any_bts","replicate_bts","reorder_bts","delete_bts","delete_any_bts","force_delete_bts","force_delete_any_bts","view_inventaris","view_any_inventaris","create_inventaris","update_inventaris","restore_inventaris","restore_any_inventaris","replicate_inventaris","reorder_inventaris","delete_inventaris","delete_any_inventaris","force_delete_inventaris","force_delete_any_inventaris","view_jorong","view_any_jorong","create_jorong","update_jorong","restore_jorong","restore_any_jorong","replicate_jorong","reorder_jorong","delete_jorong","delete_any_jorong","force_delete_jorong","force_delete_any_jorong","view_kecamatan","view_any_kecamatan","create_kecamatan","update_kecamatan","restore_kecamatan","restore_any_kecamatan","replicate_kecamatan","reorder_kecamatan","delete_kecamatan","delete_any_kecamatan","force_delete_kecamatan","force_delete_any_kecamatan","view_lapor","view_any_lapor","create_lapor","update_lapor","restore_lapor","restore_any_lapor","replicate_lapor","reorder_lapor","delete_lapor","delete_any_lapor","force_delete_lapor","force_delete_any_lapor","view_nagari","view_any_nagari","create_nagari","update_nagari","restore_nagari","restore_any_nagari","replicate_nagari","reorder_nagari","delete_nagari","delete_any_nagari","force_delete_nagari","force_delete_any_nagari","view_opd","view_any_opd","create_opd","update_opd","restore_opd","restore_any_opd","replicate_opd","reorder_opd","delete_opd","delete_any_opd","force_delete_opd","force_delete_any_opd","view_operator","view_any_operator","create_operator","update_operator","restore_operator","restore_any_operator","replicate_operator","reorder_operator","delete_operator","delete_any_operator","force_delete_operator","force_delete_any_operator","view_peralatan","view_any_peralatan","create_peralatan","update_peralatan","restore_peralatan","restore_any_peralatan","replicate_peralatan","reorder_peralatan","delete_peralatan","delete_any_peralatan","force_delete_peralatan","force_delete_any_peralatan","view_role","view_any_role","create_role","update_role","delete_role","delete_any_role","view_user","view_any_user","create_user","update_user","restore_user","restore_any_user","replicate_user","reorder_user","delete_user","delete_any_user","force_delete_user","force_delete_any_user","widget_StatsLaporan","widget_StatsOverview"]}]';
        $directPermissions = '[]';

        static::makeRolesWithPermissions($rolesWithPermissions);
        static::makeDirectPermissions($directPermissions);

        $this->command->info('Shield Seeding Completed.');
    }

    protected static function makeRolesWithPermissions(string $rolesWithPermissions): void
    {
        if (! blank($rolePlusPermissions = json_decode($rolesWithPermissions, true))) {
            /** @var Model $roleModel */
            $roleModel = Utils::getRoleModel();
            /** @var Model $permissionModel */
            $permissionModel = Utils::getPermissionModel();

            foreach ($rolePlusPermissions as $rolePlusPermission) {
                $role = $roleModel::firstOrCreate([
                    'name' => $rolePlusPermission['name'],
                    'guard_name' => $rolePlusPermission['guard_name'],
                ]);

                if (! blank($rolePlusPermission['permissions'])) {
                    $permissionModels = collect($rolePlusPermission['permissions'])
                        ->map(fn ($permission) => $permissionModel::firstOrCreate([
                            'name' => $permission,
                            'guard_name' => $rolePlusPermission['guard_name'],
                        ]))
                        ->all();

                    $role->syncPermissions($permissionModels);
                }
            }
        }
    }

    public static function makeDirectPermissions(string $directPermissions): void
    {
        if (! blank($permissions = json_decode($directPermissions, true))) {
            /** @var Model $permissionModel */
            $permissionModel = Utils::getPermissionModel();

            foreach ($permissions as $permission) {
                if ($permissionModel::whereName($permission)->doesntExist()) {
                    $permissionModel::create([
                        'name' => $permission['name'],
                        'guard_name' => $permission['guard_name'],
                    ]);
                }
            }
        }
    }
}
