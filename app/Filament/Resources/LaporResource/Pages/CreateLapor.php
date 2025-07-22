<?php

namespace App\Filament\Resources\LaporResource\Pages;


use Filament\Actions;

use App\Filament\Resources\LaporResource;
use Filament\Resources\Pages\CreateRecord;

class CreateLapor extends CreateRecord
{
    protected static string $resource = LaporResource::class;


    // mengembalikan ke halaman index setelah menambahkan laporan
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Data Telah Ditambahkan';
    }
}