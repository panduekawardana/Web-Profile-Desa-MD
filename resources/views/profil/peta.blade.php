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
            <h3 class="text-xl font-bold text-gray-900 mb-6">Daftar Dusun</h3>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                @foreach([
                    'Manggong Daye', 'Montong Sejagat', 'Bebie Baru', 'Lendang Batah Bat',
                    'Karang Lebah', 'Aik Gereng', 'Lendang Batah Lauq', 'Alung',
                    'Anak nao','Bebie Daye','bebie timuq','bebie lauq','mertak gawah',
                    'lendang batah','Manggong Lauq'
                ] as $dusun)
                    <div class="border border-gray-100 rounded-xl p-4 text-center hover:border-primary-300 transition">
                        <p class="font-semibold text-gray-800 text-sm">Dusun {{ $dusun }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
