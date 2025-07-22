<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventaris extends Model
{
    protected $table = 'inventaris';

    protected $fillable = [
        'peralatan_id',
        'jenis_peralatan',
        'jumlah',
        'status',
    ];

    public function peralatan()
    {
        return $this->belongsTo(Peralatan::class);
    }

    public function opd()
    {
        return $this->belongsTo(Opd::class);
    }
}
