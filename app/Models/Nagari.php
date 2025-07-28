<?php

namespace App\Models;

use App\Models\Jorong;
use App\Models\Kecamatan;
use App\Traits\HasModelCache;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Nagari extends Model
{
    use HasModelCache;
    protected $table = "nagaris";

    protected $fillable = [
        'nama_nagari',
        'nama_wali_nagari',
        'kontak_wali_nagari',
        'alamat_kantor_nagari',
        'jumlah_penduduk_nagari',
        'jumlah_jorong',
        'luas_nagari',
        'kecamatan_id',

    ];

    protected $casts = [
        'jumlah_penduduk_nagari' => 'integer',
        'jumlah_jorong' => 'integer',
        'luas_nagari' => 'integer',
    ];

    public function kecamatan(): BelongsTo
    {
        return $this->belongsTo(Kecamatan::class);
    }

    public function jorongs(): HasMany
    {
        return $this->hasMany(Jorong::class);
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

    // Static cache for frequently accessed Nagari by ID
    public static function getCachedById($id)
    {
        return Cache::rememberForever('nagari_' . $id, function () use ($id) {
            return self::find($id);
        });
    }

    // Query Scopes untuk optimasi
    public function scopeWithRelations($query)
    {
        return $query->with('kecamatan');
    }

    public function scopeFilterBySearch($query, $search)
    {
        return $query->when($search, function ($q) use ($search) {
            $q->where(function ($subQuery) use ($search) {
                $subQuery->where('nama_nagari', 'like', '%' . $search . '%')
                    ->orWhere('nama_wali_nagari', 'like', '%' . $search . '%')
                    ->orWhereHas('kecamatan', function ($kec) use ($search) {
                        $kec->where('nama', 'like', '%' . $search . '%');
                    });
            });
        });
    }

    public function scopeFilterByKecamatan($query, $kecamatanFilter)
    {
        return $query->when($kecamatanFilter, function ($q) use ($kecamatanFilter) {
            $q->where('kecamatan_id', $kecamatanFilter);
        });
    }

    public function scopeOrderByKecamatanAndNagari($query)
    {
        return $query->join('kecamatans', 'nagaris.kecamatan_id', '=', 'kecamatans.id')
            ->orderBy('kecamatans.nama')
            ->orderBy('nagaris.nama_nagari')
            ->select('nagaris.*');
    }
}
