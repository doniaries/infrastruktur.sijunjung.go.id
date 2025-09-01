<?php

namespace App\Models;

use App\Traits\HasCachedCount;
use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    use HasCachedCount;
    
    protected $fillable = [
        'name',
        'guard_name',
    ];

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::saved(function () {
            static::clearCountCache();
        });

        static::deleted(function () {
            static::clearCountCache();
        });
    }
}
