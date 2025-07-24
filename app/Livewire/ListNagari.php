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
            ->query(Nagari::query()->with('kecamatan'))
            ->contentGrid([
                'md' => 1,
                'xl' => 1,
            ])
            ->defaultPaginationPageOption(10)
            ->paginationPageOptions([5, 10, 25, 50, 100])
            ->striped()
            ->deferLoading()
            ->columns([
                Tables\Columns\TextColumn::make('nama_nagari')
                    ->label('Nama Nagari')
                    ->searchable()
                    ->sortable()
                    ->weight(FontWeight::SemiBold)
                    ->color('primary')
                    ->wrap(),
                Tables\Columns\TextColumn::make('kecamatan.nama')
                    ->label('Nama Kecamatan')
                    ->searchable()
                    ->sortable()
                    ->badge()
                    ->color('success'),
                Tables\Columns\TextColumn::make('nama_wali_nagari')
                    ->label('Nama Wali Nagari')
                    ->searchable()
                    ->wrap()
                    ->toggleable(isToggledHiddenByDefault: false),
                Tables\Columns\TextColumn::make('alamat_kantor')
                    ->label('Alamat Kantor')
                    ->searchable()
                    ->wrap()
                    ->limit(50)
                    ->tooltip(function (Tables\Columns\TextColumn $column): ?string {
                        $state = $column->getState();
                        if (strlen($state) <= 50) {
                            return null;
                        }
                        return $state;
                    })
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('luas_nagari')
                    ->sortable()
                    ->label('Luas Nagari')
                    ->numeric()
                    ->suffix(' Ha')
                    ->alignEnd(),
                Tables\Columns\TextColumn::make('jumlah_penduduk')
                    ->sortable()
                    ->label('Jumlah Penduduk')
                    ->numeric()
                    ->suffix(' Jiwa')
                    ->alignEnd(),
                Tables\Columns\TextColumn::make('jumlah_jorong')
                    ->sortable()
                    ->label('Jumlah Jorong')
                    ->numeric()
                    ->alignCenter()
                    ->badge()
                    ->color('info'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('kecamatan_id')
                    ->label('Filter Kecamatan')
                    ->relationship('kecamatan', 'nama')
                    ->searchable()
                    ->preload(),
                Tables\Filters\Filter::make('jumlah_penduduk_range')
                    ->form([
                        \Filament\Forms\Components\Grid::make(2)
                            ->schema([
                                \Filament\Forms\Components\TextInput::make('min_penduduk')
                                    ->label('Min Penduduk')
                                    ->numeric(),
                                \Filament\Forms\Components\TextInput::make('max_penduduk')
                                    ->label('Max Penduduk')
                                    ->numeric(),
                            ])
                    ])
                    ->query(function (\Illuminate\Database\Eloquent\Builder $query, array $data): \Illuminate\Database\Eloquent\Builder {
                        return $query
                            ->when(
                                $data['min_penduduk'],
                                fn (\Illuminate\Database\Eloquent\Builder $query, $min): \Illuminate\Database\Eloquent\Builder => $query->where('jumlah_penduduk', '>=', $min),
                            )
                            ->when(
                                $data['max_penduduk'],
                                fn (\Illuminate\Database\Eloquent\Builder $query, $max): \Illuminate\Database\Eloquent\Builder => $query->where('jumlah_penduduk', '<=', $max),
                            );
                    })
            ])
             ->filtersFormColumns(2)

            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\BulkAction::make('export')
                        ->label('Export Data')
                        ->icon('heroicon-o-arrow-down-tray')
                        ->action(function (\Illuminate\Database\Eloquent\Collection $records) {
                            // Export functionality can be implemented here
                            $this->dispatch('notify', [
                                'type' => 'success',
                                'message' => 'Export berhasil untuk ' . $records->count() . ' data!',
                            ]);
                        }),
                ]),
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
            ->emptyStateIcon('heroicon-m-map')
            ->persistFiltersInSession()
            ->persistSortInSession()
            ->persistSearchInSession();
    }

    public function render()
    {
        $totalNagari = Nagari::count();
        return view('livewire.list-nagari', [
            'totalData' => $totalNagari
        ]);
    }
}
