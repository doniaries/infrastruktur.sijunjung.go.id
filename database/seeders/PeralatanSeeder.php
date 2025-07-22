<?php

namespace Database\Seeders;

use App\Models\Peralatan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PeralatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $peralatan = [
            [
                'id' => 1,
                'jenis_peralatan' => 'Router',
                'nama' => 'Mikrotik RB1100Dx4',
                'tahun_pengadaan' => '2022'
            ],
            [
                'id' => 2,
                'jenis_peralatan' => 'Router',
                'nama' => 'Mikrotik RB2011UiAS-2HnD',
                'tahun_pengadaan' => '2022'
            ],
            [
                'id' => 3,
                'jenis_peralatan' => 'Router',
                'nama' => 'Mikrotik RB951Ui-2HnD',
                'tahun_pengadaan' => '2022'
            ],

            [
                'id' => 4,
                'jenis_peralatan' => 'Router',
                'nama' => 'Mikrotik RB4011iGS+',
                'tahun_pengadaan' => '2022'
            ],
            [
                'id' => 5,
                'jenis_peralatan' => 'Hub',
                'nama' => 'TP Link',
                'tahun_pengadaan' => '2022'
            ],
            [
                'id' => 6,
                'jenis_peralatan' => 'Hub',
                'nama' => 'Netis',
                'tahun_pengadaan' => '2022'
            ],
            [
                'id' => 7,
                'jenis_peralatan' => 'Akses Point',
                'nama' => 'Ruijie AP720L',
                'tahun_pengadaan' => '2022'
            ],
            [
                'id' => 8,
                'jenis_peralatan' => 'Akses Point',
                'nama' => 'Ruijie Outdor RG-EAP602',
                'tahun_pengadaan' => '2022'
            ],
            [
                'id' => 9,
                'jenis_peralatan' => 'Akses Point',
                'nama' => 'Unifie',
                'tahun_pengadaan' => '2022'

            ]
        ];

        foreach ($peralatan as $peralatan) {
            Peralatan::create($peralatan);
        }
    }
}