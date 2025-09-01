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

    // public function getTabs(): array
    // {
    //     $tabs = [
    //         'all' => Tab::make('Semua')
    //             ->badge(\App\Models\Jorong::count()),
    //     ];

    //     // Get all jorongs with their nagari and kecamatan relationships
    //     $jorongs = \App\Models\Jorong::with(['nagari.kecamatan'])
    //         ->orderBy('nama_jorong')
    //         ->get()
    //         ->groupBy('nagari.kecamatan.nama');

    //     // Create tabs for each kecamatan with jorongs grouped by nagari
    //     foreach ($jorongs as $kecamatanName => $jorongsGroup) {
    //         $nagariGroups = $jorongsGroup->groupBy('nagari.nama_nagari');

    //         foreach ($nagariGroups as $nagariName => $jorongsInNagari) {
    //             $tabName = "$kecamatanName - $nagariName";
    //             $nagariId = $jorongsInNagari->first()->nagari_id;

    //             $tabs["nagari_$nagariId"] = Tab::make($tabName)
    //                 ->badge($jorongsInNagari->count())
    //                 ->modifyQueryUsing(fn(Builder $query) => $query->where('nagari_id', $nagariId));
    //         }
    //     }

    //     return $tabs;
    // }

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
