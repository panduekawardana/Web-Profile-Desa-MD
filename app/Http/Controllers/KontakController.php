<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    public function index()
    {
        return view('kontak.index');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'no_hp' => 'nullable|string|max:30',
            'subjek' => 'required|string|max:255',
            'pesan' => 'required|string',
        ]);

        Kontak::create($data);

        return back()->with('success', 'Pesan Anda berhasil dikirim. Kami akan segera menghubungi Anda kembali.');
    }
}
