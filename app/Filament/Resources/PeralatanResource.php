<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PeralatanResource\Pages;
use App\Filament\Resources\PeralatanResource\RelationManagers;
use App\Models\Peralatan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PeralatanResource extends Resource
{
    protected static ?string $model = Peralatan::class;

    protected static ?string $navigationIcon = 'heroicon-o-cube';
    protected static ?int $navigationSort = 5;

    public static function getNavigationGroup(): ?string
    {
        return 'Master Data';
    }



    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\Select::make('jenis_peralatan')
                    ->options([
                        'Router' => 'Router',
                        'Hub' => 'Hub',
                        'Acces Point' => 'Acces Point',
                        'Switch' => 'Switch',
                        'Server' => 'Server',

                    ])
                    ->required(),
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('tahun_pengadaan')
                    ->required()
                    ->maxLength(255),


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('jenis_peralatan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tahun_pengadaan')
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
            ->striped()
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
            'index' => Pages\ListPeralatans::route('/'),
            // 'create' => Pages\CreatePeralatan::route('/create'),
            // 'edit' => Pages\EditPeralatan::route('/{record}/edit'),
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
