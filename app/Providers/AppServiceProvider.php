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
use App\Observers\CacheObserver;
use App\Models\{Bts, Jorong, Nagari, Lapor, Operator, Kecamatan, Opd};
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;

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
        // Register cache observers
        Bts::observe(CacheObserver::class);
        Jorong::observe(CacheObserver::class);
        Nagari::observe(CacheObserver::class);
        Lapor::observe(CacheObserver::class);
        Operator::observe(CacheObserver::class);
        Kecamatan::observe(CacheObserver::class);
        Opd::observe(CacheObserver::class);

        Filament::serving(function () {
            app()->setLocale('id');
        });

        // Konfigurasi notifikasi agar lebih fleksibel
        // Posisi horizontal: Start (kiri), Center (tengah), End (kanan)
        Notifications::alignment(Alignment::End);

        // Posisi vertikal: Start (atas), Center (tengah), End (bawah)
        Notifications::verticalAlignment(VerticalAlignment::End);
        
        // Configure rate limiting
        $this->configureRateLimiting();

        // Opsional: Konfigurasi tampilan notifikasi
        Notification::configureUsing(function (Notification $notification): void {
            $notification->duration(5000); // Durasi tampilan 5 detik
        });

        Filament::registerRenderHook(
            'auth.login.before',
            fn(): string => view('components.auth.error-message')->render()
        );
    }
    
    /**
     * Configure rate limiting for the application.
     */
    protected function configureRateLimiting(): void
    {
        // Configure rate limiting for login attempts
        RateLimiter::for('login', function (Request $request) {
            $email = (string) $request->email;
            $config = config('rate-limiting.login');
            
            return Limit::perMinute($config['max_attempts'])->by($email.$request->ip())
                ->response(function (Request $request, array $headers) use ($config) {
                    $message = str_replace(':seconds', $config['lockout_duration'], config('rate-limiting.messages.login_throttled'));
                    return response($message, 429, $headers);
                });
        });
        
        // Configure global rate limiting
        RateLimiter::for('global', function (Request $request) {
            $config = config('rate-limiting.global');
            return Limit::perMinute($config['max_attempts'])->by($request->user()?->id ?: $request->ip());
        });
        
        // Configure API rate limiting
        RateLimiter::for('api', function (Request $request) {
            $config = config('rate-limiting.api');
            return Limit::perMinute($config['max_attempts'])->by($request->user()?->id ?: $request->ip());
        });
    }
}
