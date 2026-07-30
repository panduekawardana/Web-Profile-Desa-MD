<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PeraturanDesa;
use Illuminate\Http\Request;

class PeraturanDesaController extends Controller
{
    public function index()
    {
        $peraturans = PeraturanDesa::orderByDesc('tanggal_ditetapkan')->paginate(10);

        return view('admin.perdes.index', compact('peraturans'));
    }

    public function create()
    {
        return view('admin.perdes.form', ['peraturan' => null]);
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);

        if ($request->hasFile('file')) {
            $data['file'] = $request->file('file')->store('perdes', 'public');
        }

        PeraturanDesa::create($data);

        return redirect()->route('admin.perdes.index')->with('success', 'Peraturan Desa berhasil ditambahkan.');
    }

    public function edit(PeraturanDesa $perdes)
    {
        return view('admin.perdes.form', ['peraturan' => $perdes]);
    }

    public function update(Request $request, PeraturanDesa $perdes)
    {
        $data = $this->validated($request);

        if ($request->hasFile('file')) {
            $data['file'] = $request->file('file')->store('perdes', 'public');
        }

        $perdes->update($data);

        return redirect()->route('admin.perdes.index')->with('success', 'Peraturan Desa berhasil diperbarui.');
    }

    public function destroy(PeraturanDesa $perdes)
    {
        $perdes->delete();

        return back()->with('success', 'Peraturan Desa berhasil dihapus.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'nomor' => 'required|string|max:100',
            'tentang' => 'required|string|max:255',
            'kategori' => 'required|string|max:100',
            'tanggal_ditetapkan' => 'required|date',
            'file' => 'nullable|file|mimes:pdf|max:5120',
        ]);
    }
}
