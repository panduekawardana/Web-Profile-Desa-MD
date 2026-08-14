{{--
    Partial hero kecil untuk halaman-halaman dalam (bukan Beranda).
    Pakai: @include('layouts.page-header', ['badge' => 'Profil Kepemimpinan', 'title' => '...', 'subtitle' => '...', 'image' => 'https://...'])
    Opsional: 'lightboxId' => 'id-elemen-lightbox' -> gambar header jadi bisa diklik untuk membuka lightbox tsb.
--}}
<section class="relative">
    <div class="h-64 md:h-80 w-full overflow-hidden {{ isset($lightboxId) ? 'cursor-zoom-in group' : '' }}"
         @isset($lightboxId) onclick="document.getElementById('{{ $lightboxId }}').classList.remove('hidden')" @endisset>
        <img src="{{ $image ?? 'https://images.unsplash.com/photo-1500382017468-9049fed747ef?q=80&w=1600&auto=format&fit=crop' }}"
             alt="{{ $title ?? '' }}"
             class="w-full h-full object-cover {{ isset($lightboxId) ? 'group-hover:opacity-90 transition' : '' }}">
        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-black/10"></div>
        @isset($lightboxId)
            <span class="absolute top-5 right-5 bg-black/50 text-white text-xs font-semibold px-3 py-1.5 rounded-full flex items-center gap-1.5">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M11 19a8 8 0 100-16 8 8 0 000 16zM11 8v6m-3-3h6" /></svg>
                Klik untuk lihat peta lengkap
            </span>
        @endisset
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
