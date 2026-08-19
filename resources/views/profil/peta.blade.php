@extends('layouts.app')

@section('title', 'Peta Wilayah — Desa Mekar Damai')

@section('content')

    @include('layouts.page-header', [
        'title' => 'Peta Wilayah Desa',
        'subtitle' => 'Wilayah Desa Mekar Damai terbagi menjadi 15 dusun strategis dengan potensi agrikultur dan UMKM yang beragam.',
        'image' => asset('images/peta-administrasi-desa.jpg'),
        'lightboxId' => 'peta-lightbox',
    ])

    @include('profil._subnav')

    <section class="max-w-7xl mx-auto px-6 lg:px-10 py-16">

        {{-- Lightbox (dibuka dari gambar header di atas) --}}
        <div id="peta-lightbox" class="hidden fixed inset-0 bg-black/90 z-50 flex items-center justify-center p-4 md:p-10"
             onclick="this.classList.add('hidden')">
            <button type="button" onclick="document.getElementById('peta-lightbox').classList.add('hidden')"
                    class="absolute top-5 right-5 text-white/80 hover:text-white">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
            </button>
            <img src="{{ asset('images/peta-administrasi-desa.jpg') }}"
                 alt="Peta Administrasi Desa Mekar Damai (perbesar)"
                 class="max-w-full max-h-full object-contain rounded-lg">
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            {{-- Map embed --}}
            <div class="lg:col-span-2">
                <h3 class="text-sm font-semibold text-gray-500 mb-3">Cari Lokasi di Google Maps</h3>
                <div class="rounded-2xl overflow-hidden border border-gray-100 shadow-sm h-[380px]">
                    <iframe
                        class="w-full h-full"
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                        src="https://www.google.com/maps?q=87XJ%2B9C2+Alung,+Desa+Mekar+Damai,+Kec.+Praya,+Kabupaten+Lombok+Tengah,+Nusa+Tenggara+Barat&z=16&output=embed">
                    </iframe>
                </div>
            </div>

            {{-- Info cards --}}
            <div class="space-y-4">
                <div class="bg-primary-50 rounded-xl p-5">
                    <p class="text-xs text-primary-700 font-semibold">Total Luas Wilayah</p>
                    <p class="text-2xl font-bold text-primary-900">382,55 Ha</p>
                </div>
                <div class="bg-gray-50 rounded-xl p-5">
                    <p class="text-xs text-gray-500 font-semibold">Jumlah Dusun</p>
                    <p class="text-2xl font-bold text-gray-900">15 Dusun</p>
                </div>
                <div class="bg-gray-50 rounded-xl p-5">
                    <p class="text-xs text-gray-500 font-semibold">Lahan Pertanian</p>
                    <p class="text-2xl font-bold text-gray-900">~70%</p>
                </div>
                <a href="{{ asset('documents/peta-administrasi-desa-mekar-damai.pdf') }}" target="_blank"
                   class="flex items-center justify-center gap-2 bg-primary-700 hover:bg-primary-800 text-white text-sm font-semibold py-3 rounded-xl transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1M7 10l5 5 5-5M12 15V3" /></svg>
                    Unduh Peta (PDF)
                </a>
            </div>
        </div>

        {{-- Batas Wilayah --}}
        <div class="mt-14">
            <h3 class="text-xl font-bold text-gray-900 mb-6">Batas Wilayah</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                @foreach([
                    ['arah' => 'Utara', 'desa' => 'Barabali & Pagutan', 'kec' => 'Kec. Batukliang'],
                    ['arah' => 'Selatan', 'desa' => 'Jago', 'kec' => 'Kec. Praya Barat'],
                    ['arah' => 'Timur', 'desa' => 'Aikmual & Montong Terep', 'kec' => 'Kec. Praya Timur'],
                    ['arah' => 'Barat', 'desa' => 'Jago & Pagutan', 'kec' => 'Kec. Jonggat'],
                ] as $batas)
                    <div class="border border-gray-100 rounded-xl p-4">
                        <span class="text-xs font-bold text-primary-700 uppercase tracking-wide">{{ $batas['arah'] }}</span>
                        <p class="font-semibold text-gray-900 text-sm mt-1">{{ $batas['desa'] }}</p>
                        <p class="text-xs text-gray-400 mt-0.5">{{ $batas['kec'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Orbitasi --}}
        <div class="mt-10">
            <h3 class="text-xl font-bold text-gray-900 mb-6">Jarak Tempuh (Orbitasi)</h3>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                @foreach([
                    ['label' => 'Ibu Kota Kecamatan', 'jarak' => '7 Km', 'waktu' => '± 15 menit'],
                    ['label' => 'Ibu Kota Kabupaten', 'jarak' => '7 Km', 'waktu' => '± 30 menit'],
                    ['label' => 'Ibu Kota Provinsi', 'jarak' => '20 Km', 'waktu' => '± 1 jam'],
                ] as $o)
                    <div class="bg-gray-50 rounded-xl p-5 text-center">
                        <p class="text-xs text-gray-500 font-semibold">{{ $o['label'] }}</p>
                        <p class="text-xl font-bold text-gray-900 mt-1">{{ $o['jarak'] }}</p>
                        <p class="text-xs text-gray-400 mt-0.5">{{ $o['waktu'] }} berkendara</p>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Daftar dusun --}}
        <div class="mt-14">
            <div class="flex items-end justify-between mb-2">
                <h3 class="text-xl font-bold text-gray-900">Daftar Dusun</h3>
            </div>
            <p class="text-sm text-gray-500 mb-6 max-w-2xl">
                Informasi terperinci mengenai kependudukan dan potensi dari masing-masing wilayah dusun.
            </p>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
                @foreach($dusuns as $dusun)
                    @php
                        $badgeStyle = [
                            'Pertanian' => ['bg' => 'bg-primary-50 text-primary-700', 'icon' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z'],
                            'UMKM' => ['bg' => 'bg-amber-50 text-amber-700', 'icon' => 'M9 17V7a2 2 0 012-2h6a2 2 0 012 2v10a2 2 0 01-2 2h-6a2 2 0 01-2-2z'],
                            'Wisata' => ['bg' => 'bg-blue-50 text-blue-700', 'icon' => 'M3 21h18M5 21V7l8-4 8 4v14M9 9h.01M9 13h.01M9 17h.01'],
                            'Pendidikan' => ['bg' => 'bg-purple-50 text-purple-700', 'icon' => 'M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z'],
                            'Perikanan' => ['bg' => 'bg-cyan-50 text-cyan-700', 'icon' => 'M12 6v6m0 0v6m0-6h6m-6 0H6'],
                            'Peternakan' => ['bg' => 'bg-orange-50 text-orange-700', 'icon' => 'M13 10V3L4 14h7v7l9-11h-7z'],
                        ][$dusun->potensi_utama] ?? ['bg' => 'bg-gray-100 text-gray-500', 'icon' => 'M3 21h18M5 21V7l8-4 8 4v14M9 9h.01M9 13h.01M9 17h.01'];
                    @endphp
                    <div class="border border-gray-100 rounded-2xl p-5 hover:shadow-md transition">
                        <div class="flex items-center justify-between mb-3">
                            <div class="w-10 h-10 rounded-lg bg-primary-50 text-primary-700 flex items-center justify-center">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" /></svg>
                            </div>
                            <div class="w-9 h-9 rounded-lg {{ $badgeStyle['bg'] }} flex items-center justify-center">
                                <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $badgeStyle['icon'] }}" /></svg>
                            </div>
                        </div>

                        <h4 class="font-bold text-gray-900 leading-snug mb-3">Dusun {{ $dusun->nama }}</h4>

                        <div class="space-y-2 text-xs text-gray-500 mb-4">
                            <p class="flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                                Kepala Dusun: <span class="font-semibold text-gray-800">{{ $dusun->kepala_dusun ?: 'Belum diisi' }}</span>
                            </p>
                            <p class="flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m6-8.13a4 4 0 11-8 0 4 4 0 018 0zm6 3a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                                Penduduk: <span class="font-semibold text-gray-800">{{ $dusun->jumlah_penduduk ? number_format($dusun->jumlah_penduduk, 0, ',', '.') . ' Jiwa' : 'Belum diisi' }}</span>
                            </p>
                            <p class="flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" /></svg>
                                Luas Wilayah: <span class="font-semibold text-gray-800">{{ $dusun->luas_wilayah ? $dusun->luas_wilayah . ' Ha' : 'Belum diisi' }}</span>
                            </p>
                        </div>

                        @if($dusun->potensi_utama)
                            <span class="inline-block text-xs font-semibold {{ $badgeStyle['bg'] }} px-2.5 py-1 rounded-full">
                                {{ $dusun->potensi_utama }}
                            </span>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
