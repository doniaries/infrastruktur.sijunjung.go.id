<?php

namespace App\Filament\Widgets;

use filament;
use App\Models\User;
use App\Models\Lapor;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class StatsLaporan extends BaseWidget
{
    protected static bool $isLazy = false;

    protected function getStats(): array
    {

        return [
            Stat::make('Users', User::query()->count())
                ->description('Users')
                ->descriptionIcon('heroicon-m-users')
                ->color('success'),
            Stat::make('Jumlah Laporan', Lapor::query()->count())
                ->description('Jumlah Laporan')
                ->descriptionIcon('heroicon-m-arrow-trending-down')
                ->extraAttributes([
                    'class' => 'cursor-pointer',

                ])
                ->color('danger'),
            Stat::make('Average time on page', '3:12')
                ->description('3% increase')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),

        ];
    }
}
