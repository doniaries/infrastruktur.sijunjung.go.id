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
            \EightyNine\ExcelImport\ExcelImportAction::make()
                ->use(\App\Imports\InventarisImport::class)
                ->sampleExcel([
                    [
                        'OPD' => 'DINAS KOMINFO',
                        'Router' => 'Router Mikrotik RB4011iGS+',
                        'Jumlah Router' => 2,
                        'HUB' => 'HUB gigabit',
                        'Jumlah Hub' => 1,
                        'AP' => 'Acces Point Ruijie AP720L',
                        'Jumlah AP' => 3,
                        'Status' => 'AKTIF',
                    ],
                ], 'sample-inventaris.xlsx')
                ->slideOver()
                ->color("success"),
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        $counts = \App\Models\Inventaris::getStatusCounts();

        return [
            'all' => Tab::make('Semua')
                ->badge($counts['all'] ?? 0),

            'baik' => Tab::make('Baik')
                ->badge($counts['baik'] ?? 0)
                ->modifyQueryUsing(fn(Builder $query) => $query->where('status', 'baik')),

            'rusak' => Tab::make('Rusak')
                ->badge($counts['rusak'] ?? 0)
                ->modifyQueryUsing(fn(Builder $query) => $query->where('status', 'rusak')),

            'tidak digunakan' => Tab::make('Tidak Digunakan')
                ->badge($counts['tidak digunakan'] ?? 0)
                ->modifyQueryUsing(fn(Builder $query) => $query->where('status', 'tidak digunakan')),
        ];
    }
}
