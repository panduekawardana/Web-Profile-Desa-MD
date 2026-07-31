@extends('layouts.app')

@section('title', 'Peta Wilayah — Desa Mekar Damai')

@section('content')

    @include('layouts.page-header', [
        'title' => 'Peta Wilayah Desa',
        'subtitle' => 'Wilayah Desa Mekar Damai terbagi menjadi 15 dusun strategis dengan potensi agrikultur dan UMKM yang beragam.',
        'image' => 'https://images.unsplash.com/photo-1524661135-423995f22d0b?q=80&w=1600&auto=format&fit=crop',
    ])

    @include('profil._subnav')

    <section class="max-w-7xl mx-auto px-6 lg:px-10 py-16">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            {{-- Map embed --}}
            <div class="lg:col-span-2 rounded-2xl overflow-hidden border border-gray-100 shadow-sm h-[420px]">
                <iframe
                    class="w-full h-full"
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    src="https://www.google.com/maps?q=87XJ%2B9C2+Alung,+Desa+Mekar+Damai,+Kec.+Praya,+Kabupaten+Lombok+Tengah,+Nusa+Tenggara+Barat&z=16&output=embed">
                </iframe>
            </div>

            {{-- Info cards --}}
            <div class="space-y-4">
                <div class="bg-primary-50 rounded-xl p-5">
                    <p class="text-xs text-primary-700 font-semibold">Total Luas Wilayah</p>
                    <p class="text-2xl font-bold text-primary-900">1,240 Ha</p>
                </div>
                <div class="bg-gray-50 rounded-xl p-5">
                    <p class="text-xs text-gray-500 font-semibold">Jumlah Dusun</p>
                    <p class="text-2xl font-bold text-gray-900">15 Dusun</p>
                </div>
                <div class="bg-gray-50 rounded-xl p-5">
                    <p class="text-xs text-gray-500 font-semibold">Lahan Produktif</p>
                    <p class="text-2xl font-bold text-gray-900">72%</p>
                </div>
                <a href="#" class="block text-center bg-primary-700 hover:bg-primary-800 text-white text-sm font-semibold py-3 rounded-xl transition">
                    Unduh Peta Administratif (PDF)
                </a>
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
