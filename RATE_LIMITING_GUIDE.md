# Rate Limiting Implementation Guide

## Overview

Fitur rate limiting telah diimplementasikan untuk melindungi aplikasi dari serangan brute force dan abuse. Sistem ini membatasi jumlah percobaan login dan request yang dapat dilakukan dalam periode waktu tertentu.

## Features

### 1. Login Rate Limiting
- **Maksimal Percobaan**: 5 percobaan per menit per kombinasi email + IP address
- **Lockout Duration**: 60 detik setelah batas tercapai
- **Custom Login Page**: Implementasi khusus dengan notifikasi yang user-friendly

### 2. Global Rate Limiting
- **Maksimal Request**: 1000 request per menit per user/IP
- **Scope**: Semua request ke aplikasi

### 3. API Rate Limiting
- **Maksimal Request**: 60 request per menit per user/IP
- **Scope**: Khusus untuk endpoint API

## Configuration

### Environment Variables

Tambahkan konfigurasi berikut ke file `.env`:

```env
# Rate Limiting Configuration
LOGIN_MAX_ATTEMPTS=5
LOGIN_DECAY_MINUTES=1
LOGIN_LOCKOUT_DURATION=60
GLOBAL_MAX_ATTEMPTS=1000
GLOBAL_DECAY_MINUTES=1
API_MAX_ATTEMPTS=60
API_DECAY_MINUTES=1
RATE_LIMIT_CACHE_STORE=database
```

### Configuration File

Konfigurasi rate limiting dapat diubah melalui file `config/rate-limiting.php`:

```php
return [
    'login' => [
        'max_attempts' => env('LOGIN_MAX_ATTEMPTS', 5),
        'decay_minutes' => env('LOGIN_DECAY_MINUTES', 1),
        'lockout_duration' => env('LOGIN_LOCKOUT_DURATION', 60),
    ],
    // ... konfigurasi lainnya
];
```

## Implementation Details

### 1. Bootstrap Configuration

Rate limiting dikonfigurasi di `bootstrap/app.php` menggunakan Laravel's RateLimiter facade:

```php
RateLimiter::for('login', function (Request $request) {
    $email = (string) $request->email;
    $config = config('rate-limiting.login');
    
    return Limit::perMinute($config['max_attempts'])->by($email.$request->ip())
        ->response(function (Request $request, array $headers) use ($config) {
            $message = str_replace(':seconds', $config['lockout_duration'], 
                config('rate-limiting.messages.login_throttled'));
            return response($message, 429, $headers);
        });
});
```

### 2. Custom Login Page

Custom login page di `app/Filament/Pages/Auth/Login.php` dengan fitur:
- Rate limiting check sebelum authentication
- Notifikasi user-friendly
- Automatic rate limiter clearing pada login sukses

### 3. Middleware

Custom middleware `LoginRateLimiter` di `app/Http/Middleware/LoginRateLimiter.php` untuk handling rate limiting pada level middleware.

### 4. Filament Integration

Integrasi dengan Filament Admin Panel melalui `AdminPanelProvider`:
- Custom login page registration
- Throttle middleware pada middleware stack

## Usage Examples

### Manual Rate Limiting Check

```php
use Illuminate\Support\Facades\RateLimiter;

// Check if too many attempts
if (RateLimiter::tooManyAttempts('login:user@example.com|127.0.0.1', 5)) {
    $seconds = RateLimiter::availableIn('login:user@example.com|127.0.0.1');
    // Handle rate limit exceeded
}

// Hit the rate limiter
RateLimiter::hit('login:user@example.com|127.0.0.1', 60);

// Clear rate limiter
RateLimiter::clear('login:user@example.com|127.0.0.1');
```

### Route-Level Rate Limiting

```php
// Untuk route khusus
Route::middleware(['throttle:login'])->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
});
```

## Security Benefits

1. **Brute Force Protection**: Mencegah serangan brute force pada login
2. **DoS Protection**: Melindungi dari serangan Denial of Service
3. **Resource Management**: Mengontrol penggunaan resource server
4. **User Experience**: Memberikan feedback yang jelas kepada user

## Monitoring

### Log Monitoring

Rate limiting events dapat dimonitor melalui Laravel logs:

```php
// Custom logging untuk rate limiting
Log::warning('Rate limit exceeded', [
    'ip' => $request->ip(),
    'email' => $request->input('email'),
    'attempts' => $attempts,
]);
```

### Cache Monitoring

Rate limiting data disimpan di cache, dapat dimonitor melalui:

```bash
# Untuk Redis
redis-cli keys "*rate_limit*"

# Untuk Database cache
SELECT * FROM cache WHERE key LIKE '%rate_limit%';
```

## Troubleshooting

### Common Issues

1. **Rate limit tidak bekerja**
   - Pastikan cache driver dikonfigurasi dengan benar
   - Periksa konfigurasi di `config/rate-limiting.php`

2. **User terkunci terlalu lama**
   - Sesuaikan `LOGIN_LOCKOUT_DURATION` di `.env`
   - Clear cache secara manual jika diperlukan

3. **Rate limit terlalu ketat**
   - Sesuaikan `LOGIN_MAX_ATTEMPTS` di `.env`
   - Pertimbangkan untuk menggunakan decay time yang lebih pendek

### Manual Reset

```php
// Reset rate limiter untuk user tertentu
RateLimiter::clear('login:user@example.com|127.0.0.1');

// Reset semua rate limiters (hati-hati!)
Cache::flush();
```

## Best Practices

1. **Monitor Logs**: Selalu monitor log untuk pattern serangan
2. **Adjust Limits**: Sesuaikan limit berdasarkan traffic normal
3. **User Communication**: Berikan pesan error yang jelas dan helpful
4. **Whitelist**: Pertimbangkan whitelist untuk IP internal
5. **Backup Strategy**: Siapkan strategi backup jika rate limiting terlalu agresif

## Testing

### Unit Testing

```php
public function test_login_rate_limiting()
{
    // Test rate limiting functionality
    for ($i = 0; $i < 6; $i++) {
        $response = $this->post('/admin/login', [
            'email' => 'test@example.com',
            'password' => 'wrong-password'
        ]);
    }
    
    $this->assertEquals(429, $response->getStatusCode());
}
```

### Manual Testing

1. Coba login dengan password salah 5 kali
2. Pastikan mendapat error rate limiting pada percobaan ke-6
3. Tunggu 60 detik dan coba lagi
4. Pastikan bisa login kembali setelah lockout period

## Conclusion

Implementasi rate limiting ini memberikan perlindungan komprehensif terhadap berbagai jenis serangan sambil tetap mempertahankan user experience yang baik. Konfigurasi yang fleksibel memungkinkan penyesuaian sesuai kebutuhan aplikasi.