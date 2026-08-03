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
            <a href="{{ route('profil.sejarah') }}" class="relative rounded-2xl overflow-hidden group h-80">
                <img src="https://images.unsplash.com/photo-1501854140801-50d01698950b?q=80&w=800&auto=format&fit=crop"
                     alt="Wisata Alam" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-black/75 via-black/10 to-transparent"></div>
                <div class="absolute bottom-0 p-6">
                    <span class="text-xs font-semibold text-primary-200 bg-black/30 px-2 py-1 rounded">Pariwisata</span>
                    <h3 class="text-white font-bold text-lg mt-2 leading-snug">Wisata Alam & Agrowisata Mekar Damai</h3>
                </div>
            </a>

            <a href="{{ route('umkm') }}" class="relative rounded-2xl overflow-hidden group h-80">
                <img src="https://images.unsplash.com/photo-1556740738-b6a63e27c4df?q=80&w=800&auto=format&fit=crop"
                     alt="UMKM Digital" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-black/75 via-black/10 to-transparent"></div>
                <div class="absolute bottom-0 p-6">
                    <span class="text-xs font-semibold text-primary-200 bg-black/30 px-2 py-1 rounded">Ekonomi</span>
                    <h3 class="text-white font-bold text-lg mt-2 leading-snug">Pusat UMKM Digital</h3>
                    <p class="text-white/80 text-sm mt-1">50+ pengrajin lokal go-digital</p>
                </div>
            </a>

            <a href="{{ route('apbdes') }}" class="relative rounded-2xl overflow-hidden group h-80">
                <img src="https://images.unsplash.com/photo-1500382017468-9049fed747ef?q=80&w=800&auto=format&fit=crop"
                     alt="Pertanian Modern" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-black/75 via-black/10 to-transparent"></div>
                <div class="absolute bottom-0 p-6">
                    <span class="text-xs font-semibold text-primary-200 bg-black/30 px-2 py-1 rounded">Pertanian</span>
                    <h3 class="text-white font-bold text-lg mt-2 leading-snug">Pertanian Modern & BUMDes</h3>
                    <p class="text-white/80 text-sm mt-1">Irigasi organik & koperasi tani</p>
                </div>
            </a>
        </div>
    </section>

    {{-- ================= VIDEO PROFIL DESA ================= --}}
    <section class="bg-primary-950 py-20">
        <div class="max-w-4xl mx-auto px-6 lg:px-10 text-center">
            <span class="inline-block bg-primary-600/90 text-white text-xs font-semibold px-3 py-1 rounded-full mb-4">
                Kenali Kami Lebih Dekat
            </span>
            <h2 class="text-2xl md:text-3xl font-bold text-white">Video Profil Desa Mekar Damai</h2>
            <p class="text-primary-200 mt-3 max-w-xl mx-auto text-sm md:text-base">
                Saksikan perjalanan transformasi digital dan ragam potensi Desa Mekar Damai dalam video singkat berikut.
            </p>

            {{--
                PENTING: ganti data-video-id di bawah dengan ID video YouTube profil desa kamu.
                Cara ambil ID: dari link https://youtube.com/watch?v=XXXXXXXXXXX -> ID-nya adalah "XXXXXXXXXXX"
                (kode di bawah ini masih placeholder kosong, video belum akan tampil sebelum diganti)
            --}}
            <div id="video-profil-desa"
                 data-video-id="GANTI_DENGAN_ID_VIDEO_YOUTUBE"
                 class="mt-10 relative rounded-2xl overflow-hidden shadow-2xl aspect-video bg-black">
                <img src="https://images.unsplash.com/photo-1500382017468-9049fed747ef?q=80&w=1600&auto=format&fit=crop"
                     alt="Thumbnail Video Profil Desa" class="w-full h-full object-cover opacity-70">
                <button type="button" onclick="playVideoProfilDesa()"
                        class="absolute inset-0 flex items-center justify-center group cursor-pointer">
                    <span class="w-16 h-16 md:w-20 md:h-20 rounded-full bg-white/95 group-hover:bg-white flex items-center justify-center transition shadow-xl group-hover:scale-105">
                        <svg class="w-7 h-7 md:w-8 md:h-8 text-primary-700 ml-1" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z" /></svg>
                    </span>
                </button>
            </div>
        </div>
    </section>

    <script>
        function playVideoProfilDesa() {
            const wrapper = document.getElementById('video-profil-desa');
            const videoId = wrapper.dataset.videoId;

            if (!videoId || videoId.startsWith('GANTI_')) {
                alert('Video profil desa belum diatur.\n\nAdmin: buka file resources/views/home/index.blade.php, cari "GANTI_DENGAN_ID_VIDEO_YOUTUBE", ganti dengan ID video YouTube-mu.');
                return;
            }

            wrapper.innerHTML = '<iframe class="w-full h-full" src="https://www.youtube.com/embed/' + videoId + '?autoplay=1" title="Video Profil Desa Mekar Damai" frameborder="0" allow="autoplay; encrypted-media; picture-in-picture" allowfullscreen></iframe>';
        }
    </script>

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
