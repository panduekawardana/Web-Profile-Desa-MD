<?php

namespace App\Http\Controllers;

use App\Models\AnggaranBidang;
use App\Models\LaporanPertanggungjawaban;
use App\Models\PeraturanDesa;
use App\Models\PeraturanKepalaDesa;
use App\Models\Setting;

class PemerintahanController extends Controller
{
    public function apbdes()
    {
        $settings = [
            'total_pendapatan' => Setting::get('total_pendapatan', 'Rp 2.45M'),
            'realisasi_anggaran' => Setting::get('realisasi_anggaran', 'Rp 1.4B'),
            'sisa_anggaran' => Setting::get('sisa_anggaran', 'Rp 1.05M'),
            'serapan_belanja' => Setting::get('serapan_belanja', '72%'),
        ];

        $anggaranBidangs = AnggaranBidang::orderBy('urutan')->get();

        return view('pemerintahan.apbdes', compact('settings', 'anggaranBidangs'));
    }

    public function peraturan()
    {
        $peraturans = PeraturanDesa::orderByDesc('tanggal_ditetapkan')->paginate(8);

        return view('pemerintahan.peraturan', compact('peraturans'));
    }

    public function perkades()
    {
        $perkades = PeraturanKepalaDesa::orderByDesc('tanggal_ditetapkan')->paginate(8);

        return view('pemerintahan.perkades', compact('perkades'));
    }

    public function rpjmdes()
    {
        return view('pemerintahan.rpjmdes');
    }

    public function lpj()
    {
        $lpjs = LaporanPertanggungjawaban::orderByDesc('tahun')->get();

        return view('pemerintahan.lpj', compact('lpjs'));
    }

    public function program()
    {
        return view('pemerintahan.program');
    }
}
