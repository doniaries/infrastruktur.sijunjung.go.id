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

    /**
     * The attributes that should be indexed.
     *
     * @var array
     */
    protected $indexes = [
        'kecamatan_id',
        'nama_nagari',
    ];

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['kecamatan'];

    /**
     * The number of models to return for pagination.
     *
     * @var int
     */
    protected $perPage = 25;

    /**
     * Get the total count of Nagari records with caching
     *
     * @return int
     */
    public static function getCount(): int
    {
        return Cache::remember('nagari_count', now()->addMinutes(5), function () {
            return static::count();
        });
    }

    protected $fillable = [
        'nama_nagari',
        'nama_wali_nagari',
        'kontak_wali_nagari',
        'alamat_kantor_nagari',
        'jumlah_penduduk_nagari',
        'jumlah_jorong',
        'kecamatan_id',
        'luas_nagari',

    ];

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::saved(function () {
            Cache::forget('nagari_count');
        });

        static::deleted(function () {
            Cache::forget('nagari_count');
        });
    }

    protected $casts = [
        'jumlah_penduduk_nagari' => 'integer',
        'jumlah_jorong' => 'integer',
        'luas_nagari' => 'float',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];


    public function kecamatan(): BelongsTo
    {
        return $this->belongsTo(Kecamatan::class)->withDefault([
            'nama' => 'N/A'
        ]);
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

    // Accessor untuk menghitung total penduduk dari semua jorong
    public function getJumlahPendudukNagariAttribute()
    {
        // Use the loaded aggregate if available, otherwise fallback to query
        return $this->jorongs_sum_jumlah_penduduk_jorong ?? $this->jorongs()->sum('jumlah_penduduk_jorong');
    }

    // Accessor untuk menghitung jumlah jorong
    public function getJumlahJorongAttribute()
    {
        // Use the loaded count if available, otherwise fallback to query
        return $this->jorongs_count ?? $this->jorongs()->count();
    }

    // Static cache for frequently accessed Nagari by ID
    public static function getCachedById($id)
    {
        return Cache::rememberForever('nagari_' . $id, function () use ($id) {
            return self::find($id);
        });
    }

    public function scopeWithRelations($query)
    {
        return $query->with([
            'kecamatan' => function ($query) {
                $query->select('id', 'nama');
            },
            'jorongs' => function ($query) {
                $query->select('id', 'nagari_id', 'nama_jorong')
                    ->orderBy('nama_jorong');
            }
        ]);
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
        return $query->select('nagaris.*')
            ->join('kecamatans', 'nagaris.kecamatan_id', '=', 'kecamatans.id')
            ->orderBy('kecamatans.nama')
            ->orderBy('nagaris.nama_nagari');
    }
}
