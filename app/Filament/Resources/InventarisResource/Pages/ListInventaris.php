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
        $counts = \App\Models\Inventaris::getStatusCounts();
        
        return [
            'all' => Tab::make('Semua')
                ->badge($counts['all'] ?? 0),
                
            'baik' => Tab::make('Baik')
                ->badge($counts['baik'] ?? 0)
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status', 'baik')),
                
            'rusak' => Tab::make('Rusak')
                ->badge($counts['rusak'] ?? 0)
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status', 'rusak')),
                
            'hilang' => Tab::make('Hilang')
                ->badge($counts['hilang'] ?? 0)
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status', 'hilang')),
        ];
    }
}
