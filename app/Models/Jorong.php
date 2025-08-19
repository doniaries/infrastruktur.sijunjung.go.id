<?php

namespace App\Models;

use App\Models\Nagari;
use App\Traits\HasModelCache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Illuminate\Support\Facades\Cache;

class Jorong extends Model
{
    use HasModelCache;

    protected $table = "jorongs";

    protected $fillable = [
        'nagari_id',
        'nama_jorong',
        'nama_kepala_jorong',
        'kontak_kepala_jorong',
        'jumlah_penduduk_jorong',
        'luas_jorong',

    ];

    protected $casts = [
        'jumlah_penduduk_jorong' => 'integer',
        'luas_jorong' => 'integer',
        'nama_jorong' => 'string',
    ];

    public function nagari(): BelongsTo
    {
        return $this->belongsTo(Nagari::class);
    }

    // Mutator - Mengubah data sebelum disimpan ke database
    public function setNamaAttribute($value)
    {
        $this->attributes['nama_jorong'] = strtoupper($value);
    }

    // Accessor - Mengubah data ketika diambil dari database
    public function getNamaAttribute($value)
    {
        return strtoupper($value);
    }

    // Static cache for frequently accessed Jorong by ID
    public static function getCachedById($id)
    {
        return Cache::rememberForever('jorong_' . $id, function () use ($id) {
            return self::find($id);
        });
    }

    // Query Scopes untuk optimasi
    public function scopeWithRelations($query)
    {
        return $query->with(['nagari.kecamatan']);
    }

    public function scopeFilterBySearch($query, $search)
    {
        return $query->when($search, function ($q) use ($search) {
            $q->where(function ($subQuery) use ($search) {
                $subQuery->where('nama_jorong', 'like', '%' . $search . '%')
                    ->orWhere('nama_kepala_jorong', 'like', '%' . $search . '%')
                    ->orWhereHas('nagari', function ($nagari) use ($search) {
                        $nagari->where('nama_nagari', 'like', '%' . $search . '%')
                            ->orWhereHas('kecamatan', function ($kec) use ($search) {
                                $kec->where('nama', 'like', '%' . $search . '%');
                            });
                    });
            });
        });
    }

    public function scopeFilterByNagari($query, $nagariFilter)
    {
        return $query->when($nagariFilter, function ($q) use ($nagariFilter) {
            $q->where('nagari_id', $nagariFilter);
        });
    }

    public function scopeFilterByKecamatan($query, $kecamatanFilter)
    {
        return $query->when($kecamatanFilter, function ($q) use ($kecamatanFilter) {
            $q->whereHas('nagari.kecamatan', function ($subQuery) use ($kecamatanFilter) {
                $subQuery->where('id', $kecamatanFilter);
            });
        });
    }

    public function scopeOrderByKecamatanAndJorong($query)
    {
        return $query->join('nagaris', 'jorongs.nagari_id', '=', 'nagaris.id')
            ->join('kecamatans', 'nagaris.kecamatan_id', '=', 'kecamatans.id')
            ->orderBy('kecamatans.nama')
            ->orderBy('jorongs.nama_jorong')
            ->select('jorongs.*');
    }
}
