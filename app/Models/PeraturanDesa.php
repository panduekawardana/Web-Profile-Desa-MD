<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PeraturanDesa extends Model
{
    protected $table = 'peraturan_desas';

    protected $fillable = ['nomor', 'tentang', 'kategori', 'tanggal_ditetapkan', 'file'];

    protected $casts = [
        'tanggal_ditetapkan' => 'date',
    ];
}
