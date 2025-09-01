<?php

namespace App\Traits;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

trait HasModelCache
{
    /**
     * Get cached sum of a column
     */
    public function getCachedSum(string $relation, string $column, $default = 0)
    {
        $cacheKey = $this->getCacheKey("sum_{$relation}_{$column}");
        
        return Cache::remember($cacheKey, now()->addMinutes(5), function () use ($relation, $column) {
            return $this->{$relation}()->sum($column) ?? 0;
        });
    }

    /**
     * Get cached count of related records
     */
    public function getCachedCount(string $relation)
    {
        $cacheKey = $this->getCacheKey("count_{$relation}");
        
        return Cache::remember($cacheKey, now()->addMinutes(5), function () use ($relation) {
            return $this->{$relation}()->count();
        });
    }

    /**
     * Clear all cached sums, counts, and model instances for this model
     */
    public function clearAllCaches()
    {
        // Clear model instance cache
        if ($this->exists) {
            Cache::forget($this->getCacheKey($this->getKey()));
        }
        
        // Clear relation caches
        $relations = method_exists($this, 'getRelationsToClear') ? $this->getRelationsToClear() : [];
        
        foreach ($relations as $relation => $columns) {
            Cache::forget($this->getCacheKey("count_{$relation}"));
            
            foreach ((array)$columns as $column) {
                Cache::forget($this->getCacheKey("sum_{$relation}_{$column}"));
            }
        }
        
        // Clear any other cached data
        Cache::forget($this->getCacheKey('all'));
    }
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
