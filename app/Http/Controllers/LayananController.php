<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\SuratPengajuan;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function surat()
    {
        return view('layanan.surat');
    }

    public function suratStore(Request $request)
    {
        $data = $request->validate([
            'jenis_surat' => 'required|string|max:100',
            'nama' => 'required|string|max:255',
            'nik' => 'required|string|max:20',
            'alamat' => 'required|string|max:255',
            'keperluan' => 'required|string',
            'file_ktp' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        if ($request->hasFile('file_ktp')) {
            $data['file_ktp'] = $request->file('file_ktp')->store('surat', 'public');
        }

        SuratPengajuan::create($data);

        return back()->with('success', 'Pengajuan surat berhasil dikirim. Kami akan memprosesnya dalam 1-2 hari kerja.');
    }

    public function pengaduan()
    {
        $pengaduanSelesai = Pengaduan::where('status', 'selesai')->latest()->take(3)->get();

        return view('layanan.pengaduan', compact('pengaduanSelesai'));
    }

    public function pengaduanStore(Request $request)
    {
        $data = $request->validate([
            'nama' => 'nullable|string|max:255',
            'whatsapp' => 'nullable|string|max:30',
            'kategori' => 'required|string|max:100',
            'isi' => 'required|string',
            'file_lampiran' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('file_lampiran')) {
            $data['file_lampiran'] = $request->file('file_lampiran')->store('pengaduan', 'public');
        }

        Pengaduan::create($data);

        return back()->with('success', 'Pengaduan berhasil dikirim. Terima kasih atas laporan Anda.');
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
