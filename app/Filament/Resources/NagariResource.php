<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NagariResource\Pages;
use App\Filament\Resources\NagariResource\RelationManagers;
use App\Models\Nagari;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class NagariResource extends Resource
{
    protected static ?string $model = Nagari::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?int $navigationSort = 3;

    public static function getNavigationGroup(): ?string
    {
        return 'Master Data';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('kecamatan_id')
                    ->required()
                    ->preload()
                    ->relationship('kecamatan', 'nama')
                    ->searchable(),
                Forms\Components\TextInput::make('nama_nagari')
                    ->label('Nama Nagari')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->live()
                    ->extraInputAttributes(['style' => 'text-transform: uppercase'])
                    ->maxLength(255),
                Forms\Components\TextInput::make('nama_wali_nagari')
                    ->label('Nama Wali Nagari')
                    ->maxLength(255),
                Forms\Components\TextInput::make('kontak_wali_nagari')
                    ->label('Kontak Wali Nagari')
                    ->tel()
                    ->maxLength(255),
                Forms\Components\Textarea::make('alamat_kantor_nagari')
                    ->label('Alamat Kantor Nagari')
                    ->rows(3)
                    ->maxLength(500),
                Forms\Components\TextInput::make('jumlah_penduduk_nagari')
                    ->label('Jumlah Penduduk')
                    ->numeric()
                    ->minValue(0),
                Forms\Components\TextInput::make('jumlah_jorong')
                    ->label('Jumlah Jorong')
                    ->numeric()
                    ->minValue(0),
                Forms\Components\TextInput::make('luas_nagari')
                    ->label('Luas Nagari (Ha)')
                    ->numeric()
                    ->minValue(0)
                    ->suffix('Ha'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_nagari')
                    ->label('Nama Nagari')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('kecamatan.nama')
                    ->label('Kecamatan')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nama_wali_nagari')
                    ->label('Wali Nagari')
                    ->searchable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('kontak_wali_nagari')
                    ->label('Kontak')
                    ->toggleable(),
                Tables\Columns\TextColumn::make('alamat_kantor_nagari')
                    ->label('Alamat Kantor')
                    ->limit(50)
                    ->toggleable(),
                Tables\Columns\TextColumn::make('jumlah_penduduk_nagari')
                    ->label('Jumlah Penduduk')
                    ->numeric()
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('jumlah_jorong')
                    ->label('Jumlah Jorong')
                    ->numeric()
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('luas_nagari')
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
            ->defaultSort('kecamatan.nama', 'asc')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListNagaris::route('/'),
            // 'create' => Pages\CreateNagari::route('/create'),
            // 'edit' => Pages\EditNagari::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getNavigationBadgeColor(): string|array|null
    {
        return 'danger';
    }
}
