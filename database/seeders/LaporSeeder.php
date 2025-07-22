<?php

namespace Database\Seeders;

use App\Models\Lapor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class LaporSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Laporan 1: Laporan Gangguan - Belum Diproses
        Lapor::create([
            'no_tiket' => 'TIK-' . date('Ymd') . '-' . Str::random(5),
            'tgl_laporan' => now(),
            'nama_pelapor' => 'Ahmad Fauzi',
            'nomor_kontak' => '08123456789',
            'opd_id' => 12, // Dinas Komunikasi dan Informatika
            'jenis_laporan' => 'Laporan Gangguan',
            'uraian_laporan' => 'Jaringan internet terputus sejak pukul 09.00 WIB. Seluruh komputer di kantor tidak dapat mengakses internet.',
            'status_laporan' => 'Belum Diproses',
            'petugas_id' => null,
            'keterangan_petugas' => 'belum ada',
            // 'hasil_laporan' => 'belum ada',
            'file_laporan' => null,
            'foto_laporan' => null,
        ]);

        // Laporan 2: Laporan Gangguan - Belum Diproses
        Lapor::create([
            'no_tiket' => 'TIK-' . date('Ymd') . '-' . Str::random(5),
            'tgl_laporan' => now()->subHours(3),
            'nama_pelapor' => 'Rudi Hartono',
            'nomor_kontak' => '08123456449',
            'opd_id' => 15, // Dinas Pekerjaan Umum dan Penataan Ruang
            'jenis_laporan' => 'Laporan Gangguan',
            'uraian_laporan' => 'Koneksi internet lambat dan sering terputus. Mengganggu proses kerja terutama saat mengakses aplikasi online.',
            'status_laporan' => 'Belum Diproses',
            'petugas_id' => null,
            'keterangan_petugas' => 'belum ada',
            // 'hasil_laporan' => 'belum ada',
            'file_laporan' => null,
            'foto_laporan' => null,
        ]);

        // Laporan 3: Koordinasi Teknis - Belum Diproses
        Lapor::create([
            'no_tiket' => 'TIK-' . date('Ymd') . '-' . Str::random(5),
            'tgl_laporan' => now()->subHours(5),
            'nama_pelapor' => 'Siti Rahma',
            'nomor_kontak' => '0812345649',
            'opd_id' => 18, // Dinas Pendidikan dan Kebudayaan
            'jenis_laporan' => 'Koordinasi Teknis',
            'uraian_laporan' => 'Membutuhkan bantuan teknis untuk instalasi jaringan LAN di ruang rapat baru.',
            'status_laporan' => 'Belum Diproses',
            'petugas_id' => null,
            'keterangan_petugas' => 'belum ada',
            // 'hasil_laporan' => 'belum ada',
            'file_laporan' => null,
            'foto_laporan' => null,
        ]);
    }
}
