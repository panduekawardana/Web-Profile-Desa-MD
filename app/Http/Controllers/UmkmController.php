<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class UmkmController extends Controller
{
    public function index(Request $request)
    {
        $produks = Produk::when($request->kategori && $request->kategori !== 'Semua', function ($q) use ($request) {
                $q->where('category', $request->kategori);
            })
            ->latest()
            ->paginate(8)
            ->withQueryString();

        $kategoris = ['Semua', 'Kuliner', 'Kerajinan', 'Agrikultur', 'Fashion'];

        return view('umkm.index', compact('produks', 'kategoris'));
    }
}
