<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Team;
use App\Models\Jabatan;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::transaction(function () {
            // Super Admin
            $superAdmin = User::create([
                'name' => 'DON BORLAND',
                'email' => 'superadmin@gmail.com',
                'password' => bcrypt('@Iamsuperadmin'),
                // 'is_active' => true,
            ]);
            $superAdmin->assignRole('super_admin');

            // Petugas 1
            $petugas1 = User::create([
                'name' => 'Petugas 1',
                'email' => 'petugas1@gmail.com',
                'password' => bcrypt('petugas1'),
                'is_active' => true,
            ]);
            $petugas1->assignRole('petugas');

            // Petugas 2
            $petugas2 = User::create([
                'name' => 'Petugas 2',
                'email' => 'petugas2@gmail.com',
                'password' => bcrypt('petugas2'),
                'is_active' => true,
            ]);
            $petugas2->assignRole('petugas');

            // Pengguna1
            $pengguna1 = User::create([
                'name' => 'Pengguna',
                'email' => 'pengguna1@gmail.com',
                'password' => bcrypt('pengguna1'),
                'is_active' => true,
            ]);
            $pengguna1->assignRole('pengguna');

            //Pengguna2
            $pengguna2 = User::create([
                'name' => 'Pengguna',
                'email' => 'pengguna2@gmail.com',
                'password' => bcrypt('pengguna2'),
                'is_active' => true,
            ]);
            $pengguna2->assignRole('pengguna');
        });
    }
}