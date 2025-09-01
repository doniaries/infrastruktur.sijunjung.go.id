<?php

namespace App\Models;

use App\Enums\StatusLaporan;
use App\Enums\JenisLaporan;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Filament\Resources\LaporResource;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Filament\Notifications\Notification;

class Lapor extends Model
{
    use HasFactory;
    protected $dates = ['tgl_laporan'];

    protected $casts = [
        'status_laporan' => StatusLaporan::class,
        'jenis_laporan' => JenisLaporan::class,
    ];

    protected $fillable = [
        'no_tiket',
        'tgl_laporan',
        'nama_pelapor',
        'nomor_kontak',
        'opd_id',
        'jenis_laporan',
        'uraian_laporan',
        'file_laporan',
        'foto_laporan',
        'status_laporan',
        'petugas_id',
        'keterangan_petugas',
        // 'hasil_laporan',
    ];

    public static function getCount(): int
    {
        return Cache::remember('lapor_count', now()->addMinutes(5), function () {
            return static::count();
        });
    }

    public static function getStatusCounts(): array
    {
        return Cache::remember('lapor_status_counts', now()->addMinutes(5), function () {
            return [
                'all' => static::count(),
                'diterima' => static::where('status_laporan', 'diterima')->count(),
                'diproses' => static::where('status_laporan', 'diproses')->count(),
                'selesai' => static::where('status_laporan', 'selesai')->count(),
                'ditolak' => static::where('status_laporan', 'ditolak')->count(),
            ];
        });
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'petugas_id');
    }

    //untuk relationship perlu dituliskan
    public function opd(): BelongsTo
    {
        return $this->belongsTo(Opd::class, 'opd_id');
    }


    public function getFileLaporanUrlAttribute()
    {
        return Storage::url($this->file_laporan);
    }

    protected static function booted()
    {
        static::updating(function ($lapor) {
            // Jika keterangan petugas diubah dan status masih Belum Diproses
            if ($lapor->isDirty('keterangan_petugas') && $lapor->getOriginal('status_laporan') === StatusLaporan::BELUM_DIPROSES->value) {
                $lapor->status_laporan = StatusLaporan::SEDANG_DIPROSES->value;
            }

            // Jika laporan dilihat dan status masih Belum Diproses, otomatis ubah status dan isi keterangan
            if (
                $lapor->isDirty('status_laporan') &&
                $lapor->status_laporan === StatusLaporan::SEDANG_DIPROSES->value &&
                $lapor->getOriginal('status_laporan') === StatusLaporan::BELUM_DIPROSES->value &&
                empty($lapor->keterangan_petugas)
            ) {
                $lapor->keterangan_petugas = 'Laporan dibaca';
            }
        });

        // Clear cache on save or delete
        static::saved(function () {
            Cache::forget('lapor_count');
            Cache::forget('lapor_status_counts');
        });

        static::deleted(function () {
            Cache::forget('lapor_count');
            Cache::forget('lapor_status_counts');
        });
    }

    // Query Scopes untuk optimasi
    public function scopeWithRelations($query)
    {
        return $query->with(['opd']);
    }

    public function scopeFilterBySearch($query, $search)
    {
        return $query->when($search, function ($q) use ($search) {
            $q->where(function ($subQuery) use ($search) {
                $subQuery->where('no_tiket', 'like', '%' . $search . '%')
                    ->orWhere('nama_pelapor', 'like', '%' . $search . '%')
                    ->orWhere('uraian_laporan', 'like', '%' . $search . '%')
                    ->orWhereHas('opd', function ($opd) use ($search) {
                        $opd->where('nama', 'like', '%' . $search . '%');
                    });
            });
        });
    }

    public function scopeFilterByStatus($query, $statusFilter)
    {
        return $query->when($statusFilter, function ($q) use ($statusFilter) {
            $q->where('status_laporan', $statusFilter);
        });
    }

    public function scopeFilterByOpd($query, $opdFilter)
    {
        return $query->when($opdFilter, function ($q) use ($opdFilter) {
            $q->where('opd_id', $opdFilter);
        });
    }
}
