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

    protected $fillable = [
        'operator_id',
        'kecamatan_id',
        'nagari_id',
        'jorong_id',
        'pemilik',
        'alamat',
        'titik_koordinat',
        'teknologi',
        'status',
        'tahun_bangun',
    ];


    public function operator()
    {
        return $this->belongsTo(Operator::class, 'operator_id');
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
    public function scopeWithRelations($query)
    {
        return $query->with(['operator', 'kecamatan', 'nagari']);
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
            if (!$model->lokasi && $model->latitude && $model->longitude) {
                $model->lokasi = $model->latitude . ', ' . $model->longitude;
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
