@extends('layouts.app')

@section('title', 'Kabar & Kegiatan Desa — Desa Mekar Damai')

@section('content')

    @include('layouts.page-header', [
        'title' => 'Kabar & Kegiatan Desa',
        'subtitle' => 'Ikuti perkembangan terbaru, program pembangunan, dan ragam aktivitas masyarakat Desa Mekar Damai menuju desa mandiri yang berkelanjutan.',
        'image' => 'https://images.unsplash.com/photo-1500382017468-9049fed747ef?q=80&w=1600&auto=format&fit=crop',
    ])

    @include('berita._subnav')

    <section class="max-w-7xl mx-auto px-6 lg:px-10 py-16">

        {{-- Featured --}}
        @if($beritaFeatured)
            <a href="#" class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-14 group">
                <div class="rounded-2xl overflow-hidden h-72 md:h-full bg-gray-100">
                    <img src="{{ $beritaFeatured->image ? asset('storage/' . $beritaFeatured->image) : 'https://images.unsplash.com/photo-1500382017468-9049fed747ef?q=80&w=1200&auto=format&fit=crop' }}"
                         alt="{{ $beritaFeatured->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                </div>
                <div class="flex flex-col justify-center">
                    <span class="text-xs font-semibold text-primary-700 bg-primary-50 px-2 py-1 rounded-full w-fit mb-3">
                        {{ $beritaFeatured->category }} &middot; {{ $beritaFeatured->published_at?->translatedFormat('d F Y') }}
                    </span>
                    <h2 class="text-2xl font-bold text-gray-900 group-hover:text-primary-700 transition">
                        {{ $beritaFeatured->title }}
                    </h2>
                    <p class="text-gray-500 text-sm mt-3">{{ $beritaFeatured->excerpt }}</p>
                    <span class="text-primary-700 font-semibold text-sm mt-4">Baca Selengkapnya &rarr;</span>
                </div>
            </a>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @forelse($beritas as $b)
                <a href="#" class="group rounded-2xl overflow-hidden border border-gray-100 hover:shadow-lg transition">
                    <div class="h-44 overflow-hidden bg-gray-100">
                        <img src="{{ $b->image ? asset('storage/' . $b->image) : 'https://images.unsplash.com/photo-1552664730-d307ca884978?q=80&w=800&auto=format&fit=crop' }}"
                             alt="{{ $b->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                    </div>
                    <div class="p-5">
                        <div class="flex items-center gap-2 text-xs text-gray-400 mb-2">
                            <span class="font-semibold text-primary-700 bg-primary-50 px-2 py-0.5 rounded">{{ $b->category }}</span>
                            <span>{{ $b->published_at?->translatedFormat('d M Y') }}</span>
                        </div>
                        <h3 class="font-bold text-gray-900 leading-snug group-hover:text-primary-700 transition">{{ $b->title }}</h3>
                        <p class="text-sm text-gray-500 mt-2 line-clamp-2">{{ $b->excerpt }}</p>
                        <div class="flex items-center justify-between mt-4 text-xs">
                            <span class="text-gray-400">Admin Desa</span>
                            <span class="text-primary-700 font-semibold">Baca &rarr;</span>
                        </div>
                    </div>
                </a>
            @empty
                <p class="col-span-3 text-center text-gray-400 py-10">Belum ada berita lainnya.</p>
            @endforelse
        </div>

        <div class="mt-10">{{ $beritas->links() }}</div>
    </section>

@endsection
