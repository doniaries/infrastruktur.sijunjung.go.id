<?php

namespace Database\Seeders;

use App\Models\Jorong;
use Illuminate\Database\Seeder;

class JorongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hapus data lama
        Jorong::query()->delete();

        $jorongs = [
            // ========================================
            // KECAMATAN IV NAGARI (kec_id=3) - 17 jorong
            // ========================================

            // Nagari Palangki (nagari_id=1) - 5 jorong
            ['id' => 1, 'nagari_id' => 1, 'nama_jorong' => 'Pantai Cermin', 'jumlah_penduduk_jorong' => 767],
            ['id' => 2, 'nagari_id' => 1, 'nama_jorong' => 'Tambang Ameh', 'jumlah_penduduk_jorong' => 672],
            ['id' => 3, 'nagari_id' => 1, 'nama_jorong' => 'Tanjung Udani', 'jumlah_penduduk_jorong' => 909],
            ['id' => 4, 'nagari_id' => 1, 'nama_jorong' => 'Ranah Tibarau', 'jumlah_penduduk_jorong' => 740],
            ['id' => 5, 'nagari_id' => 1, 'nama_jorong' => 'Lintas Harapan', 'jumlah_penduduk_jorong' => 886],

            // Nagari Koto Baru (nagari_id=2) - 3 jorong
            ['id' => 6, 'nagari_id' => 2, 'nama_jorong' => 'Pasar', 'jumlah_penduduk_jorong' => 1212],
            ['id' => 7, 'nagari_id' => 2, 'nama_jorong' => 'Simpang Ampek', 'jumlah_penduduk_jorong' => 810],
            ['id' => 8, 'nagari_id' => 2, 'nama_jorong' => 'Koto Panjang', 'jumlah_penduduk_jorong' => 1213],

            // Nagari Muaro Bodi (nagari_id=3) - 3 jorong
            ['id' => 9, 'nagari_id' => 3, 'nama_jorong' => 'Tanjung Pauh', 'jumlah_penduduk_jorong' => 1180],
            ['id' => 10, 'nagari_id' => 3, 'nama_jorong' => 'Dusun Tuo', 'jumlah_penduduk_jorong' => 1609],
            ['id' => 11, 'nagari_id' => 3, 'nama_jorong' => 'Bungo Pinang', 'jumlah_penduduk_jorong' => 775],

            // Nagari Mundam Sakti (nagari_id=4) - 3 jorong
            ['id' => 12, 'nagari_id' => 4, 'nama_jorong' => 'Ranah Pasar', 'jumlah_penduduk_jorong' => 1153],
            ['id' => 13, 'nagari_id' => 4, 'nama_jorong' => 'Kampung Pinang', 'jumlah_penduduk_jorong' => 952],
            ['id' => 14, 'nagari_id' => 4, 'nama_jorong' => 'Tanjung Raya', 'jumlah_penduduk_jorong' => 962],

            // Nagari Koto Tuo (nagari_id=5) - 3 jorong
            ['id' => 15, 'nagari_id' => 5, 'nama_jorong' => 'Bukik Malintang', 'jumlah_penduduk_jorong' => 650],
            ['id' => 16, 'nagari_id' => 5, 'nama_jorong' => 'Rantau Jambu', 'jumlah_penduduk_jorong' => 631],
            ['id' => 17, 'nagari_id' => 5, 'nama_jorong' => 'Koto Tangah', 'jumlah_penduduk_jorong' => 491],

            // ========================================
            // KECAMATAN KAMANG BARU (kec_id=8) - 61 jorong
            // ========================================

            // Nagari Sungai Lansek (nagari_id=6) - 7 jorong
            ['id' => 18, 'nagari_id' => 6, 'nama_jorong' => 'Cilacap', 'jumlah_penduduk_jorong' => 889],
            ['id' => 19, 'nagari_id' => 6, 'nama_jorong' => 'Talang', 'jumlah_penduduk_jorong' => 1058],
            ['id' => 20, 'nagari_id' => 6, 'nama_jorong' => 'Koto', 'jumlah_penduduk_jorong' => 936],
            ['id' => 21, 'nagari_id' => 6, 'nama_jorong' => 'Sikayan', 'jumlah_penduduk_jorong' => 882],
            ['id' => 22, 'nagari_id' => 6, 'nama_jorong' => 'Sungai Ampang', 'jumlah_penduduk_jorong' => 878],
            ['id' => 23, 'nagari_id' => 6, 'nama_jorong' => 'Pasar', 'jumlah_penduduk_jorong' => 514],
            ['id' => 24, 'nagari_id' => 6, 'nama_jorong' => 'Batang Tonam', 'jumlah_penduduk_jorong' => 480],

            // Nagari Kamang (nagari_id=7) - 11 jorong
            ['id' => 25, 'nagari_id' => 7, 'nama_jorong' => 'Batang Kariang', 'jumlah_penduduk_jorong' => 446],
            ['id' => 26, 'nagari_id' => 7, 'nama_jorong' => 'Galogah', 'jumlah_penduduk_jorong' => 815],
            ['id' => 27, 'nagari_id' => 7, 'nama_jorong' => 'Kamang', 'jumlah_penduduk_jorong' => 1020],
            ['id' => 28, 'nagari_id' => 7, 'nama_jorong' => 'Kamang Abadi', 'jumlah_penduduk_jorong' => 900],
            ['id' => 29, 'nagari_id' => 7, 'nama_jorong' => 'Kamang Bhakti', 'jumlah_penduduk_jorong' => 934],
            ['id' => 30, 'nagari_id' => 7, 'nama_jorong' => 'Kamang Makmur', 'jumlah_penduduk_jorong' => 1642],
            ['id' => 31, 'nagari_id' => 7, 'nama_jorong' => 'Kamang Sejahtera', 'jumlah_penduduk_jorong' => 767],
            ['id' => 32, 'nagari_id' => 7, 'nama_jorong' => 'Kurnia Kamang', 'jumlah_penduduk_jorong' => 1590],
            ['id' => 33, 'nagari_id' => 7, 'nama_jorong' => 'Simpang Kamang', 'jumlah_penduduk_jorong' => 1367],
            ['id' => 34, 'nagari_id' => 7, 'nama_jorong' => 'Kamang Sentosa', 'jumlah_penduduk_jorong' => 1099],
            ['id' => 35, 'nagari_id' => 7, 'nama_jorong' => 'Kamang Madani', 'jumlah_penduduk_jorong' => 694],

            // Nagari Muaro Takuang (nagari_id=8) - 7 jorong
            ['id' => 36, 'nagari_id' => 8, 'nama_jorong' => 'Dusun Tinggi I', 'jumlah_penduduk_jorong' => null],
            ['id' => 37, 'nagari_id' => 8, 'nama_jorong' => 'Kiliran Jao', 'jumlah_penduduk_jorong' => null],
            ['id' => 38, 'nagari_id' => 8, 'nama_jorong' => 'Batu Talang', 'jumlah_penduduk_jorong' => null],
            ['id' => 39, 'nagari_id' => 8, 'nama_jorong' => 'Koto Lamo', 'jumlah_penduduk_jorong' => null],
            ['id' => 40, 'nagari_id' => 8, 'nama_jorong' => 'Batang Tiau', 'jumlah_penduduk_jorong' => null],
            ['id' => 41, 'nagari_id' => 8, 'nama_jorong' => 'Koto Rona', 'jumlah_penduduk_jorong' => null],
            ['id' => 42, 'nagari_id' => 8, 'nama_jorong' => 'Sungai Sariek', 'jumlah_penduduk_jorong' => null],

            // Nagari Aia Amo (nagari_id=9) - 6 jorong
            ['id' => 43, 'nagari_id' => 9, 'nama_jorong' => 'Guguk Tinggi', 'jumlah_penduduk_jorong' => null],
            ['id' => 44, 'nagari_id' => 9, 'nama_jorong' => 'Koto Baru', 'jumlah_penduduk_jorong' => null],
            ['id' => 45, 'nagari_id' => 9, 'nama_jorong' => 'Banjar Tengah', 'jumlah_penduduk_jorong' => null],
            ['id' => 46, 'nagari_id' => 9, 'nama_jorong' => 'Lubuk Kapiek', 'jumlah_penduduk_jorong' => null],
            ['id' => 47, 'nagari_id' => 9, 'nama_jorong' => 'Koto Ronah', 'jumlah_penduduk_jorong' => null],
            ['id' => 48, 'nagari_id' => 9, 'nama_jorong' => 'Koto Tuo', 'jumlah_penduduk_jorong' => null],

            // Nagari Sungai Batuang (nagari_id=10) - 3 jorong
            ['id' => 49, 'nagari_id' => 10, 'nama_jorong' => 'Koto', 'jumlah_penduduk_jorong' => 1108],
            ['id' => 50, 'nagari_id' => 10, 'nama_jorong' => 'Pasar', 'jumlah_penduduk_jorong' => 611],
            ['id' => 51, 'nagari_id' => 10, 'nama_jorong' => 'Banjar Pematang', 'jumlah_penduduk_jorong' => 775],

            // Nagari Kunangan Parit Rantang (nagari_id=11) - 9 jorong
            ['id' => 52, 'nagari_id' => 11, 'nama_jorong' => 'Kunangan', 'jumlah_penduduk_jorong' => 1200],
            ['id' => 53, 'nagari_id' => 11, 'nama_jorong' => 'Parik Rantang', 'jumlah_penduduk_jorong' => 1684],
            ['id' => 54, 'nagari_id' => 11, 'nama_jorong' => 'Sungai Tambang I', 'jumlah_penduduk_jorong' => 2759],
            ['id' => 55, 'nagari_id' => 11, 'nama_jorong' => 'Sungai Tambang II', 'jumlah_penduduk_jorong' => 1299],
            ['id' => 56, 'nagari_id' => 11, 'nama_jorong' => 'Sungai Tambang III', 'jumlah_penduduk_jorong' => 1282],
            ['id' => 57, 'nagari_id' => 11, 'nama_jorong' => 'Sungai Tambang IV', 'jumlah_penduduk_jorong' => 926],
            ['id' => 58, 'nagari_id' => 11, 'nama_jorong' => 'Mekar Jaya Sungai Tenang', 'jumlah_penduduk_jorong' => 791],
            ['id' => 59, 'nagari_id' => 11, 'nama_jorong' => 'Suka Maju Sungai Tenang', 'jumlah_penduduk_jorong' => 554],
            ['id' => 60, 'nagari_id' => 11, 'nama_jorong' => 'Suko Rejo Sungai Tenang', 'jumlah_penduduk_jorong' => 817],

            // Nagari Tanjuang Kaliang (nagari_id=12) - 3 jorong
            ['id' => 61, 'nagari_id' => 12, 'nama_jorong' => 'Mudiak Imuak', 'jumlah_penduduk_jorong' => 716],
            ['id' => 62, 'nagari_id' => 12, 'nama_jorong' => 'Parik Malintang', 'jumlah_penduduk_jorong' => 741],
            ['id' => 63, 'nagari_id' => 12, 'nama_jorong' => 'Pincuran Tujuah', 'jumlah_penduduk_jorong' => 624],

            // Nagari Padang Tarok (nagari_id=13) - 4 jorong
            ['id' => 64, 'nagari_id' => 13, 'nama_jorong' => 'Binuang Aie Putiah', 'jumlah_penduduk_jorong' => 814],
            ['id' => 65, 'nagari_id' => 13, 'nama_jorong' => 'Koto Tangah', 'jumlah_penduduk_jorong' => 600],
            ['id' => 66, 'nagari_id' => 13, 'nama_jorong' => 'Muaro Buan', 'jumlah_penduduk_jorong' => 426],
            ['id' => 67, 'nagari_id' => 13, 'nama_jorong' => 'Pintu Batu', 'jumlah_penduduk_jorong' => 390],

            // Nagari Siaur (nagari_id=14) - 3 jorong
            ['id' => 68, 'nagari_id' => 14, 'nama_jorong' => 'Koto Tangah', 'jumlah_penduduk_jorong' => 539],
            ['id' => 69, 'nagari_id' => 14, 'nama_jorong' => 'Lambah Gunung', 'jumlah_penduduk_jorong' => 574],
            ['id' => 70, 'nagari_id' => 14, 'nama_jorong' => 'Ranah Pinago', 'jumlah_penduduk_jorong' => 561],

            // Nagari Lubuk Tarantang (nagari_id=15) - 3 jorong
            ['id' => 71, 'nagari_id' => 15, 'nama_jorong' => 'Dusun Tinggi II', 'jumlah_penduduk_jorong' => 800],
            ['id' => 72, 'nagari_id' => 15, 'nama_jorong' => 'Koto Baru', 'jumlah_penduduk_jorong' => 350],
            ['id' => 73, 'nagari_id' => 15, 'nama_jorong' => 'Lubuk Tarantang', 'jumlah_penduduk_jorong' => 450],

            // Nagari Maloro (nagari_id=16) - 5 jorong
            ['id' => 74, 'nagari_id' => 16, 'nama_jorong' => 'Koto Ranah', 'jumlah_penduduk_jorong' => 407],
            ['id' => 75, 'nagari_id' => 16, 'nama_jorong' => 'Pasar', 'jumlah_penduduk_jorong' => 527],
            ['id' => 76, 'nagari_id' => 16, 'nama_jorong' => 'Sungai Alai', 'jumlah_penduduk_jorong' => 308],
            ['id' => 77, 'nagari_id' => 16, 'nama_jorong' => 'Sungai Gamuruah', 'jumlah_penduduk_jorong' => 505],
            ['id' => 78, 'nagari_id' => 16, 'nama_jorong' => 'Tanjung Balik', 'jumlah_penduduk_jorong' => 513],

            // ========================================
            // KECAMATAN TANJUNG GADANG (kec_id=7) - 41 jorong
            // ========================================

            // Nagari Timbulun (nagari_id=54) - 38 jorong
            ['id' => 79, 'nagari_id' => 54, 'nama_jorong' => 'Ambacang', 'jumlah_penduduk_jorong' => 756],
            ['id' => 80, 'nagari_id' => 54, 'nama_jorong' => 'Balai-Balai', 'jumlah_penduduk_jorong' => 748],
            ['id' => 81, 'nagari_id' => 54, 'nama_jorong' => 'Bancah', 'jumlah_penduduk_jorong' => 173],
            ['id' => 82, 'nagari_id' => 54, 'nama_jorong' => 'Batang Dikek', 'jumlah_penduduk_jorong' => 266],
            ['id' => 83, 'nagari_id' => 54, 'nama_jorong' => 'Batang Kati', 'jumlah_penduduk_jorong' => 484],
            ['id' => 84, 'nagari_id' => 54, 'nama_jorong' => 'Bukik Sabalah', 'jumlah_penduduk_jorong' => 291],
            ['id' => 85, 'nagari_id' => 54, 'nama_jorong' => 'Guguk Naneh', 'jumlah_penduduk_jorong' => 371],
            ['id' => 86, 'nagari_id' => 54, 'nama_jorong' => 'Kayu Gadih', 'jumlah_penduduk_jorong' => 227],
            ['id' => 87, 'nagari_id' => 54, 'nama_jorong' => 'Koto', 'jumlah_penduduk_jorong' => 270],
            ['id' => 88, 'nagari_id' => 54, 'nama_jorong' => 'Koto Baru', 'jumlah_penduduk_jorong' => 256],
            ['id' => 89, 'nagari_id' => 54, 'nama_jorong' => 'Koto Langki', 'jumlah_penduduk_jorong' => 141],
            ['id' => 90, 'nagari_id' => 54, 'nama_jorong' => 'Koto Pulasan', 'jumlah_penduduk_jorong' => 720],
            ['id' => 91, 'nagari_id' => 54, 'nama_jorong' => 'Koto Ranah', 'jumlah_penduduk_jorong' => 306],
            ['id' => 92, 'nagari_id' => 54, 'nama_jorong' => 'Koto Sinyamu', 'jumlah_penduduk_jorong' => 108],
            ['id' => 93, 'nagari_id' => 54, 'nama_jorong' => 'Koto Timbulun', 'jumlah_penduduk_jorong' => 867],
            ['id' => 94, 'nagari_id' => 54, 'nama_jorong' => 'Kumbayak', 'jumlah_penduduk_jorong' => 95],
            ['id' => 95, 'nagari_id' => 54, 'nama_jorong' => 'Liambang', 'jumlah_penduduk_jorong' => 271],
            ['id' => 96, 'nagari_id' => 54, 'nama_jorong' => 'Lubuk Cupak', 'jumlah_penduduk_jorong' => 232],
            ['id' => 97, 'nagari_id' => 54, 'nama_jorong' => 'Lubuk Tolang', 'jumlah_penduduk_jorong' => 87],
            ['id' => 98, 'nagari_id' => 54, 'nama_jorong' => 'Muaro Kaluai', 'jumlah_penduduk_jorong' => 82],
            ['id' => 99, 'nagari_id' => 54, 'nama_jorong' => 'Muaro Linggo', 'jumlah_penduduk_jorong' => 192],
            ['id' => 100, 'nagari_id' => 54, 'nama_jorong' => 'Mudik Malih', 'jumlah_penduduk_jorong' => 137],
            ['id' => 101, 'nagari_id' => 54, 'nama_jorong' => 'Padang Laweh', 'jumlah_penduduk_jorong' => 538],
            ['id' => 102, 'nagari_id' => 54, 'nama_jorong' => 'Pandam', 'jumlah_penduduk_jorong' => 193],
            ['id' => 103, 'nagari_id' => 54, 'nama_jorong' => 'Pasar Baru', 'jumlah_penduduk_jorong' => 207],
            ['id' => 104, 'nagari_id' => 54, 'nama_jorong' => 'Pasar Lamo', 'jumlah_penduduk_jorong' => 212],
            ['id' => 105, 'nagari_id' => 54, 'nama_jorong' => 'Pasar Pulasan', 'jumlah_penduduk_jorong' => 823],
            ['id' => 106, 'nagari_id' => 54, 'nama_jorong' => 'Pasar Tanjung Gadang', 'jumlah_penduduk_jorong' => 456],
            ['id' => 107, 'nagari_id' => 54, 'nama_jorong' => 'Pisang Kolek', 'jumlah_penduduk_jorong' => 201],
            ['id' => 108, 'nagari_id' => 54, 'nama_jorong' => 'Polak Sinyamu', 'jumlah_penduduk_jorong' => 89],
            ['id' => 109, 'nagari_id' => 54, 'nama_jorong' => 'Ranah Palam', 'jumlah_penduduk_jorong' => 144],
            ['id' => 110, 'nagari_id' => 54, 'nama_jorong' => 'Sawah Gadang', 'jumlah_penduduk_jorong' => 178],
            ['id' => 111, 'nagari_id' => 54, 'nama_jorong' => 'Sibisir', 'jumlah_penduduk_jorong' => 957],
            ['id' => 112, 'nagari_id' => 54, 'nama_jorong' => 'Sungai Kandi', 'jumlah_penduduk_jorong' => 143],
            ['id' => 113, 'nagari_id' => 54, 'nama_jorong' => 'Sungai Napar', 'jumlah_penduduk_jorong' => 136],
            ['id' => 114, 'nagari_id' => 54, 'nama_jorong' => 'Tandikek', 'jumlah_penduduk_jorong' => 629],
            ['id' => 115, 'nagari_id' => 54, 'nama_jorong' => 'Tanjung Medan', 'jumlah_penduduk_jorong' => 219],
            ['id' => 116, 'nagari_id' => 54, 'nama_jorong' => 'Timbulun Patah', 'jumlah_penduduk_jorong' => 185],

            // Nagari Tanjung Gadang (nagari_id=55) - 9 jorong
            ['id' => 117, 'nagari_id' => 55, 'nama_jorong' => 'Pasar Tanjung Gadang', 'jumlah_penduduk_jorong' => 109],
            ['id' => 118, 'nagari_id' => 55, 'nama_jorong' => 'Mudik Malih', 'jumlah_penduduk_jorong' => null],
            ['id' => 119, 'nagari_id' => 55, 'nama_jorong' => 'Guguk Naneh', 'jumlah_penduduk_jorong' => null],
            ['id' => 120, 'nagari_id' => 55, 'nama_jorong' => 'Pandam', 'jumlah_penduduk_jorong' => null],
            ['id' => 121, 'nagari_id' => 55, 'nama_jorong' => 'Koto Baru', 'jumlah_penduduk_jorong' => null],
            ['id' => 122, 'nagari_id' => 55, 'nama_jorong' => 'Koto Ranah', 'jumlah_penduduk_jorong' => null],
            ['id' => 123, 'nagari_id' => 55, 'nama_jorong' => 'Sungai Napar', 'jumlah_penduduk_jorong' => null],
            ['id' => 124, 'nagari_id' => 55, 'nama_jorong' => 'Timbulun Patah', 'jumlah_penduduk_jorong' => null],
            ['id' => 125, 'nagari_id' => 55, 'nama_jorong' => 'Kayu Gadih', 'jumlah_penduduk_jorong' => null],

            // ========================================
            // KECAMATAN SIJUNJUNG (kec_id=1) - 56 jorong
            // ========================================

            // Nagari Muaro (nagari_id=34) - 9 jorong
            ['id' => 126, 'nagari_id' => 34, 'nama_jorong' => 'Subarang Ombak', 'jumlah_penduduk_jorong' => null],
            ['id' => 127, 'nagari_id' => 34, 'nama_jorong' => 'Ilie Guguk Dadok', 'jumlah_penduduk_jorong' => null],
            ['id' => 128, 'nagari_id' => 34, 'nama_jorong' => 'Tongah', 'jumlah_penduduk_jorong' => null],
            ['id' => 129, 'nagari_id' => 34, 'nama_jorong' => 'Muaro Gambok', 'jumlah_penduduk_jorong' => null],
            ['id' => 130, 'nagari_id' => 34, 'nama_jorong' => 'Ilie Pasa Jumak', 'jumlah_penduduk_jorong' => null],
            ['id' => 131, 'nagari_id' => 34, 'nama_jorong' => 'Subarang Sukam', 'jumlah_penduduk_jorong' => null],
            ['id' => 132, 'nagari_id' => 34, 'nama_jorong' => 'Pematang Sari Bulan', 'jumlah_penduduk_jorong' => null],
            ['id' => 133, 'nagari_id' => 34, 'nama_jorong' => 'Pematang Anjung', 'jumlah_penduduk_jorong' => null],
            ['id' => 134, 'nagari_id' => 34, 'nama_jorong' => 'Pulau Berambai', 'jumlah_penduduk_jorong' => null],
            ['id' => 135, 'nagari_id' => 34, 'nama_jorong' => 'Batang Salosah', 'jumlah_penduduk_jorong' => null],

            // Nagari Sijunjung (nagari_id=42) - 10 jorong
            ['id' => 136, 'nagari_id' => 42, 'nama_jorong' => 'Padang Ranah', 'jumlah_penduduk_jorong' => 679],
            ['id' => 137, 'nagari_id' => 42, 'nama_jorong' => 'Tapian Nanto', 'jumlah_penduduk_jorong' => 896],
            ['id' => 138, 'nagari_id' => 42, 'nama_jorong' => 'Kandang Harimau', 'jumlah_penduduk_jorong' => 744],
            ['id' => 139, 'nagari_id' => 42, 'nama_jorong' => 'Tapian Diaro', 'jumlah_penduduk_jorong' => 530],
            ['id' => 140, 'nagari_id' => 42, 'nama_jorong' => 'Kampung Berlian', 'jumlah_penduduk_jorong' => 934],
            ['id' => 141, 'nagari_id' => 42, 'nama_jorong' => 'Pudak', 'jumlah_penduduk_jorong' => 794],
            ['id' => 142, 'nagari_id' => 42, 'nama_jorong' => 'Kampung Baru', 'jumlah_penduduk_jorong' => 976],
            ['id' => 143, 'nagari_id' => 42, 'nama_jorong' => 'Pasar Sijunjung', 'jumlah_penduduk_jorong' => 922],
            ['id' => 144, 'nagari_id' => 42, 'nama_jorong' => 'Tanah Bato', 'jumlah_penduduk_jorong' => 1232],
            ['id' => 145, 'nagari_id' => 42, 'nama_jorong' => 'Ganting', 'jumlah_penduduk_jorong' => 2485],

            // Nagari Pematang Panjang (nagari_id=37) - 11 jorong
            ['id' => 146, 'nagari_id' => 37, 'nama_jorong' => 'Kalumpang', 'jumlah_penduduk_jorong' => 380],
            ['id' => 147, 'nagari_id' => 37, 'nama_jorong' => 'Sitampung', 'jumlah_penduduk_jorong' => 497],
            ['id' => 148, 'nagari_id' => 37, 'nama_jorong' => 'Pondok Jago', 'jumlah_penduduk_jorong' => 678],
            ['id' => 149, 'nagari_id' => 37, 'nama_jorong' => 'Koman Kocik', 'jumlah_penduduk_jorong' => 469],
            ['id' => 150, 'nagari_id' => 37, 'nama_jorong' => 'Parak Gadang', 'jumlah_penduduk_jorong' => 834],
            ['id' => 151, 'nagari_id' => 37, 'nama_jorong' => 'Pale', 'jumlah_penduduk_jorong' => 1009],
            ['id' => 152, 'nagari_id' => 37, 'nama_jorong' => 'Koto Tangah', 'jumlah_penduduk_jorong' => 909],
            ['id' => 153, 'nagari_id' => 37, 'nama_jorong' => 'Koran', 'jumlah_penduduk_jorong' => 890],
            ['id' => 154, 'nagari_id' => 37, 'nama_jorong' => 'Kambuik Koman', 'jumlah_penduduk_jorong' => 750],
            ['id' => 155, 'nagari_id' => 37, 'nama_jorong' => 'Limau Sundai', 'jumlah_penduduk_jorong' => 700],
            ['id' => 156, 'nagari_id' => 37, 'nama_jorong' => 'Duri', 'jumlah_penduduk_jorong' => 650],

            // Nagari Kandang Baru (nagari_id=35) - 3 jorong
            ['id' => 157, 'nagari_id' => 35, 'nama_jorong' => 'Ranah Tanjung Bungo', 'jumlah_penduduk_jorong' => 555],
            ['id' => 158, 'nagari_id' => 35, 'nama_jorong' => 'Sungai Abu', 'jumlah_penduduk_jorong' => 593],
            ['id' => 159, 'nagari_id' => 35, 'nama_jorong' => 'Samiak', 'jumlah_penduduk_jorong' => 535],

            // Nagari Solok Ambah (nagari_id=38) - 5 jorong
            ['id' => 160, 'nagari_id' => 38, 'nama_jorong' => 'Koto Ranah', 'jumlah_penduduk_jorong' => null],
            ['id' => 161, 'nagari_id' => 38, 'nama_jorong' => 'Koto Mudik', 'jumlah_penduduk_jorong' => null],
            ['id' => 162, 'nagari_id' => 38, 'nama_jorong' => 'Bukik Tujuh', 'jumlah_penduduk_jorong' => null],
            ['id' => 163, 'nagari_id' => 38, 'nama_jorong' => 'Rimbo Ambacang', 'jumlah_penduduk_jorong' => null],
            ['id' => 164, 'nagari_id' => 38, 'nama_jorong' => 'Takuang', 'jumlah_penduduk_jorong' => null],

            // Nagari Paru (nagari_id=39) - 3 jorong
            ['id' => 158, 'nagari_id' => 39, 'nama_jorong' => 'Batu Ranjau', 'jumlah_penduduk_jorong' => null],
            ['id' => 159, 'nagari_id' => 39, 'nama_jorong' => 'Bukik Buar', 'jumlah_penduduk_jorong' => null],
            ['id' => 160, 'nagari_id' => 39, 'nama_jorong' => 'Kampung Tarandam', 'jumlah_penduduk_jorong' => null],

            // Nagari Silokek (nagari_id=36) - 2 jorong
            ['id' => 161, 'nagari_id' => 36, 'nama_jorong' => 'Tanjung Medan', 'jumlah_penduduk_jorong' => null],
            ['id' => 162, 'nagari_id' => 36, 'nama_jorong' => 'Sankiamo', 'jumlah_penduduk_jorong' => null],
            
            // Nagari Durian Gadang (nagari_id=40) - 5 jorong
            ['id' => 163, 'nagari_id' => 40, 'nama_jorong' => 'Koto Mudik', 'jumlah_penduduk_jorong' => null],
            ['id' => 164, 'nagari_id' => 40, 'nama_jorong' => 'Koto Ilie', 'jumlah_penduduk_jorong' => null],
            ['id' => 165, 'nagari_id' => 40, 'nama_jorong' => 'Pinang', 'jumlah_penduduk_jorong' => null],
            ['id' => 166, 'nagari_id' => 40, 'nama_jorong' => 'Tanggalo', 'jumlah_penduduk_jorong' => null],
            ['id' => 167, 'nagari_id' => 40, 'nama_jorong' => 'Silukah', 'jumlah_penduduk_jorong' => null],

            // Nagari Aie Angek (nagari_id=41) - 7 jorong
            ['id' => 168, 'nagari_id' => 41, 'nama_jorong' => 'Koto Benek', 'jumlah_penduduk_jorong' => null],
            ['id' => 169, 'nagari_id' => 41, 'nama_jorong' => 'Silabau', 'jumlah_penduduk_jorong' => null],
            ['id' => 170, 'nagari_id' => 41, 'nama_jorong' => 'Kapalo Koto', 'jumlah_penduduk_jorong' => null],
            ['id' => 171, 'nagari_id' => 41, 'nama_jorong' => 'Tanggalo', 'jumlah_penduduk_jorong' => null],
            ['id' => 172, 'nagari_id' => 41, 'nama_jorong' => 'Padang Doto', 'jumlah_penduduk_jorong' => null],
            ['id' => 173, 'nagari_id' => 41, 'nama_jorong' => 'Kulampi', 'jumlah_penduduk_jorong' => null],
            ['id' => 174, 'nagari_id' => 41, 'nama_jorong' => 'Sungai Duo', 'jumlah_penduduk_jorong' => null],

            // ========================================
            // KECAMATAN LUBUK TAROK (kec_id=6) - 24 jorong
            // ========================================

            // Nagari Lubuk Tarok (nagari_id=28) - 24 jorong
            ['id' => 175, 'nagari_id' => 28, 'nama_jorong' => 'Andopan', 'jumlah_penduduk_jorong' => 681],
            ['id' => 176, 'nagari_id' => 28, 'nama_jorong' => 'Jambu Lipo', 'jumlah_penduduk_jorong' => 1613],
            ['id' => 177, 'nagari_id' => 28, 'nama_jorong' => 'Koto Tuo', 'jumlah_penduduk_jorong' => 2209],
            ['id' => 178, 'nagari_id' => 28, 'nama_jorong' => 'Padang Basiku', 'jumlah_penduduk_jorong' => 667],
            ['id' => 179, 'nagari_id' => 28, 'nama_jorong' => 'Silalak Kulik', 'jumlah_penduduk_jorong' => 699],
            ['id' => 180, 'nagari_id' => 28, 'nama_jorong' => 'Sungai Jodi', 'jumlah_penduduk_jorong' => 1018],
            ['id' => 181, 'nagari_id' => 28, 'nama_jorong' => 'Tigo Korong', 'jumlah_penduduk_jorong' => 745],
            ['id' => 182, 'nagari_id' => 29, 'nama_jorong' => 'Rumbai', 'jumlah_penduduk_jorong' => 561],
            ['id' => 183, 'nagari_id' => 29, 'nama_jorong' => 'Lalan', 'jumlah_penduduk_jorong' => 817],
            ['id' => 184, 'nagari_id' => 29, 'nama_jorong' => 'Batu Ajung', 'jumlah_penduduk_jorong' => 870],
            ['id' => 185, 'nagari_id' => 29, 'nama_jorong' => 'Batang Lalan', 'jumlah_penduduk_jorong' => 524],
            ['id' => 186, 'nagari_id' => 29, 'nama_jorong' => 'Sikaladi', 'jumlah_penduduk_jorong' => 762],
            ['id' => 187, 'nagari_id' => 30, 'nama_jorong' => 'Koto', 'jumlah_penduduk_jorong' => 1078],
            ['id' => 189, 'nagari_id' => 30, 'nama_jorong' => 'Koto Tangah', 'jumlah_penduduk_jorong' => 731],
            ['id' => 190, 'nagari_id' => 30, 'nama_jorong' => 'Taratak', 'jumlah_penduduk_jorong' => 966],
            ['id' => 191, 'nagari_id' => 31, 'nama_jorong' => 'Koto Kampung Dalam', 'jumlah_penduduk_jorong' => 524],
            ['id' => 192, 'nagari_id' => 31, 'nama_jorong' => 'Limau Sundai', 'jumlah_penduduk_jorong' => 830],
            ['id' => 193, 'nagari_id' => 31, 'nama_jorong' => 'Palintangan', 'jumlah_penduduk_jorong' => 576],
            ['id' => 194, 'nagari_id' => 32, 'nama_jorong' => 'Imbang Joyo', 'jumlah_penduduk_jorong' => 604],
            ['id' => 195, 'nagari_id' => 32, 'nama_jorong' => 'Taratak', 'jumlah_penduduk_jorong' => 354],
            ['id' => 196, 'nagari_id' => 32, 'nama_jorong' => 'Tanjung Korong', 'jumlah_penduduk_jorong' => 348],
            ['id' => 197, 'nagari_id' => 33, 'nama_jorong' => 'Ranah Lawe', 'jumlah_penduduk_jorong' => 329],
            ['id' => 198, 'nagari_id' => 33, 'nama_jorong' => 'Koto Ranah', 'jumlah_penduduk_jorong' => 421],
            ['id' => 199, 'nagari_id' => 33, 'nama_jorong' => 'Pakorongan', 'jumlah_penduduk_jorong' => 426],

            // ========================================
            // KECAMATAN KUPITAN (kec_id=5) - 14 jorong
            // ========================================

            // Nagari Batu Manjulur (nagari_id=24) - 14 jorong
            ['id' => 200, 'nagari_id' => 24, 'nama_jorong' => 'Batu Manjulur Barat', 'jumlah_penduduk_jorong' => 1094],
            ['id' => 201, 'nagari_id' => 24, 'nama_jorong' => 'Batu Manjulur Timur', 'jumlah_penduduk_jorong' => 789],
            ['id' => 202, 'nagari_id' => 25, 'nama_jorong' => 'Pamuatan Timur', 'jumlah_penduduk_jorong' => 887],
            ['id' => 203, 'nagari_id' => 25, 'nama_jorong' => 'Pamuatan Barat', 'jumlah_penduduk_jorong' => 767],
            ['id' => 204, 'nagari_id' => 26, 'nama_jorong' => 'Tapi Balai', 'jumlah_penduduk_jorong' => 1982],
            ['id' => 205, 'nagari_id' => 26, 'nama_jorong' => 'Kapalo Koto', 'jumlah_penduduk_jorong' => 1766],
            ['id' => 206, 'nagari_id' => 26, 'nama_jorong' => 'Guguk Tinggi', 'jumlah_penduduk_jorong' => 1365],
            ['id' => 207, 'nagari_id' => 26, 'nama_jorong' => 'Simancung', 'jumlah_penduduk_jorong' => 1335],
            ['id' => 208, 'nagari_id' => 26, 'nama_jorong' => 'Ladang Kapeh', 'jumlah_penduduk_jorong' => 1303],
            ['id' => 209, 'nagari_id' => 27, 'nama_jorong' => 'Dusun Koto Tongah', 'jumlah_penduduk_jorong' => 251],
            ['id' => 210, 'nagari_id' => 27, 'nama_jorong' => 'Dusun Koto Panjang', 'jumlah_penduduk_jorong' => 353],
            ['id' => 211, 'nagari_id' => 27, 'nama_jorong' => 'Dusun Koto Lamo', 'jumlah_penduduk_jorong' => 415],
            ['id' => 212, 'nagari_id' => 27, 'nama_jorong' => 'Dusun Koto Ateh', 'jumlah_penduduk_jorong' => 493],
            ['id' => 213, 'nagari_id' => 27, 'nama_jorong' => 'Dusun Guguk Bulek', 'jumlah_penduduk_jorong' => 138],

            // ========================================
            // KECAMATAN LIMO KOTO (kec_id=2) - 36 jorong
            // ========================================

            // Nagari Limo Koto (nagari_id=17) - 8 jorong
            ['id' => 214, 'nagari_id' => 17, 'nama_jorong' => 'Aur Gading', 'jumlah_penduduk_jorong' => 1218],
            ['id' => 215, 'nagari_id' => 17, 'nama_jorong' => 'Tanjung Ampalu', 'jumlah_penduduk_jorong' => 467],
            ['id' => 216, 'nagari_id' => 17, 'nama_jorong' => 'Pasar Tanjung Ampalu', 'jumlah_penduduk_jorong' => 938],
            ['id' => 217, 'nagari_id' => 17, 'nama_jorong' => 'Mangkudu Kodok', 'jumlah_penduduk_jorong' => 1066],
            ['id' => 218, 'nagari_id' => 17, 'nama_jorong' => 'Koto Panjang', 'jumlah_penduduk_jorong' => 1791],
            ['id' => 219, 'nagari_id' => 17, 'nama_jorong' => 'Batu Gandang', 'jumlah_penduduk_jorong' => 1532],
            ['id' => 220, 'nagari_id' => 17, 'nama_jorong' => 'Batu Balang', 'jumlah_penduduk_jorong' => 1613],
            ['id' => 221, 'nagari_id' => 17, 'nama_jorong' => 'Solok Badak', 'jumlah_penduduk_jorong' => 499],

            // Nagari Padang Laweh (nagari_id=20) - 4 jorong
            ['id' => 222, 'nagari_id' => 20, 'nama_jorong' => 'Teratak Betung', 'jumlah_penduduk_jorong' => 800],
            ['id' => 223, 'nagari_id' => 20, 'nama_jorong' => 'Koto Padang Laweh', 'jumlah_penduduk_jorong' => 750],
            ['id' => 224, 'nagari_id' => 20, 'nama_jorong' => 'Sungai Gemiri', 'jumlah_penduduk_jorong' => 700],
            ['id' => 225, 'nagari_id' => 20, 'nama_jorong' => 'Bukik Gombak', 'jumlah_penduduk_jorong' => 650],

            // Nagari Padang Laweh Selatan (nagari_id=23) - 5 jorong
            ['id' => 226, 'nagari_id' => 23, 'nama_jorong' => 'Ranah Sigading', 'jumlah_penduduk_jorong' => 1651],
            ['id' => 227, 'nagari_id' => 23, 'nama_jorong' => 'Sungai Gemuruh', 'jumlah_penduduk_jorong' => 1069],
            ['id' => 228, 'nagari_id' => 23, 'nama_jorong' => 'Taratak Baru', 'jumlah_penduduk_jorong' => 1593],
            ['id' => 229, 'nagari_id' => 23, 'nama_jorong' => 'Sawah Tarok', 'jumlah_penduduk_jorong' => 585],
            ['id' => 230, 'nagari_id' => 23, 'nama_jorong' => 'Pasar Gambok', 'jumlah_penduduk_jorong' => 814],

            // Nagari Guguk (nagari_id=19) - 3 jorong
            ['id' => 231, 'nagari_id' => 19, 'nama_jorong' => 'Buluh Rotan', 'jumlah_penduduk_jorong' => 890],
            ['id' => 232, 'nagari_id' => 19, 'nama_jorong' => 'Padang Lalang', 'jumlah_penduduk_jorong' => 357],
            ['id' => 233, 'nagari_id' => 19, 'nama_jorong' => 'Koto Guguk', 'jumlah_penduduk_jorong' => 1067],

            // Nagari Palaluar (nagari_id=18) - 5 jorong
            ['id' => 234, 'nagari_id' => 18, 'nama_jorong' => 'Koto Palaluar', 'jumlah_penduduk_jorong' => 517],
            ['id' => 235, 'nagari_id' => 18, 'nama_jorong' => 'Bungo', 'jumlah_penduduk_jorong' => 793],
            ['id' => 236, 'nagari_id' => 18, 'nama_jorong' => 'Ranah', 'jumlah_penduduk_jorong' => 951],
            ['id' => 237, 'nagari_id' => 18, 'nama_jorong' => 'Kampung Baru', 'jumlah_penduduk_jorong' => 436],
            ['id' => 238, 'nagari_id' => 18, 'nama_jorong' => 'Sumpadang', 'jumlah_penduduk_jorong' => 473],

            // Nagari Tanjung (nagari_id=21) - 7 jorong
            ['id' => 239, 'nagari_id' => 21, 'nama_jorong' => 'Kampung Juar', 'jumlah_penduduk_jorong' => 1389],
            ['id' => 240, 'nagari_id' => 21, 'nama_jorong' => 'Lumbaru', 'jumlah_penduduk_jorong' => 435],
            ['id' => 241, 'nagari_id' => 21, 'nama_jorong' => 'Koto Tanjung', 'jumlah_penduduk_jorong' => 1174],
            ['id' => 242, 'nagari_id' => 21, 'nama_jorong' => 'Ujung Padang', 'jumlah_penduduk_jorong' => 665],
            ['id' => 243, 'nagari_id' => 21, 'nama_jorong' => 'Tanjung Beringin', 'jumlah_penduduk_jorong' => 693],
            ['id' => 244, 'nagari_id' => 21, 'nama_jorong' => 'Taruko', 'jumlah_penduduk_jorong' => 473],
            ['id' => 245, 'nagari_id' => 21, 'nama_jorong' => 'Koto Tuo Tanjung', 'jumlah_penduduk_jorong' => 1477],

            // Nagari Bukit Bual (nagari_id=22) - 4 jorong
            ['id' => 246, 'nagari_id' => 22, 'nama_jorong' => 'Koto Mudik', 'jumlah_penduduk_jorong' => 547],
            ['id' => 247, 'nagari_id' => 22, 'nama_jorong' => 'Jalan Baru', 'jumlah_penduduk_jorong' => 332],
            ['id' => 248, 'nagari_id' => 22, 'nama_jorong' => 'Koto Tangah', 'jumlah_penduduk_jorong' => 517],
            ['id' => 249, 'nagari_id' => 22, 'nama_jorong' => 'Koto Hilir', 'jumlah_penduduk_jorong' => 669],

            // ========================================
            // KECAMATAN SUMPUR KUDUS (kec_id=4) - 55 jorong
            // ========================================

            // Nagari Kumanis (nagari_id=49) - 4 jorong
            // Kumanis (nagari_id=49)
            ['id' => 250, 'nagari_id' => 49, 'nama_jorong' => 'Tanjung Alam', 'jumlah_penduduk_jorong' => 801],
            ['id' => 251, 'nagari_id' => 49, 'nama_jorong' => 'Tanjung Raya', 'jumlah_penduduk_jorong' => 338],
            ['id' => 252, 'nagari_id' => 49, 'nama_jorong' => 'Tanjung Gadang', 'jumlah_penduduk_jorong' => 354],
            ['id' => 253, 'nagari_id' => 49, 'nama_jorong' => 'Tanjung Gadang Utara', 'jumlah_penduduk_jorong' => 362],

            // Nagari Tanjung Bonai Aur (nagari_id=46) - 6 jorong
            ['id' => 254, 'nagari_id' => 46, 'nama_jorong' => 'Bonai', 'jumlah_penduduk_jorong' => 470],
            ['id' => 255, 'nagari_id' => 46, 'nama_jorong' => 'Koto Tinggi', 'jumlah_penduduk_jorong' => 465],
            ['id' => 256, 'nagari_id' => 46, 'nama_jorong' => 'Pauh', 'jumlah_penduduk_jorong' => 383],
            ['id' => 257, 'nagari_id' => 46, 'nama_jorong' => 'Loban Bungkuok', 'jumlah_penduduk_jorong' => 431],
            ['id' => 258, 'nagari_id' => 46, 'nama_jorong' => 'Koto Baru', 'jumlah_penduduk_jorong' => 674],
            ['id' => 259, 'nagari_id' => 46, 'nama_jorong' => 'Koto Tangah', 'jumlah_penduduk_jorong' => 501],

            // Nagari Tamparungo (nagari_id=48) - 6 jorong
            ['id' => 260, 'nagari_id' => 48, 'nama_jorong' => 'Sitongek', 'jumlah_penduduk_jorong' => 399],
            ['id' => 261, 'nagari_id' => 48, 'nama_jorong' => 'Koto Lamo', 'jumlah_penduduk_jorong' => 348],
            ['id' => 262, 'nagari_id' => 48, 'nama_jorong' => 'Pangkahan Sei Laban', 'jumlah_penduduk_jorong' => 132],
            ['id' => 263, 'nagari_id' => 48, 'nama_jorong' => 'Simaru', 'jumlah_penduduk_jorong' => 520],
            ['id' => 264, 'nagari_id' => 48, 'nama_jorong' => 'Sitongek Selatan', 'jumlah_penduduk_jorong' => 277],
            ['id' => 265, 'nagari_id' => 48, 'nama_jorong' => 'Koto Lamo Utara', 'jumlah_penduduk_jorong' => 355],

            // Nagari Sisawah (nagari_id=44) - 7 jorong
            ['id' => 266, 'nagari_id' => 44, 'nama_jorong' => 'Simawik', 'jumlah_penduduk_jorong' => 552],
            ['id' => 267, 'nagari_id' => 44, 'nama_jorong' => 'Rumbai', 'jumlah_penduduk_jorong' => 466],
            ['id' => 268, 'nagari_id' => 44, 'nama_jorong' => 'Sungai Tampang', 'jumlah_penduduk_jorong' => 662],
            ['id' => 269, 'nagari_id' => 44, 'nama_jorong' => 'Sibolin', 'jumlah_penduduk_jorong' => 242],
            ['id' => 270, 'nagari_id' => 44, 'nama_jorong' => 'Koto Sisawah', 'jumlah_penduduk_jorong' => 485],
            ['id' => 271, 'nagari_id' => 44, 'nama_jorong' => 'Koto Baru', 'jumlah_penduduk_jorong' => 536],
            ['id' => 272, 'nagari_id' => 44, 'nama_jorong' => 'Kabun', 'jumlah_penduduk_jorong' => 589],

            // Nagari Sumpur Kudus (nagari_id=47) - 8 jorong
            ['id' => 273, 'nagari_id' => 47, 'nama_jorong' => 'Pintu Rayo', 'jumlah_penduduk_jorong' => 388],
            ['id' => 274, 'nagari_id' => 47, 'nama_jorong' => 'Taratak Ujung Luhak', 'jumlah_penduduk_jorong' => 420],
            ['id' => 275, 'nagari_id' => 47, 'nama_jorong' => 'Taratak Tangah', 'jumlah_penduduk_jorong' => 328],
            ['id' => 276, 'nagari_id' => 47, 'nama_jorong' => 'Taratak Sipuah', 'jumlah_penduduk_jorong' => 257],
            ['id' => 277, 'nagari_id' => 47, 'nama_jorong' => 'Tombang', 'jumlah_penduduk_jorong' => 470],
            ['id' => 278, 'nagari_id' => 47, 'nama_jorong' => 'Kampuang Rajo', 'jumlah_penduduk_jorong' => 320],
            ['id' => 279, 'nagari_id' => 47, 'nama_jorong' => 'Koto', 'jumlah_penduduk_jorong' => 393],
            ['id' => 280, 'nagari_id' => 47, 'nama_jorong' => 'Batang Somi', 'jumlah_penduduk_jorong' => 440],

            // Nagari Unggan (nagari_id=45) - 4 jorong
            ['id' => 282, 'nagari_id' => 45, 'nama_jorong' => 'Unggan Koto', 'jumlah_penduduk_jorong' => 948],
            ['id' => 283, 'nagari_id' => 45, 'nama_jorong' => 'Unggan Bukit', 'jumlah_penduduk_jorong' => 783],
            ['id' => 284, 'nagari_id' => 45, 'nama_jorong' => 'Unggan Aro', 'jumlah_penduduk_jorong' => 604],
            ['id' => 285, 'nagari_id' => 45, 'nama_jorong' => 'Lubuak Batapuak', 'jumlah_penduduk_jorong' => 681],

            // Nagari Silantai (nagari_id=43) - 5 jorong
            ['id' => 286, 'nagari_id' => 43, 'nama_jorong' => 'Kinkin', 'jumlah_penduduk_jorong' => 350],
            ['id' => 287, 'nagari_id' => 43, 'nama_jorong' => 'Koto Tangah', 'jumlah_penduduk_jorong' => 413],
            ['id' => 288, 'nagari_id' => 43, 'nama_jorong' => 'Koto Ateh', 'jumlah_penduduk_jorong' => 398],
            ['id' => 289, 'nagari_id' => 43, 'nama_jorong' => 'Ujung Koto', 'jumlah_penduduk_jorong' => 504],
            ['id' => 290, 'nagari_id' => 43, 'nama_jorong' => 'Batang Kinkin', 'jumlah_penduduk_jorong' => 426],

            // Nagari Manganti (nagari_id=50) - 3 jorong
            ['id' => 291, 'nagari_id' => 50, 'nama_jorong' => 'Tepi Balai', 'jumlah_penduduk_jorong' => 466],
            ['id' => 292, 'nagari_id' => 50, 'nama_jorong' => 'Balai Lamo', 'jumlah_penduduk_jorong' => 578],
            ['id' => 293, 'nagari_id' => 50, 'nama_jorong' => 'Taruko', 'jumlah_penduduk_jorong' => 488],

            // Nagari Tanjuang Labuah (nagari_id=52) - 3 jorong
            ['id' => 294, 'nagari_id' => 52, 'nama_jorong' => 'Simpang Tigo Sabiluru', 'jumlah_penduduk_jorong' => 560],
            ['id' => 295, 'nagari_id' => 52, 'nama_jorong' => 'Sipuah', 'jumlah_penduduk_jorong' => 419],
            ['id' => 296, 'nagari_id' => 52, 'nama_jorong' => 'Simpang Sawah Silupak', 'jumlah_penduduk_jorong' => 261],

            // Nagari Tanjung Bonai Aur Selatan (nagari_id=53) - 5 jorong
            ['id' => 297, 'nagari_id' => 53, 'nama_jorong' => 'Pincuran Tujuh', 'jumlah_penduduk_jorong' => 666],
            ['id' => 298, 'nagari_id' => 53, 'nama_jorong' => 'Air Seriau', 'jumlah_penduduk_jorong' => 519],
            ['id' => 299, 'nagari_id' => 53, 'nama_jorong' => 'Payo Lawe', 'jumlah_penduduk_jorong' => 415],
            ['id' => 300, 'nagari_id' => 53, 'nama_jorong' => 'Kuok', 'jumlah_penduduk_jorong' => 396],
            ['id' => 301, 'nagari_id' => 53, 'nama_jorong' => 'Koto Puntian', 'jumlah_penduduk_jorong' => 300],

            // Nagari Sumpur Kudus Selatan (nagari_id=51) - 3 jorong
            ['id' => 302, 'nagari_id' => 51, 'nama_jorong' => 'Uncang Labuah', 'jumlah_penduduk_jorong' => 426],
            ['id' => 303, 'nagari_id' => 51, 'nama_jorong' => 'Calau', 'jumlah_penduduk_jorong' => 766],
            ['id' => 304, 'nagari_id' => 51, 'nama_jorong' => 'Kampung Baru', 'jumlah_penduduk_jorong' => 519],
        ];

        foreach ($jorongs as $jorong) {
            Jorong::create($jorong);
        }
    }
}
