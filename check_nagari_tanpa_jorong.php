<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\Nagari;

$nagariTanpaJorong = [35, 43, 51];

foreach ($nagariTanpaJorong as $id) {
    $nagari = Nagari::find($id);
    if ($nagari) {
        echo "Nagari ID $id: {$nagari->nama}\n";
    } else {
        echo "Nagari ID $id: tidak ditemukan\n";
    }
}

// Cek total nagari
echo "\nTotal nagari di database: " . Nagari::count() . "\n";

// Cek range ID nagari
echo "Range ID nagari: " . Nagari::min('id') . " - " . Nagari::max('id') . "\n";