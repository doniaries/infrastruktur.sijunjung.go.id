<?php

namespace App\Livewire;

use App\Models\Nagari;
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

class ListNagari extends Component implements HasTable, HasForms
{
    use InteractsWithTable, InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(Nagari::query())
            ->contentGrid([
                'md' => 1,
                'xl' => 1,
            ])
            ->columns([
                Tables\Columns\TextColumn::make('nama_nagari')
                    ->label('Nama Nagari')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('kecamatan.nama')
                    ->label('Nama Kecamatan')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nama_wali_nagari')
                    ->label('Nama Wali Nagari'),
                Tables\Columns\TextColumn::make('alamat_kantor')
                    ->label('Alamat Kantor'),
                Tables\Columns\TextColumn::make('luas_nagari')
                    ->sortable()
                    ->label('Luas Nagari'),
                Tables\Columns\TextColumn::make('jumlah_penduduk')
                    ->sortable()
                    ->label('Jumlah Penduduk'),
                Tables\Columns\TextColumn::make('jumlah_jorong')
                    ->sortable()
                    ->label('Jumlah Jorong'),
            ])
            // ->actions([
            //     Tables\Actions\EditAction::make()
            //         ->label('Edit')
            //         ->icon('heroicon-o-pencil')
            //         ->form([
            //             Tables\Columns\TextColumn::make('id')
            //                 ->hidden(),
            //             \Filament\Forms\Components\TextInput::make('nama_nagari')
            //                 ->label('Nama Nagari')
            //                 ->required(),
            //             \Filament\Forms\Components\TextInput::make('nama_wali_nagari')
            //                 ->label('Nama Wali Nagari')
            //                 ->required(),
            //             \Filament\Forms\Components\TextInput::make('alamat_kantor')
            //                 ->label('Alamat Kantor')
            //                 ->required(),
            //             \Filament\Forms\Components\TextInput::make('luas_nagari')
            //                 ->label('Luas Nagari')
            //                 ->numeric()
            //                 ->required(),
            //             \Filament\Forms\Components\TextInput::make('jumlah_penduduk')
            //                 ->label('Jumlah Penduduk')
            //                 ->numeric()
            //                 ->required(),
            //             \Filament\Forms\Components\TextInput::make('jumlah_jorong')
            //                 ->label('Jumlah Jorong')
            //                 ->numeric()
            //                 ->required(),
            //         ])
            //         ->action(function (Nagari $record, array $data): void {
            //             $record->update($data);
            //             $this->dispatch('notify', [
            //                 'type' => 'success',
            //                 'message' => 'Data Nagari berhasil diperbarui!',
            //             ]);
            //         }),
            //     // Tables\Actions\Action::make('edit_page')
            //     //     ->label('Edit Lanjutan')
            //     //     ->icon('heroicon-o-pencil-square')
            //     //     ->url(fn(Nagari $record): string => route('public.nagariform.edit', ['id' => $record->id]))
            //     //     ->openUrlInNewTab(false),
            // ])
            ->defaultSort('kecamatan.nama', 'asc')
            ->emptyStateHeading('Belum Ada Data Nagari')
            ->emptyStateIcon('heroicon-m-map');
    }

    public function render()
    {
        $totalNagari = Nagari::count();
        return view('livewire.list-nagari', [
            'totalData' => $totalNagari
        ]);
    }
}
