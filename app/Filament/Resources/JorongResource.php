<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JorongResource\Pages;
use App\Filament\Resources\JorongResource\RelationManagers;
use App\Models\Jorong;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

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
                    ->unique(ignoreRecord: true, table: 'jorongs')
                    ->rules(['required', 'string', 'max:255', 
                        function ($get) {
                            return function (string $attribute, $value, $fail) use ($get) {
                                $exists = \App\Models\Jorong::whereRaw('UPPER(nama_jorong) = ?', [strtoupper($value)])
                                    ->where('id', '!=', $get('id') ?? 0)
                                    ->exists();
                                if ($exists) {
                                    $fail('Nama jorong ini sudah digunakan.');
                                }
                            };
                        }
                    ])
                    ->live()
                    ->afterStateUpdated(fn ($state, callable $set) => $set('nama_jorong', strtoupper($state)))
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

    public static function table(Table $table): Table
    {
        return $table
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
                // Tables\Filters\SelectFilter::make('nagari_id')
                //     ->relationship('nagari', 'nama_nagari')
                //     ->label('Filter by Nagari')
                //     ->searchable()
                //     ->preload(),

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
            'index' => Pages\ListJorongs::route('/'),
            // 'create' => Pages\CreateJorong::route('/create'),
            // 'edit' => Pages\EditJorong::route('/{record}/edit'),
        ];
    }


    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getNavigationBadgeColor(): string|array|null
    {
        return 'success';
    }
}
