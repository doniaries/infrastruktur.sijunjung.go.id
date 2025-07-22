<?php

namespace App\Livewire;

use App\Enums\StatusLaporan;
use App\Models\Lapor;
use App\Models\Opd;
use Carbon\Carbon;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Support\Enums\FontFamily;
use Filament\Support\Enums\FontWeight;
use Filament\Tables;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Livewire\Component;

class ListLaporan extends Component implements HasTable, HasForms
{
    use InteractsWithTable, InteractsWithForms;

    public $ticket;

    public function mount()
    {
        // Mengambil parameter ticket dari URL jika ada
        $this->ticket = request()->get('ticket');
    }

    public function table(Table $table): Table
    {
        $query = Lapor::query();

        // Filter berdasarkan nomor tiket jika ada
        if ($this->ticket) {
            $query->where('no_tiket', $this->ticket);
        }

        return $table
            ->query($query)
            ->contentGrid([
                'md' => 1,
                'xl' => 1,
            ])
            ->columns([
                Tables\Columns\TextColumn::make('no_tiket')
                    ->badge()
                    ->label('No Tiket')
                    ->color('success')
                    ->copyable()
                    ->copyMessage('kode tiket disalin')
                    ->copyMessageDuration(2000)
                    ->searchable()
                    ->weight(FontWeight::Bold)
                    ->fontFamily(FontFamily::Sans)
                    ->sortable(),
                Tables\Columns\TextColumn::make('tgl_laporan')
                    ->badge()
                    ->dateTime('d-m-Y H:i:s')
                    ->default(Carbon::now())
                    ->timezone('Asia/Jakarta')
                    ->color('info'),
                Tables\Columns\TextColumn::make('opd.nama')
                    ->label('Nama OPD')
                    ->wrap()
                    ->searchable(),
                Tables\Columns\TextColumn::make('nama_pelapor')
                    ->wrap()
                    ->searchable(),
                Tables\Columns\TextColumn::make('uraian_laporan')
                    ->searchable()
                    ->wrap(),
                Tables\Columns\TextColumn::make('status_laporan')
                    ->badge()
                    ->color(fn(StatusLaporan $state): string => $state->getColor())
                    ->icon(fn(StatusLaporan $state): string => $state->getIcon()),
                Tables\Columns\TextColumn::make('keterangan_petugas'),
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
            // ->headerActions([
            // Tables\Actions\CreateAction::make()
            // ->label('Buat Laporan Baru')
            // ->model(Lapor::class)
            // ->form([
            //     DateTimePicker::make('tgl_laporan')
            //         ->default(Carbon::now())
            //         ->timezone('Asia/Jakarta')
            //         ->readOnly()
            //         ->required(),

            //     TextInput::make('no_tiket')
            //         ->prefixIcon('heroicon-o-ticket')
            //         ->label('No Tiket')
            //         ->hint('Harap Dicatat Untuk Cek Status Laporan!')
            //         ->hintColor('danger')
            //         ->default(function () {
            //             do {
            //                 $noTiket = strtoupper(Carbon::now()->format('ymd') . Str::random(3));
            //             } while (Lapor::where('no_tiket', $noTiket)->exists());
            //             return $noTiket;
            //         })
            //         ->readOnly(),

            //     TextInput::make('nama_pelapor')
            //         ->label('Nama Lengkap')
            //         ->required()
            //         ->maxLength(255),

            //     Select::make('opd_id')
            //         ->label('OPD')
            //         ->options(Opd::pluck('nama', 'id'))
            //         ->searchable()
            //         ->preload()
            //         ->required()
            //         ->live(),

            //     Select::make('jenis_laporan')
            //         ->options([
            //             'Laporan Gangguan' => 'Laporan Gangguan',
            //             'Koordinasi Teknis' => 'Koordinasi Teknis',
            //         ])
            //         ->default('Laporan Gangguan')
            //         ->required(),

            //     Textarea::make('uraian_laporan')
            //         ->label('Uraian Laporan')
            //         ->required()
            //         ->rows(5),

            //     FileUpload::make('file_laporan')
            //         ->label('Lampiran')
            //         ->directory('public/laporan')
            //         ->maxSize(5120)
            //         ->acceptedFileTypes(['application/pdf', 'image/*']),
            // ])
            // ->mutateFormDataUsing(function (array $data): array {
            //     do {
            //         $noTiket = strtoupper(Carbon::now()->format('ymd') . Str::random(3));
            //     } while (Lapor::where('no_tiket', $noTiket)->exists());
            //     $data['no_tiket'] = $noTiket;
            //     $data['status_laporan'] = 'Belum Diproses';
            //     $data['keterangan_petugas'] = 'Belum ada keterangan';
            //     return $data;
            // })
            // ->successNotification(
            //     Notification::make()
            //         ->title('Laporan Berhasil Dibuat')
            //         ->body(fn(Lapor $record) => "Laporan baru dengan nomor tiket {$record->no_tiket} telah diterima ke sistem")
            //         ->icon('heroicon-o-check-circle')
            //         ->iconColor('success')
            //         ->duration(5000)
            //         ->persistent()
            //         ->actions([
            //             \Filament\Notifications\Actions\Action::make('view')
            //                 ->label('Lihat Laporan')
            //                 ->url(fn(Lapor $record): string => route('list.laporan')) // Assuming 'list.laporan' is the correct route name
            //                 ->button()
            //         ])
            // )
            // ->failureNotification(
            //     Notification::make()
            //         ->danger()
            //         ->title('Gagal Membuat Laporan')
            //         ->body('Terjadi kesalahan saat membuat laporan. Nomor tiket mungkin sudah ada atau ada kesalahan lain.')
            // )
            // ])
            ->emptyStateHeading('Belum Ada Laporan')
            ->emptyStateIcon('heroicon-m-chat-bubble-left-right');
    }

    public function render()
    {
        $totalLaporan = Lapor::count();
        $laporans = \App\Models\Lapor::with('opd')->latest()->paginate(10);

        return view('livewire.list-laporan', [
            'totalLaporan' => $totalLaporan,
            'laporans' => $laporans
        ]);
    }
}
