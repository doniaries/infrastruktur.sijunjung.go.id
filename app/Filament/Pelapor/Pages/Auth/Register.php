<?php

namespace App\Filament\Pelapor\Pages\Auth;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\Auth\Register as BaseRegister;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;

class Register extends BaseRegister
{
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                $this->getNameFormComponent()
                    ->unique(table: 'users', column: 'name')
                    ->validationMessages([
                        'unique' => 'Nama ini sudah terdaftar, silakan gunakan nama lain atau tambahkan angka di belakangnya.',
                    ]),
                $this->getEmailFormComponent(),
                TextInput::make('no_kontak')
                    ->label('Nomor Kontak (WhatsApp)')
                    ->required()
                    ->unique(table: 'users', column: 'no_kontak')
                    ->tel()
                    ->maxLength(20),
                TextInput::make('nip')
                    ->label('NIP / NIK')
                    ->required()
                    ->unique(table: 'users', column: 'nip')
                    ->maxLength(50),
                $this->getPasswordFormComponent(),
                $this->getPasswordConfirmationFormComponent(),
            ])
            ->statePath('data');
    }

    protected function handleRegistration(array $data): Model
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'no_kontak' => $data['no_kontak'],
            'nip' => $data['nip'],
            'is_active' => true,
        ]);

        // Ensure the 'pelapor' role exists
        $role = Role::firstOrCreate(['name' => 'pelapor', 'guard_name' => 'web']);
        
        $user->assignRole($role);

        return $user;
    }
}
