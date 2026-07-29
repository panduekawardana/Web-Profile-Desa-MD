<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengumuman;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    public function index()
    {
        $pengumumen = Pengumuman::latest()->paginate(10);

        return view('admin.pengumuman.index', compact('pengumumen'));
    }

    public function create()
    {
        return view('admin.pengumuman.form', ['pengumuman' => null]);
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        $data['published_at'] = now();

        Pengumuman::create($data);

        return redirect()->route('admin.pengumuman.index')->with('success', 'Pengumuman berhasil ditambahkan.');
    }

    public function edit(Pengumuman $pengumuman)
    {
        return view('admin.pengumuman.form', compact('pengumuman'));
    }

    public function update(Request $request, Pengumuman $pengumuman)
    {
        $pengumuman->update($this->validated($request));

        return redirect()->route('admin.pengumuman.index')->with('success', 'Pengumuman berhasil diperbarui.');
    }

    public function destroy(Pengumuman $pengumuman)
    {
        $pengumuman->delete();

        return back()->with('success', 'Pengumuman berhasil dihapus.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'is_urgent' => 'sometimes|boolean',
        ]) + ['is_urgent' => $request->boolean('is_urgent')];
    }
}
