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
        static::saved(function ($model) {
            Cache::forget('nagari_count');
            $model->clearAllCaches();
        });

        static::deleted(function ($model) {
            Cache::forget('nagari_count');
            $model->clearAllCaches();
        });

        // Clear caches when related Jorong models are updated
        static::updated(function ($model) {
            $model->clearAllCaches();
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

    public function bts(): HasMany
    {
        return $this->hasMany(Bts::class);
    }

    public function btsCovering()
    {
        return $this->belongsToMany(Bts::class, 'bts_nagari_coverage', 'nagari_id', 'bts_id')
            ->withPivot('jorong_id')
            ->withTimestamps();
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
        // Use the loaded aggregate if available, otherwise use cached sum
        return $this->jorongs_sum_jumlah_penduduk_jorong ?? $this->getCachedSum('jorongs', 'jumlah_penduduk_jorong');
    }

    // Accessor untuk menghitung jumlah jorong
    public function getJumlahJorongAttribute()
    {
        // Use the loaded count if available, otherwise use cached count
        return $this->jorongs_count ?? $this->getCachedCount('jorongs');
    }

    /**
     * Accessor untuk mendapatkan status sinyal Nagari
     * Blankspot: Tidak ada BTS di Nagari
     * Lemah Sinyal: Banyak Jorong tapi BTS hanya ada di satu jorong
     * Sinyal Baik: Selain kondisi di atas
     */
    public function getStatusSinyalAttribute()
    {
        // Use pre-loaded count if available
        $directBtsCount = isset($this->bts_count) ? $this->bts_count : $this->bts()->count();
        $coveringBtsCount = $this->btsCovering()->count();
        $totalBtsCount = $directBtsCount + $coveringBtsCount;

        if ($totalBtsCount === 0) {
            return 'Blankspot';
        }

        // Use pre-loaded unique jorong count if available (pre-loaded in Livewire)
        $totalJorongWithCoverage = 0;
        if (isset($this->jorong_bts_count)) {
            $totalJorongWithCoverage = (int) $this->jorong_bts_count;
        } else {
            // Manual fallback if not pre-loaded
            $directJorongs = $this->bts()->whereNotNull('jorong_id')->distinct('jorong_id')->pluck('jorong_id')->toArray();
            $coveredJorongs = $this->btsCovering()->whereNotNull('bts_nagari_coverage.jorong_id')->distinct('bts_nagari_coverage.jorong_id')->pluck('bts_nagari_coverage.jorong_id')->toArray();
            $totalJorongWithCoverage = count(array_unique(array_merge($directJorongs, $coveredJorongs)));
        }

        if ($this->jumlah_jorong > 1 && $totalJorongWithCoverage === 1) {
            return 'Lemah Sinyal';
        }

        return 'Sinyal Baik';
    }

    /**
     * Define which relations should have their caches cleared
     */
    public function getRelationsToClear()
    {
        return [
            'jorongs' => ['jumlah_penduduk_jorong'],
            // Add other relations and their sum columns here if needed
        ];
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
        ])->withCount([
            'bts as jorong_bts_count' => function ($query) {
                $query->selectRaw('COUNT(DISTINCT jorong_id)');
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
        return $query->addSelect('nagaris.*')
            ->join('kecamatans', 'nagaris.kecamatan_id', '=', 'kecamatans.id')
            ->orderBy('kecamatans.nama')
            ->orderBy('nagaris.nama_nagari');
    }
}
