<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Cache;

class CacheHelper
{
    /**
     * Cache duration constants (in seconds)
     */
    const SHORT_CACHE = 300;    // 5 minutes
    const MEDIUM_CACHE = 1800;  // 30 minutes
    const LONG_CACHE = 3600;    // 1 hour
    const DAILY_CACHE = 86400;  // 24 hours

    /**
     * Get cached operators list
     */
    public static function getOperators()
    {
        return Cache::remember('operators_list', self::LONG_CACHE, function () {
            return \App\Models\Operator::orderBy('nama_operator')->get();
        });
    }

    /**
     * Get cached kecamatans list
     */
    public static function getKecamatans()
    {
        return Cache::remember('kecamatans_list', self::LONG_CACHE, function () {
            return \App\Models\Kecamatan::orderBy('nama')->get();
        });
    }

    /**
     * Get cached nagaris list
     */
    public static function getNagaris()
    {
        return Cache::remember('nagaris_list', self::LONG_CACHE, function () {
            return \App\Models\Nagari::orderBy('nama_nagari')->get();
        });
    }

    /**
     * Get cached OPDs list
     */
    public static function getOpds()
    {
        return Cache::remember('opds_list', self::LONG_CACHE, function () {
            return \App\Models\Opd::orderBy('nama')->get();
        });
    }

    /**
     * Clear all filter caches
     */
    public static function clearFilterCaches()
    {
        Cache::forget('operators_list');
        Cache::forget('kecamatans_list');
        Cache::forget('nagaris_list');
        Cache::forget('opds_list');
    }

    /**
     * Clear model-specific cache
     */
    public static function clearModelCache($modelType, $id = null)
    {
        if ($id) {
            Cache::forget($modelType . '_' . $id);
        } else {
            // Clear all caches for this model type
            Cache::forget($modelType . 's_list');
        }
    }

    /**
     * Get cached statistics
     */
    public static function getStatistics($key, $callback, $duration = self::MEDIUM_CACHE)
    {
        return Cache::remember('stats_' . $key, $duration, $callback);
    }

    /**
     * Clear all statistics caches
     */
    public static function clearStatistics()
    {
        $keys = ['bts_count', 'jorong_count', 'nagari_count', 'laporan_count'];
        foreach ($keys as $key) {
            Cache::forget('stats_' . $key);
        }
    }
}
