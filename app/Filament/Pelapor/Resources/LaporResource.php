<?php

namespace App\Filament\Pelapor\Resources;

use App\Filament\Pelapor\Resources\LaporResource\Pages;
use App\Models\Lapor;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Carbon\Carbon;

class LaporResource extends Resource
{
    protected static ?string $model = Lapor::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationLabel = 'Laporanku';
    protected static ?string $pluralModelLabel = 'Laporan';
    protected static ?string $modelLabel = 'Laporan';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('user_id', auth()->id());
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Wizard::make([
                    Forms\Components\Wizard\Step::make('Informasi Tiket')
                        ->schema([
                            Forms\Components\TextInput::make('nama_pelapor')
                                ->label('Nama Lengkap')
                                ->default(fn() => auth()->user()?->name)
                                ->readOnly()
                                ->required(),
                            Forms\Components\TextInput::make('nomor_kontak')
                                ->label('Nomor Kontak')
                                ->default(fn() => auth()->user()?->no_kontak)
                                ->readOnly()
                                ->required(),
                            Forms\Components\TextInput::make('tgl_laporan')
                                ->label('Tanggal Laporan')
                                ->default(now()->format('Y-m-d H:i:s'))
                                ->readOnly()
                                ->required(),
                        ]),
                    Forms\Components\Wizard\Step::make('Detail Laporan')
                        ->schema([
                            Forms\Components\Select::make('opd_id')
                                ->label('OPD Tujuan')
                                ->options(\App\Models\Opd::pluck('nama', 'id'))
                                ->searchable()
                                ->required(),
                            Forms\Components\Select::make('jenis_laporan')
                                ->options([
                                    'Laporan Gangguan' => 'Laporan Gangguan',
                                    'Koordinasi Teknis' => 'Koordinasi Teknis',
                                    'Kenaikan Bandwidth' => 'Kenaikan Bandwidth',
                                ])
                                ->default('Laporan Gangguan')
                                ->required()
                                ->live(),
                            Forms\Components\Textarea::make('uraian_laporan')
                                ->label('Uraian Laporan')
                                ->required()
                                ->rows(5),
                            Forms\Components\FileUpload::make('foto_laporan')
                                ->label('Foto Laporan')
                                ->directory('public/foto_laporan')
                                ->maxSize(5120)
                                ->acceptedFileTypes(['application/pdf', 'image/*'])
                                ->visible(fn(callable $get) => $get('jenis_laporan') === 'Laporan Gangguan'),
                            Forms\Components\FileUpload::make('file_laporan')
                                ->label('Lampiran')
                                ->directory('public/laporan')
                                ->maxSize(5120)
                                ->acceptedFileTypes(['application/pdf', 'image/*'])
                                ->visible(fn(callable $get) => $get('jenis_laporan') === 'Kenaikan Bandwidth'),
                        ]),
                ])->columnSpanFull()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('no_tiket')
                    ->label('No Tiket')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tgl_laporan')
                    ->label('Tanggal')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('jenis_laporan')
                    ->label('Jenis Laporan')
                    ->badge(),
                Tables\Columns\TextColumn::make('status_laporan')
                    ->label('Status')
                    ->badge(),
                Tables\Columns\TextColumn::make('opd.nama')
                    ->label('OPD Tujuan'),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                // disable bulk delete for public users
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
            'index' => Pages\ListLapors::route('/'),
            'create' => Pages\CreateLapor::route('/create'),
        ];
    }
}
