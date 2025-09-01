<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Inventaris extends Model
{
    protected $table = 'inventaris';

    protected $fillable = [
        'peralatan_id',
        'jenis_peralatan',
        'jumlah',
        'status',
    ];

    public function peralatan()
    {
        return $this->belongsTo(Peralatan::class);
    }

    public function opd()
    {
        return $this->belongsTo(Opd::class);
    }

    protected static function booted()
    {
        static::saved(function () {
            Cache::forget('inventaris_count');
            Cache::forget('inventaris_status_counts');
        });

        static::deleted(function () {
            Cache::forget('inventaris_count');
            Cache::forget('inventaris_status_counts');
        });
    }

    public static function getCount(): int
    {
        return Cache::remember('inventaris_count', now()->addMinutes(5), function () {
            return static::count();
        });
    }

    public static function getStatusCounts(): array
    {
        return Cache::remember('inventaris_status_counts', now()->addMinutes(5), function () {
            return [
                'all' => static::count(),
                'baik' => static::where('status', 'baik')->count(),
                'rusak' => static::where('status', 'rusak')->count(),
                'hilang' => static::where('status', 'hilang')->count(),
            ];
        });
    }
}
