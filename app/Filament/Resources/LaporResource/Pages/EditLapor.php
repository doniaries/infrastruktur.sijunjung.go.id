<?php

namespace App\Filament\Resources\LaporResource\Pages;

use App\Enums\StatusLaporan;
use App\Filament\Resources\LaporResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLapor extends EditRecord
{
    protected static string $resource = LaporResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }


    protected function afterInitialize()
    {
        parent::afterInitialize();

        $this->updating(function ($record) {
            if ($record->isDirty('keterangan_petugas')) {
                $record->status_laporan = StatusLaporan::SEDANG_DIPROSES->value;
                $record->save(); // Menyimpan perubahan ke dalam database
                $record->notify('Perubahan status telah disimpan', 'success'); // Memberikan notifikasi kepada pengguna
            }
        });
    }
}
