<?php


namespace App\Services;

use App\Models\Opd;
use Filament\Forms;
use Filament\Forms\Form;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Filament\Forms\Components\Section;
use Filament\Support\Enums\FontWeight;
use AbanoubNassem\FilamentGRecaptchaField\Forms\Components\GRecaptcha;
use DateTime;

final class LaporForm
{
    protected $dates = ['tgl_laporan'];
    public static function schema(): array
    {

        return [
            Forms\Components\Grid::make(2)->schema([
                Section::make('Informasi Laporan')
                    ->columns(2)
                    ->schema([
                        Forms\Components\DateTimePicker::make('tgl_laporan')
                            ->default(Carbon::now())
                            ->timezone('Asia/Jakarta')
                            ->readOnly(true)
                            // ->hidden()
                            ->required(),
                        Forms\Components\TextInput::make('no_tiket')
                            ->prefixIconColor('danger')
                            ->prefixIcon('heroicon-o-ticket')
                            ->label('No Tiket')
                            ->hint('Nomor Tiket Harap Dicatat Untuk Cek Status Laporan!')
                            ->hintIcon('heroicon-m-exclamation-circle')
                            ->hintColor('danger')
                            ->default(fn($record) => $record && $record->exists ? $record->no_tiket : Str::random(5))
                            ->unique(ignoreRecord: true)
                            ->readOnly(true),
                    ]),
                Forms\Components\Grid::make()->schema([
                    Section::make('Informasi Pelapor')
                        ->columns(3)
                        ->schema([
                            Forms\Components\TextInput::make('nama_pelapor')
                                ->placeholder('Input Nama Pelapor')
                                ->autocapitalize('sentences')
                                ->autofocus(true)
                                ->minLength(3)
                                ->required(),
                            Forms\Components\Select::make('opd_id')
                                ->options(Opd::all()->pluck('nama', 'id'))
                                //mempercepat pencarian
                                ->searchDebounce(200)
                                //menambahkan data opd secara langsung di form
                                ->createOptionUsing(function ($name) {
                                    return Opd::create(['name' => $name])->id;
                                })
                                ->searchable()
                                ->required(),
                            Forms\Components\Select::make('jenis_laporan')

                                ->prefixIcon('heroicon-o-chat-bubble-left-ellipsis')
                                ->prefixIconColor('primary')
                                ->options([
                                    'Laporan Gangguan' => 'Laporan Gangguan',
                                    'Koordinasi Teknis' => 'Koordinasi Teknis',
                                ])
                                ->default('Laporan Gangguan'),
                            Forms\Components\Textarea::make('uraian_laporan')
                                ->placeholder('tuliskan dan jelaskan secara singkat')
                                ->minLength(10)
                                ->required()
                                ->columnSpanFull()
                                ->placeholder('tuliskan dan jelaskan secara singkat'),
                            Forms\Components\FileUpload::make('file_laporan')
                                ->label('Upload Surat Laporan')
                                ->columnSpanFull()
                                ->placeholder('upload surat laporan'),


                        ]),
                ]),
            ]),
        ];
    }
}