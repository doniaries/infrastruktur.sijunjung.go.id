<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bts;

class WelcomeMapController extends Controller
{
    public function index()
    {
        // Ambil BTS yang punya koordinat
        $btsList = Bts::whereNotNull('titik_koordinat')->get(['id','pemilik','alamat','titik_koordinat','teknologi','status','tahun_bangun']);

        $btsMarkers = $btsList->map(function($bts) {
            // Titik koordinat format: 'lat,lng' (contoh: '-0.693,100.987')
            $coords = explode(',', $bts->titik_koordinat);
            return [
                'id' => $bts->id,
                'pemilik' => $bts->pemilik,
                'alamat' => $bts->alamat,
                'lat' => isset($coords[0]) ? trim($coords[0]) : null,
                'lng' => isset($coords[1]) ? trim($coords[1]) : null,
                'teknologi' => $bts->teknologi,
                'status' => $bts->status,
                'tahun_bangun' => $bts->tahun_bangun,
            ];
        })->filter(function($item) {
            return $item['lat'] && $item['lng'];
        })->values();

        return response()->json($btsMarkers);
    }
}
