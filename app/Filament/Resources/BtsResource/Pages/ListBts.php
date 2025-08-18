<?php

namespace App\Filament\Resources\BtsResource\Pages;

use App\Filament\Resources\BtsResource;
use App\Models\Operator;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListBts extends ListRecords
{
    protected static string $resource = BtsResource::class;

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
                ->badge(\App\Models\Bts::count()),
        ];

        $operators = Operator::orderBy('nama_operator')->get();

        foreach ($operators as $operator) {
            $count = \App\Models\Bts::where('operator_id', $operator->id)->count();
            
            $tabs[$operator->nama_operator] = Tab::make($operator->nama_operator)
                ->badge($count)
                ->modifyQueryUsing(function (Builder $query) use ($operator) {
                    return $query->where('operator_id', $operator->id);
                });
        }

        return $tabs;
    }

    protected function getTableRecordUrlUsing(): ?\Closure
    {
        return function (\App\Models\Bts $record) {
            return static::getResource()::getUrl('edit', ['record' => $record]);
        };
    }

    // public function getTableBulkActions()
    // {
    //     return  [
    //         ExportBulkAction::make()
    //     ];
    // }
}