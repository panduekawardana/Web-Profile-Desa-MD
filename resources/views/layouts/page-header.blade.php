{{--
    Partial hero kecil untuk halaman-halaman dalam (bukan Beranda).
    Pakai: @include('layouts.page-header', ['badge' => 'Profil Kepemimpinan', 'title' => '...', 'subtitle' => '...', 'image' => 'https://...'])
--}}
<section class="relative">
    <div class="h-64 md:h-80 w-full overflow-hidden">
        <img src="{{ $image ?? 'https://images.unsplash.com/photo-1500382017468-9049fed747ef?q=80&w=1600&auto=format&fit=crop' }}"
             alt="{{ $title ?? '' }}"
             class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-black/10"></div>
    </div>
    <div class="absolute inset-0 flex items-end">
        <div class="max-w-7xl mx-auto px-6 lg:px-10 pb-8 w-full">
            @isset($badge)
                <span class="inline-block bg-primary-600/90 text-white text-xs font-semibold px-3 py-1 rounded-full mb-3">
                    {{ $badge }}
                </span>
            @endisset
            <h1 class="text-2xl md:text-4xl font-bold text-white">{{ $title }}</h1>
            @isset($subtitle)
                <p class="text-sm md:text-base text-white/80 mt-2 max-w-2xl">{{ $subtitle }}</p>
            @endisset
        </div>
    </div>
</section>
