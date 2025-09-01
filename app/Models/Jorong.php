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

    /**
     * The attributes that should be indexed.
     *
     * @var array
     */
    protected $indexes = [
        'nagari_id',
        'nama_jorong',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The attributes that should be cast.
     *
     * @var array
     */

    protected $fillable = [
        'nagari_id',
        'nama_jorong',
        'nama_kepala_jorong',
        'kontak_kepala_jorong',
        'jumlah_penduduk_jorong',
        'luas_jorong',
        'status_blankspot',
        'alasan_blankspot',
        'koordinat_blankspot',
    ];

    protected $casts = [
        'jumlah_penduduk_jorong' => 'integer',
        'luas_jorong' => 'float',
        'nama_jorong' => 'string',
        'status_blankspot' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['nagari'];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['full_name'];

    /**
     * The number of models to return for pagination.
     *
     * @var int
     */
    protected $perPage = 25;

    /**
     * Get the nagari that owns the jorong.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function nagari(): BelongsTo
    {
        return $this->belongsTo(Nagari::class)->withDefault([
            'nama_nagari' => 'N/A',
            'kecamatan' => (object)['nama' => 'N/A']
        ]);
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
    /**
     * Eager load relationships for the model.
     *
     * @param  \Illuminate\Database\Query\Builder  $query
     * @return \Illuminate\Database\Query\Builder
     */
    public function scopeWithRelations($query)
    {
        return $query->with([
            'nagari' => function ($query) {
                $query->select('id', 'nama_nagari', 'kecamatan_id')
                    ->with(['kecamatan' => function ($q) {
                        $q->select('id', 'nama');
                    }]);
            }
        ]);
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

    /**
     * Order the query by kecamatan and jorong name.
     *
     * @param  \Illuminate\Database\Query\Builder  $query
     * @return \Illuminate\Database\Query\Builder
     */
    public function scopeOrderByKecamatanAndJorong($query)
    {
        return $query->select('jorongs.*')
            ->join('nagaris', 'jorongs.nagari_id', '=', 'nagaris.id')
            ->join('kecamatans', 'nagaris.kecamatan_id', '=', 'kecamatans.id')
            ->orderBy('kecamatans.nama')
            ->orderBy('nagaris.nama_nagari')
            ->orderBy('jorongs.nama_jorong')
            ->select('jorongs.*');
    }
    
    /**
     * Scope a query to only include blankspot jorongs.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeBlankspot($query)
    {
        return $query->where('status_blankspot', true);
    }
    
    /**
     * Get the full name of the jorong (Jorong Name - Nagari Name).
     *
     * @return string
     */
    public function getFullNameAttribute()
    {
        return $this->nama_jorong . ' - ' . ($this->nagari->nama_nagari ?? '');
    }
}
