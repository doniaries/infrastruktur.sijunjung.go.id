<?php

namespace App\Filament\Pages\Auth;

use App\Models\Opd;
use App\Models\User;
use Filament\Forms\Components\Component;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\Auth\Register as BaseRegister;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Filament\Http\Responses\Auth\Contracts\RegistrationResponse;

class Register extends BaseRegister
{
    public function getHeading(): string | Htmlable
    {
        return 'Registrasi Akun ASN';
    }

    public function getSubheading(): string | Htmlable | null
    {
        return 'Khusus Aparatur Sipil Negara (ASN) di Lingkungan Pemerintah Kabupaten Sijunjung';
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                $this->getNameFormComponent(),
                $this->getNipFormComponent(),
                $this->getOpdFormComponent(),
                $this->getNoKontakFormComponent(),
                $this->getEmailFormComponent(),
                $this->getPasswordFormComponent(),
                $this->getPasswordConfirmationFormComponent(),
            ])
            ->statePath('data');
    }

    protected function getNameFormComponent(): Component
    {
        return TextInput::make('name')
            ->label('Nama Lengkap')
            ->placeholder('Nama Lengkap ASN beserta Gelar')
            ->required()
            ->maxLength(255)
            ->autofocus()
            ->prefixIcon('heroicon-m-user');
    }

    protected function getNipFormComponent(): Component
    {
        return TextInput::make('nip')
            ->label('Nomor Induk Pegawai (NIP)')
            ->placeholder('19820414 200212 1 003')
            ->mask('99999999 999999 9 999')
            ->required()
            ->rule('regex:/^([0-9]{8}\s[0-9]{6}\s[0-9]{1}\s[0-9]{3}|[0-9]{18})$/')
            ->unique($this->getUserModel(), 'nip')
            ->prefixIcon('heroicon-m-identification')
            ->helperText('Format: 19820414 200212 1 003 (Otomatis diformat)')
            ->dehydrateStateUsing(fn ($state) => User::formatNip($state))
            ->validationMessages([
                'required' => 'NIP wajib diisi.',
                'regex' => 'Format NIP harus 18 digit angka (contoh: 19820414 200212 1 003).',
                'unique' => 'NIP sudah terdaftar.',
            ]);
    }

    protected function getOpdFormComponent(): Component
    {
        return Select::make('opd_id')
            ->label('Asal Perangkat Daerah (OPD)')
            ->placeholder('Pilih Asal OPD')
            ->options(fn () => Opd::query()->orderBy('nama')->pluck('nama', 'id'))
            ->searchable()
            ->preload()
            ->required()
            ->prefixIcon('heroicon-m-building-office')
            ->validationMessages([
                'required' => 'Asal OPD wajib dipilih.',
            ]);
    }

    protected function getNoKontakFormComponent(): Component
    {
        return TextInput::make('no_kontak')
            ->label('Nomor Kontak / WhatsApp')
            ->placeholder('81234567890 atau 081234567890')
            ->prefix('+62')
            ->tel()
            ->required()
            ->rule('regex:/^(\+?62|0)?8[0-9]{8,12}$/')
            ->unique($this->getUserModel(), 'no_kontak')
            ->prefixIcon('heroicon-m-phone')
            ->helperText('Otomatis tersimpan dalam format +62 untuk WhatsApp.')
            ->dehydrateStateUsing(fn ($state) => User::formatNomorKontak($state))
            ->validationMessages([
                'required' => 'Nomor kontak / WhatsApp wajib diisi.',
                'regex' => 'Format nomor tidak valid (contoh: 081234567890 atau 81234567890).',
                'unique' => 'Nomor kontak sudah terdaftar.',
            ]);
    }

    protected function getEmailFormComponent(): Component
    {
        return TextInput::make('email')
            ->label('Alamat Email')
            ->placeholder('email@sijunjung.go.id atau email aktif')
            ->email()
            ->required()
            ->maxLength(255)
            ->unique($this->getUserModel(), 'email')
            ->prefixIcon('heroicon-m-envelope')
            ->validationMessages([
                'required' => 'Email wajib diisi.',
                'email' => 'Format email tidak valid.',
                'unique' => 'Email sudah terdaftar.',
            ]);
    }

    protected function getPasswordFormComponent(): Component
    {
        return parent::getPasswordFormComponent()
            ->prefixIcon('heroicon-m-lock-closed')
            ->placeholder('Minimal 8 karakter');
    }

    protected function getPasswordConfirmationFormComponent(): Component
    {
        return parent::getPasswordConfirmationFormComponent()
            ->prefixIcon('heroicon-m-lock-closed')
            ->placeholder('Ulangi password');
    }

    protected function handleRegistration(array $data): Model
    {
        $user = $this->getUserModel()::create($data);

        if (method_exists($user, 'assignRole')) {
            $user->assignRole('pengguna');
        }

        return $user;
    }

    public function register(): ?RegistrationResponse
    {
        $response = parent::register();

        if (Auth::user()?->hasAnyRole(['pengguna', 'pelapor'])) {
            $this->redirect('/list-laporan');
            return null;
        }

        return $response;
    }
}
