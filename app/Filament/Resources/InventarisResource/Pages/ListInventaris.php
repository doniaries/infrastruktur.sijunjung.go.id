<?php

namespace App\Filament\Resources\InventarisResource\Pages;

use App\Filament\Resources\InventarisResource;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListInventaris extends ListRecords
{
    protected static string $resource = InventarisResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'all' => Tab::make('Semua')
                ->badge(\App\Models\Inventaris::count()),
            'baik' => Tab::make('Baik')
                ->badge(\App\Models\Inventaris::where('status', 'baik')->count())
                ->modifyQueryUsing(function (Builder $query) {
                    return $query->where('status', 'baik');
                }),
            'rusak' => Tab::make('Rusak')
                ->badge(\App\Models\Inventaris::where('status', 'rusak')->count())
                ->modifyQueryUsing(function (Builder $query) {
                    return $query->where('status', 'rusak');
                }),
            'hilang' => Tab::make('Hilang')
                ->badge(\App\Models\Inventaris::where('status', 'hilang')->count())
                ->modifyQueryUsing(function (Builder $query) {
                    return $query->where('status', 'hilang');
                }),
        ];
    }
}
