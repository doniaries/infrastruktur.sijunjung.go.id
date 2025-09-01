<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Operator extends Model
{
    protected $table = 'operators';

    protected $fillable = [
        'nama_operator',
    ];

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::saved(function () {
            Cache::forget('operator_count');
        });

        static::deleted(function () {
            Cache::forget('operator_count');
        });
    }

    /**
     * Get the total count of Operator records with caching
     *
     * @return int
     */
    public static function getCount(): int
    {
        return Cache::remember('operator_count', now()->addMinutes(5), function () {
            return static::count();
        });
    }
}
