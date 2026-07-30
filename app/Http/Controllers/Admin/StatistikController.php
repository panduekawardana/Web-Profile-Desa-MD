<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AnggaranBidang;
use App\Models\RealisasiBulanan;
use App\Models\Setting;
use Illuminate\Http\Request;

class StatistikController extends Controller
{
    public function edit()
    {
        $settings = [
            'total_penduduk' => Setting::get('total_penduduk', '4,281'),
            'total_penduduk_delta' => Setting::get('total_penduduk_delta', '+2.4%'),
            'layanan_selesai' => Setting::get('layanan_selesai', '98.2%'),
            'bumdes_aktif' => Setting::get('bumdes_aktif', '12 Unit'),
            'transparansi_dana' => Setting::get('transparansi_dana', 'Rp 2.4M'),
            'total_pendapatan' => Setting::get('total_pendapatan', 'Rp 2.45M'),
            'realisasi_anggaran' => Setting::get('realisasi_anggaran', 'Rp 1.4B'),
            'sisa_anggaran' => Setting::get('sisa_anggaran', 'Rp 1.05M'),
            'serapan_belanja' => Setting::get('serapan_belanja', '72%'),
        ];

        $anggaranBidangs = AnggaranBidang::orderBy('urutan')->get();
        $realisasiBulanans = RealisasiBulanan::orderByDesc('tahun')->orderByDesc('bulan')->get();

        return view('admin.statistik.edit', compact('settings', 'anggaranBidangs', 'realisasiBulanans'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'total_penduduk' => 'required|string|max:50',
            'total_penduduk_delta' => 'nullable|string|max:20',
            'layanan_selesai' => 'required|string|max:50',
            'bumdes_aktif' => 'required|string|max:50',
            'transparansi_dana' => 'required|string|max:50',
            'total_pendapatan' => 'required|string|max:50',
            'realisasi_anggaran' => 'required|string|max:50',
            'sisa_anggaran' => 'required|string|max:50',
            'serapan_belanja' => 'required|string|max:50',
        ]);

        foreach ($request->only([
            'total_penduduk', 'total_penduduk_delta', 'layanan_selesai', 'bumdes_aktif',
            'transparansi_dana', 'total_pendapatan', 'realisasi_anggaran',
            'sisa_anggaran', 'serapan_belanja',
        ]) as $key => $value) {
            Setting::set($key, $value);
        }

        return back()->with('success', 'Statistik beranda & APBDes berhasil diperbarui.');
    }

    public function storeBidang(Request $request)
    {
        $data = $request->validate([
            'bidang' => 'required|string|max:255',
            'persen' => 'required|integer|min:0|max:100',
        ]);
        $data['urutan'] = AnggaranBidang::max('urutan') + 1;

        AnggaranBidang::create($data);

        return back()->with('success', 'Bidang anggaran berhasil ditambahkan.');
    }

    public function destroyBidang(AnggaranBidang $bidang)
    {
        $bidang->delete();

        return back()->with('success', 'Bidang anggaran berhasil dihapus.');
    }

    public function storeBulanan(Request $request)
    {
        $data = $request->validate([
            'bulan' => 'required|integer|min:1|max:12',
            'tahun' => 'required|integer|min:2000|max:2100',
            'total_pendapatan' => 'required|string|max:50',
            'realisasi_anggaran' => 'required|string|max:50',
            'sisa_anggaran' => 'required|string|max:50',
            'serapan_belanja' => 'required|string|max:50',
        ]);

        RealisasiBulanan::updateOrCreate(
            ['bulan' => $data['bulan'], 'tahun' => $data['tahun']],
            $data
        );

        return back()->with('success', 'Data bulanan berhasil disimpan.');
    }

    public function destroyBulanan(RealisasiBulanan $bulanan)
    {
        $bulanan->delete();

        return back()->with('success', 'Data bulanan berhasil dihapus.');
    }
}
