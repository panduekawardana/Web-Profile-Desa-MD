<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dusun;
use Illuminate\Http\Request;

class DusunController extends Controller
{
    public function index()
    {
        $dusuns = Dusun::orderBy('urutan')->paginate(15);

        return view('admin.dusun.index', compact('dusuns'));
    }

    public function create()
    {
        return view('admin.dusun.form', ['dusun' => null]);
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        $data['urutan'] = Dusun::max('urutan') + 1;

        Dusun::create($data);

        return redirect()->route('admin.dusun.index')->with('success', 'Dusun berhasil ditambahkan.');
    }

    public function edit(Dusun $dusun)
    {
        return view('admin.dusun.form', compact('dusun'));
    }

    public function update(Request $request, Dusun $dusun)
    {
        $dusun->update($this->validated($request));

        return redirect()->route('admin.dusun.index')->with('success', 'Data dusun berhasil diperbarui.');
    }

    public function destroy(Dusun $dusun)
    {
        $dusun->delete();

        return back()->with('success', 'Dusun berhasil dihapus.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'nama' => 'required|string|max:255',
            'kepala_dusun' => 'nullable|string|max:255',
            'jumlah_penduduk' => 'nullable|integer|min:0',
            'luas_wilayah' => 'nullable|numeric|min:0',
            'potensi_utama' => 'nullable|string|max:100',
        ]);
    }
}
