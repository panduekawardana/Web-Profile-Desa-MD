<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnggaranBidang extends Model
{
    protected $fillable = ['bidang', 'persen', 'tahun', 'urutan'];
}
