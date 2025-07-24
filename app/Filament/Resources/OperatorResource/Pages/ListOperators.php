<?php

namespace App\Filament\Resources\OperatorResource\Pages;

use App\Filament\Resources\OperatorResource;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListOperators extends ListRecords
{
    protected static string $resource = OperatorResource::class;

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
                ->badge(\App\Models\Operator::count()),
        ];

        // Tab berdasarkan operator yang ada
        $operators = \App\Models\Operator::orderBy('nama_operator')->get();
        
        foreach ($operators as $operator) {
            $count = \App\Models\Bts::where('operator_id', $operator->id)->count();
            
            $tabs[str_replace(' ', '_', strtolower($operator->nama_operator))] = Tab::make($operator->nama_operator)
                ->badge($count)
                ->modifyQueryUsing(function (Builder $query) use ($operator) {
                    // Ini akan menampilkan semua operator, tapi dengan badge jumlah BTS
                    return $query;
                });
        }

        return $tabs;
    }
}
