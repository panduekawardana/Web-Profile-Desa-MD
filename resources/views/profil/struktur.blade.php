@extends('layouts.app')

@section('title', 'Struktur Organisasi — Desa Mekar Damai')

@section('content')

    @include('layouts.page-header', [
        'title' => 'Struktur Organisasi Desa',
        'subtitle' => 'Susunan tata kelola pemerintahan Desa Mekar Damai, Kecamatan Praya, Kabupaten Lombok Tengah.',
        'image' => 'https://images.unsplash.com/photo-1517048676732-d65bc937f952?q=80&w=1600&auto=format&fit=crop',
    ])

    @include('profil._subnav')

    <section class="max-w-5xl mx-auto px-6 lg:px-10 py-16">

        {{-- Kepala Desa --}}
        <div class="flex justify-center mb-6">
            <div class="bg-primary-800 text-white rounded-2xl px-8 py-5 text-center shadow-lg">
                <p class="font-bold">Kepala Desa</p>
                <p class="text-sm text-primary-100">Muhamad Yani, S.AP</p>
            </div>
        </div>
        <div class="w-px h-8 bg-gray-300 mx-auto"></div>

        {{-- Sekretaris --}}
        <div class="flex justify-center mb-6">
            <div class="bg-white border-2 border-primary-700 rounded-2xl px-8 py-4 text-center shadow">
                <p class="font-bold text-gray-900">Sekretaris Desa</p>
                <p class="text-sm text-gray-500">S1 &middot; Aktif</p>
            </div>
        </div>
        <div class="w-px h-8 bg-gray-300 mx-auto"></div>

        {{-- Kaur & Kasi row --}}
        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
            @foreach([
                'Kepala Urusan Umum',
                'Kepala Urusan Keuangan',
                'Kepala Urusan Pemerintahan',
                'Kepala Urusan Pembangunan',
                'Kepala Urusan Pemberdayaan Masyarakat',
                'Kepala Urusan Kesejahteraan Rakyat',
            ] as $jabatan)
                <div class="bg-gray-50 border border-gray-100 rounded-xl p-4 text-center">
                    <p class="font-semibold text-gray-900 text-sm">{{ $jabatan }}</p>
                    <p class="text-xs text-primary-600 mt-1">Aktif</p>
                </div>
            @endforeach
        </div>

        <div class="w-px h-8 bg-gray-300 mx-auto"></div>

        {{-- Ringkasan --}}
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-center">
            @foreach([
                ['label' => 'Perangkat Desa', 'value' => '23 Orang'],
                ['label' => 'Staf', 'value' => '5 Orang'],
                ['label' => 'Dusun', 'value' => '15 Dusun'],
                ['label' => 'Rukun Tetangga', 'value' => '54 RT'],
            ] as $s)
                <div class="bg-primary-50 border border-primary-100 rounded-xl p-4">
                    <p class="text-lg font-bold text-primary-800">{{ $s['value'] }}</p>
                    <p class="text-xs text-primary-600 mt-1">{{ $s['label'] }}</p>
                </div>
            @endforeach
        </div>

        <p class="text-center text-xs text-gray-400 mt-10">
            Sumber: Daftar Isian Potensi Desa dan Kelurahan, Desa Mekar Damai, Bulan 2 Tahun 2026.
        </p>
    </section>

    {{-- ================= BADAN PERMUSYAWARATAN DESA ================= --}}
    <section class="bg-primary-50/40 border-t border-gray-100">
        <div class="max-w-5xl mx-auto px-6 lg:px-10 py-16">
            <div class="text-center mb-10">
                <span class="inline-block bg-primary-100 text-primary-700 text-xs font-bold px-3 py-1 rounded-full mb-3">
                    Mitra Pemerintah Desa
                </span>
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900">Badan Permusyawaratan Desa (BPD)</h2>
                <p class="text-gray-500 mt-2 max-w-2xl mx-auto text-sm md:text-base">
                    BPD berjumlah 9 orang, menjalankan fungsi pemerintahan bersama Kepala Desa serta
                    menampung dan menyalurkan aspirasi masyarakat.
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 max-w-3xl mx-auto">
                <div class="bg-white border border-primary-100 rounded-xl p-4 text-center">
                    <p class="font-semibold text-gray-900 text-sm">Ketua</p>
                    <p class="text-xs text-gray-500 mt-1">S1</p>
                </div>
                <div class="bg-white border border-primary-100 rounded-xl p-4 text-center">
                    <p class="font-semibold text-gray-900 text-sm">Wakil Ketua</p>
                    <p class="text-xs text-gray-500 mt-1">S1</p>
                </div>
                <div class="bg-white border border-primary-100 rounded-xl p-4 text-center">
                    <p class="font-semibold text-gray-900 text-sm">Sekretaris</p>
                    <p class="text-xs text-gray-500 mt-1">S1</p>
                </div>
                @foreach([
                    ['name' => 'Rusnan, S.H.', 'edu' => 'S1'],
                    ['name' => 'Usman Paizal', 'edu' => 'SLTA'],
                    ['name' => 'Mahsun', 'edu' => 'SLTA'],
                    ['name' => 'Irham, S.Pd', 'edu' => 'S1'],
                    ['name' => 'H. Marzuki, S.Pd', 'edu' => 'S1'],
                    ['name' => 'Maemunah, S.Pd', 'edu' => 'S1'],
                ] as $anggota)
                    <div class="bg-white border border-gray-100 rounded-xl p-4 text-center">
                        <p class="font-semibold text-gray-900 text-sm">{{ $anggota['name'] }}</p>
                        <p class="text-xs text-gray-500 mt-1">Anggota &middot; {{ $anggota['edu'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ================= LEMBAGA DESA LAINNYA ================= --}}
    <section class="bg-white border-t border-gray-100">
        <div class="max-w-6xl mx-auto px-6 lg:px-10 py-16">
            <div class="text-center mb-10">
                <span class="inline-block bg-primary-50 text-primary-700 text-xs font-bold px-3 py-1 rounded-full mb-3">
                    Kelembagaan Desa
                </span>
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900">Struktur Organisasi Lembaga Desa Lainnya</h2>
                <p class="text-gray-500 mt-2 max-w-2xl mx-auto text-sm md:text-base">
                    Selain perangkat pemerintah desa, Desa Mekar Damai memiliki sejumlah lembaga kemasyarakatan
                    yang berperan aktif dalam pembangunan dan kehidupan sosial warga.
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach([
                    [
                        'singkatan' => 'LPMD',
                        'nama' => 'Lembaga Pemberdayaan Masyarakat Desa',
                        'desc' => 'Mitra pemerintah desa dalam menampung dan mewujudkan aspirasi serta kebutuhan masyarakat di bidang pembangunan.',
                        'pengurus' => '14 Pengurus',
                        'icon' => 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 6v-3a1 1 0 011-1h2a1 1 0 011 1v3',
                    ],
                    [
                        'singkatan' => 'PKK',
                        'nama' => 'Pemberdayaan Kesejahteraan Keluarga',
                        'desc' => 'Menggerakkan program pemberdayaan perempuan dan keluarga di bidang kesehatan, pendidikan, dan ekonomi rumah tangga.',
                        'pengurus' => '26 Pengurus',
                        'icon' => 'M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m6-8.13a4 4 0 11-8 0 4 4 0 018 0zm6 3a4 4 0 11-8 0 4 4 0 018 0z',
                    ],
                    [
                        'singkatan' => 'Karang Taruna',
                        'nama' => 'Organisasi Kepemudaan Desa',
                        'desc' => 'Wadah pengembangan generasi muda desa dalam kegiatan sosial, olahraga, seni budaya, dan kewirausahaan.',
                        'pengurus' => '13 Pengurus',
                        'icon' => 'M13 10V3L4 14h7v7l9-11h-7z',
                    ],
                    [
                        'singkatan' => 'Kelompok Tani',
                        'nama' => 'Kelompok Tani & Nelayan',
                        'desc' => 'Menghimpun petani desa dalam 10 kelompok untuk mendukung produktivitas dan kesejahteraan hasil pertanian.',
                        'pengurus' => '50 Pengurus &middot; 10 Kelompok',
                        'icon' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z',
                    ],
                    [
                        'singkatan' => 'Lembaga Adat',
                        'nama' => 'Lembaga Adat Desa',
                        'desc' => 'Melestarikan nilai-nilai adat istiadat Sasak dan kearifan lokal serta berperan dalam penyelesaian sengketa adat di masyarakat.',
                        'pengurus' => '40 Pengurus',
                        'icon' => 'M3 21h18M5 21V7l8-4 8 4v14M9 9h.01M9 13h.01M9 17h.01',
                    ],
                    [
                        'singkatan' => 'BUMDes',
                        'nama' => 'Badan Usaha Milik Desa',
                        'desc' => 'Mengelola unit usaha ekonomi desa untuk meningkatkan pendapatan asli desa dan kesejahteraan warga.',
                        'pengurus' => '6 Pengurus',
                        'icon' => 'M9 17V7a2 2 0 012-2h6a2 2 0 012 2v10a2 2 0 01-2 2h-6a2 2 0 01-2-2z',
                    ],
                ] as $lembaga)
                    <div class="border border-gray-100 rounded-2xl p-6 hover:shadow-md transition">
                        <div class="w-11 h-11 rounded-xl bg-primary-50 text-primary-700 flex items-center justify-center mb-4">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $lembaga['icon'] }}" /></svg>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-bold text-primary-700 uppercase tracking-wide">{{ $lembaga['singkatan'] }}</span>
                            <span class="text-[11px] font-semibold text-gray-400">{{ $lembaga['pengurus'] }}</span>
                        </div>
                        <h3 class="font-bold text-gray-900 mt-1">{{ $lembaga['nama'] }}</h3>
                        <p class="text-sm text-gray-500 mt-2 leading-relaxed">{{ $lembaga['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
