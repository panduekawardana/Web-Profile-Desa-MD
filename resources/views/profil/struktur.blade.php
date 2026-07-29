@extends('layouts.app')

@section('title', 'Struktur Organisasi — Desa Mekar Damai')

@section('content')

    @include('layouts.page-header', [
        'title' => 'Struktur Organisasi Desa',
        'subtitle' => 'Susunan tata kelola pemerintahan Desa Mekar Damai dari kepala desa hingga tingkat dusun.',
        'image' => 'https://images.unsplash.com/photo-1517048676732-d65bc937f952?q=80&w=1600&auto=format&fit=crop',
    ])

    @include('profil._subnav')

    <section class="max-w-5xl mx-auto px-6 lg:px-10 py-16">

        {{-- Kepala Desa --}}
        <div class="flex justify-center mb-6">
            <div class="bg-primary-800 text-white rounded-2xl px-8 py-5 text-center shadow-lg">
                <p class="font-bold">Kepala Desa</p>
                <p class="text-sm text-primary-100">Ir. H. Ahmad Fauzi</p>
            </div>
        </div>
        <div class="w-px h-8 bg-gray-300 mx-auto"></div>

        {{-- Sekretaris --}}
        <div class="flex justify-center mb-6">
            <div class="bg-white border-2 border-primary-700 rounded-2xl px-8 py-4 text-center shadow">
                <p class="font-bold text-gray-900">Sekretaris Desa</p>
                <p class="text-sm text-gray-500">Siti Aminah, S.E.</p>
            </div>
        </div>
        <div class="w-px h-8 bg-gray-300 mx-auto"></div>

        {{-- Kaur & Kasi row --}}
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            @foreach([
                ['title' => 'Kaur Keuangan', 'name' => 'Budi Santoso'],
                ['title' => 'Kaur Umum', 'name' => 'Rina Wulandari'],
                ['title' => 'Kasi Pemerintahan', 'name' => 'Dedi Irawan'],
                ['title' => 'Kasi Pembangunan', 'name' => 'Lina Marlina'],
            ] as $item)
                <div class="bg-gray-50 border border-gray-100 rounded-xl p-4 text-center">
                    <p class="font-semibold text-gray-900 text-sm">{{ $item['title'] }}</p>
                    <p class="text-xs text-gray-500 mt-1">{{ $item['name'] }}</p>
                </div>
            @endforeach
        </div>

        <div class="w-px h-8 bg-gray-300 mx-auto"></div>

        {{-- Kadus row --}}
        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
            @foreach(['Kepala Dusun Mekar Wangi', 'Kepala Dusun Sumber Asri', 'Kepala Dusun Tegal Rejo'] as $dusun)
                <div class="bg-primary-50 border border-primary-100 rounded-xl p-4 text-center">
                    <p class="font-semibold text-primary-800 text-sm">{{ $dusun }}</p>
                </div>
            @endforeach
        </div>

        <p class="text-center text-xs text-gray-400 mt-10">
            Struktur di atas berlaku untuk masa jabatan Kepala Desa periode 2021 &ndash; 2027.
        </p>
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
                    Selain perangkat pemerintah desa, Desa Mekar Damai juga memiliki sejumlah lembaga kemasyarakatan
                    yang berperan aktif dalam pembangunan dan kehidupan sosial warga.
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach([
                    [
                        'singkatan' => 'BPD',
                        'nama' => 'Badan Permusyawaratan Desa',
                        'desc' => 'Lembaga yang menjalankan fungsi pemerintahan bersama Kepala Desa, menampung dan menyalurkan aspirasi masyarakat.',
                        'icon' => 'M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m6-8.13a4 4 0 11-8 0 4 4 0 018 0zm6 3a4 4 0 11-8 0 4 4 0 018 0z',
                    ],
                    [
                        'singkatan' => 'LPMD',
                        'nama' => 'Lembaga Pemberdayaan Masyarakat Desa',
                        'desc' => 'Mitra pemerintah desa dalam menampung dan mewujudkan aspirasi serta kebutuhan masyarakat di bidang pembangunan.',
                        'icon' => 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 6v-3a1 1 0 011-1h2a1 1 0 011 1v3',
                    ],
                    [
                        'singkatan' => 'PKK',
                        'nama' => 'Pemberdayaan Kesejahteraan Keluarga',
                        'desc' => 'Menggerakkan program pemberdayaan perempuan dan keluarga di bidang kesehatan, pendidikan, dan ekonomi rumah tangga.',
                        'icon' => 'M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m6-8.13a4 4 0 11-8 0 4 4 0 018 0zm6 3a4 4 0 11-8 0 4 4 0 018 0z',
                    ],
                    [
                        'singkatan' => 'Karang Taruna',
                        'nama' => 'Organisasi Kepemudaan Desa',
                        'desc' => 'Wadah pengembangan generasi muda desa dalam kegiatan sosial, olahraga, seni budaya, dan kewirausahaan.',
                        'icon' => 'M13 10V3L4 14h7v7l9-11h-7z',
                    ],
                    [
                        'singkatan' => 'BKD',
                        'nama' => 'Badan Keamanan Desa',
                        'desc' => 'Menjaga ketertiban dan keamanan lingkungan desa serta membantu penanganan situasi darurat bersama warga.',
                        'icon' => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z',
                    ],
                    [
                        'singkatan' => 'Lembaga Adat',
                        'nama' => 'Lembaga Adat Desa',
                        'desc' => 'Melestarikan nilai-nilai adat istiadat dan kearifan lokal serta berperan dalam penyelesaian sengketa adat di masyarakat.',
                        'icon' => 'M3 21h18M5 21V7l8-4 8 4v14M9 9h.01M9 13h.01M9 17h.01',
                    ],
                ] as $lembaga)
                    <div class="border border-gray-100 rounded-2xl p-6 hover:shadow-md transition">
                        <div class="w-11 h-11 rounded-xl bg-primary-50 text-primary-700 flex items-center justify-center mb-4">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $lembaga['icon'] }}" /></svg>
                        </div>
                        <span class="text-xs font-bold text-primary-700 uppercase tracking-wide">{{ $lembaga['singkatan'] }}</span>
                        <h3 class="font-bold text-gray-900 mt-1">{{ $lembaga['nama'] }}</h3>
                        <p class="text-sm text-gray-500 mt-2 leading-relaxed">{{ $lembaga['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
