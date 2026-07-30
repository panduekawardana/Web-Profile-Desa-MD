<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuratPengajuan extends Model
{
    protected $fillable = [
        'jenis_surat', 'nama', 'nik', 'alamat', 'keperluan',
        'file_ktp', 'status', 'catatan_admin',
    ];
}
