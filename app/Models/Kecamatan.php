<?php

namespace App\Models;

use App\Traits\HasModelCache;
use App\Traits\HasCachedCount;

use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasModelCache, HasCachedCount;
    protected $table = "kecamatans";


    protected $fillable = [
        'nama',
    ];

    protected $withCount = ['nagari'];

    public function opd()
    {
        return $this->belongsTo(Opd::class);
    }

    public function nagari()
    {
        return $this->hasMany(Nagari::class);
    }

    // Jorongs are accessed through the nagari relationship
    public function jorongs()
    {
        return $this->hasManyThrough(Jorong::class, Nagari::class);
    }

    // Mutator - Mengubah data sebelum disimpan ke database
    public function setNamaAttribute($value)
    {
        $this->attributes['nama'] = strtoupper($value);
    }

    // Accessor - Mengubah data ketika diambil dari database
    public function getNamaAttribute($value)
    {
        return strtoupper($value);
    }

    // Static cache for frequently accessed Kecamatan by ID
    public static function getCachedById($id)
    {
        return Cache::rememberForever('kecamatan_' . $id, function () use ($id) {
            return self::find($id);
        });
    }
}
