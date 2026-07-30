<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agenda;
use App\Models\Berita;
use App\Models\Pengaduan;
use App\Models\Produk;
use App\Models\SuratPengajuan;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_berita' => Berita::count(),
            'berita_published' => Berita::published()->count(),
            'surat_baru' => SuratPengajuan::where('status', 'baru')->count(),
            'pengaduan_baru' => Pengaduan::where('status', 'baru')->count(),
            'total_agenda' => Agenda::where('event_date', '>=', now()->toDateString())->count(),
            'total_produk' => Produk::count(),
        ];

        $beritaTerbaru = Berita::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'beritaTerbaru'));
    }
}
