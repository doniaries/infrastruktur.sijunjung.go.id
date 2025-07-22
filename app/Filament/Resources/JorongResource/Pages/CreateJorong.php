<?php

namespace App\Filament\Resources\JorongResource\Pages;

use App\Filament\Resources\JorongResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateJorong extends CreateRecord
{
    protected static string $resource = JorongResource::class;



    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}