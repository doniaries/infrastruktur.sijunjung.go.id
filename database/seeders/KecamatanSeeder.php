<?php

namespace Database\Seeders;

use App\Models\Kecamatan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KecamatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kecamatan = [
            [
                'id' => 1,
                'nama' => 'SIJUNJUNG',
            ],
            [
                'id' => 2,
                'nama' => 'KOTO VII',
            ],
            [
                'id' => 3,
                'nama' => 'IV NAGARI',
            ],
            [
                'id' => 4,
                'nama' => 'SUMPUR KUDUS',
            ],
            [
                'id' => 5,
                'nama' => 'KUPITAN',
            ],
            [
                'id' => 6,
                'nama' => 'LUBUK TAROK',
            ],
            [
                'id' => 7,
                'nama' => 'TANJUNG GADANG',
            ],
            [
                'id' => 8,
                'nama' => 'KAMANG BARU',
            ],

        ];

        foreach ($kecamatan as $kecamatan) {
            Kecamatan::create($kecamatan);
        }
    }
}
