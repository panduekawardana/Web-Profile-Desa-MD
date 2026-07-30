<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaporanPertanggungjawaban extends Model
{
    protected $table = 'laporan_pertanggungjawabans';

    protected $fillable = ['tahun', 'status', 'tanggal_disampaikan', 'catatan', 'file'];

    protected $casts = [
        'tanggal_disampaikan' => 'date',
    ];
}
