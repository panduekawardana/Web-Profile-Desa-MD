<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PeraturanKepalaDesa extends Model
{
    protected $table = 'peraturan_kepala_desas';

    protected $fillable = ['nomor', 'tentang', 'tanggal_ditetapkan', 'file'];

    protected $casts = [
        'tanggal_ditetapkan' => 'date',
    ];
}
