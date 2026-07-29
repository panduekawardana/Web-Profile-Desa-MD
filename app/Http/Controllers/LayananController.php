<?php

namespace App\Http\Controllers;

class LayananController extends Controller
{
    public function surat()
    {
        return view('layanan.surat');
    }

    public function pengaduan()
    {
        return view('layanan.pengaduan');
    }

    public function ktp()
    {
        return view('layanan.ktp');
    }

    public function alur()
    {
        return view('layanan.alur');
    }
}