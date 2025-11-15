<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Peralatan extends Model
{
    protected $table = 'peralatans';

    protected $fillable = [
        'nama',
        'jenis_peralatan',
        'tahun_pengadaan',
        'foto',
    ];

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::saved(function () {
            Cache::forget('peralatan_count');
        });

        static::deleted(function () {
            Cache::forget('peralatan_count');
        });
    }

    /**
     * Get the total count of Peralatan records with caching
     *
     * @return int
     */
    public static function getCount(): int
    {
        return Cache::remember('peralatan_count', now()->addMinutes(5), function () {
            return static::count();
        });
    }
}