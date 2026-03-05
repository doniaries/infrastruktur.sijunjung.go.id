<?php

use App\Models\Nagari;
use Illuminate\Support\Facades\DB;

require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

DB::connection()->enableQueryLog();

$nagaris = Nagari::with(['kecamatan'])
    ->withCount(['bts', 'jorongs'])
    ->select('*')
    ->selectSub(function ($query) {
        $query->selectRaw('count(distinct jorong_id)')
            ->from('bts')
            ->whereColumn('nagari_id', 'nagaris.id')
            ->whereNotNull('jorong_id');
    }, 'jorong_bts_count')
    ->limit(10)
    ->get();

echo "Nagari Status Sinyal Verification:\n";
foreach ($nagaris as $n) {
    echo "- {$n->nama_nagari}: {$n->status_sinyal} (BTS Count: {$n->bts_count}, Jorong BTS: {$n->jorong_bts_count}, Total Jorong: {$n->jumlah_jorong})\n";
}

$queryLog = DB::getQueryLog();
echo "\nTotal Queries: " . count($queryLog) . "\n";
foreach ($queryLog as $i => $query) {
    echo "Query " . ($i + 1) . ": " . $query['query'] . "\n";
}
