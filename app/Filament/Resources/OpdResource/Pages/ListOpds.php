<?php

namespace App\Filament\Resources\OpdResource\Pages;

use App\Filament\Resources\OpdResource;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListOpds extends ListRecords
{
    protected static string $resource = OpdResource::class;

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
                ->badge(\App\Models\Opd::count()),
        ];

        // Tab berdasarkan huruf awal
        $hurufAwal = ['A-D', 'E-K', 'L-P', 'Q-Z'];
        
        foreach ($hurufAwal as $range) {
            if ($range === 'A-D') {
                $count = \App\Models\Opd::where(function($query) {
                    $query->where('nama', 'LIKE', 'A%')
                          ->orWhere('nama', 'LIKE', 'B%')
                          ->orWhere('nama', 'LIKE', 'C%')
                          ->orWhere('nama', 'LIKE', 'D%');
                })->count();
                
                $tabs['a_d'] = Tab::make($range)
                    ->badge($count)
                    ->modifyQueryUsing(function (Builder $query) {
                        return $query->where(function($query) {
                            $query->where('nama', 'LIKE', 'A%')
                                  ->orWhere('nama', 'LIKE', 'B%')
                                  ->orWhere('nama', 'LIKE', 'C%')
                                  ->orWhere('nama', 'LIKE', 'D%');
                        });
                    });
            } elseif ($range === 'E-K') {
                $count = \App\Models\Opd::where(function($query) {
                    $query->where('nama', 'LIKE', 'E%')
                          ->orWhere('nama', 'LIKE', 'F%')
                          ->orWhere('nama', 'LIKE', 'G%')
                          ->orWhere('nama', 'LIKE', 'H%')
                          ->orWhere('nama', 'LIKE', 'I%')
                          ->orWhere('nama', 'LIKE', 'J%')
                          ->orWhere('nama', 'LIKE', 'K%');
                })->count();
                
                $tabs['e_k'] = Tab::make($range)
                    ->badge($count)
                    ->modifyQueryUsing(function (Builder $query) {
                        return $query->where(function($query) {
                            $query->where('nama', 'LIKE', 'E%')
                                  ->orWhere('nama', 'LIKE', 'F%')
                                  ->orWhere('nama', 'LIKE', 'G%')
                                  ->orWhere('nama', 'LIKE', 'H%')
                                  ->orWhere('nama', 'LIKE', 'I%')
                                  ->orWhere('nama', 'LIKE', 'J%')
                                  ->orWhere('nama', 'LIKE', 'K%');
                        });
                    });
            } elseif ($range === 'L-P') {
                $count = \App\Models\Opd::where(function($query) {
                    $query->where('nama', 'LIKE', 'L%')
                          ->orWhere('nama', 'LIKE', 'M%')
                          ->orWhere('nama', 'LIKE', 'N%')
                          ->orWhere('nama', 'LIKE', 'O%')
                          ->orWhere('nama', 'LIKE', 'P%');
                })->count();
                
                $tabs['l_p'] = Tab::make($range)
                    ->badge($count)
                    ->modifyQueryUsing(function (Builder $query) {
                        return $query->where(function($query) {
                            $query->where('nama', 'LIKE', 'L%')
                                  ->orWhere('nama', 'LIKE', 'M%')
                                  ->orWhere('nama', 'LIKE', 'N%')
                                  ->orWhere('nama', 'LIKE', 'O%')
                                  ->orWhere('nama', 'LIKE', 'P%');
                        });
                    });
            } else { // Q-Z
                $count = \App\Models\Opd::where(function($query) {
                    $query->where('nama', 'LIKE', 'Q%')
                          ->orWhere('nama', 'LIKE', 'R%')
                          ->orWhere('nama', 'LIKE', 'S%')
                          ->orWhere('nama', 'LIKE', 'T%')
                          ->orWhere('nama', 'LIKE', 'U%')
                          ->orWhere('nama', 'LIKE', 'V%')
                          ->orWhere('nama', 'LIKE', 'W%')
                          ->orWhere('nama', 'LIKE', 'X%')
                          ->orWhere('nama', 'LIKE', 'Y%')
                          ->orWhere('nama', 'LIKE', 'Z%');
                })->count();
                
                $tabs['q_z'] = Tab::make($range)
                    ->badge($count)
                    ->modifyQueryUsing(function (Builder $query) {
                        return $query->where(function($query) {
                            $query->where('nama', 'LIKE', 'Q%')
                                  ->orWhere('nama', 'LIKE', 'R%')
                                  ->orWhere('nama', 'LIKE', 'S%')
                                  ->orWhere('nama', 'LIKE', 'T%')
                                  ->orWhere('nama', 'LIKE', 'U%')
                                  ->orWhere('nama', 'LIKE', 'V%')
                                  ->orWhere('nama', 'LIKE', 'W%')
                                  ->orWhere('nama', 'LIKE', 'X%')
                                  ->orWhere('nama', 'LIKE', 'Y%')
                                  ->orWhere('nama', 'LIKE', 'Z%');
                        });
                    });
            }
        }

        return $tabs;
    }
}
