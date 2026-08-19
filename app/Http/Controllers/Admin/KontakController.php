<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kontak;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    public function index(Request $request)
    {
        $kontaks = Kontak::when($request->status, function ($q) use ($request) {
                $q->where('status', $request->status);
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.kontak.index', compact('kontaks'));
    }

    public function edit(Kontak $kontak)
    {
        if ($kontak->status === 'baru') {
            $kontak->update(['status' => 'dibaca']);
        }

        return view('admin.kontak.show', compact('kontak'));
    }

    public function update(Request $request, Kontak $kontak)
    {
        $request->validate([
            'status' => 'required|in:baru,dibaca,dibalas',
        ]);

        $kontak->update(['status' => $request->status]);

        return redirect()->route('admin.kontak.index')->with('success', 'Status pesan berhasil diperbarui.');
    }

    public function destroy(Kontak $kontak)
    {
        $kontak->delete();

        return back()->with('success', 'Pesan berhasil dihapus.');
    }
}
