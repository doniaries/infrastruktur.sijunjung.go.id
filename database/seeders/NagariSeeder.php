<?php

namespace Database\Seeders;

use App\Models\Nagari;
use Illuminate\Database\Seeder;

class NagariSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $nagaris = [
            ['id' => 1, 'kecamatan_id' => 3, 'nama_nagari' => 'Palangki'],
            ['id' => 2, 'kecamatan_id' => 3, 'nama_nagari' => 'Koto Baru'],
            ['id' => 3, 'kecamatan_id' => 3, 'nama_nagari' => 'Muaro Bodi'],
            ['id' => 4, 'kecamatan_id' => 3, 'nama_nagari' => 'Mundam Sakti'],
            ['id' => 5, 'kecamatan_id' => 3, 'nama_nagari' => 'Koto Tuo'],
            ['id' => 6, 'kecamatan_id' => 8, 'nama_nagari' => 'Sungai Lansek'],
            ['id' => 7, 'kecamatan_id' => 8, 'nama_nagari' => 'Kamang'],
            ['id' => 8, 'kecamatan_id' => 8, 'nama_nagari' => 'Muaro Takuang'],
            ['id' => 9, 'kecamatan_id' => 8, 'nama_nagari' => 'Aia Amo'],
            ['id' => 10, 'kecamatan_id' => 8, 'nama_nagari' => 'Sungai Batuang'],
            ['id' => 11, 'kecamatan_id' => 8, 'nama_nagari' => 'Kunangan Parit Rantang'],
            ['id' => 12, 'kecamatan_id' => 8, 'nama_nagari' => 'Tanjuang Kaliang'],
            ['id' => 13, 'kecamatan_id' => 8, 'nama_nagari' => 'Padang Tarok'],
            ['id' => 14, 'kecamatan_id' => 8, 'nama_nagari' => 'Siaur'],
            ['id' => 15, 'kecamatan_id' => 8, 'nama_nagari' => 'Lubuk Tarantang'],
            ['id' => 16, 'kecamatan_id' => 8, 'nama_nagari' => 'Maloro'],
            ['id' => 17, 'kecamatan_id' => 2, 'nama_nagari' => 'Limo Koto'],
            ['id' => 18, 'kecamatan_id' => 2, 'nama_nagari' => 'Palaluar'],
            ['id' => 19, 'kecamatan_id' => 2, 'nama_nagari' => 'Guguk'],
            ['id' => 20, 'kecamatan_id' => 2, 'nama_nagari' => 'Padang Laweh'],
            ['id' => 21, 'kecamatan_id' => 2, 'nama_nagari' => 'Tanjung'],
            ['id' => 22, 'kecamatan_id' => 2, 'nama_nagari' => 'Bukit Bual'],
            ['id' => 23, 'kecamatan_id' => 2, 'nama_nagari' => 'Padang Laweh Selatan'],
            ['id' => 24, 'kecamatan_id' => 2, 'nama_nagari' => 'Batu Manjulur'],
            ['id' => 25, 'kecamatan_id' => 2, 'nama_nagari' => 'Pamuatan'],
            ['id' => 26, 'kecamatan_id' => 2, 'nama_nagari' => 'Padang Sibusuk'],
            ['id' => 27, 'kecamatan_id' => 2, 'nama_nagari' => 'Desa Kampung Baru'],
            ['id' => 28, 'kecamatan_id' => 6, 'nama_nagari' => 'Lubuk Tarok'],
            ['id' => 29, 'kecamatan_id' => 6, 'nama_nagari' => 'Lalan'],
            ['id' => 30, 'kecamatan_id' => 6, 'nama_nagari' => 'Buluh Kasok'],
            ['id' => 31, 'kecamatan_id' => 6, 'nama_nagari' => 'Kampung Dalam'],
            ['id' => 32, 'kecamatan_id' => 6, 'nama_nagari' => 'Latang'],
            ['id' => 33, 'kecamatan_id' => 6, 'nama_nagari' => 'Silongo'],
            ['id' => 34, 'kecamatan_id' => 1, 'nama_nagari' => 'Muaro'],
            ['id' => 35, 'kecamatan_id' => 1, 'nama_nagari' => 'Kandang Baru'],
            ['id' => 36, 'kecamatan_id' => 1, 'nama_nagari' => 'Silokek'],
            ['id' => 37, 'kecamatan_id' => 1, 'nama_nagari' => 'Pematang Panjang'],
            ['id' => 38, 'kecamatan_id' => 1, 'nama_nagari' => 'Solok Ambah'],
            ['id' => 39, 'kecamatan_id' => 1, 'nama_nagari' => 'Paru'],
            ['id' => 40, 'kecamatan_id' => 1, 'nama_nagari' => 'Durian Gadang'],
            ['id' => 41, 'kecamatan_id' => 1, 'nama_nagari' => 'Aie Angek'],
            ['id' => 42, 'kecamatan_id' => 1, 'nama_nagari' => 'Sijunjung'],
            ['id' => 43, 'kecamatan_id' => 4, 'nama_nagari' => 'Silantai'],
            ['id' => 44, 'kecamatan_id' => 4, 'nama_nagari' => 'Sisawah'],
            ['id' => 45, 'kecamatan_id' => 4, 'nama_nagari' => 'Unggan'],
            ['id' => 46, 'kecamatan_id' => 4, 'nama_nagari' => 'Tanjung Bonai Aur'],
            ['id' => 47, 'kecamatan_id' => 4, 'nama_nagari' => 'Sumpur Kudus'],
            ['id' => 48, 'kecamatan_id' => 4, 'nama_nagari' => 'Tamparungo'],
            ['id' => 49, 'kecamatan_id' => 4, 'nama_nagari' => 'Kumanis'],
            ['id' => 50, 'kecamatan_id' => 4, 'nama_nagari' => 'Mangganti'],
            ['id' => 51, 'kecamatan_id' => 4, 'nama_nagari' => 'Sumpur Kudus Selatan'],
            ['id' => 52, 'kecamatan_id' => 4, 'nama_nagari' => 'Tanjung Labuh'],
            ['id' => 53, 'kecamatan_id' => 4, 'nama_nagari' => 'Tanjung Bonai Aur Selatan'],
            ['id' => 54, 'kecamatan_id' => 7, 'nama_nagari' => 'Timbulun'],
            ['id' => 55, 'kecamatan_id' => 7, 'nama_nagari' => 'Tanjung Gadang'],
            ['id' => 56, 'kecamatan_id' => 7, 'nama_nagari' => 'Taratak Baru'],
            ['id' => 57, 'kecamatan_id' => 7, 'nama_nagari' => 'Pulasan'],
            ['id' => 58, 'kecamatan_id' => 7, 'nama_nagari' => 'Langki'],
            ['id' => 59, 'kecamatan_id' => 7, 'nama_nagari' => 'Sibakur'],
            ['id' => 60, 'kecamatan_id' => 7, 'nama_nagari' => 'Tanjung Lolo'],
            ['id' => 61, 'kecamatan_id' => 7, 'nama_nagari' => 'Taratak Baru Utara'],
            ['id' => 62, 'kecamatan_id' => 7, 'nama_nagari' => 'Sinyamu'],
        ];

        foreach ($nagaris as $nagari) {
            Nagari::create($nagari);
        }
    }
}
