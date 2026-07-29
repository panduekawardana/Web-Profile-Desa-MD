<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    protected $table = 'pengumumans';

    protected $fillable = ['title', 'content', 'is_urgent', 'published_at'];

    protected $casts = [
        'is_urgent' => 'boolean',
        'published_at' => 'datetime',
    ];
}