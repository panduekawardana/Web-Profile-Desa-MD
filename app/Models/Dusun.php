<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dusun extends Model
{
    protected $table = 'dusuns';

    protected $fillable = [
        'nama', 'kepala_dusun', 'jumlah_penduduk', 'luas_wilayah', 'potensi_utama', 'urutan',
    ];
}
