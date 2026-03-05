<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BtsResource\Pages;
use App\Models\Bts;
use Dotswan\MapPicker\Fields\Map;
use Dotswan\MapPicker\Infolists\MapEntry;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Infolists;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Enums\ActionsPosition;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\HtmlString;

use Filament\Forms\Components\Actions;
use Filament\Forms\Components\Actions\Action;

class BtsResource extends Resource
{
    protected static ?string $model = Bts::class;

    protected static ?string $navigationIcon = 'heroicon-o-chart-bar';

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationGroup = 'Data Infrastruktur';

    protected static ?string $modelLabel = 'BTS';

    protected static ?string $pluralModelLabel = 'Daftar BTS';

    public static function getNavigationBadge(): ?string
    {
        // Ambil jumlah BTS langsung dari database (real-time)
        return (string) static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Grid::make(3)
                ->schema([
                    // Main Column (Left)
                    Forms\Components\Group::make()
                        ->schema([
                            Forms\Components\Section::make('Peta Lokasi')
                                ->schema([
                                    Forms\Components\TextInput::make('titik_koordinat')
                                        ->label('Titik Koordinat')
                                        ->required(),

                                    Actions::make([
                                        Action::make('openMap')
                                            ->label('Buka di Google Maps')
                                            ->icon('heroicon-m-map')
                                            ->url(fn($get) => "https://www.google.com/maps?q=" . $get('latitude') . ',' . $get('longitude'))
                                            ->openUrlInNewTab()
                                    ])->columnSpanFull(),

                                    Map::make('location')
                                        ->label('Peta')
                                        ->helperText(new HtmlString(' <strong> Klik lokasi pada peta.</strong>'))
                                        ->columnSpanFull()
                                        ->defaultLocation(-0.6659520479353943, 100.9443495032019)
                                        ->afterStateUpdated(function (Set $set, ?array $state): void {
                                            if ($state) {
                                                $lat = number_format($state['lat'], 6, '.', '');
                                                $lng = number_format($state['lng'], 6, '.', '');

                                                $set('latitude', $lat);
                                                $set('longitude', $lng);
                                                $set('titik_koordinat', $lat . ', ' . $lng);
                                            }
                                        })
                                        ->afterStateHydrated(function (Map $component, $state, $record): void {
                                            if ($record && $record->latitude && $record->longitude) {
                                                $component->state([
                                                    'lat' => (float)$record->latitude,
                                                    'lng' => (float)$record->longitude,
                                                ]);
                                            }
                                        })
                                        ->extraStyles([
                                            'min-height: 45vh',
                                            'border-radius: 10px'
                                        ])
                                        ->liveLocation(true, false, 100000)
                                        ->showMarker(true)
                                        ->markerColor("#22c55eff")
                                        ->showFullscreenControl()
                                        ->showZoomControl()
                                        ->draggable(true)
                                        ->tilesUrl("https://tile.openstreetmap.de/{z}/{x}/{y}.png")
                                        ->zoom(14)
                                        ->detectRetina()
                                        ->showMyLocationButton(true),

                                    Forms\Components\Grid::make()
                                        ->columns(2)
                                        ->schema([
                                            Forms\Components\TextInput::make('latitude')
                                                ->label('Latitude')
                                                ->numeric()
                                                ->live()
                                                ->afterStateUpdated(function ($state, Set $set, $get) {
                                                    if ($state && $get('longitude')) {
                                                        $lat = number_format(floatval($state), 6, '.', '');
                                                        $lng = number_format(floatval($get('longitude')), 6, '.', '');

                                                        $set('location', [
                                                            'lat' => floatval($lat),
                                                            'lng' => floatval($lng)
                                                        ]);
                                                        $set('titik_koordinat', $lat . ', ' . $lng);
                                                    }
                                                }),

                                            Forms\Components\TextInput::make('longitude')
                                                ->label('Longitude')
                                                ->numeric()
                                                ->live()
                                                ->afterStateUpdated(function ($state, Set $set, $get) {
                                                    if ($state && $get('latitude')) {
                                                        $lat = number_format(floatval($get('latitude')), 6, '.', '');
                                                        $lng = number_format(floatval($state), 6, '.', '');

                                                        $set('location', [
                                                            'lat' => floatval($lat),
                                                            'lng' => floatval($lng)
                                                        ]);
                                                        $set('titik_koordinat', $lat . ', ' . $lng);
                                                    }
                                                }),
                                        ]),
                                ]),

                            Forms\Components\Section::make('Informasi Tambahan')
                                ->schema([
                                    Forms\Components\TextInput::make('pemilik')
                                        ->label('Pemilik BTS')
                                        ->required(),

                                    Forms\Components\TextInput::make('alamat')
                                        ->label('Alamat Lengkap')
                                        ->required(),

                                    Forms\Components\Textarea::make('keterangan')
                                        ->label('Keterangan / Catatan')
                                        ->placeholder('Contoh: BTS ini juga menjangkau nagari tetangga...')
                                        ->rows(4)
                                        ->columnSpanFull(),
                                ]),
                        ])
                        ->columnSpan(2),

                    // Sidebar Column (Right)
                    Forms\Components\Group::make()
                        ->schema([
                            Forms\Components\Section::make('Lokasi Administratif')
                                ->schema([
                                    Forms\Components\Select::make('kecamatan_id')
                                        ->relationship('kecamatan', 'nama')
                                        ->required()
                                        ->live(),

                                    Forms\Components\Select::make('nagari_id')
                                        ->relationship(
                                            'nagari',
                                            'nama_nagari',
                                            fn(Builder $query, callable $get) =>
                                            $query->when(
                                                $get('kecamatan_id'),
                                                fn($query, $kecamatan_id) =>
                                                $query->where('kecamatan_id', $kecamatan_id)
                                            )
                                        )
                                        ->required()
                                        ->searchable()
                                        ->preload()
                                        ->live()
                                        ->visible(fn(callable $get) => filled($get('kecamatan_id')))
                                        ->afterStateUpdated(fn(callable $set) => $set('jorong_id', null)),

                                    Forms\Components\Select::make('jorong_id')
                                        ->relationship(
                                            'jorong',
                                            'nama_jorong',
                                            fn(Builder $query, callable $get) =>
                                            $query->when(
                                                $get('nagari_id'),
                                                fn($query, $nagari_id) =>
                                                $query->where('nagari_id', $nagari_id)
                                            )
                                        )
                                        ->searchable()
                                        ->preload()
                                        ->visible(fn(callable $get) => filled($get('nagari_id'))),
                                ]),

                            Forms\Components\Section::make('Cakupan Sinyal')
                                ->description('Nagari lain yang terjangkau')
                                ->schema([
                                    Forms\Components\Select::make('nagarisCovered')
                                        ->label('Nagari Terjangkau Lainnya')
                                        ->relationship(
                                            'nagarisCovered',
                                            'nama_nagari',
                                            fn(Builder $query, callable $get) =>
                                            $query->when(
                                                $get('kecamatan_id'),
                                                fn($q, $id) => $q->where('kecamatan_id', $id)
                                            )
                                        )
                                        ->multiple()
                                        ->searchable()
                                        ->preload()
                                        ->helperText('Hanya nagari dalam kecamatan yang sama'),
                                ]),

                            Forms\Components\Section::make('Metadata')
                                ->schema([
                                    Forms\Components\Select::make('operator_id')
                                        ->relationship('operator', 'nama_operator')
                                        ->required(),

                                    Forms\Components\Select::make('teknologi')
                                        ->options([
                                            '2G' => '2G',
                                            '3G' => '3G',
                                            '4G' => '4G',
                                            '4G+5G' => '4G+5G',
                                            '5G' => '5G',
                                        ])
                                        ->default('4G')
                                        ->required(),

                                    Forms\Components\Select::make('status')
                                        ->options([
                                            'aktif' => 'Aktif',
                                            'non-aktif' => 'Non-Aktif'
                                        ])
                                        ->default('aktif')
                                        ->required(),

                                    Forms\Components\TextInput::make('tahun_bangun')
                                        ->numeric()
                                        ->default('2023')
                                        ->minValue(2000)
                                        ->maxValue(2030),
                                ]),
                        ])
                        ->columnSpan(1),
                ])
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(fn(Builder $query) => $query->withRelations())
            ->columns([
                Tables\Columns\TextColumn::make('tahun_bangun')
                    ->sortable(),

                Tables\Columns\TextColumn::make('kecamatan.nama')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('nagari.nama_nagari')
                    ->sortable()
                    ->wrap()
                    ->searchable(),
                Tables\Columns\TextColumn::make('titik_koordinat')
                    ->copyable()
                    ->wrap()
                    ->label('Titik Koordinat')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('alamat')
                    ->label('Alamat')
                    ->wrap()
                    ->sortable()
                    ->searchable(),
                // Tables\Columns\TextColumn::make('location.lat')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('location.lng')
                //     ->searchable(),
                Tables\Columns\TextColumn::make('operator.nama_operator')
                    ->badge()
                    ->color(fn(string $state): string => match (strtoupper($state)) {
                        'TELKOMSEL' => 'danger',
                        'INDOSAT' => 'warning',
                        'XL AXIATA' => 'primary',
                        'TIDAK DIKETAHUI' => 'gray',
                        default => 'gray',
                    })
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('teknologi')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        '2G' => 'danger',
                        '3G' => 'primary',
                        '4G' => 'secondary',
                        '4G+5G' => 'info',
                        '5G' => 'success',
                    }),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'aktif' => 'success',
                        'non-aktif' => 'danger',
                    }),

                Tables\Columns\TextColumn::make('keterangan')
                    ->label('Keterangan')
                    ->wrap()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('tahun_bangun', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('operator_id')
                    ->relationship('operator', 'nama_operator')
                    ->searchable()
                    ->preload()
                    ->label('Operator'),
                Tables\Filters\SelectFilter::make('kecamatan_id')
                    ->relationship('kecamatan', 'nama')
                    ->searchable()
                    ->preload()
                    ->label('Kecamatan'),
                Tables\Filters\SelectFilter::make('teknologi')
                    ->options([
                        '2G' => '2G',
                        '3G' => '3G',
                        '4G' => '4G',
                        '4G+5G' => '4G+5G',
                        '5G' => '5G',
                    ])
                    ->label('Teknologi'),
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'aktif' => 'Aktif',
                        'non-aktif' => 'Non-Aktif',
                    ])
                    ->label('Status'),
                Tables\Filters\SelectFilter::make('tahun_bangun')
                    ->options(
                        \App\Models\Bts::select('tahun_bangun')
                            ->distinct()
                            ->orderBy('tahun_bangun', 'desc')
                            ->pluck('tahun_bangun', 'tahun_bangun')
                            ->toArray()
                    )
                    ->label('Tahun Bangun')
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->iconButton()
                    ->tooltip('Detail')
                    ->stickyModalHeader()
                    ->stickyModalFooter(),
                Tables\Actions\EditAction::make()
                    ->iconButton()
                    ->tooltip('Edit'),
                Tables\Actions\DeleteAction::make()
                    ->iconButton()
                    ->tooltip('Hapus'),
            ], position: ActionsPosition::BeforeColumns)
            ->recordUrl(fn(Bts $record): string => route('filament.admin.resources.bts.edit', $record))

            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }


    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Infolists\Components\Section::make('Informasi Dasar')
                    ->schema([
                        Infolists\Components\Grid::make(3)
                            ->schema([
                                Infolists\Components\TextEntry::make('tahun_bangun')
                                    ->label('Tahun Bangun'),
                                Infolists\Components\TextEntry::make('operator.nama_operator')
                                    ->label('Operator')
                                    ->badge(),
                                Infolists\Components\TextEntry::make('teknologi')
                                    ->label('Teknologi')
                                    ->badge(),
                                Infolists\Components\TextEntry::make('status')
                                    ->label('Status')
                                    ->badge()
                                    ->color(fn(string $state): string => match ($state) {
                                        'aktif' => 'success',
                                        'non-aktif' => 'danger',
                                    }),
                                Infolists\Components\TextEntry::make('pemilik')
                                    ->label('Pemilik BTS'),
                            ]),
                    ]),

                Infolists\Components\Section::make('Lokasi & Cakupan')
                    ->schema([
                        Infolists\Components\Grid::make(2)
                            ->schema([
                                Infolists\Components\Group::make([
                                    Infolists\Components\TextEntry::make('kecamatan.nama')
                                        ->label('Kecamatan'),
                                    Infolists\Components\TextEntry::make('nagari.nama_nagari')
                                        ->label('Nagari Utama'),
                                    Infolists\Components\TextEntry::make('jorong.nama_jorong')
                                        ->label('Jorong Utama')
                                        ->placeholder('Tidak ada jorong spesifik'),
                                    Infolists\Components\TextEntry::make('alamat')
                                        ->label('Alamat Lengkap'),
                                    Infolists\Components\TextEntry::make('titik_koordinat')
                                        ->label('Koordinat'),
                                    Infolists\Components\TextEntry::make('keterangan')
                                        ->label('Keterangan / Catatan')
                                        ->columnSpanFull(),
                                ]),
                                Infolists\Components\Group::make([
                                    Infolists\Components\TextEntry::make('nagarisCovered.nama_nagari')
                                        ->label('Nagari Terjangkau Lainnya')
                                        ->badge()
                                        ->listWithLineBreaks()
                                        ->placeholder('Tidak ada nagari tetangga yang terdaftar'),
                                    MapEntry::make('location')
                                        ->label('Peta Lokasi')
                                        ->state(fn($record) => ['lat' => $record->latitude, 'lng' => $record->longitude])
                                        ->extraStyles([
                                            'min-height: 300px',
                                            'border-radius: 10px'
                                        ]),
                                ]),
                            ]),
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
            'index' => Pages\ListBts::route('/'),
            'create' => Pages\CreateBts::route('/create'),
            'edit' => Pages\EditBts::route('/{record}/edit'),
        ];
    }
}
