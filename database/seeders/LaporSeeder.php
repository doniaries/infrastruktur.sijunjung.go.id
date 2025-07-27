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
        // Hapus data lama
        Lapor::query()->delete();
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

        // Laporan 4: Laporan Gangguan - Sedang Diproses
        Lapor::create([
            'no_tiket' => 'TIK-' . date('Ymd') . '-' . Str::random(5),
            'tgl_laporan' => now()->subHours(8),
            'nama_pelapor' => 'Budi Santoso',
            'nomor_kontak' => '08123456123',
            'opd_id' => 13, // Dinas Kesehatan
            'jenis_laporan' => 'Laporan Gangguan',
            'uraian_laporan' => 'Server database rumah sakit tidak dapat diakses, mengganggu sistem informasi pasien.',
            'status_laporan' => 'Sedang Diproses',
            'petugas_id' => 1,
            'keterangan_petugas' => 'Tim teknis sedang melakukan pengecekan server',
            // 'hasil_laporan' => 'belum ada',
            'file_laporan' => null,
            'foto_laporan' => null,
        ]);

        // Laporan 5: Koordinasi Teknis - Selesai
        Lapor::create([
            'no_tiket' => 'TIK-' . date('Ymd') . '-' . Str::random(5),
            'tgl_laporan' => now()->subDays(1),
            'nama_pelapor' => 'Dewi Sartika',
            'nomor_kontak' => '08123456456',
            'opd_id' => 16, // Dinas Sosial
            'jenis_laporan' => 'Koordinasi Teknis',
            'uraian_laporan' => 'Permintaan instalasi WiFi untuk ruang pelayanan masyarakat.',
            'status_laporan' => 'Selesai Diproses',
            'petugas_id' => 1,
            'keterangan_petugas' => 'Instalasi WiFi telah selesai dan berfungsi dengan baik',
            // 'hasil_laporan' => 'WiFi berhasil diinstal dengan kecepatan 100 Mbps',
            'file_laporan' => null,
            'foto_laporan' => null,
        ]);

        // Laporan 6: Laporan Gangguan - Belum Diproses
        Lapor::create([
            'no_tiket' => 'TIK-' . date('Ymd') . '-' . Str::random(5),
            'tgl_laporan' => now()->subHours(2),
            'nama_pelapor' => 'Andi Wijaya',
            'nomor_kontak' => '08123456888',
            'opd_id' => 14, // Dinas Pertanian
            'jenis_laporan' => 'Laporan Gangguan',
            'uraian_laporan' => 'Printer jaringan tidak dapat mencetak dokumen, lampu indikator berkedip merah.',
            'status_laporan' => 'Belum Diproses',
            'petugas_id' => null,
            'keterangan_petugas' => 'belum ada',
            // 'hasil_laporan' => 'belum ada',
            'file_laporan' => null,
            'foto_laporan' => null,
        ]);

        // Laporan 7: Koordinasi Teknis - Sedang Diproses
        Lapor::create([
            'no_tiket' => 'TIK-' . date('Ymd') . '-' . Str::random(5),
            'tgl_laporan' => now()->subHours(6),
            'nama_pelapor' => 'Maya Sari',
            'nomor_kontak' => '08123456321',
            'opd_id' => 17, // Dinas Pariwisata
            'jenis_laporan' => 'Koordinasi Teknis',
            'uraian_laporan' => 'Membutuhkan upgrade sistem keamanan jaringan untuk melindungi data wisatawan.',
            'status_laporan' => 'Sedang Diproses',
            'petugas_id' => 1,
            'keterangan_petugas' => 'Sedang melakukan analisis kebutuhan sistem keamanan',
            // 'hasil_laporan' => 'belum ada',
            'file_laporan' => null,
            'foto_laporan' => null,
        ]);

        // Laporan 8: Laporan Gangguan - Selesai
        Lapor::create([
            'no_tiket' => 'TIK-' . date('Ymd') . '-' . Str::random(5),
            'tgl_laporan' => now()->subDays(2),
            'nama_pelapor' => 'Hendra Gunawan',
            'nomor_kontak' => '08123456654',
            'opd_id' => 19, // Dinas Lingkungan Hidup
            'jenis_laporan' => 'Laporan Gangguan',
            'uraian_laporan' => 'Komputer kasir tidak dapat terhubung ke sistem pembayaran online.',
            'status_laporan' => 'Selesai Diproses',
            'petugas_id' => 1,
            'keterangan_petugas' => 'Masalah koneksi telah diperbaiki, sistem pembayaran normal kembali',
            // 'hasil_laporan' => 'Koneksi diperbaiki dengan mengganti kabel ethernet',
            'file_laporan' => null,
            'foto_laporan' => null,
        ]);

        // Laporan 9: Koordinasi Teknis - Belum Diproses
        Lapor::create([
            'no_tiket' => 'TIK-' . date('Ymd') . '-' . Str::random(5),
            'tgl_laporan' => now()->subHours(1),
            'nama_pelapor' => 'Ratna Dewi',
            'nomor_kontak' => '08123456987',
            'opd_id' => 20, // Dinas Kependudukan dan Pencatatan Sipil
            'jenis_laporan' => 'Koordinasi Teknis',
            'uraian_laporan' => 'Permintaan integrasi sistem e-KTP dengan database pusat untuk mempercepat pelayanan.',
            'status_laporan' => 'Belum Diproses',
            'petugas_id' => null,
            'keterangan_petugas' => 'belum ada',
            // 'hasil_laporan' => 'belum ada',
            'file_laporan' => null,
            'foto_laporan' => null,
        ]);

        // Laporan 10: Laporan Gangguan - Sedang Diproses
        Lapor::create([
            'no_tiket' => 'TIK-' . date('Ymd') . '-' . Str::random(5),
            'tgl_laporan' => now()->subHours(4),
            'nama_pelapor' => 'Agus Salim',
            'nomor_kontak' => '08123456147',
            'opd_id' => 21, // Dinas Perhubungan
            'jenis_laporan' => 'Laporan Gangguan',
            'uraian_laporan' => 'Sistem monitoring CCTV jalan raya mengalami gangguan, beberapa kamera tidak menampilkan gambar.',
            'status_laporan' => 'Sedang Diproses',
            'petugas_id' => 1,
            'keterangan_petugas' => 'Tim sedang melakukan pengecekan kamera dan jaringan',
            // 'hasil_laporan' => 'belum ada',
            'file_laporan' => null,
            'foto_laporan' => null,
        ]);
    }
}
