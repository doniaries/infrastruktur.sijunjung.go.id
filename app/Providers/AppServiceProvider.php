<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Illuminate\Support\ServiceProvider;
use App\Http\Responses\LogoutResponse;
use Filament\Http\Responses\Auth\Contracts\LogoutResponse as LogoutResponseContract;
use Filament\Notifications\Livewire\Notifications;
use Filament\Support\Enums\Alignment;
use Filament\Support\Enums\VerticalAlignment;
use Filament\Notifications\Notification;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // $this->app->bind(LogoutResponseContract::class, LogoutResponse::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Filament::serving(function () {
            app()->setLocale('id');
        });

        // Konfigurasi notifikasi agar lebih fleksibel
        // Posisi horizontal: Start (kiri), Center (tengah), End (kanan)
        Notifications::alignment(Alignment::End);

        // Posisi vertikal: Start (atas), Center (tengah), End (bawah)
        Notifications::verticalAlignment(VerticalAlignment::End);

        // Opsional: Konfigurasi tampilan notifikasi
        Notification::configureUsing(function (Notification $notification): void {
            $notification->duration(5000); // Durasi tampilan 5 detik
        });

        Filament::registerRenderHook(
            'auth.login.before',
            fn(): string => view('components.auth.error-message')->render()
        );
    }
}
