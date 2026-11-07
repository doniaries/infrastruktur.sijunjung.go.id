<?php

namespace App\Filament\Pages\Auth;

use App\Models\Opd;
use Filament\Forms\Components\Component;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\Auth\Register as BaseRegister;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Model;

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
            ->placeholder('18 digit NIP')
            ->required()
            ->numeric()
            ->rule('digits:18')
            ->unique($this->getUserModel(), 'nip')
            ->prefixIcon('heroicon-m-identification')
            ->helperText('Registrasi khusus ASN. Masukkan 18 digit NIP resmi.')
            ->validationMessages([
                'required' => 'NIP wajib diisi.',
                'numeric' => 'NIP harus berupa angka.',
                'digits' => 'NIP harus terdiri dari 18 digit angka.',
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
            ->placeholder('Contoh: 081234567890')
            ->tel()
            ->required()
            ->numeric()
            ->rule('digits_between:10,15')
            ->unique($this->getUserModel(), 'no_kontak')
            ->prefixIcon('heroicon-m-phone')
            ->validationMessages([
                'required' => 'Nomor kontak wajib diisi.',
                'numeric' => 'Nomor kontak harus berupa angka.',
                'digits_between' => 'Nomor kontak minimal 10 digit dan maksimal 15 digit.',
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
}

