<?php

namespace App\Filament\Widgets;

use filament;
use App\Models\User;
use App\Models\Lapor;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class StatsLaporan extends BaseWidget
{
    protected static bool $isLazy = true;

    protected function getStats(): array
    {
        $user = auth()->user();

        if ($user && $user->hasRole('pengguna')) {
            return [
                Stat::make('Total Laporan Saya', Lapor::query()->where('user_id', $user->id)->count())
                    ->description('Laporan yang diajukan')
                    ->descriptionIcon('heroicon-m-document-text')
                    ->color('primary'),
                Stat::make('Sedang Diproses', Lapor::query()->where('user_id', $user->id)->where('status_laporan', \App\Enums\StatusLaporan::SEDANG_DIPROSES)->count())
                    ->description('Dalam penanganan')
                    ->descriptionIcon('heroicon-m-arrow-path')
                    ->color('warning'),
                Stat::make('Selesai Diproses', Lapor::query()->where('user_id', $user->id)->where('status_laporan', \App\Enums\StatusLaporan::SELESAI_DIPROSES)->count())
                    ->description('Telah diselesaikan')
                    ->descriptionIcon('heroicon-m-check-circle')
                    ->color('success'),
            ];
        }

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
