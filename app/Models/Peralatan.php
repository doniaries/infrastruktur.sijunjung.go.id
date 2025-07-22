<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peralatan extends Model
{
    protected $table = 'peralatans';

    protected $fillable = [
        'nama',
        'jenis_peralatan',
        'tahun_pengadaan',
    ];

    
}