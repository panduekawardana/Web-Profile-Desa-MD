<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PeraturanKepalaDesa;
use Illuminate\Http\Request;

class PerkadesController extends Controller
{
    public function index()
    {
        $perkades = PeraturanKepalaDesa::orderByDesc('tanggal_ditetapkan')->paginate(10);

        return view('admin.perkades.index', compact('perkades'));
    }

    public function create()
    {
        return view('admin.perkades.form', ['item' => null]);
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);

        if ($request->hasFile('file')) {
            $data['file'] = $request->file('file')->store('perkades', 'public');
        }

        PeraturanKepalaDesa::create($data);

        return redirect()->route('admin.perkades.index')->with('success', 'Peraturan Kepala Desa berhasil ditambahkan.');
    }

    public function edit(PeraturanKepalaDesa $perkades)
    {
        return view('admin.perkades.form', ['item' => $perkades]);
    }

    public function update(Request $request, PeraturanKepalaDesa $perkades)
    {
        $data = $this->validated($request);

        if ($request->hasFile('file')) {
            $data['file'] = $request->file('file')->store('perkades', 'public');
        }

        $perkades->update($data);

        return redirect()->route('admin.perkades.index')->with('success', 'Peraturan Kepala Desa berhasil diperbarui.');
    }

    public function destroy(PeraturanKepalaDesa $perkades)
    {
        $perkades->delete();

        return back()->with('success', 'Peraturan Kepala Desa berhasil dihapus.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'nomor' => 'required|string|max:100',
            'tentang' => 'required|string|max:255',
            'tanggal_ditetapkan' => 'required|date',
            'file' => 'nullable|file|mimes:pdf|max:5120',
        ]);
    }
}
