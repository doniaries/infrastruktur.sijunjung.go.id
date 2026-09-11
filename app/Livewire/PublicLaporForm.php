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
        $steps = [];

        if (!auth()->check()) {
            $steps[] = \Filament\Forms\Components\Wizard\Step::make('Data Pelapor')
                ->description('Identitas pelapor')
                ->columns(1)
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
                ]);
        }

        $steps[] = \Filament\Forms\Components\Wizard\Step::make('Detail Laporan')
            ->description('Informasi tiket dan masalah')
            ->columns(1)
            ->schema(array_merge($this->getInformasiTiketSchema(), $this->getDetailLaporanSchema()));

        return $form
            ->schema([
                \Filament\Forms\Components\Wizard::make($steps)
                    ->submitAction(new \Illuminate\Support\HtmlString('<button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 font-semibold shadow-md transition-colors">Kirim Laporan</button>'))
            ])
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
                ->helperText('Otomatis sesuai zona Asia/Jakarta'),

            TextInput::make('no_tiket')
                ->prefixIcon('heroicon-o-ticket')
                ->label('Nomor Tiket')
                ->hint('Catat atau salin untuk menyimpan')
                ->hintColor('danger')
                ->default(function () {
                    do {
                        $noTiket = strtoupper(Carbon::now()->format('ymd') . Str::random(3));
                    } while (Lapor::where('no_tiket', $noTiket)->exists());
                    return $noTiket;
                })
                ->readOnly()
                ->helperText('Klik ikon untuk menyalin')
                ->extraAttributes(['x-ref' => 'no_tiket'])
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
                ->helperText('Pilih OPD terkait'),

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
                ->rows(4)
                ->placeholder('Jelaskan masalah secara ringkas'),

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
                    ->body('Terdapat kesalahan saat mendaftarkan akun. Pastikan NIP dan Nomor Kontak belum terdaftar.')
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
