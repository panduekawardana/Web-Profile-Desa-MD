<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    protected $fillable = [
        'nama', 'whatsapp', 'kategori', 'isi',
        'file_lampiran', 'status', 'catatan_admin',
    ];
}
