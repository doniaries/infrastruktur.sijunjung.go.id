<?php

namespace App\Livewire;

use App\Models\Bts;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Support\Enums\FontFamily;
use Filament\Support\Enums\FontWeight;
use Filament\Tables;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Livewire\Component;

class Bts extends Component implements HasTable, HasForms
{
    use InteractsWithTable, InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table

            ->query(Bts::query())
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
        return view('livewire.bts');
    }
}
