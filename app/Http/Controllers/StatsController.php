<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bts;
use App\Models\Nagari;
use App\Models\Jorong;
use Illuminate\Support\Facades\Cache;

class StatsController extends Controller
{
    public function index()
    {
        // Menggunakan cache untuk meningkatkan performa
        $stats = Cache::remember('infrastructure_stats', 3600, function () {
            return [
                'bts_count' => Bts::count(),
                'nagari_count' => Nagari::count(),
                'jorong_count' => Jorong::count(),
            ];
        });

        return response()->json($stats);
    }
}