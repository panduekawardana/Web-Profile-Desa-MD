<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LaporanPertanggungjawaban;
use Illuminate\Http\Request;

class LpjController extends Controller
{
    public function index()
    {
        $lpjs = LaporanPertanggungjawaban::orderByDesc('tahun')->paginate(10);

        return view('admin.lpj.index', compact('lpjs'));
    }

    public function create()
    {
        return view('admin.lpj.form', ['lpj' => null]);
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);

        if ($request->hasFile('file')) {
            $data['file'] = $request->file('file')->store('lpj', 'public');
        }

        LaporanPertanggungjawaban::create($data);

        return redirect()->route('admin.lpj.index')->with('success', 'LPJ berhasil ditambahkan.');
    }

    public function edit(LaporanPertanggungjawaban $lpj)
    {
        return view('admin.lpj.form', compact('lpj'));
    }

    public function update(Request $request, LaporanPertanggungjawaban $lpj)
    {
        $data = $this->validated($request);

        if ($request->hasFile('file')) {
            $data['file'] = $request->file('file')->store('lpj', 'public');
        }

        $lpj->update($data);

        return redirect()->route('admin.lpj.index')->with('success', 'LPJ berhasil diperbarui.');
    }

    public function destroy(LaporanPertanggungjawaban $lpj)
    {
        $lpj->delete();

        return back()->with('success', 'LPJ berhasil dihapus.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'tahun' => 'required|string|max:10',
            'status' => 'required|string|max:100',
            'tanggal_disampaikan' => 'nullable|date',
            'catatan' => 'nullable|string',
            'file' => 'nullable|file|mimes:pdf|max:5120',
        ]);
    }
}
