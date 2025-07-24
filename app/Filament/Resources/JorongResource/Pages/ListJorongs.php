<?php

namespace App\Filament\Resources\JorongResource\Pages;

use App\Filament\Resources\JorongResource;
use App\Models\Kecamatan;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

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

    public function getTabs(): array
    {
        $tabs = [
            'all' => Tab::make('Semua')
                ->badge(\App\Models\Jorong::count()),
        ];

        $kecamatans = Kecamatan::orderBy('nama')->get();

        foreach ($kecamatans as $kecamatan) {
            $count = \App\Models\Jorong::whereHas('nagari', function ($query) use ($kecamatan) {
                $query->where('kecamatan_id', $kecamatan->id);
            })->count();
            
            $tabs[$kecamatan->nama] = Tab::make($kecamatan->nama)
                ->badge($count)
                ->modifyQueryUsing(function (Builder $query) use ($kecamatan) {
                    return $query->whereHas('nagari', function ($query) use ($kecamatan) {
                        $query->where('kecamatan_id', $kecamatan->id);
                    });
                });
        }

        return $tabs;
    }
}
