<?php

namespace App\Livewire;

use App\Models\Jorong;
use Filament\Tables;
use Livewire\Component;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Forms\Contracts\HasForms;
use Filament\Support\Enums\FontFamily;
use Filament\Support\Enums\FontWeight;
use Filament\Tables\Contracts\HasTable;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Tables\Concerns\InteractsWithTable;

class ListJorong extends Component implements HasTable, HasForms
{
    use InteractsWithTable, InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(Jorong::query())
            ->contentGrid([
                'md' => 1,
                'xl' => 1,
            ])
            ->columns([
                Tables\Columns\TextColumn::make('nama_jorong')
                    ->label('Nama Jorong')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nagari.nama_nagari')
                    ->label('Nama Nagari')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nagari.kecamatan.nama')
                    ->label('Nama Kecamatan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nama_kepala_jorong')
                    ->label('Nama Kepala Jorong'),
                Tables\Columns\TextColumn::make('jumlah_penduduk_jorong')
                    ->label('Jumlah Penduduk')
                    ->sortable(),
                Tables\Columns\TextColumn::make('luas_jorong')
                    ->label('Luas Jorong')
                    ->sortable(),
                // Tables\Columns\TextColumn::make('latitude')
                //     ->label('Latitude'),
                // Tables\Columns\TextColumn::make('longitude')
                //     ->label('Longitude'),
            ])
            // ->actions([
            //     Tables\Actions\EditAction::make()
            //         ->label('Edit')
            //         ->icon('heroicon-o-pencil')
            //         ->form([
            //             Tables\Columns\TextColumn::make('id')
            //                 ->hidden(),
            //             \Filament\Forms\Components\TextInput::make('nama_jorong')
            //                 ->label('Nama Jorong')
            //                 ->required(),
            //             \Filament\Forms\Components\TextInput::make('nama_kepala_jorong')
            //                 ->label('Nama Kepala Jorong')
            //                 ->required(),
            //             \Filament\Forms\Components\TextInput::make('jumlah_penduduk_jorong')
            //                 ->label('Jumlah Penduduk')
            //                 ->numeric()
            //                 ->required(),
            //             // \Filament\Forms\Components\TextInput::make('latitude')
            //             //     ->label('Latitude')
            //             //     ->required(),
            //             // \Filament\Forms\Components\TextInput::make('longitude')
            //             //     ->label('Longitude')
            //             //     ->required(),
            //         ])
            //     // ->action(function (Jorong $record, array $data): void {
            //     //     $record->update($data);
            //     //     $this->dispatch('notify', [
            //     //         'type' => 'success',
            //     //         'message' => 'Data Jorong berhasil diperbarui!',
            //     //     ]);
            //     // }),
            //     // Tables\Actions\Action::make('edit_page')
            //     //     ->label('Edit Lanjutan')
            //     //     ->icon('heroicon-o-pencil-square')
            //     //     ->url(fn(Jorong $record): string => route('public.jorongform.edit', ['id' => $record->id]))
            //     //     ->openUrlInNewTab(false),
            // ])
            ->defaultSort('nama_jorong', 'asc')
            ->emptyStateHeading('Belum Ada Data Jorong')
            ->emptyStateIcon('heroicon-m-map-pin');
    }

    public function render()
    {
        $totalJorong = Jorong::count();
        return view('livewire.list-jorong', [
            'totalData' => $totalJorong
        ]);
    }
}
