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
