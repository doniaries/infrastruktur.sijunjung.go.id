<?php

namespace App\Filament\Resources\NagariResource\Pages;

use App\Filament\Resources\NagariResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListNagaris extends ListRecords
{
    protected static string $resource = NagariResource::class;

    protected function getHeaderActions(): array
    {
        return [
            \EightyNine\ExcelImport\ExcelImportAction::make()
                ->slideOver()
                ->color("success"),
            Actions\CreateAction::make(),
        ];
    }
}