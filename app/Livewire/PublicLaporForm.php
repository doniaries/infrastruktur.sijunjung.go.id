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
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Actions;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
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
        $schema = [];

        if (!auth()->check()) {
            $schema = [
                \Filament\Forms\Components\Wizard::make([
                    \Filament\Forms\Components\Wizard\Step::make('Data Pelapor')
                        ->schema([
                            TextInput::make('nama_pelapor')
                                ->label('Nama Lengkap')
                                ->required()
                                ->maxLength(255)
                                ->placeholder('Masukkan nama lengkap'),
                            TextInput::make('nomor_kontak')
                                ->tel()
                                ->minLength(5)
                                ->maxLength(15)
                                ->required()
                                ->unique('users', 'no_kontak')
                                ->placeholder('Contoh: 081234567890'),
                            TextInput::make('nip')
                                ->label('NIP')
                                ->required()
                                ->unique('users', 'nip')
                                ->placeholder('Masukkan NIP Anda'),
                        ]),
                    \Filament\Forms\Components\Wizard\Step::make('Informasi Tiket')
                        ->schema($this->getInformasiTiketSchema()),
                    \Filament\Forms\Components\Wizard\Step::make('Detail Laporan')
                        ->schema($this->getDetailLaporanSchema()),
                ])
                ->submitAction(new \Illuminate\Support\HtmlString('<button type="submit" class="px-6 py-2.5 rounded-lg bg-blue-600 text-white hover:bg-blue-700 font-medium transition-colors w-auto shadow-sm">Kirim Laporan</button>'))
            ];
        } else {
            // Already logged in, no Wizard for data pelapor needed
            $schema = [
                Section::make('Informasi Tiket')
                    ->schema($this->getInformasiTiketSchema()),
                Section::make('Detail Laporan')
                    ->schema($this->getDetailLaporanSchema())
            ];
        }

        return $form
            ->schema($schema)
            ->statePath('data');
    }

    protected function getInformasiTiketSchema(): array
    {
        return [
            DateTimePicker::make('tgl_laporan')
                ->label('Tanggal Tiket')
                ->default(Carbon::now())
                ->timezone('Asia/Jakarta')
                ->readOnly()
                ->required()
                ->helperText('Otomatis sesuai zona Asia/Jakarta')
                ->columnSpanFull(),

            TextInput::make('no_tiket')
                ->prefixIcon('heroicon-o-ticket')
                ->label('Nomor Tiket')
                ->hint('Catat atau gunakan tombol salin untuk menyimpan')
                ->hintColor('danger')
                ->default(function () {
                    do {
                        $noTiket = strtoupper(Carbon::now()->format('ymd') . Str::random(3));
                    } while (Lapor::where('no_tiket', $noTiket)->exists());
                    return $noTiket;
                })
                ->readOnly()
                ->helperText('Klik ikon untuk menyalin ke clipboard')
                ->extraAttributes(['x-ref' => 'no_tiket'])
                ->columnSpanFull()
                ->suffixActions([
                    Action::make('copy_no_tiket')
                        ->label('Salin')
                        ->icon('heroicon-m-clipboard')
                        ->tooltip('Salin kode tiket')
                        ->color('primary')
                        ->iconButton()
                        ->extraAttributes([
                            'title' => 'Salin kode tiket',
                            'x-on:click.prevent' => 'navigator.clipboard.writeText($refs.no_tiket?.value || ""); $wire.copyNoTiket()',
                        ]),
                ]),
        ];
    }

    protected function getDetailLaporanSchema(): array
    {
        return [
            Select::make('opd_id')
                ->label('OPD Tujuan')
                ->options(Opd::pluck('nama', 'id'))
                ->searchable()
                ->preload()
                ->required()
                ->live()
                ->helperText('Pilih OPD terkait laporan')
                ->columnSpanFull(),

            Select::make('jenis_laporan')
                ->options([
                    'Laporan Gangguan' => 'Laporan Gangguan',
                    'Koordinasi Teknis' => 'Koordinasi Teknis',
                    'Kenaikan Bandwidth' => 'Kenaikan Bandwidth',
                ])
                ->default('Laporan Gangguan')
                ->required()
                ->live()
                ->helperText('Pilih jenis layanan')
                ->columnSpanFull(),

            Textarea::make('uraian_laporan')
                ->label('Uraian Laporan')
                ->required()
                ->rows(5)
                ->placeholder('Jelaskan masalah atau kebutuhan secara ringkas dan jelas')
                ->columnSpanFull(),

            FileUpload::make('foto_laporan')
                ->label('Foto Laporan')
                ->directory('public/foto_laporan')
                ->maxSize(5120)
                ->acceptedFileTypes(['application/pdf', 'image/*'])
                ->visible(fn(callable $get) => $get('jenis_laporan') === 'Laporan Gangguan')
                ->columnSpanFull(),

            FileUpload::make('file_laporan')
                ->label('Lampiran')
                ->directory('public/laporan')
                ->maxSize(5120)
                ->acceptedFileTypes(['application/pdf', 'image/*'])
                ->visible(fn(callable $get) => $get('jenis_laporan') === 'Kenaikan Bandwidth')
                ->columnSpanFull(),

            CaptchaField::make('captcha')
                ->columnSpanFull(),
        ];
    }

    public function submit()
    {
        $data = $this->form->getState();

        if (empty($data['opd_id']) || empty($data['uraian_laporan'])) {
            Notification::make()
                ->danger()
                ->title('Validasi Gagal')
                ->body('Silakan isi semua field yang diperlukan')
                ->duration(3000)
                ->send();
            return;
        }

        // Handle unauthenticated users
        if (!auth()->check()) {
            // Register new user
            try {
                $user = \App\Models\User::create([
                    'name' => $data['nama_pelapor'],
                    'no_kontak' => $data['nomor_kontak'],
                    'nip' => $data['nip'],
                    'email' => $data['nomor_kontak'] . '@pelapor.local',
                    'password' => bcrypt($data['nomor_kontak']),
                ]);
                $user->assignRole('pelapor');
                
                auth()->login($user);
            } catch (\Exception $e) {
                Notification::make()
                    ->danger()
                    ->title('Gagal Mendaftar')
                    ->body('Terdapat kesalahan saat mendaftarkan akun Anda. Pastikan NIP dan Nomor Kontak unik.')
                    ->duration(3000)
                    ->send();
                return;
            }
        }

        try {
            $lapor = Lapor::create([
                'user_id' => auth()->id(),
                'no_tiket' => $data['no_tiket'],
                'opd_id' => $data['opd_id'],
                'jenis_laporan' => $data['jenis_laporan'],
                'uraian_laporan' => $data['uraian_laporan'],
                'foto_laporan' => $data['foto_laporan'] ?? null,
                'file_laporan' => $data['file_laporan'] ?? null,
                'status_laporan' => \App\Enums\StatusLaporan::BELUM_DIPROSES->value,
                'keterangan_petugas' => 'Belum ada',
                'tgl_laporan' => $data['tgl_laporan'],
            ]);

            Notification::make()
                ->success()
                ->title('Laporan Berhasil Dikirim')
                ->body("Nomor tiket Anda: {$lapor->no_tiket}")
                ->duration(3000)
                ->send();

            $this->form->fill(); 

            // Redirect ke halaman daftar laporan publik
            return redirect()->to('/list-laporan');
        } catch (\Exception $e) {
            Notification::make()
                ->danger()
                ->title('Gagal Mengirim Laporan')
                ->body('Terjadi kesalahan yang tidak diketahui. Silakan coba lagi.')
                ->duration(3000)
                ->send();
        }
    }

    public function copyNoTiket(): void
    {
        Notification::make()
            ->success()
            ->title('Kode tiket telah disalin')
            ->body('Kode tiket berhasil disalin ke clipboard')
            ->duration(3000)
            ->send();
    }

    public function render(): View
    {
        return view('livewire.public-lapor-form');
    }
}
