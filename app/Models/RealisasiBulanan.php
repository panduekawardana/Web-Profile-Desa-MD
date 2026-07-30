<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RealisasiBulanan extends Model
{
    protected $fillable = [
        'bulan', 'tahun', 'total_pendapatan', 'realisasi_anggaran',
        'sisa_anggaran', 'serapan_belanja',
    ];

    public static function namaBulan(int $bulan): string
    {
        $nama = [
            1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April',
            5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus',
            9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember',
        ];

        return $nama[$bulan] ?? '-';
    }
}
