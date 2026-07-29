@extends('layouts.app')

@section('title', 'Perangkat Desa — Desa Mekar Damai')

@section('content')

    @include('layouts.page-header', [
        'badge' => 'Profil Kepemimpinan',
        'title' => 'Melayani dengan Hati, Membangun dengan Transparansi',
        'subtitle' => 'Struktur organisasi Desa Mekar Damai dirancang untuk memastikan setiap layanan publik tersampaikan secara efektif kepada 15 dusun kami.',
        'image' => 'https://images.unsplash.com/photo-1523240795612-9a054b0db644?q=80&w=1600&auto=format&fit=crop',
    ])

    @include('profil._subnav')

    <section class="max-w-7xl mx-auto px-6 lg:px-10 py-16">

        {{-- Kepala Desa highlight card --}}
        <div class="flex items-center gap-4 bg-white border border-gray-100 rounded-2xl p-5 shadow-sm max-w-md mb-14">
            <img src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?q=80&w=200&auto=format&fit=crop"
                 alt="Ir. H. Ahmad Fauzi" class="w-14 h-14 rounded-full object-cover">
            <div>
                <p class="font-bold text-gray-900">Ir. H. Ahmad Fauzi</p>
                <p class="text-xs text-gray-500">Kepala Desa Mekar Damai (2021 &ndash; 2027)</p>
            </div>
        </div>

        <div class="bg-primary-50 rounded-2xl p-8 md:p-10">
            <h2 class="text-xl md:text-2xl font-bold text-primary-900">Struktur Perangkat Desa</h2>
            <p class="text-primary-700/80 text-sm mt-2 max-w-2xl">
                Sinergi antar bidang untuk mewujudkan tata kelola desa yang efektif, efisien, dan berpihak pada warga.
            </p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mt-8">
                @foreach([
                    ['icon' => 'doc', 'title' => 'Sekretariat', 'desc' => 'Pusat administrasi, pengarsipan, dan koordinasi antar unit kerja desa.', 'staff' => [['role' => 'Sekretaris Desa', 'name' => 'Siti Aminah, S.E.'], ['role' => 'Kaur Keuangan', 'name' => 'Budi Santoso']]],
                    ['icon' => 'tools', 'title' => 'Pembangunan', 'desc' => 'Mengelola infrastruktur fisik dan pemberdayaan masyarakat desa.', 'staff' => [['role' => 'Kasi Pembangunan', 'name' => 'Dedi Irawan'], ['role' => 'Pendamping Desa', 'name' => 'Lina Marlina']]],
                    ['icon' => 'shield', 'title' => 'Pemerintahan', 'desc' => 'Menangani administrasi kependudukan dan ketertiban wilayah.', 'staff' => [['role' => 'Kasi Pemerintahan', 'name' => 'Agus Prasetyo'], ['role' => 'Staf Kependudukan', 'name' => 'Nur Hidayah']]],
                    ['icon' => 'users', 'title' => 'Kesejahteraan Rakyat', 'desc' => 'Mengoordinasikan program sosial, kesehatan, dan pendidikan warga.', 'staff' => [['role' => 'Kasi Kesra', 'name' => 'Wahyu Setiawan'], ['role' => 'Staf Posyandu', 'name' => 'Ratna Sari']]],
                ] as $bidang)
                    <div class="bg-white rounded-2xl p-6 shadow-sm">
                        <div class="w-10 h-10 rounded-lg bg-primary-100 text-primary-700 flex items-center justify-center mb-4">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
                        </div>
                        <h3 class="font-bold text-gray-900">{{ $bidang['title'] }}</h3>
                        <p class="text-sm text-gray-500 mt-1 mb-4">{{ $bidang['desc'] }}</p>
                        <div class="border-t border-gray-100 pt-4 grid grid-cols-2 gap-3">
                            @foreach($bidang['staff'] as $s)
                                <div>
                                    <p class="text-xs text-gray-400">{{ $s['role'] }}</p>
                                    <p class="text-sm font-semibold text-gray-800">{{ $s['name'] }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
