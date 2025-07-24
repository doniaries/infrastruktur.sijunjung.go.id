<?php

namespace App\Filament\Resources\NagariResource\Pages;

use App\Filament\Resources\NagariResource;
use App\Models\Kecamatan;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

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

    public function getTabs(): array
    {
        $tabs = [
            'all' => Tab::make('Semua')
                ->badge(\App\Models\Nagari::count()),
        ];

        $kecamatans = Kecamatan::orderBy('nama')->get();

        foreach ($kecamatans as $kecamatan) {
            $count = \App\Models\Nagari::where('kecamatan_id', $kecamatan->id)->count();
            
            $tabs[$kecamatan->nama] = Tab::make($kecamatan->nama)
                ->badge($count)
                ->modifyQueryUsing(function (Builder $query) use ($kecamatan) {
                    return $query->where('kecamatan_id', $kecamatan->id);
                });
        }

        return $tabs;
    }
}