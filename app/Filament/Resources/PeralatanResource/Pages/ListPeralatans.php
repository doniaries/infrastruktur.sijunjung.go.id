<?php

namespace App\Filament\Resources\PeralatanResource\Pages;

use App\Filament\Resources\PeralatanResource;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListPeralatans extends ListRecords
{
    protected static string $resource = PeralatanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        $tabs = [
            'all' => Tab::make('Semua')
                ->badge(\App\Models\Peralatan::count()),
        ];

        $jenisPeralatan = \App\Models\Peralatan::distinct()->pluck('jenis_peralatan')->filter()->sort();

        foreach ($jenisPeralatan as $jenis) {
            $count = \App\Models\Peralatan::where('jenis_peralatan', $jenis)->count();
            
            $tabs[str_replace(' ', '_', strtolower($jenis))] = Tab::make($jenis)
                ->badge($count)
                ->modifyQueryUsing(function (Builder $query) use ($jenis) {
                    return $query->where('jenis_peralatan', $jenis);
                });
        }

        return $tabs;
    }
}
