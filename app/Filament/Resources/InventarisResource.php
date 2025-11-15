<?php

namespace App\Filament\Resources;

use App\Models\Opd;
use App\Models\Peralatan;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Set;
use Filament\Forms\Form;
use App\Models\Inventaris;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\InventarisResource\Pages;
use App\Filament\Resources\InventarisResource\RelationManagers;

class InventarisResource extends Resource
{
    protected static ?string $model = Inventaris::class;

    protected static ?string $navigationIcon = 'heroicon-o-folder-arrow-down';

    public static function getNavigationGroup(): ?string
    {
        return 'Data Infrastruktur';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('jenis_peralatan')
                    ->label('Jenis Peralatan')
                    ->options(fn() => Peralatan::query()
                        ->select('jenis_peralatan')
                        ->distinct()
                        ->orderBy('jenis_peralatan')
                        ->pluck('jenis_peralatan', 'jenis_peralatan'))
                    ->reactive()
                    ->required(),
                Forms\Components\Select::make('opd_id')
                    ->relationship('opd', 'nama')
                    ->searchable()
                    // ->getOptionLabelFromRecordUsing(fn(Opd $record) => $record->nama)
                    ->preload()
                    ->required(),

                Forms\Components\Select::make('peralatan_id')
                    ->label('Peralatan')
                    ->options(function (callable $get) {
                        $jenis = $get('jenis_peralatan');
                        return Peralatan::query()
                            ->when($jenis, fn($q) => $q->where('jenis_peralatan', $jenis))
                            ->orderBy('nama')
                            ->pluck('nama', 'id');
                    })
                    ->searchable()
                    ->preload()
                    ->reactive()
                    ->afterStateUpdated(function (Forms\Components\Set $set, $state) {
                        $jenis = optional(Peralatan::find($state))->jenis_peralatan;
                        $set('jenis_peralatan', $jenis);
                    })
                    ->required(),

                Forms\Components\TextInput::make('jenis_peralatan')
                    ->disabled()
                    ->dehydrated()
                    ->maxLength(255),

                Forms\Components\TextInput::make('jumlah')
                    ->numeric()
                    ->minValue(0)
                    ->required(),

                Forms\Components\Select::make('status')
                    ->label('Status')
                    ->options([
                        'baik' => 'Baik',
                        'rusak' => 'Rusak',
                        'tidak digunakan' => 'Tidak Digunakan',
                    ])
                    ->required(),

                Forms\Components\FileUpload::make('foto')
                    ->image()
                    ->disk('public')
                    ->directory('inventaris')
                    ->acceptedFileTypes(['image/jpeg','image/png','image/webp'])
                    ->maxSize(1024)
                    ->visibility('public')
                    ->helperText('Unggah foto kondisi terkini (maks 1MB, JPEG/PNG/WebP)'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('foto')
                    ->label('Foto')
                    ->disk('public')
                    ->circular()
                    ->size(40),
                Tables\Columns\TextColumn::make('opd.nama')
                    ->label('OPD')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('peralatan.nama')
                    ->label('Peralatan')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('jenis_peralatan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('jumlah')
                    ->label('Jumlah')
                    ->sortable(),

                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->colors([
                        'success' => 'baik',
                        'warning' => 'rusak',
                        'danger' => 'tidak digunakan',
                    ])
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListInventaris::route('/'),
            'create' => Pages\CreateInventaris::route('/create'),
            'edit' => Pages\EditInventaris::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return \App\Models\Inventaris::getCount();
    }
}
