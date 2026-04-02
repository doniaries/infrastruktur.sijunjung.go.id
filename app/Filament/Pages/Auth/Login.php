<?php

namespace App\Filament\Pages\Auth;

use Filament\Forms\Form;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Component;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Pages\Auth\Login as BaseLogin;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;
use Filament\Http\Responses\Auth\Contracts\LoginResponse;

class Login extends BaseLogin
{
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                $this->getEmailFormComponent(),
                $this->getPasswordFormComponent(),
                $this->getRememberFormComponent(),
            ])
            ->statePath('data');
    }

    protected function getEmailFormComponent(): Component
    {
        return TextInput::make('email')
            ->label(__('filament-panels::pages/auth/login.form.email.label'))
            ->email()
            ->required()
            ->autocomplete()
            ->autofocus()
            ->extraInputAttributes(['tabindex' => 1]);
    }

    protected function getPasswordFormComponent(): Component
    {
        return TextInput::make('password')
            ->label(__('filament-panels::pages/auth/login.form.password.label'))
            ->password()
            ->revealable()
            ->required()
            ->extraInputAttributes(['tabindex' => 2]);
    }

    protected function getRememberFormComponent(): Component
    {
        return \Filament\Forms\Components\Checkbox::make('remember')
            ->label(__('filament-panels::pages/auth/login.form.remember.label'));
    }

    public function authenticate(): ?LoginResponse
    {
        $data = $this->form->getState();
        $request = request();
        
        // Ambil konfigurasi rate limiting dari .env atau default (15 percobaan)
        $maxAttempts = (int) config('rate-limiting.login.max_attempts', 15);
        $decayMinutes = (int) config('rate-limiting.login.decay_minutes', 1);
        
        // Key throttle berdasarkan email dan IP
        $throttleKey = 'login:' . $data['email'] . '|' . $request->ip();
        
        try {
            // Cek jika sudah terlalu banyak percobaan
            if (RateLimiter::tooManyAttempts($throttleKey, $maxAttempts)) {
                $seconds = RateLimiter::availableIn($throttleKey);
                
                throw ValidationException::withMessages([
                    'data.email' => "Terlalu banyak percobaan login. Silakan coba lagi dalam {$seconds} detik.",
                ]);
            }
            
            // Proses Autentikasi
            if (!\Filament\Facades\Filament::auth()->attempt([
                'email' => $data['email'],
                'password' => $data['password'],
            ], $data['remember'] ?? false)) {
                
                // Catat kegagalan
                RateLimiter::hit($throttleKey, $decayMinutes * 60);
                
                $attempts = RateLimiter::attempts($throttleKey);
                $remainingAttempts = $maxAttempts - $attempts;
                
                if ($remainingAttempts > 0) {
                    throw ValidationException::withMessages([
                        'data.email' => __('filament-panels::pages/auth/login.messages.failed') . " Sisa percobaan: {$remainingAttempts}",
                    ]);
                }
                
                throw ValidationException::withMessages([
                    'data.email' => "Terlalu banyak percobaan login. Akun Anda ditangguhkan sementara selama {$decayMinutes} menit.",
                ]);
            }
            
            // Hapus data rate limiter jika login berhasil
            RateLimiter::clear($throttleKey);
            
            // Regenerate session
            $request->session()->regenerate();
            
            return app(LoginResponse::class);
            
        } catch (ValidationException $e) {
            $message = $e->validator->errors()->first('data.email');
            
            if (str_contains($message, 'Terlalu banyak') || str_contains($message, 'ditangguhkan')) {
                Notification::make()
                    ->title('Akses Dibatasi')
                    ->body($message)
                    ->danger()
                    ->persistent()
                    ->send();
            } else {
                Notification::make()
                    ->title('Login Gagal')
                    ->body($message)
                    ->warning()
                    ->send();
            }
            
            throw $e;
        }
    }
}
