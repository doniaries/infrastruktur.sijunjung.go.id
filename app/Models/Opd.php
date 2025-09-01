<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Opd extends Model
{
    use HasFactory;

    protected $table = "opds";

    protected $fillable = [
        'nama',
    ];

    protected static function booted()
    {
        static::saved(function () {
            Cache::forget('opd_count');
            Cache::forget('opd_letter_range_counts');
        });

        static::deleted(function () {
            Cache::forget('opd_count');
            Cache::forget('opd_letter_range_counts');
        });
    }

    public function scopeSearch($query, $search)
    {
        return $query->where('nama', 'like', "%{$search}%");
    }

    public static function getCount()
    {
        return Cache::remember('opd_count', now()->addMinutes(5), function () {
            return static::count();
        });
    }

    /**
     * Get counts for all letter ranges in a single query
     */
    public static function getLetterRangeCounts(): array
    {
        return Cache::remember('opd_letter_range_counts', now()->addMinutes(5), function () {
            $ranges = [
                'A-D' => [['A%', 'B%', 'C%', 'D%']],
                'E-K' => [['E%', 'F%', 'G%', 'H%', 'I%', 'J%', 'K%']],
                'L-P' => [['L%', 'M%', 'N%', 'O%', 'P%']],
                'Q-Z' => [
                    ['Q%', 'R%', 'S%', 'T%', 'U%', 'V%', 'W%', 'X%', 'Y%', 'Z%'],
                    ['0%', '1%', '2%', '3%', '4%', '5%', '6%', '7%', '8%', '9%']
                ]
            ];

            $result = [];
            foreach ($ranges as $range => $groups) {
                $count = 0;
                foreach ($groups as $group) {
                    $count += static::where(function ($query) use ($group) {
                        foreach ($group as $prefix) {
                            $query->orWhere('nama', 'LIKE', $prefix);
                        }
                    })->count();
                }
                $result[$range] = $count;
            }

            return $result;
        });
    }

    // Mutator - Mengubah data sebelum disimpan ke database
    public function setNamaAttribute($value)
    {
        $this->attributes['nama'] = strtoupper(trim($value));
    }
}
