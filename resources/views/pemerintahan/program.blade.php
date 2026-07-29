@extends('layouts.app')

@section('title', 'Program Kerja — Desa Mekar Damai')

@section('content')

    @include('layouts.page-header', [
        'title' => 'Program Kerja Desa',
        'subtitle' => 'Ikuti perkembangan terbaru program dan kegiatan pembangunan Desa Mekar Damai tahun berjalan.',
        'image' => 'https://images.unsplash.com/photo-1466611653911-95081537e5b7?q=80&w=1600&auto=format&fit=crop',
    ])

    @include('pemerintahan._subnav')

    <section class="max-w-7xl mx-auto px-6 lg:px-10 py-16">
        <div class="space-y-6">
            @foreach([
                ['title' => 'Pembangunan Jalan Lingkar Barat Tahap II', 'bidang' => 'Infrastruktur', 'percent' => 80, 'desc' => 'Proses pengaspalan jalan penghubung antar dusun terus dikebut guna memperlancar akses.'],
                ['title' => 'Workshop Digitalisasi UMKM Desa', 'bidang' => 'Ekonomi', 'percent' => 100, 'desc' => 'Pelatihan pemasaran digital bagi pelaku UMKM lokal untuk menembus pasar yang lebih luas.'],
                ['title' => 'Program Penurunan Angka Stunting', 'bidang' => 'Kesehatan', 'percent' => 65, 'desc' => 'Pemberian nutrisi tambahan dan edukasi gizi rutin bagi balita di seluruh posyandu desa.'],
                ['title' => 'Rehabilitasi Saluran Irigasi Sawah', 'bidang' => 'Pertanian', 'percent' => 40, 'desc' => 'Perbaikan saluran irigasi untuk mendukung produktivitas pertanian organik warga.'],
            ] as $program)
                <div class="bg-white border border-gray-100 rounded-2xl p-6">
                    <div class="flex flex-wrap items-center justify-between gap-3 mb-3">
                        <div>
                            <span class="text-xs font-semibold text-primary-700 bg-primary-50 px-2 py-1 rounded-full">{{ $program['bidang'] }}</span>
                            <h3 class="font-bold text-gray-900 mt-2">{{ $program['title'] }}</h3>
                        </div>
                        <span class="text-lg font-bold text-primary-700">{{ $program['percent'] }}%</span>
                    </div>
                    <p class="text-sm text-gray-500 mb-4">{{ $program['desc'] }}</p>
                    <div class="w-full h-2 bg-gray-100 rounded-full">
                        <div class="h-2 bg-primary-600 rounded-full" style="width: {{ $program['percent'] }}%"></div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

@endsection
