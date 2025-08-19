<?php

namespace App\Filament\Resources\JorongResource\Pages;

use App\Filament\Resources\JorongResource;
use App\Models\Kecamatan;
use App\Models\Nagari;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class ListJorongs extends ListRecords
{
    protected function getTableRecordUrlUsing(): ?\Closure
    {
        return function (Model $record): ?string {
            $resource = static::getResource();
            
            if ($resource::hasPage('edit') && $resource::canEdit($record)) {
                return $resource::getUrl('edit', ['record' => $record]);
            }
            
            if ($resource::hasPage('view') && $resource::canView($record)) {
                return $resource::getUrl('view', ['record' => $record]);
            }
            
            return null;
        };
    }
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

    public function getTableFilters(): array
    {
        $filters = [];
        
        // Get current active tab
        $activeTab = $this->activeTab ?? 'all';
        
        if ($activeTab === 'all') {
            // Show all nagari when 'all' tab is active
            $filters['nagari_id'] = SelectFilter::make('nagari_id')
                ->relationship('nagari', 'nama_nagari')
                ->label('Filter by Nagari')
                ->searchable()
                ->preload();
        } else {
            // Filter nagari by kecamatan when specific kecamatan tab is active
            $kecamatan = Kecamatan::where('nama', $activeTab)->first();
            if ($kecamatan) {
                $nagaris = Nagari::where('kecamatan_id', $kecamatan->id)->pluck('nama_nagari', 'id');
                
                $filters['nagari_id'] = SelectFilter::make('nagari_id')
                    ->options($nagaris)
                    ->label('Filter by Nagari')
                    ->searchable();
            }
        }
        
        return $filters;
    }
}
