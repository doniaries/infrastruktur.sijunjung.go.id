<?php

namespace Database\Seeders;

use App\Models\Bts;
use Illuminate\Database\Seeder;

class BtsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hapus data lama
        Bts::query()->delete();

        $btsData = [
            // Nagari Palangki (id: 1) - Sinyal Baik (BTS di beberapa jorong)
            [
                'operator_id' => 1, // Telkomsel
                'kecamatan_id' => 3,
                'nagari_id' => 1,
                'jorong_id' => 1,
                'pemilik' => 'Telkomsel',
                'alamat' => 'Jorong Pantai Cermin',
                'teknologi' => '4G',
                'status' => 'aktif',
                'tahun_bangun' => '2020',
            ],
            [
                'operator_id' => 2, // Indosat
                'kecamatan_id' => 3,
                'nagari_id' => 1,
                'jorong_id' => 2,
                'pemilik' => 'Indosat',
                'alamat' => 'Jorong Tambang Ameh',
                'teknologi' => '4G',
                'status' => 'aktif',
                'tahun_bangun' => '2021',
            ],

            // Nagari Koto Baru (id: 2) - Lemah Sinyal (Banyak jorong tapi BTS hanya di 1 jorong)
            [
                'operator_id' => 1,
                'kecamatan_id' => 3,
                'nagari_id' => 2,
                'jorong_id' => 6, // Jorong Pasar
                'pemilik' => 'Telkomsel',
                'alamat' => 'Jorong Pasar',
                'teknologi' => '4G',
                'status' => 'aktif',
                'tahun_bangun' => '2019',
            ],
            [
                'operator_id' => 3, // XL
                'kecamatan_id' => 3,
                'nagari_id' => 2,
                'jorong_id' => 6, // Tetap di Jorong Pasar
                'pemilik' => 'XL Axiata',
                'alamat' => 'Jorong Pasar',
                'teknologi' => '4G',
                'status' => 'aktif',
                'tahun_bangun' => '2022',
            ],

            // Nagari Muaro Bodi (id: 3) - Blankspot (Tidak ada data BTS yang dimasukkan)

            // Tambahkan data lain jika diperlukan...
            [
                'operator_id' => 1,
                'kecamatan_id' => 1, // Sijunjung
                'nagari_id' => 34, // Muaro
                'jorong_id' => 126,
                'pemilik' => 'Telkomsel',
                'alamat' => 'Pusat Kota Muaro',
                'teknologi' => '4G+5G',
                'status' => 'aktif',
                'tahun_bangun' => '2023',
            ],
        ];

        foreach ($btsData as $data) {
            Bts::create($data);
        }
    }
}
