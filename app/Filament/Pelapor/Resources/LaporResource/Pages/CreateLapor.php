<?php

namespace App\Filament\Pelapor\Resources\LaporResource\Pages;

use App\Filament\Pelapor\Resources\LaporResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateLapor extends CreateRecord
{
    protected static string $resource = LaporResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Set user_id and default values
        $data['user_id'] = auth()->id();
        $data['status_laporan'] = \App\Enums\StatusLaporan::BELUM_DIPROSES->value;
        $data['keterangan_petugas'] = 'Belum ada';

        // Generate no_tiket
        do {
            $noTiket = strtoupper(\Carbon\Carbon::now()->format('ymd') . \Illuminate\Support\Str::random(3));
        } while (\App\Models\Lapor::where('no_tiket', $noTiket)->exists());

        $data['no_tiket'] = $noTiket;

        return $data;
    }
}
