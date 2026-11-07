<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::transaction(function () {
            // Hapus semua data user yang sudah ada
            User::query()->delete();

            // 1. Super Admin
            $superAdmin = User::create([
                'name' => 'DON BORLAND',
                'email' => 'superadmin@gmail.com',
                'password' => bcrypt('@Iamsuperadmin'),
                'no_kontak' => '+6281234567800',
                'is_active' => true,
            ]);
            $superAdmin->assignRole('super_admin');

            // 2. Petugas 1 & 2
            $petugas1 = User::create([
                'name' => 'Petugas 1',
                'email' => 'petugas1@gmail.com',
                'password' => bcrypt('password'),
                'no_kontak' => '+6281234567801',
                'is_active' => true,
            ]);
            $petugas1->assignRole('petugas');

            $petugas2 = User::create([
                'name' => 'Petugas 2',
                'email' => 'petugas2@gmail.com',
                'password' => bcrypt('password'),
                'no_kontak' => '+6281234567802',
                'is_active' => true,
            ]);
            $petugas2->assignRole('petugas');

            // 3. Pejabat Diskominfo (Petugas)
            $kabid = User::create([
                'name' => 'DINI RAHMAWATI, ST, MM',
                'email' => 'kabidti@gmail.com',
                'nip' => '19780512 200501 2 004',
                'opd_id' => 12, // DINAS KOMUNIKASI DAN INFORMATIKA
                'no_kontak' => '+6281267890001',
                'password' => bcrypt('password'),
                'is_active' => true,
            ]);
            $kabid->assignRole('petugas');

            $kadis = User::create([
                'name' => 'drg. EZWANDRA, M.Sc',
                'email' => 'kadiskominfo@gmail.com',
                'nip' => '19690815 199803 1 002',
                'opd_id' => 12, // DINAS KOMUNIKASI DAN INFORMATIKA
                'no_kontak' => '+6281267890002',
                'password' => bcrypt('password'),
                'is_active' => true,
            ]);
            $kadis->assignRole('petugas');

            // 4. Pegawai ASN dari Berbagai OPD (Role: pengguna)
            $pegawaiList = [
                [
                    'name' => 'Ahmad Fauzi, S.Kom',
                    'email' => 'ahmad.fauzi@sijunjung.go.id',
                    'nip' => '19820414 200212 1 003',
                    'opd_id' => 12, // DINAS KOMUNIKASI DAN INFORMATIKA
                    'no_kontak' => '+6281234567890',
                ],
                [
                    'name' => 'Rudi Hartono, ST',
                    'email' => 'rudi.hartono@sijunjung.go.id',
                    'nip' => '19850620 200801 1 004',
                    'opd_id' => 15, // DINAS PEKERJAAN UMUM DAN PENATAAN RUANG
                    'no_kontak' => '+6281234564491',
                ],
                [
                    'name' => 'Siti Rahma, S.Pd, M.Pd',
                    'email' => 'siti.rahma@sijunjung.go.id',
                    'nip' => '19880315 201001 2 006',
                    'opd_id' => 18, // DINAS PENDIDIKAN DAN KEBUDAYAAN
                    'no_kontak' => '+6281234564922',
                ],
                [
                    'name' => 'dr. Budi Santoso, Sp.A',
                    'email' => 'budi.santoso@sijunjung.go.id',
                    'nip' => '19791102 200501 1 002',
                    'opd_id' => 10, // DINAS KESEHATAN
                    'no_kontak' => '+6281234561233',
                ],
                [
                    'name' => 'Dewi Sartika, S.Sos',
                    'email' => 'dewi.sartika@sijunjung.go.id',
                    'nip' => '19900824 201402 2 005',
                    'opd_id' => 25, // DINAS SOSIAL,PEMBERDAYAAN PEREMPUAN DAN PERLINDUNGAN ANAK
                    'no_kontak' => '+6281234564564',
                ],
                [
                    'name' => 'Andi Wijaya, S.P',
                    'email' => 'andi.wijaya@sijunjung.go.id',
                    'nip' => '19860412 200902 1 005',
                    'opd_id' => 23, // DINAS PERTANIAN
                    'no_kontak' => '+6281234568885',
                ],
                [
                    'name' => 'Maya Sari, S.Par',
                    'email' => 'maya.sari@sijunjung.go.id',
                    'nip' => '19910718 201503 2 003',
                    'opd_id' => 14, // DINAS PARIWISATA,PEMUDA DAN OLAHRAGA
                    'no_kontak' => '+6281234563216',
                ],
                [
                    'name' => 'Hendra Gunawan, S.Hut',
                    'email' => 'hendra.gunawan@sijunjung.go.id',
                    'nip' => '19840219 200701 1 007',
                    'opd_id' => 24, // DINAS PERUMAHAN,KAWASAN PERMUKIMAN DAN LINGKUNGAN HIDUP
                    'no_kontak' => '+6281234566547',
                ],
                [
                    'name' => 'Ratna Dewi, S.AP',
                    'email' => 'ratna.dewi@sijunjung.go.id',
                    'nip' => '19930911 201602 2 008',
                    'opd_id' => 9, // DINAS KEPENDUDUKAN DAN PENCATATAN SIPIL
                    'no_kontak' => '+6281234569878',
                ],
                [
                    'name' => 'Agus Salim, S.STP',
                    'email' => 'agus.salim@sijunjung.go.id',
                    'nip' => '19871025 201001 1 001',
                    'opd_id' => 21, // DINAS PERHUBUNGAN
                    'no_kontak' => '+6281234561479',
                ],
                [
                    'name' => 'Hendri Saputra, SE',
                    'email' => 'hendri.saputra@sijunjung.go.id',
                    'nip' => '19830510 200604 1 008',
                    'opd_id' => 1, // BAPPPEDA
                    'no_kontak' => '+6281363456781',
                ],
                [
                    'name' => 'Rina Marlina, S.STP, M.Si',
                    'email' => 'rina.marlina@sijunjung.go.id',
                    'nip' => '19920118 201507 2 001',
                    'opd_id' => 3, // BKPSDM
                    'no_kontak' => '+6282178901234',
                ],
            ];

            foreach ($pegawaiList as $item) {
                $user = User::create([
                    'name' => $item['name'],
                    'email' => $item['email'],
                    'nip' => $item['nip'],
                    'opd_id' => $item['opd_id'],
                    'no_kontak' => $item['no_kontak'],
                    'password' => bcrypt('password'),
                    'is_active' => true,
                ]);
                $user->assignRole('pengguna');
            }
        });
    }
}
