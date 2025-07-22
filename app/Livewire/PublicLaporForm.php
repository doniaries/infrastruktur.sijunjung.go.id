<?php

namespace App\Livewire;

use App\Models\Lapor;
use App\Models\Opd;
use Carbon\Carbon;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Actions\Action;
use Filament\Notifications\Notification;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use MarcoGermani87\FilamentCaptcha\Forms\Components\CaptchaField;

class PublicLaporForm extends Component implements HasForms
{
    use InteractsWithForms;
    use WithFileUploads;

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Form Pengaduan')
                    ->columnSpanFull()
                    ->description('Silakan isi form pengaduan di bawah ini')
                    ->schema([
                        DateTimePicker::make('tgl_laporan')
                            ->default(Carbon::now())
                            ->timezone('Asia/Jakarta')
                            ->readOnly()
                            ->required(),

                        TextInput::make('no_tiket')
                            ->prefixIcon('heroicon-o-ticket')
                            ->label('No Tiket')
                            ->hint('Nomor Tiket Harap Dicatat Untuk Cek Status Laporan!')
                            ->hintColor('danger')
                            ->default(function () {
                                do {
                                    $noTiket = strtoupper(Carbon::now()->format('ymd') . Str::random(3));
                                } while (Lapor::where('no_tiket', $noTiket)->exists());
                                return $noTiket;
                            })
                            ->readOnly(),

                        TextInput::make('nama_pelapor')
                            ->label('Nama Lengkap')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('nomor_kontak')
                            ->tel()
                            ->minLength(5)
                            ->maxLength(15)
                            ->unique(ignoreRecord: true)
                            ->required(),

                        Select::make('opd_id')
                            ->label('OPD')
                            ->options(Opd::pluck('nama', 'id'))
                            ->searchable()
                            ->preload()
                            ->required()
                            ->live(),

                        Select::make('jenis_laporan')
                            ->options([
                                'Laporan Gangguan' => 'Laporan Gangguan',
                                'Koordinasi Teknis' => 'Koordinasi Teknis',
                                'Kenaikan Bandwidth' => 'Kenaikan Bandwidth',
                            ])
                            ->default('Laporan Gangguan')
                            ->required()
                            ->live(),

                        Textarea::make('uraian_laporan')
                            ->label('Uraian Laporan')
                            ->required()
                            ->rows(5),
                        FileUpload::make('foto_laporan')
                            ->label('Foto Laporan')
                            ->directory('public/foto_laporan')
                            ->maxSize(5120)
                            ->acceptedFileTypes(['application/pdf', 'image/*'])
                            ->visible(fn(callable $get) => $get('jenis_laporan') === 'Laporan Gangguan'),
                        FileUpload::make('file_laporan')
                            ->label('Lampiran')
                            ->directory('public/laporan')
                            ->maxSize(5120)
                            ->acceptedFileTypes(['application/pdf', 'image/*'])
                            ->visible(fn(callable $get) => $get('jenis_laporan') === 'Kenaikan Bandwidth'),
                        CaptchaField::make('captcha'),
                    ])
                    ->columns(2)
            ])
            ->statePath('data');
    }

    public function submit()
    {
        // Validasi form terlebih dahulu
        $data = $this->form->getState();

        // Pastikan semua field yang diperlukan sudah diisi
        if (empty($data['nama_pelapor']) || empty($data['opd_id']) || empty($data['uraian_laporan'])) {
            Notification::make()
                ->danger()
                ->title('Validasi Gagal')
                ->body('Silakan isi semua field yang diperlukan')
                ->duration(3000)
                ->send();
            return;
        }

        // Ensure no_tiket is unique before creating the record
        do {
            $noTiket = strtoupper(Carbon::now()->format('ymd') . Str::random(3));
        } while (Lapor::where('no_tiket', $noTiket)->exists());

        $data['no_tiket'] = $noTiket; // Add the generated ticket number to the data

        try {
            $lapor = Lapor::create([
                ...$data,
                'status_laporan' => 'Belum Diproses',
                'keterangan_petugas' => 'Belum ada',
            ]);

            Notification::make()
                ->success()
                ->title('Laporan Berhasil Dikirim')
                ->body("Nomor tiket Anda: {$lapor->no_tiket}")
                ->duration(3000)
                ->send();

            $this->form->fill(); // Reset form after successful submission

            // Redirect ke halaman list-laporan setelah berhasil submit
            return redirect()->to('/list-laporan');
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->errorInfo[1] == 1062) { // Check for duplicate entry error code
                Notification::make()
                    ->danger()
                    ->title('Gagal Mengirim Laporan')
                    ->body('Nomor tiket sudah ada atau terjadi kesalahan. Silakan coba lagi.')
                    ->duration(3000)
                    ->send();
            } else {
                Notification::make()
                    ->danger()
                    ->title('Gagal Mengirim Laporan')
                    ->body('Terjadi kesalahan pada sistem. Silakan coba lagi nanti.')
                    ->duration(3000)
                    ->send();
            }
        } catch (\Exception $e) {
            Notification::make()
                ->danger()
                ->title('Gagal Mengirim Laporan')
                ->body('Terjadi kesalahan yang tidak diketahui. Silakan coba lagi.')
                ->duration(3000)
                ->send();
        }
    }

    public function render(): View
    {
        return view('livewire.public-lapor-form');
    }
}
