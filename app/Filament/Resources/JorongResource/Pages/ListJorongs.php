<?php

namespace App\Filament\Resources\JorongResource\Pages;

use App\Filament\Resources\JorongResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListJorongs extends ListRecords
{
    protected static string $resource = JorongResource::class;

    protected function getHeaderActions(): array
    {
        return [
            \EightyNine\ExcelImport\ExcelImportAction::make()
                ->color("success"),
            Actions\CreateAction::make(),
        ];
    }
}
