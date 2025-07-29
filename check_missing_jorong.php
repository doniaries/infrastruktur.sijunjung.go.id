<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\Jorong;
use App\Models\Nagari;

$totalJorong = Jorong::count();
echo "Total jorong di database: $totalJorong\n";

// Cek nagari yang ada
$totalNagari = Nagari::count();
echo "Total nagari di database: $totalNagari\n";

// Cek jorong per nagari
echo "\nJorong per nagari:\n";
$jorongPerNagari = Jorong::selectRaw('nagari_id, COUNT(*) as jumlah')
    ->groupBy('nagari_id')
    ->orderBy('nagari_id')
    ->get();

foreach ($jorongPerNagari as $data) {
    $nagari = Nagari::find($data->nagari_id);
    $namaNagari = $nagari ? $nagari->nama : 'Nagari tidak ditemukan';
    echo "Nagari ID {$data->nagari_id} ({$namaNagari}): {$data->jumlah} jorong\n";
}

// Cek nagari yang tidak memiliki jorong
$nagariTanpaJorong = Nagari::whereDoesntHave('jorongs')->get();
if ($nagariTanpaJorong->count() > 0) {
    echo "\nNagari tanpa jorong:\n";
    foreach ($nagariTanpaJorong as $nagari) {
        echo "ID {$nagari->id}: {$nagari->nama}\n";
    }
} else {
    echo "\nSemua nagari memiliki jorong.\n";
}

// Cek jorong dengan nagari_id yang tidak valid
$jorongInvalid = Jorong::whereNotIn('nagari_id', Nagari::pluck('id'))->get();
if ($jorongInvalid->count() > 0) {
    echo "\nJorong dengan nagari_id tidak valid:\n";
    foreach ($jorongInvalid as $jorong) {
        echo "ID {$jorong->id}: {$jorong->nama_jorong} (nagari_id: {$jorong->nagari_id})\n";
    }
} else {
    echo "\nSemua jorong memiliki nagari_id yang valid.\n";
}

// Hitung total jorong yang seharusnya ada berdasarkan data yang valid
$validJorong = Jorong::whereIn('nagari_id', Nagari::pluck('id'))->count();
echo "\nTotal jorong dengan nagari_id valid: $validJorong\n";