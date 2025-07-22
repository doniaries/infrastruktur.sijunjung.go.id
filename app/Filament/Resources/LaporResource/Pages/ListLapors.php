<?php

namespace App\Filament\Resources\LaporResource\Pages;

use Filament\Actions;
use Illuminate\Support\Facades\DB;
use App\Enums\StatusLaporan;
use App\Filament\Resources\LaporResource;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;
use Filament\Resources\Pages\ListRecords\Tab;

class ListLapors extends ListRecords
{
    protected static string $resource = LaporResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        $counts = $this->getStatusCounts();
        return [
            'semua' => Tab::make('Semua')
                ->icon('heroicon-o-arrow-path-rounded-square')
                ->badgeColor('primary')
                ->badge($counts['semua']),
            'belum diproses' => Tab::make('Belum Diproses ')
                ->icon(StatusLaporan::BELUM_DIPROSES->getIcon())
                ->badgeColor(StatusLaporan::BELUM_DIPROSES->getColor())
                ->badge($counts['belum_diproses'])
                ->modifyQueryUsing(fn(Builder $query) => $query->where('status_laporan', StatusLaporan::BELUM_DIPROSES->value)),
            'sedang diproses' => Tab::make('Sedang Diproses ')
                ->icon(StatusLaporan::SEDANG_DIPROSES->getIcon())
                ->badgeColor(StatusLaporan::SEDANG_DIPROSES->getColor())
                ->badge($counts['sedang_diproses'])
                ->modifyQueryUsing(fn(Builder $query) => $query->where('status_laporan', StatusLaporan::SEDANG_DIPROSES->value)),
            'selesai diproses' => Tab::make('Selesai Diproses ')
                ->icon(StatusLaporan::SELESAI_DIPROSES->getIcon())
                ->badgeColor(StatusLaporan::SELESAI_DIPROSES->getColor())
                ->badge($counts['selesai_diproses'])
                ->modifyQueryUsing(fn(Builder $query) => $query->where('status_laporan', StatusLaporan::SELESAI_DIPROSES->value)),
        ];
    }

    protected function getStatusCounts(): array
    {
        return [
            'semua' => DB::table('lapors')->count(),
            'belum_diproses' => DB::table('lapors')->where('status_laporan', StatusLaporan::BELUM_DIPROSES->value)->count(),
            'sedang_diproses' => DB::table('lapors')->where('status_laporan', StatusLaporan::SEDANG_DIPROSES->value)->count(),
            'selesai_diproses' => DB::table('lapors')->where('status_laporan', StatusLaporan::SELESAI_DIPROSES->value)->count(),
        ];
    }
}
