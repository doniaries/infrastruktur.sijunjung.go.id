<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Jorong;
use App\Models\Nagari;
use Filament\Forms\Get;
use Filament\Forms\Form;
use App\Models\Kecamatan;
use Filament\Tables\Table;
use Illuminate\Validation\Rule;
use Filament\Resources\Resource;
use App\Rules\CaseInsensitiveUnique;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\JorongResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
use App\Filament\Resources\JorongResource\RelationManagers;

class JorongResource extends Resource
{
    protected static ?string $model = Jorong::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?int $navigationSort = 4;

    public static function getNavigationGroup(): ?string
    {
        return 'Master Data';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('nagari_id')
                    ->required()
                    ->preload()
                    ->relationship('nagari', 'nama_nagari')
                    ->searchable(),
                Forms\Components\TextInput::make('nama_jorong')
                    ->label('Nama Jorong')
                    ->required()
                    ->extraInputAttributes(['style' => 'text-transform: uppercase']),
                Forms\Components\TextInput::make('nama_kepala_jorong')
                    ->label('Nama Kepala Jorong')
                    ->maxLength(255),
                Forms\Components\TextInput::make('kontak_kepala_jorong')
                    ->label('Kontak Kepala Jorong')
                    ->tel()
                    ->maxLength(255),
                Forms\Components\TextInput::make('jumlah_penduduk_jorong')
                    ->label('Jumlah Penduduk')
                    ->numeric()
                    ->minValue(0),
                Forms\Components\TextInput::make('luas_jorong')
                    ->label('Luas Jorong (Ha)')
                    ->numeric()
                    ->minValue(0)
                    ->suffix('Ha'),
            ]);
    }

    public static function getNavigationBadge(): ?string
    {
        if (! config('filament.cache.enabled', true)) {
            return parent::getNavigationBadge();
        }

        return Cache::remember('jorongs_count', now()->addHours(6), function () {
            return static::getModel()::count();
        });
    }

    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(fn(Builder $query) => $query->with(['nagari.kecamatan']))
            ->columns([
                Tables\Columns\TextColumn::make('nagari.nama_nagari')
                    ->label('Nama Nagari')
                    ->badge()
                    ->color(fn(string $state): string => match (crc32($state) % 8) {
                        0 => 'primary',
                        1 => 'success',
                        2 => 'warning',
                        3 => 'danger',
                        4 => 'info',
                        5 => 'gray',
                        6 => 'purple',
                        7 => 'pink',
                    })
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nama_jorong')
                    ->label('Nama Jorong')
                    ->searchable()
                    ->copyable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nama_kepala_jorong')
                    ->label('Kepala Jorong')
                    ->searchable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('kontak_kepala_jorong')
                    ->label('Kontak')
                    ->toggleable(),
                Tables\Columns\TextColumn::make('jumlah_penduduk_jorong')
                    ->label('Jumlah Penduduk')
                    ->numeric()
                    ->badge()
                    ->copyable()
                    ->sortable()
                    ->suffix(' Jiwa')
                    ->toggleable(),
                Tables\Columns\TextColumn::make('luas_jorong')
                    ->label('Luas (Ha)')
                    ->numeric()
                    ->sortable()
                    ->toggleable()
                    ->suffix(' Ha'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('nagari.nama_nagari', 'asc')
            ->striped()
            ->filters([
                SelectFilter::make('kecamatan_id')
                    ->label('Kecamatan')
                    ->options(Kecamatan::query()->orderBy('nama')->pluck('nama', 'id'))
                    ->searchable()
                    ->preload()
                    ->query(function ($query, $state) {
                        if ($state) {
                            $query->whereHas('nagari.kecamatan', fn($q) => $q->whereKey($state));
                        }
                    })
                    ->indicateUsing(
                        fn($state) =>
                        $state ? 'Kecamatan: ' . (Kecamatan::find($state)?->nama ?? '-') : null
                    ),

                SelectFilter::make('nagari_id')
                    ->label('Nagari')
                    ->options(Nagari::query()->orderBy('nama_nagari')->pluck('nama_nagari', 'id'))
                    ->searchable()
                    ->preload()
                    ->query(function ($query, $state) {
                        if ($state) {
                            $query->where('nagari_id', $state);
                        }
                    })
                    ->indicateUsing(
                        fn($state) =>
                        $state ? 'Nagari: ' . (Nagari::find($state)?->nama_nagari ?? '-') : null
                    ),

                SelectFilter::make('id')
                    ->label('Jorong')
                    ->options(Jorong::query()->orderBy('nama_jorong')->pluck('nama_jorong', 'id'))
                    ->searchable()
                    ->preload()
                    ->query(function ($query, $state) {
                        if ($state) {
                            $query->whereKey($state);
                        }
                    })
                    ->indicateUsing(
                        fn($state) =>
                        $state ? 'Jorong: ' . (Jorong::find($state)?->nama_jorong ?? '-') : null
                    ),

            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                ExportBulkAction::make(),
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
            'index' => Pages\ListJorongs::route('/'),
            // 'create' => Pages\CreateJorong::route('/create'),
            // 'edit' => Pages\EditJorong::route('/{record}/edit'),
        ];
    }



    public static function getNavigationBadgeColor(): string|array|null
    {
        return 'success';
    }
}
