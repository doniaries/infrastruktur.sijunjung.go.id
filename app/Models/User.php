<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Filament\Panel;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Traits\HasCachedCount;
use App\Enums\StatusLaporan;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\HasDatabaseNotifications;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements FilamentUser
{
    use HasCachedCount, HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'name',
        'email',
        'password',
        'is_active',
        'no_kontak',
        'nip',
        'opd_id',
    ];


    protected $hidden = [
        'password',
        'remember_token',

    ];



    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_active' => 'boolean',
        ];
    }

    public function laporans()
    {
        return $this->hasMany(Lapor::class, 'user_id');
    }

    public function getActiveLapor(): ?Lapor
    {
        return $this->hasMany(Lapor::class, 'user_id')
            ->whereIn('status_laporan', [
                StatusLaporan::BELUM_DIPROSES,
                StatusLaporan::SEDANG_DIPROSES,
            ])
            ->latest()
            ->first();
    }

    public function hasActiveLapor(): bool
    {
        return $this->getActiveLapor() !== null;
    }

    public function opd(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Opd::class, 'opd_id');
    }

    public static function formatNip(?string $nip): ?string
    {
        if (! $nip) return null;
        $clean = preg_replace('/[^0-9]/', '', $nip);
        if (strlen($clean) === 18) {
            return substr($clean, 0, 8) . ' ' . substr($clean, 8, 6) . ' ' . substr($clean, 14, 1) . ' ' . substr($clean, 15, 3);
        }
        return $nip;
    }

    public static function formatNomorKontak(?string $kontak): ?string
    {
        if (! $kontak) return null;
        $clean = preg_replace('/[^0-9]/', '', $kontak);
        if (str_starts_with($clean, '0')) {
            return '+62' . substr($clean, 1);
        }
        if (str_starts_with($clean, '62')) {
            return '+' . $clean;
        }
        if (str_starts_with($clean, '8')) {
            return '+62' . $clean;
        }
        return '+' . $clean;
    }

    public function setNipAttribute($value): void
    {
        $this->attributes['nip'] = static::formatNip($value);
    }

    public function getNipAttribute($value): ?string
    {
        return static::formatNip($value);
    }

    public function setNoKontakAttribute($value): void
    {
        $this->attributes['no_kontak'] = static::formatNomorKontak($value);
    }



    public function canAccessPanel(Panel $panel): bool
    {
        // User dari OPD / role pengguna / pelapor hanya mengakses dashboard Livewire frontend, tidak masuk ke Filament
        if ($this->hasAnyRole(['pengguna', 'pelapor'])) {
            return false;
        }

        return $this->is_active;
    }

    // Method untuk authorization impersonate
    public function canImpersonate(): bool
    {
        // Hanya super_admin yang bisa melakukan impersonate
        return $this->hasRole('super_admin');
    }

    public function canBeImpersonated(): bool
    {
        // User bisa di-impersonate jika aktif dan bukan super_admin
        return $this->is_active && !$this->hasRole('super_admin');
    }

    // Tambahkan method untuk cek status
    public function isActive(): bool
    {
        return $this->is_active;
    }

    // Method untuk mencegah login jika tidak aktif
    protected static function booted()
    {
        static::creating(function ($user) {
            $user->is_active = true; // Set default ke aktif
        });
    }
}
