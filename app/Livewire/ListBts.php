<?php

namespace App\Livewire;

use App\Models\Bts;
use Filament\Tables;
use Livewire\Component;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Forms\Components\Select;
use Filament\Forms\Contracts\HasForms;
use Filament\Support\Enums\FontFamily;
use Filament\Support\Enums\FontWeight;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Contracts\HasTable;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Tables\Concerns\InteractsWithTable;

class ListBts extends Component implements HasTable, HasForms
{
    use InteractsWithTable, InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table

            ->query(Bts::query())
            ->contentGrid([
                'md' => 1,
                'xl' => 1,
            ])
            ->columns([
                Tables\Columns\TextColumn::make('operator.nama_operator')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'TELKOMSEL' => 'danger',

                        'INDOSAT' => 'warning',
                        'XL AXIATA' => 'primary',
                    })
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('kecamatan.nama')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('nagari.nama')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('titik_koordinat')
                    ->copyable()
                    ->label('Titik Koordinat')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('alamat')
                    ->label('Alamat')
                    ->wrap()
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('teknologi')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        '2G' => 'danger',
                        '3G' => 'primary',
                        '4G' => 'secondary',
                        '4G+5G' => 'info',
                        '5G' => 'success',
                    }),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'aktif' => 'success',
                        'non-aktif' => 'danger',
                    }),
                Tables\Columns\TextColumn::make('tahun_bangun')
                    ->sortable(),
            ])
            ->emptyStateHeading('Belum Ada data')
            ->emptyStateIcon('heroicon-m-chat-bubble-left-right');
    }


    public function render()
    {
        $totalBts = Bts::count();
        return view('livewire.list-bts', [
            'totalData' => $totalBts
        ]);
    }
}