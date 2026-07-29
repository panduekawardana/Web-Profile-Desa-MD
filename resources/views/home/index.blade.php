@extends('layouts.app')

@section('title', 'Desa Mekar Damai — Beranda')

@section('content')

    {{-- ================= HERO ================= --}}
    <section class="relative">
        <div class="h-[520px] md:h-[600px] w-full overflow-hidden">
            <img src="https://images.unsplash.com/photo-1500382017468-9049fed747ef?q=80&w=2000&auto=format&fit=crop"
                 alt="Sawah Desa Mekar Damai"
                 class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-black/20"></div>
        </div>

        <div class="absolute inset-0 flex items-center">
            <div class="max-w-7xl mx-auto px-6 lg:px-10 w-full">
                <div class="max-w-xl">
                    <span class="inline-block bg-primary-600/90 text-white text-xs font-semibold px-3 py-1 rounded-full mb-4">
                        Pemerintahan Berbasis Digital
                    </span>
                    <h1 class="text-3xl md:text-5xl font-extrabold text-white leading-tight">
                        Wujudkan Desa Mandiri Lewat Transparansi.
                    </h1>
                    <p class="text-white/85 mt-4 text-sm md:text-base leading-relaxed">
                        Menyatukan kearifan lokal dengan inovasi digital untuk pelayanan publik
                        yang lebih cepat, tepat, dan terbuka bagi seluruh warga Mekar Damai.
                    </p>
                    <div class="flex flex-wrap gap-3 mt-7">
                        <a href="{{ route('surat') }}"
                           class="bg-primary-600 hover:bg-primary-700 text-white text-sm font-semibold px-6 py-3 rounded-lg transition">
                            Ajukan Layanan Online
                        </a>
                        <a href="{{ route('profil.sejarah') }}"
                           class="bg-gray-900/70 hover:bg-gray-900 text-white text-sm font-semibold px-6 py-3 rounded-lg transition">
                            Jelajahi Desa
                        </a>
                    </div>
                </div>
            </div>
        </div>

        {{-- Stats bar overlapping hero bottom --}}
        <div class="relative max-w-6xl mx-auto px-6 lg:px-10 -mt-10 md:-mt-8">
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 grid grid-cols-2 md:grid-cols-4 divide-y md:divide-y-0 md:divide-x divide-gray-100">
                @foreach([
                    ['label' => 'TOTAL PENDUDUK', 'value' => $stats['total_penduduk'], 'delta' => $stats['total_penduduk_delta']],
                    ['label' => 'LAYANAN SELESAI', 'value' => $stats['layanan_selesai'], 'delta' => null],
                    ['label' => 'BUMDES AKTIF', 'value' => $stats['bumdes_aktif'], 'delta' => null],
                    ['label' => 'TRANSPARANSI DANA', 'value' => $stats['transparansi_dana'], 'delta' => null],
                ] as $stat)
                    <div class="p-5 text-center md:text-left">
                        <p class="text-[11px] font-semibold text-gray-400 tracking-wide">{{ $stat['label'] }}</p>
                        <p class="text-xl font-bold text-gray-900 mt-1">
                            {{ $stat['value'] }}
                            @if($stat['delta'])
                                <span class="text-xs font-semibold text-primary-600">{{ $stat['delta'] }}</span>
                            @endif
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ================= POTENSI DESA ================= --}}
    <section class="max-w-7xl mx-auto px-6 lg:px-10 pt-24 pb-16">
        <div class="flex items-end justify-between mb-8">
            <div>
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900">Potensi Desa Kami</h2>
                <p class="text-gray-500 mt-2 max-w-xl text-sm md:text-base">
                    Melihat lebih dekat bagaimana Mekar Damai berkembang melalui sektor
                    pertanian modern, pariwisata alam, dan UMKM kreatif.
                </p>
            </div>
            <a href="{{ route('profil.sejarah') }}" class="hidden md:inline-flex text-primary-700 text-sm font-semibold hover:underline whitespace-nowrap">
                Lihat Profil Lengkap →
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <a href="{{ route('profil.sejarah') }}" class="col-span-1 md:col-span-2 relative rounded-2xl overflow-hidden group h-72 md:h-full min-h-[280px]">
                <img src="https://images.unsplash.com/photo-1501854140801-50d01698950b?q=80&w=1400&auto=format&fit=crop"
                     alt="Pariwisata Alam" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                <div class="absolute bottom-0 p-6">
                    <span class="text-xs font-semibold text-primary-200 bg-black/30 px-2 py-1 rounded">Pariwisata</span>
                    <h3 class="text-white font-bold text-lg mt-2">Wisata Alam & Agrowisata Mekar Damai</h3>
                </div>
            </a>

            <div class="grid grid-rows-2 gap-6">
                <a href="{{ route('surat') }}" class="rounded-2xl bg-primary-50 border border-primary-100 p-6 flex flex-col justify-between hover:shadow-md transition">
                    <div class="w-10 h-10 rounded-lg bg-primary-600 flex items-center justify-center text-white mb-3">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17V7a2 2 0 012-2h6a2 2 0 012 2v10a2 2 0 01-2 2h-6a2 2 0 01-2-2z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7H5a2 2 0 00-2 2v8a2 2 0 002 2h4" /></svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900">Pusat UMKM Digital</h3>
                        <p class="text-sm text-gray-500 mt-1">Mendukung lebih dari 50 pengrajin lokal untuk go-digital melalui marketplace terintegrasi desa.</p>
                    </div>
                </a>
                <a href="{{ route('apbdes') }}" class="rounded-2xl bg-gray-900 text-white p-6 flex flex-col justify-between hover:shadow-md transition">
                    <div class="w-10 h-10 rounded-lg bg-white/10 flex items-center justify-center mb-3">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 21h18M5 21V7l8-4 8 4v14M9 9h.01M9 13h.01M9 17h.01" /></svg>
                    </div>
                    <div>
                        <h3 class="font-bold">Pertanian Modern & BUMDes</h3>
                        <p class="text-sm text-white/70 mt-1">Sistem irigasi organik dan koperasi tani mendukung produktivitas hasil bumi desa.</p>
                    </div>
                </a>
            </div>
        </div>
    </section>

    {{-- ================= KABAR & KEGIATAN ================= --}}
    <section class="bg-white border-t border-gray-100">
        <div class="max-w-7xl mx-auto px-6 lg:px-10 py-16">
            <div class="flex items-end justify-between mb-8">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900">Kabar & Kegiatan Desa</h2>
                <a href="{{ route('berita') }}" class="text-primary-700 text-sm font-semibold hover:underline whitespace-nowrap">
                    Lihat Semua →
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @forelse($beritaTerbaru as $b)
                    <a href="{{ route('berita') }}" class="group rounded-2xl overflow-hidden border border-gray-100 hover:shadow-lg transition">
                        <div class="h-44 overflow-hidden bg-gray-100">
                            <img src="{{ $b->image ? asset('storage/' . $b->image) : 'https://images.unsplash.com/photo-1500382017468-9049fed747ef?q=80&w=800&auto=format&fit=crop' }}"
                                 alt="{{ $b->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        </div>
                        <div class="p-5">
                            <div class="flex items-center gap-2 text-xs text-gray-400 mb-2">
                                <span class="font-semibold text-primary-700 bg-primary-50 px-2 py-0.5 rounded">{{ $b->category }}</span>
                                <span>{{ $b->published_at?->translatedFormat('d M Y') }}</span>
                            </div>
                            <h3 class="font-bold text-gray-900 leading-snug group-hover:text-primary-700 transition">
                                {{ $b->title }}
                            </h3>
                            <p class="text-sm text-gray-500 mt-2 line-clamp-2">{{ $b->excerpt }}</p>
                            <div class="flex items-center justify-between mt-4 text-xs">
                                <span class="text-gray-400">Admin Desa</span>
                                <span class="text-primary-700 font-semibold">Baca &rarr;</span>
                            </div>
                        </div>
                    </a>
                @empty
                    <p class="col-span-3 text-center text-gray-400 py-10">Belum ada berita yang dipublikasikan.</p>
                @endforelse
            </div>
        </div>
    </section>

@endsection
