@extends('layouts.app')

@section('title', 'RPJM Desa — Desa Mekar Damai')

@section('content')

    @include('layouts.page-header', [
        'title' => 'Rencana Pembangunan Jangka Menengah Desa (RPJM Des)',
        'subtitle' => 'Dokumen perencanaan pembangunan desa untuk jangka waktu 6 tahun, memuat visi, misi, arah kebijakan, dan program prioritas Desa Mekar Damai.',
        'image' => 'https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?q=80&w=1600&auto=format&fit=crop',
    ])

    @include('pemerintahan._subnav')

    <section class="max-w-7xl mx-auto px-6 lg:px-10 py-16">

        <div class="bg-primary-50 rounded-2xl p-6 md:p-8 mb-10 max-w-3xl">
            <p class="text-sm text-primary-800 leading-relaxed">
                RPJM Desa merupakan dokumen perencanaan untuk periode 6 (enam) tahun yang memuat arah kebijakan
                pembangunan desa, arah kebijakan keuangan desa, kebijakan umum, serta program prioritas
                kewilayahan yang disertai rencana kerja. Dokumen ini menjadi acuan utama dalam penyusunan
                RKP Desa dan APBDes setiap tahunnya.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-14">
            @foreach([
                ['label' => 'Periode Berlaku', 'value' => '2021 – 2027'],
                ['label' => 'Ditetapkan', 'value' => 'Peraturan Desa No. 02/2023'],
                ['label' => 'Status', 'value' => 'Berlaku'],
            ] as $info)
                <div class="bg-white border border-gray-100 rounded-xl p-5">
                    <p class="text-xs text-gray-400 font-semibold">{{ $info['label'] }}</p>
                    <p class="text-lg font-bold text-gray-900 mt-1">{{ $info['value'] }}</p>
                </div>
            @endforeach
        </div>

        <h2 class="text-xl font-bold text-gray-900 mb-6">Arah Kebijakan Pembangunan</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-14">
            @foreach([
                ['bidang' => 'Penyelenggaraan Pemerintahan Desa', 'desc' => 'Penguatan tata kelola pemerintahan yang transparan, partisipatif, dan berbasis digital.'],
                ['bidang' => 'Pelaksanaan Pembangunan Desa', 'desc' => 'Peningkatan infrastruktur jalan, irigasi, dan fasilitas publik yang merata di seluruh dusun.'],
                ['bidang' => 'Pembinaan Kemasyarakatan', 'desc' => 'Penguatan kelembagaan desa serta peningkatan partisipasi masyarakat dalam pembangunan.'],
                ['bidang' => 'Pemberdayaan Masyarakat', 'desc' => 'Pengembangan UMKM, BUMDes, dan potensi ekonomi lokal berbasis pertanian dan pariwisata.'],
            ] as $item)
                <div class="border border-gray-100 rounded-2xl p-6 hover:shadow-md transition">
                    <h3 class="font-bold text-gray-900">{{ $item['bidang'] }}</h3>
                    <p class="text-sm text-gray-500 mt-2">{{ $item['desc'] }}</p>
                </div>
            @endforeach
        </div>

        <div class="bg-gray-900 text-white rounded-2xl p-8 flex flex-col md:flex-row items-center justify-between gap-6">
            <div>
                <h3 class="font-bold text-lg">Dokumen Lengkap RPJM Desa 2021–2027</h3>
                <p class="text-white/60 text-sm mt-1">Unduh dokumen lengkap dalam format PDF.</p>
            </div>
            <a href="#" class="bg-white text-gray-900 font-semibold text-sm px-6 py-3 rounded-lg hover:bg-gray-100 transition whitespace-nowrap">
                Unduh Dokumen
            </a>
        </div>
    </section>

@endsection
