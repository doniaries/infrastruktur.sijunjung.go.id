<?php

namespace App\Filament\Widgets;

use App\Models\Bts;
use App\Models\Inventaris;
use App\Models\Jorong;
use App\Models\Kecamatan;
use App\Models\Nagari;
use App\Models\Opd;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{

    protected static bool $isLazy = false;

    protected function getStats(): array
    {
        return [
            Stat::make('Kecamatan', Kecamatan::query()->count())
                ->description('Kecamatan')
                ->url(route('filament.admin.resources.kecamatans.index'))
                ->color('success')
                ->descriptionIcon('heroicon-o-rectangle-stack'),
            Stat::make('Nagari', Nagari::query()->count())
                ->description('Nagari')
                ->color('warning')
                ->url(route('filament.admin.resources.nagaris.index'))
                ->descriptionIcon('heroicon-o-rectangle-stack'),
            Stat::make('Jorong', Jorong::query()->count())
                ->description('Jorong')
                ->color('danger')
                ->url(route('filament.admin.resources.jorongs.index'))
                ->descriptionIcon('heroicon-m-arrow-trending-down'),
            Stat::make('BTS', Bts::query()->count())
                ->description('BTS')
                ->color('primary')
                ->url(route('filament.admin.resources.bts.index'))
                ->descriptionIcon('heroicon-m-chart-bar'),
            Stat::make('Opd', Opd::query()->count())
                ->description('Opd')
                ->color('secondary')
                ->url(route('filament.admin.resources.opds.index'))
                ->descriptionIcon('heroicon-m-building-office-2'),
            Stat::make('Inventaris', Inventaris::query()->count())
                ->description('Inventaris')
                ->color('primary')
                ->url(route('filament.admin.resources.inventaris.index'))
                ->descriptionIcon('heroicon-m-archive-box-arrow-down'),

        ];
    }
}
