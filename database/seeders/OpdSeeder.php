<?php

namespace Database\Seeders;

use App\Models\Opd;
use Illuminate\Database\Seeder;

class OpdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $opds = [
            ['id' => 1, 'nama' => 'BAPPPEDA'],
            ['id' => 2, 'nama' => 'BKAD'],
            ['id' => 3, 'nama' => 'BKPSDM'],
            ['id' => 4, 'nama' => 'BPBD'],
            ['id' => 5, 'nama' => 'BPP Kamang Baru'],
            ['id' => 6, 'nama' => 'BPP Kupitan'],
            ['id' => 7, 'nama' => 'BPP Sijunjung'],
            ['id' => 8, 'nama' => 'BPP Sumpur Kudus'],
            ['id' => 9, 'nama' => 'Dinas Kependudukan dan Pencatatan Sipil'],
            ['id' => 10, 'nama' => 'Dinas Kesehatan'],
            ['id' => 11, 'nama' => 'Dinas Ketenagakerjaan dan Transmigrasi'],
            ['id' => 12, 'nama' => 'Dinas Komunikasi dan Informatika'],
            ['id' => 13, 'nama' => 'Dinas Pangan dan Perikanan'],
            ['id' => 14, 'nama' => 'Dinas Pariwisata,Pemuda dan Olahraga'],
            ['id' => 15, 'nama' => 'Dinas Pekerjaan Umum dan Penataan Ruang'],
            ['id' => 16, 'nama' => 'Dinas Pemberdayaan Masyarakat dan Nagari'],
            ['id' => 17, 'nama' => 'Dinas Penanaman Modal dan Pelayanan Terpadu satu Pintu '],
            ['id' => 18, 'nama' => 'Dinas Pendidikan dan Kebudayaan'],
            ['id' => 19, 'nama' => 'Dinas Pengendalian Penduduk dan Keluarga Berencana'],
            ['id' => 20, 'nama' => 'Dinas Perdagangan,Perindustrian,Koperasi Usaha Kecil dan Menengah'],
            ['id' => 21, 'nama' => 'Dinas Perhubungan'],
            ['id' => 22, 'nama' => 'Dinas Perpustakaan dan Kearsipan'],
            ['id' => 23, 'nama' => 'Dinas Pertanian'],
            ['id' => 24, 'nama' => 'Dinas Perumahan,Kawasan Permukiman dan Lingkungan Hidup'],
            ['id' => 25, 'nama' => 'Dinas Sosial,Pemberdayaan Perempuan dan Perlindungan Anak'],
            ['id' => 26, 'nama' => 'Inspektorat Daerah'],
            ['id' => 27, 'nama' => 'Kecamatan IV Nagari '],
            ['id' => 28, 'nama' => 'Kecamatan Kamang Baru'],
            ['id' => 29, 'nama' => 'Kecamatan Koto VII'],
            ['id' => 30, 'nama' => 'Kecamatan Kupitan'],
            ['id' => 31, 'nama' => 'Kecamatan Lubuk Tarok'],
            ['id' => 32, 'nama' => 'Kecamatan Sijunjung'],
            ['id' => 33, 'nama' => 'Kecamatan Tanjung GAdang'],
            ['id' => 34, 'nama' => 'Kecamatan Sumpur Kudus'],
            ['id' => 35, 'nama' => 'KESBANGPOL'],
            ['id' => 36, 'nama' => 'Puskesmas Gambok'],
            ['id' => 37, 'nama' => 'Puskesmas Kamang'],
            ['id' => 38, 'nama' => 'Puskesmas Kumanis'],
            ['id' => 39, 'nama' => 'Puskesmas Lubuk Tarok'],
            ['id' => 40, 'nama' => 'Puskesmas Muaro Bodi'],
            ['id' => 41, 'nama' => 'Puskesmas Padang Laweh'],
            ['id' => 42, 'nama' => 'Puskesmas Padang Sibusuk'],
            ['id' => 43, 'nama' => 'Puskesmas Sijunjung'],
            ['id' => 44, 'nama' => 'Puskesmas Sungai Lansek'],
            ['id' => 45, 'nama' => 'Puskesmas Tanjung Ampalu'],
            ['id' => 46, 'nama' => 'Puskesmas Tanjung Gadang'],
            ['id' => 47, 'nama' => 'RSUD'],
            ['id' => 48, 'nama' => 'Satpol PP dan Pemadam Kebakaran'],
            ['id' => 49, 'nama' => 'Sekretariat Daerah'],
            ['id' => 50, 'nama' => 'Sekretariat DPRD'],
            ['id' => 51, 'nama' => 'UPTD Alat Berat'],
            ['id' => 52, 'nama' => 'UPTD Alsintan'],
            ['id' => 53, 'nama' => 'UPTD Balai Penyuluh Pertanian'],
            ['id' => 54, 'nama' => 'UPTD Gudang Farmasi'],
            ['id' => 55, 'nama' => 'UPTD Labkesda'],
            ['id' => 56, 'nama' => 'UPTD Labor Uji Mutu'],
            ['id' => 57, 'nama' => 'UPTD Laboratorium Lingkungan'],
            ['id' => 58, 'nama' => 'UPTD Pasar Ternak'],
            ['id' => 59, 'nama' => 'UPTD Pengujian Kendaraan Bermotor'],
            ['id' => 60, 'nama' => 'UPTD Perlindungan Perempuan dan Anak'],
            ['id' => 61, 'nama' => 'UPTD Puskeswan Palangki'],
        ];

        foreach ($opds as $opd) {
            Opd::create($opd);
        }
    }
}