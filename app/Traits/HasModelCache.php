<?php

namespace App\Traits;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

trait HasModelCache
{
    /**
     * Get cached model by ID with fallback
     */
    public static function getCachedById($id, $minutes = 1440) // default 24 jam
    {
        try {
            return Cache::remember(
                static::getCacheKey($id),
                now()->addMinutes($minutes),
                fn() => static::find($id)
            );
        } catch (\Exception $e) {
            Log::error('Cache error: ' . $e->getMessage());
            return static::find($id);
        }
    }

    /**
     * Get multiple cached models by IDs
     */
    public static function getManyCached(array $ids, $minutes = 1440)
    {
        try {
            $cacheKey = static::getCacheKey('many_' . md5(implode('_', $ids)));

            return Cache::remember($cacheKey, now()->addMinutes($minutes), function () use ($ids) {
                return static::whereIn('id', $ids)->get()->keyBy('id');
            });
        } catch (\Exception $e) {
            Log::error('Cache error (getManyCached): ' . $e->getMessage());
            return static::whereIn('id', $ids)->get()->keyBy('id');
        }
    }

    /**
     * Clear cache for specific model
     */
    public function clearCache()
    {
        try {
            Cache::forget(static::getCacheKey($this->id));
        } catch (\Exception $e) {
            Log::error('Cache clear error: ' . $e->getMessage());
        }
        return $this;
    }

    /**
     * Generate consistent cache key
     */
    protected static function getCacheKey($id)
    {
        return strtolower(class_basename(static::class)) . '_' . $id;
    }

    /**
     * Boot the trait
     */
    protected static function bootHasModelCache()
    {
        static::saved(function ($model) {
            $model->clearCache();
        });

        static::deleted(function ($model) {
            $model->clearCache();
        });
    }
}
