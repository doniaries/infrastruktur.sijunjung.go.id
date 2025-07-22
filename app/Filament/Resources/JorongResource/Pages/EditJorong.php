<?php

namespace App\Filament\Resources\JorongResource\Pages;

use App\Filament\Resources\JorongResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditJorong extends EditRecord
{
    protected static string $resource = JorongResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
