<?php

namespace App\Filament\Pelapor\Resources\LaporResource\Pages;

use App\Filament\Pelapor\Resources\LaporResource;
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
}
