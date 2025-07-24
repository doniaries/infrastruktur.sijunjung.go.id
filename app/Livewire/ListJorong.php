<?php

namespace App\Livewire;

use App\Models\Jorong;
use Filament\Tables;
use Livewire\Component;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Forms\Contracts\HasForms;
use Filament\Support\Enums\FontWeight;
use Filament\Tables\Contracts\HasTable;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Tables\Concerns\InteractsWithTable;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;

class ListJorong extends Component implements HasTable, HasForms
{
    use InteractsWithTable, InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(Jorong::query()->with(['nagari.kecamatan']))
            ->contentGrid([
                'md' => 1,
                'xl' => 1,
            ])
            ->defaultPaginationPageOption(10)
            ->paginationPageOptions([5, 10, 25, 50, 100])
            ->striped()
            ->deferLoading()
            ->columns([
                Tables\Columns\TextColumn::make('nama_jorong')
                    ->label('Nama Jorong')
                    ->searchable()
                    ->sortable()
                    ->weight(FontWeight::SemiBold)
                    ->color('primary')
                    ->wrap(),
                Tables\Columns\TextColumn::make('nagari.nama_nagari')
                    ->label('Nama Nagari')
                    ->searchable()
                    ->sortable()
                    ->badge()
                    ->color('info'),
                Tables\Columns\TextColumn::make('nagari.kecamatan.nama')
                    ->label('Nama Kecamatan')
                    ->searchable()
                    ->sortable()
                    ->badge()
                    ->color('success'),
                Tables\Columns\TextColumn::make('nama_kepala_jorong')
                    ->label('Nama Kepala Jorong')
                    ->searchable()
                    ->wrap()
                    ->toggleable(isToggledHiddenByDefault: false),
                Tables\Columns\TextColumn::make('jumlah_penduduk_jorong')
                    ->label('Jumlah Penduduk')
                    ->sortable()
                    ->numeric()
                    ->suffix(' Jiwa')
                    ->alignEnd(),
                Tables\Columns\TextColumn::make('luas_jorong')
                    ->label('Luas Jorong')
                    ->sortable()
                    ->numeric()
                    ->suffix(' Ha')
                    ->alignEnd(),
                // Tables\Columns\TextColumn::make('latitude')
                //     ->label('Latitude'),
                // Tables\Columns\TextColumn::make('longitude')
                //     ->label('Longitude'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('nagari_id')
                    ->label('Filter Nagari')
                    ->relationship('nagari', 'nama_nagari')
                    ->searchable()
                    ->preload(),
                Tables\Filters\SelectFilter::make('kecamatan')
                    ->label('Filter Kecamatan')
                    ->options(function () {
                        return \App\Models\Kecamatan::pluck('nama', 'id')->toArray();
                    })
                    ->query(function (\Illuminate\Database\Eloquent\Builder $query, array $data): \Illuminate\Database\Eloquent\Builder {
                        if ($data['value']) {
                            return $query->whereHas('nagari.kecamatan', function ($q) use ($data) {
                                $q->where('id', $data['value']);
                            });
                        }
                        return $query;
                    })
                    ->searchable(),
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
                                fn (\Illuminate\Database\Eloquent\Builder $query, $min): \Illuminate\Database\Eloquent\Builder => $query->where('jumlah_penduduk_jorong', '>=', $min),
                            )
                            ->when(
                                $data['max_penduduk'],
                                fn (\Illuminate\Database\Eloquent\Builder $query, $max): \Illuminate\Database\Eloquent\Builder => $query->where('jumlah_penduduk_jorong', '<=', $max),
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
            ->emptyStateIcon('heroicon-m-map-pin')
            ->persistFiltersInSession()
            ->persistSortInSession()
            ->persistSearchInSession();
    }

    public function render()
    {
        $totalJorong = Jorong::count();
        return view('livewire.list-jorong', [
            'totalData' => $totalJorong
        ]);
    }
}
