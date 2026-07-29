<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Setting;

class HomeController extends Controller
{
    public function index()
    {
        $stats = [
            'total_penduduk' => Setting::get('total_penduduk', '4,281'),
            'total_penduduk_delta' => Setting::get('total_penduduk_delta', '+2.4%'),
            'layanan_selesai' => Setting::get('layanan_selesai', '98.2%'),
            'bumdes_aktif' => Setting::get('bumdes_aktif', '12 Unit'),
            'transparansi_dana' => Setting::get('transparansi_dana', 'Rp 2.4M'),
        ];

        $beritaTerbaru = Berita::published()->latest('published_at')->take(3)->get();

        return view('home.index', compact('stats', 'beritaTerbaru'));
    }
}
