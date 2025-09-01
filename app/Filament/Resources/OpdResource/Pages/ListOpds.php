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
                ->badge(\App\Models\Opd::getCount()),
        ];

        // Get all counts in a single query using the cached method
        $rangeCounts = \App\Models\Opd::getLetterRangeCounts();

        // Tab berdasarkan huruf awal
        foreach ($rangeCounts as $range => $count) {
            $tabKey = strtolower(str_replace('-', '_', $range));
            $tabs[$tabKey] = $this->createTab($range, $count);
        }

        return $tabs;
    }

    /**
     * Create a tab with the given range and count
     */
    protected function createTab(string $range, int $count): Tab
    {
        $ranges = [
            'A-D' => ['A%', 'B%', 'C%', 'D%'],
            'E-K' => ['E%', 'F%', 'G%', 'H%', 'I%', 'J%', 'K%'],
            'L-P' => ['L%', 'M%', 'N%', 'O%', 'P%'],
            'Q-Z' => [
                'Q%', 'R%', 'S%', 'T%', 'U%', 'V%', 'W%', 'X%', 'Y%', 'Z%',
                '0%', '1%', '2%', '3%', '4%', '5%', '6%', '7%', '8%', '9%'
            ]
        ];

        $prefixes = $ranges[$range] ?? [];

        return Tab::make($range)
            ->badge($count)
            ->modifyQueryUsing(function (Builder $query) use ($prefixes) {
                return $query->where(function($query) use ($prefixes) {
                    $first = array_shift($prefixes);
                    $query->where('nama', 'LIKE', $first);
                    
                    foreach ($prefixes as $prefix) {
                        $query->orWhere('nama', 'LIKE', $prefix);
                    }
                });
            });
    }
}
