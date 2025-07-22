<?php

namespace App\Traits;

use Illuminate\Support\Facades\Cache;

trait HasModelCache
{
    public static function getCachedById($id)
    {
        return Cache::rememberForever(static::class . '_' . $id, function () use ($id) {
            return static::find($id);
        });
    }

    protected static function bootHasModelCache()
    {
        static::saved(function ($model) {
            Cache::forget(static::class . '_' . $model->id);
        });
        static::deleted(function ($model) {
            Cache::forget(static::class . '_' . $model->id);
        });
    }
}
