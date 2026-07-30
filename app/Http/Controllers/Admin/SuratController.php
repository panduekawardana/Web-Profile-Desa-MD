<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SuratPengajuan;
use Illuminate\Http\Request;

class SuratController extends Controller
{
    public function index(Request $request)
    {
        $suratPengajuans = SuratPengajuan::when($request->status, function ($q) use ($request) {
                $q->where('status', $request->status);
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.surat.index', compact('suratPengajuans'));
    }

    public function edit(SuratPengajuan $surat)
    {
        return view('admin.surat.show', ['pengajuan' => $surat]);
    }

    public function update(Request $request, SuratPengajuan $surat)
    {
        $request->validate([
            'status' => 'required|in:baru,diproses,selesai,ditolak',
            'catatan_admin' => 'nullable|string',
        ]);

        $surat->update($request->only('status', 'catatan_admin'));

        return redirect()->route('admin.surat.index')->with('success', 'Status pengajuan berhasil diperbarui.');
    }

    public function destroy(SuratPengajuan $surat)
    {
        $surat->delete();

        return back()->with('success', 'Pengajuan berhasil dihapus.');
    }
}
