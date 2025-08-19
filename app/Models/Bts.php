<?php

namespace App\Models;

use App\Models\Jorong;
use App\Traits\HasModelCache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Bts extends Model
{
    use HasModelCache;

    protected $table = 'bts';

    /**
     * The attributes that should be indexed.
     *
     * @var array
     */
    protected $indexes = [
        'operator_id',
        'kecamatan_id',
        'nagari_id',
        'jorong_id',
        'teknologi',
        'status',
        'tahun_bangun'
    ];

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['operator', 'kecamatan', 'nagari', 'jorong'];

    /**
     * The number of models to return for pagination.
     *
     * @var int
     */
    protected $perPage = 25;

    protected $fillable = [
        'operator_id',
        'kecamatan_id',
        'nagari_id',
        'jorong_id',
        'pemilik',
        'alamat',
        'titik_koordinat',
        'latitude',
        'longitude',
        'teknologi',
        'status',
        'tahun_bangun',
    ];

    protected $casts = [
        'latitude' => 'float',
        'longitude' => 'float',
        'tahun_bangun' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];


    /**
     * Get the operator that owns the BTS.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function operator(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Operator::class, 'operator_id')
            ->withDefault(function () {
                return new \App\Models\Operator([
                    'id' => 0,
                    'nama_operator' => 'Tidak Diketahui'
                ]);
            });
    }

    public function nagari()
    {
        return $this->belongsTo(Nagari::class, 'nagari_id');
    }

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'kecamatan_id');
    }

    public function jorong()
    {
        return $this->belongsTo(Jorong::class, 'jorong_id');
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
            'operator' => function ($query) {
                $query->select('id', 'nama_operator');
            },
            'kecamatan' => function ($query) {
                $query->select('id', 'nama');
            },
            'nagari' => function ($query) {
                $query->select('id', 'nama_nagari', 'kecamatan_id');
            },
            'jorong' => function ($query) {
                $query->select('id', 'nagari_id', 'nama_jorong');
            }
        ]);
    }

    public function scopeFilterBySearch($query, $search)
    {
        return $query->when($search, function ($q) use ($search) {
            $q->where(function ($subQuery) use ($search) {
                $subQuery->where('titik_koordinat', 'like', '%' . $search . '%')
                    ->orWhere('alamat', 'like', '%' . $search . '%')
                    ->orWhereHas('operator', function ($op) use ($search) {
                        $op->where('nama_operator', 'like', '%' . $search . '%');
                    })
                    ->orWhereHas('kecamatan', function ($kec) use ($search) {
                        $kec->where('nama', 'like', '%' . $search . '%');
                    })
                    ->orWhereHas('nagari', function ($nag) use ($search) {
                        $nag->where('nama_nagari', 'like', '%' . $search . '%');
                    });
            });
        });
    }

    public function scopeFilterByOperator($query, $operatorFilter)
    {
        return $query->when($operatorFilter, function ($q) use ($operatorFilter) {
            $q->where('operator_id', $operatorFilter);
        });
    }

    public function scopeFilterByKecamatan($query, $kecamatanFilter)
    {
        return $query->when($kecamatanFilter, function ($q) use ($kecamatanFilter) {
            $q->where('kecamatan_id', $kecamatanFilter);
        });
    }

    public function scopeFilterByTeknologi($query, $teknologiFilter)
    {
        return $query->when($teknologiFilter, function ($q) use ($teknologiFilter) {
            $q->where('teknologi', $teknologiFilter);
        });
    }

    public function scopeFilterByStatus($query, $statusFilter)
    {
        return $query->when($statusFilter, function ($q) use ($statusFilter) {
            $q->where('status', $statusFilter);
        });
    }

    // Accessor untuk location
    public function getLocationAttribute(): ?array
    {
        if ($this->latitude && $this->longitude) {
            return [
                'lat' => (float) $this->latitude,
                'lng' => (float) $this->longitude,
            ];
        }
        return null;
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if ($model->latitude && $model->longitude) {
                $model->titik_koordinat = number_format($model->latitude, 6) . ', ' . number_format($model->longitude, 6);
            }
        });

        static::updating(function ($model) {
            if ($model->isDirty(['latitude', 'longitude'])) {
                $model->titik_koordinat = number_format($model->latitude, 6) . ', ' . number_format($model->longitude, 6);
            }
        });
    }

    protected function location(): Attribute
    {
        return Attribute::make(
            get: fn(mixed $value, array $attributes) => [
                'latitude' => $attributes['latitude'],
                'longitude' => $attributes['longitude']
            ],
            set: fn(array $value) => [
                'latitude' => $value['latitude'],
                'longitude' => $value['longitude']
            ],
        );
    }
}
