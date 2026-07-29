@extends('layouts.app')

@section('title', 'Visi & Misi — Desa Mekar Damai')

@section('content')

    @include('layouts.page-header', [
        'title' => 'Visi & Misi Desa',
        'subtitle' => 'Arah pembangunan jangka panjang untuk mewujudkan desa yang mandiri, transparan, dan sejahtera.',
        'image' => 'https://images.unsplash.com/photo-1500382017468-9049fed747ef?q=80&w=1600&auto=format&fit=crop',
    ])

    @include('profil._subnav')

    <section class="max-w-7xl mx-auto px-6 lg:px-10 py-16">

        <div class="bg-primary-800 text-white rounded-2xl p-8 md:p-12 mb-14">
            <span class="text-xs font-semibold text-primary-200 uppercase tracking-wide">Visi</span>
            <p class="text-xl md:text-2xl font-bold mt-3 leading-snug max-w-3xl">
                "Terwujudnya Desa Mekar Damai yang Mandiri, Transparan, dan Berdaya Saing
                Berbasis Kearifan Lokal dan Teknologi Digital."
            </p>
        </div>

        <h2 class="text-2xl font-bold text-gray-900 mb-8">Misi</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach([
                'Meningkatkan tata kelola pemerintahan desa yang transparan dan akuntabel berbasis digital.',
                'Mendorong pertumbuhan ekonomi desa melalui pemberdayaan UMKM dan BUMDes.',
                'Mengembangkan potensi pertanian modern yang berkelanjutan dan ramah lingkungan.',
                'Meningkatkan kualitas pelayanan publik yang cepat, mudah, dan merata bagi seluruh warga.',
                'Melestarikan budaya dan kearifan lokal sebagai identitas dan daya tarik desa.',
                'Memperkuat partisipasi masyarakat dalam perencanaan dan pengawasan pembangunan desa.',
            ] as $i => $misi)
                <div class="flex gap-4 p-6 rounded-2xl border border-gray-100 hover:shadow-md transition">
                    <div class="w-9 h-9 rounded-lg bg-primary-50 text-primary-700 font-bold flex items-center justify-center shrink-0">
                        {{ $i + 1 }}
                    </div>
                    <p class="text-gray-600 text-sm leading-relaxed">{{ $misi }}</p>
                </div>
            @endforeach
        </div>
    </section>

@endsection
