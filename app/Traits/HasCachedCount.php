<?php

namespace App\Traits;

use Illuminate\Support\Facades\Cache;

trait HasCachedCount
{
    /**
     * Get the total count of records with caching
     *
     * @return int
     */
    public static function getCount(): int
    {
        $cacheKey = strtolower(class_basename(static::class)) . '_count';
        
        return Cache::remember($cacheKey, now()->addMinutes(5), function () {
            return static::count();
        });
    }

    /**
     * Clear the cached count
     */
    public static function clearCountCache(): void
    {
        $cacheKey = strtolower(class_basename(static::class)) . '_count';
        Cache::forget($cacheKey);
    }

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function bootHasCachedCount()
    {
        static::saved(function () {
            static::clearCountCache();
        });

        static::deleted(function () {
            static::clearCountCache();
        });
    }
}
