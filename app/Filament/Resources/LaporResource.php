<?php

namespace App\Filament\Resources;

use Carbon\Carbon;
use App\Models\Opd;
use Filament\Forms;
use Filament\Tables;
use App\Models\Lapor;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Tables\Actions\Action;
use Illuminate\Support\Str;
use App\Enums\StatusLaporan;
use Forms\Components\Select;
use Tables\Actions\EditAction;
use Tables\Columns\HtmlColumn;
use Filament\Resources\Resource;
use Forms\Components\FileUpload;
use Forms\Components\BadgeColumn;
use Illuminate\Support\HtmlString;
use Filament\Tables\Columns\Column;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\Section;
use Filament\Notifications\Notification;
// use Filament\Notifications\Actions\Action;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\LaporResource\Pages;
use NunoMaduro\Collision\Adapters\Phpunit\State;
use App\Enums\StatusLaporan as EnumsStatusLaporan;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select as ComponentsSelect;
use App\Filament\Resources\LaporResource\RelationManagers;
use BezhanSalleh\FilamentShield\Contracts\HasShieldPermissions;
use Filament\Tables\Enums\ActionsPosition;
use App\Enums\JenisLaporan;


class LaporResource extends Resource
{
    protected static ?string $model = Lapor::class;

    protected static ?string $navigationIcon = 'heroicon-o-bell-alert';
    protected static ?string $navigationGroup = 'Laporan';
    protected static ?string $navigationLabel = 'Laporan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()->columns(2)
                    ->schema([
                        Forms\Components\DateTimePicker::make('tgl_laporan')
                            ->default(Carbon::now())
                            ->readOnly(true)
                            ->disabled()
                            ->dehydrated(false)
                            ->timezone('Asia/Jakarta')
                            ->required(),
                        Forms\Components\TextInput::make('no_tiket')
                            ->label('No Tiket')
                            ->disabled()
                            ->dehydrated(false)
                            ->hint('No tiket Harap Dicatat Untuk Cek Status Laporan!')
                            ->hintIcon('heroicon-m-exclamation-circle')
                            ->hintColor('danger')
                            // ->helperText('Harap Dicatat Untuk Cek Status Laporan!')
                            ->default(fn($record) => $record && $record->exists ? $record->no_tiket : Str::random(5))
                            ->unique(ignoreRecord: true)
                            ->readOnly(true),
                    ]),

                Section::make()->columns(3)
                    ->schema([
                        Forms\Components\TextInput::make('nama_pelapor')
                            ->autocapitalize('sentences')
                            ->autofocus()
                            ->disabled()
                            ->dehydrated(false)
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('nomor_kontak')
                            ->tel()
                            ->minLength(5)
                            ->maxLength(15)
                            ->required(),
                        Forms\Components\Select::make('opd_id')
                            ->options(Opd::all()->pluck('nama', 'id'))
                            ->preload()
                            //mempercepat pencarian
                            ->searchDebounce(200)
                            //menambahkan data opd secara langsung di form
                            ->createOptionForm([
                                Forms\Components\TextInput::make('name')
                                    ->label('Nama Opd Anda'),
                            ])
                            ->disabled()
                            ->dehydrated(false)
                            ->searchable()
                            ->required(),
                        Forms\Components\Select::make('jenis_laporan')
                            ->disabled()
                            ->dehydrated(false)
                            ->options(JenisLaporan::getSelectOptions())
                            ->default(JenisLaporan::LAPORAN_GANGGUAN->value),
                        Forms\Components\Textarea::make('uraian_laporan')
                            ->disabled()
                            ->dehydrated(false)
                            ->columnSpan(2)
                            ->placeholder('tuliskan dan jelaskan secara singkat'),
                        Forms\Components\FileUpload::make('file_laporan')
                            ->placeholder('upload surat laporan'),
                    ]),

                Section::make()->columns(1)
                    ->schema([
                        Forms\Components\Textarea::make('keterangan_petugas')
                            ->hidden(fn($record) => !$record || !$record->exists)
                            ->label('Keterangan Petugas')
                            ->placeholder('Tuliskan Keterangan Petugas')
                            ->afterStateUpdated(function ($record) {
                                if ($record) {
                                    $record->update([
                                        'status_laporan' => StatusLaporan::SEDANG_DIPROSES->value
                                    ]);
                                }
                            }),

                    ]),

                Section::make()->columns(2)
                    ->schema([
                        Forms\Components\Select::make('status_laporan')
                            ->hidden(true)
                            ->options(StatusLaporan::getSelectOptions())
                            ->default(StatusLaporan::BELUM_DIPROSES->value),

                        Forms\Components\Actions::make([
                            Forms\Components\Actions\Action::make('selesai')
                                ->label('Selesaikan Laporan')
                                ->icon('heroicon-o-check-circle')
                                ->color('success')
                                ->visible(fn($record) => $record && $record->status_laporan === StatusLaporan::SEDANG_DIPROSES->value)
                                ->requiresConfirmation()
                                ->modalHeading('Selesaikan Laporan')
                                ->modalDescription('Apakah Anda yakin ingin menyelesaikan laporan ini?')
                                ->action(function ($record) {
                                    try {
                                        // Update status dan simpan perubahan
                                        $record->fill([
                                            'status_laporan' => StatusLaporan::SELESAI_DIPROSES->value
                                        ])->save();

                                        Notification::make()
                                            ->title('Laporan telah diselesaikan')
                                            ->success()
                                            ->send();

                                        // Redirect menggunakan helper redirect()
                                        return redirect()->route('filament.admin.resources.lapors.index');
                                    } catch (\Exception $e) {
                                        Notification::make()
                                            ->title('Gagal menyelesaikan laporan')
                                            ->danger()
                                            ->send();
                                    }
                                }),
                        ]),
                    ]),
            ]);
    }

    //--------------------tabel---------------
    public static function table(Table $table): Table
    {

        return $table
            ->headerActions([
                Action::make('refresh')
                    ->label('Refresh Data')
                    ->icon('heroicon-o-arrow-path')
                    ->action(function () {
                        // This will refresh the current page, effectively reloading the table data.
                        // Using static::getUrl('index') as a fallback if Referer is not available.
                        return redirect(request()->header('Referer') ?? static::getUrl('index'));
                    }),
            ])
            ->columns([
                Tables\Columns\TextColumn::make('status_laporan')
                    ->badge()
                    ->color(fn(StatusLaporan $state): string => $state->getColor())
                    ->icon(fn(StatusLaporan $state): string => $state->getIcon())
                    ->sortable(),
                Tables\Columns\TextColumn::make('jenis_laporan')
                    ->badge()
                    ->color(fn(JenisLaporan $state): string => $state->getColor())
                    ->formatStateUsing(fn(JenisLaporan $state): string => $state->getLabel())
                    ->badge(function ($state): string {
                        // Convert enum to string if it's an enum instance
                        $stateValue = $state instanceof JenisLaporan ? $state->value : $state;
                        return match ($stateValue) {
                            'Laporan Gangguan' => 'danger',
                            'Koordinasi Teknis' => 'warning',
                            'Kenaikan Bandwidth' => 'success',
                            default => 'primary',
                        };
                    })
                    ->colors([
                        'danger' => 'Laporan Gangguan',
                        'warning' => 'Koordinasi Teknis',
                        'success' => 'Kenaikan Bandwidth',
                    ]),
                Tables\Columns\TextColumn::make('no_tiket')
                    ->label('No Tiket')
                    ->copyable()
                    ->copyMessage('kode tiket disalin ')
                    ->copyMessageDuration(1500)
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tgl_laporan')
                    ->sortable()
                    ->dateTime(),
                Tables\Columns\TextColumn::make('nama_pelapor')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('nomor_kontak')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('opd.nama')
                    ->numeric()
                    ->sortable(),

                Tables\Columns\TextColumn::make('uraian_laporan')
                    ->wrap(),
                Tables\Columns\TextColumn::make('petugas.name')
                    ->label('Petugas')
                    ->sortable()
                    ->searchable()
                    ->default('-'),
                Tables\Columns\TextColumn::make('keterangan_petugas')
                    ->searchable(),
                // Tables\Columns\TextColumn::make('hasil_laporan')
                //     ->searchable(),

                Tables\Columns\TextColumn::make('file_laporan')
                    ->openUrlInNewTab()
                    ->url(fn($record) => Storage::url($record->file_laporan)),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            //mengurutkan inputan terakhir
            ->defaultSort('created_at', 'desc')
            ->filters([
                // Tambahkan filter di sini jika diperlukan

            ])
            ->actions([
                Tables\Actions\Action::make('lihatLaporan')
                    ->label('Lihat Laporan')
                    ->icon('heroicon-o-eye')
                    ->color('danger')
                    // ->iconButton()
                    ->infolist([
                        TextEntry::make('no_tiket')->label('Nomor Tiket'),
                        TextEntry::make('nama_pelapor')->label('Nama Pelapor'),
                        TextEntry::make('opd.nama')->label('OPD'),
                        TextEntry::make('jenis_laporan')->label('Jenis Laporan'),
                        TextEntry::make('tgl_laporan')->label('Tanggal Laporan')->dateTime('d M Y H:i'),
                        TextEntry::make('uraian_laporan')->label('Uraian Laporan'),
                    ])
                    ->action(function ($record) {
                        if ($record->status_laporan === StatusLaporan::BELUM_DIPROSES) {
                            $record->update([
                                'status_laporan' => StatusLaporan::SEDANG_DIPROSES,
                            ]);
                        }
                    })
                    ->visible(fn($record) => $record->status_laporan === StatusLaporan::BELUM_DIPROSES)
                    ->closeModalByClickingAway(false)
                    ->closeModalByEscaping()
                    ->modalHeading('Detail Laporan')
                    ->modalWidth('lg')
                    ->stickyModalHeader()
                    ->stickyModalFooter(),

                Tables\Actions\Action::make('prosesLaporan')
                    ->label('Proses Laporan')
                    ->icon('heroicon-o-check-circle')
                    ->color('info')
                    // ->iconButton()
                    ->form([
                        Forms\Components\Textarea::make('keterangan_petugas')
                            ->label('Keterangan Tindakan')
                            ->required(),
                    ])
                    ->action(function ($record, array $data) {
                        $user = auth()->user();

                        $record->update([
                            'keterangan_petugas' => $data['keterangan_petugas'],
                            'status_laporan' => StatusLaporan::SELESAI_DIPROSES,
                            'petugas_id' => $user->id,
                        ]);

                        Notification::make()
                            ->title("Laporan #{$record->no_tiket} selesai diproses oleh {$user->name}")
                            ->success()
                            ->send();
                    })
                    ->visible(fn($record) => $record->status_laporan === StatusLaporan::SEDANG_DIPROSES)
                    ->closeModalByClickingAway(false)
                    ->closeModalByEscaping()
                    ->modalHeading('Proses Laporan')
                    ->modalWidth('lg'),

                // Tables\Actions\EditAction::make()
                //     ->iconButton()
            ], position: ActionsPosition::BeforeColumns)

            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            // 'create' => Pages\CreateLapor::route('/create'),
            // 'edit' => Pages\EditLapor::route('/{record}/edit'),
        ];
    }

    public function create()
    {
        // Logika untuk membuat laporan
        return view('lapor.index');
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}
