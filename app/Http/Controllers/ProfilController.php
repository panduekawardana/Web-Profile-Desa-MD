<?php

namespace App\Http\Controllers;

class ProfilController extends Controller
{
    public function sejarah()
    {
        return view('profil.sejarah');
    }

    public function visi()
    {
        return view('profil.visi');
    }

    public function struktur()
    {
        return view('profil.struktur');
    }

    public function perangkat()
    {
        return view('profil.perangkat');
    }

    public function peta()
    {
        return view('profil.peta');
    }
}