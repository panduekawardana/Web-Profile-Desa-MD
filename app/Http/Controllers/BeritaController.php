<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Berita;
use App\Models\Pengumuman;

class BeritaController extends Controller
{
    public function berita()
    {
        $beritaFeatured = Berita::published()->latest('published_at')->first();
        $beritas = Berita::published()
            ->when($beritaFeatured, fn ($q) => $q->where('id', '!=', $beritaFeatured->id))
            ->latest('published_at')
            ->paginate(6);

        return view('berita.berita', compact('beritaFeatured', 'beritas'));
    }

    public function pengumuman()
    {
        $pengumumen = Pengumuman::latest('published_at')->paginate(10);

        return view('berita.pengumuman', compact('pengumumen'));
    }

    public function agenda()
    {
        $agendas = Agenda::where('event_date', '>=', now()->toDateString())
            ->orderBy('event_date')
            ->paginate(10);

        return view('berita.agenda', compact('agendas'));
    }
}
