<?php

namespace Database\Seeders;

use App\Models\Lapor;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class LaporSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hapus data lama
        Lapor::query()->delete();

        // Ambil data user sekaligus untuk efisiensi query
        $users = User::query()->get()->keyBy('email');

        $petugas1 = $users->get('petugas1@gmail.com');
        $petugas2 = $users->get('petugas2@gmail.com');

        // 1. Ahmad Fauzi (Diskominfo)
        $user1 = $users->get('ahmad.fauzi@sijunjung.go.id');
        Lapor::create([
            'user_id' => $user1?->id,
            'no_tiket' => 'TIK-' . date('Ymd') . '-' . Str::random(5),
            'tgl_laporan' => now(),
            'nama_pelapor' => $user1?->name ?? 'Ahmad Fauzi, S.Kom',
            'nomor_kontak' => $user1?->no_kontak ?? '+6281234567890',
            'opd_id' => $user1?->opd_id ?? 12,
            'jenis_laporan' => 'Laporan Gangguan',
            'uraian_laporan' => 'Jaringan internet terputus sejak pukul 09.00 WIB. Seluruh komputer di kantor tidak dapat mengakses internet.',
            'status_laporan' => 'Belum Diproses',
            'petugas_id' => null,
            'keterangan_petugas' => 'belum ada',
            'file_laporan' => null,
            'foto_laporan' => null,
        ]);

        // 2. Rudi Hartono (PUPR)
        $user2 = $users->get('rudi.hartono@sijunjung.go.id');
        Lapor::create([
            'user_id' => $user2?->id,
            'no_tiket' => 'TIK-' . date('Ymd') . '-' . Str::random(5),
            'tgl_laporan' => now()->subHours(3),
            'nama_pelapor' => $user2?->name ?? 'Rudi Hartono, ST',
            'nomor_kontak' => $user2?->no_kontak ?? '+6281234564491',
            'opd_id' => $user2?->opd_id ?? 15,
            'jenis_laporan' => 'Laporan Gangguan',
            'uraian_laporan' => 'Koneksi internet lambat dan sering terputus. Mengganggu proses kerja terutama saat mengakses aplikasi online SPSE.',
            'status_laporan' => 'Belum Diproses',
            'petugas_id' => null,
            'keterangan_petugas' => 'belum ada',
            'file_laporan' => null,
            'foto_laporan' => null,
        ]);

        // 3. Siti Rahma (Dinas Pendidikan)
        $user3 = $users->get('siti.rahma@sijunjung.go.id');
        Lapor::create([
            'user_id' => $user3?->id,
            'no_tiket' => 'TIK-' . date('Ymd') . '-' . Str::random(5),
            'tgl_laporan' => now()->subHours(5),
            'nama_pelapor' => $user3?->name ?? 'Siti Rahma, S.Pd, M.Pd',
            'nomor_kontak' => $user3?->no_kontak ?? '+6281234564922',
            'opd_id' => $user3?->opd_id ?? 18,
            'jenis_laporan' => 'Koordinasi Teknis',
            'uraian_laporan' => 'Membutuhkan bantuan teknis untuk instalasi jaringan LAN dan router di ruang rapat guru.',
            'status_laporan' => 'Belum Diproses',
            'petugas_id' => null,
            'keterangan_petugas' => 'belum ada',
            'file_laporan' => null,
            'foto_laporan' => null,
        ]);

        // 4. dr. Budi Santoso (Dinas Kesehatan)
        $user4 = $users->get('budi.santoso@sijunjung.go.id');
        Lapor::create([
            'user_id' => $user4?->id,
            'no_tiket' => 'TIK-' . date('Ymd') . '-' . Str::random(5),
            'tgl_laporan' => now()->subHours(8),
            'nama_pelapor' => $user4?->name ?? 'dr. Budi Santoso, Sp.A',
            'nomor_kontak' => $user4?->no_kontak ?? '+6281234561233',
            'opd_id' => $user4?->opd_id ?? 10,
            'jenis_laporan' => 'Laporan Gangguan',
            'uraian_laporan' => 'Server database sistem rujukan puskesmas tidak dapat diakses, mohon penanganan segera.',
            'status_laporan' => 'Sedang Diproses',
            'petugas_id' => $petugas1?->id,
            'keterangan_petugas' => 'Tim teknis sedang melakukan pengecekan server database',
            'file_laporan' => null,
            'foto_laporan' => null,
        ]);

        // 5. Dewi Sartika (Dinas Sosial)
        $user5 = $users->get('dewi.sartika@sijunjung.go.id');
        Lapor::create([
            'user_id' => $user5?->id,
            'no_tiket' => 'TIK-' . date('Ymd') . '-' . Str::random(5),
            'tgl_laporan' => now()->subDays(1),
            'nama_pelapor' => $user5?->name ?? 'Dewi Sartika, S.Sos',
            'nomor_kontak' => $user5?->no_kontak ?? '+6281234564564',
            'opd_id' => $user5?->opd_id ?? 25,
            'jenis_laporan' => 'Koordinasi Teknis',
            'uraian_laporan' => 'Permintaan instalasi Access Point WiFi untuk ruang pelayanan verifikasi bansos.',
            'status_laporan' => 'Selesai Diproses',
            'petugas_id' => $petugas2?->id,
            'keterangan_petugas' => 'Instalasi Access Point WiFi telah selesai dan berfungsi optimal.',
            'file_laporan' => null,
            'foto_laporan' => null,
        ]);

        // 6. Andi Wijaya (Dinas Pertanian)
        $user6 = $users->get('andi.wijaya@sijunjung.go.id');
        Lapor::create([
            'user_id' => $user6?->id,
            'no_tiket' => 'TIK-' . date('Ymd') . '-' . Str::random(5),
            'tgl_laporan' => now()->subHours(2),
            'nama_pelapor' => $user6?->name ?? 'Andi Wijaya, S.P',
            'nomor_kontak' => $user6?->no_kontak ?? '+6281234568885',
            'opd_id' => $user6?->opd_id ?? 23,
            'jenis_laporan' => 'Laporan Gangguan',
            'uraian_laporan' => 'Printer jaringan bidang penyuluhan tidak dapat mendeteksi IP address kantor.',
            'status_laporan' => 'Belum Diproses',
            'petugas_id' => null,
            'keterangan_petugas' => 'belum ada',
            'file_laporan' => null,
            'foto_laporan' => null,
        ]);

        // 7. Maya Sari (Dinas Pariwisata)
        $user7 = $users->get('maya.sari@sijunjung.go.id');
        Lapor::create([
            'user_id' => $user7?->id,
            'no_tiket' => 'TIK-' . date('Ymd') . '-' . Str::random(5),
            'tgl_laporan' => now()->subHours(6),
            'nama_pelapor' => $user7?->name ?? 'Maya Sari, S.Par',
            'nomor_kontak' => $user7?->no_kontak ?? '+6281234563216',
            'opd_id' => $user7?->opd_id ?? 14,
            'jenis_laporan' => 'Kenaikan Bandwidth',
            'uraian_laporan' => 'Permohonan penambahan alokasi bandwidth menjelang pagelaran Festival Geopark Silokek.',
            'status_laporan' => 'Sedang Diproses',
            'petugas_id' => $petugas1?->id,
            'keterangan_petugas' => 'Sedang melakukan koordinasi alokasi bandwidth dengan provider.',
            'file_laporan' => null,
            'foto_laporan' => null,
        ]);

        // 8. Hendra Gunawan (Dinas Lingkungan Hidup)
        $user8 = $users->get('hendra.gunawan@sijunjung.go.id');
        Lapor::create([
            'user_id' => $user8?->id,
            'no_tiket' => 'TIK-' . date('Ymd') . '-' . Str::random(5),
            'tgl_laporan' => now()->subDays(2),
            'nama_pelapor' => $user8?->name ?? 'Hendra Gunawan, S.Hut',
            'nomor_kontak' => $user8?->no_kontak ?? '+6281234566547',
            'opd_id' => $user8?->opd_id ?? 24,
            'jenis_laporan' => 'Laporan Gangguan',
            'uraian_laporan' => 'Komputer laboratorium pemantau kualitas air tidak dapat terhubung ke jaringan.',
            'status_laporan' => 'Selesai Diproses',
            'petugas_id' => $petugas2?->id,
            'keterangan_petugas' => 'Kabel LAN diganti dan koneksi IP statis telah dikonfigurasi ulang.',
            'file_laporan' => null,
            'foto_laporan' => null,
        ]);

        // 9. Ratna Dewi (Dukcapil)
        $user9 = $users->get('ratna.dewi@sijunjung.go.id');
        Lapor::create([
            'user_id' => $user9?->id,
            'no_tiket' => 'TIK-' . date('Ymd') . '-' . Str::random(5),
            'tgl_laporan' => now()->subHours(1),
            'nama_pelapor' => $user9?->name ?? 'Ratna Dewi, S.AP',
            'nomor_kontak' => $user9?->no_kontak ?? '+6281234569878',
            'opd_id' => $user9?->opd_id ?? 9,
            'jenis_laporan' => 'Koordinasi Teknis',
            'uraian_laporan' => 'Permintaan konfigurasi VPN SIAK Terpusat untuk loket pelayanan keliling.',
            'status_laporan' => 'Belum Diproses',
            'petugas_id' => null,
            'keterangan_petugas' => 'belum ada',
            'file_laporan' => null,
            'foto_laporan' => null,
        ]);

        // 10. Agus Salim (Dishub)
        $user10 = $users->get('agus.salim@sijunjung.go.id');
        Lapor::create([
            'user_id' => $user10?->id,
            'no_tiket' => 'TIK-' . date('Ymd') . '-' . Str::random(5),
            'tgl_laporan' => now()->subHours(4),
            'nama_pelapor' => $user10?->name ?? 'Agus Salim, S.STP',
            'nomor_kontak' => $user10?->no_kontak ?? '+6281234561479',
            'opd_id' => $user10?->opd_id ?? 21,
            'jenis_laporan' => 'Laporan Gangguan',
            'uraian_laporan' => 'Monitoring CCTV simpang Muaro terputus, switch hub di pos pantau mati.',
            'status_laporan' => 'Sedang Diproses',
            'petugas_id' => $petugas1?->id,
            'keterangan_petugas' => 'Petugas sedang menuju lokasi pos pantau untuk pergantian switch.',
            'file_laporan' => null,
            'foto_laporan' => null,
        ]);
    }
}
