<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OperatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $operators = [

            [
                'id' => 1,
                'nama_operator' => 'TELKOMSEL',
            ],
            [
                'id' => 2,
                'nama_operator' => 'INDOSAT',
            ],
            [
                'id' => 3,
                'nama_operator' => 'XL AXIATA',
            ],


        ];

        foreach ($operators as $operator) {
            \App\Models\Operator::create($operator);
        }
    }
}
