@extends('layouts.app')

@section('title', 'Alur Layanan — Desa Mekar Damai')

@section('content')

    @include('layouts.page-header', [
        'title' => 'Alur Layanan Publik',
        'subtitle' => 'Langkah-langkah sederhana untuk mengakses layanan administrasi Desa Mekar Damai.',
        'image' => 'https://images.unsplash.com/photo-1521791136064-7986c2920216?q=80&w=1600&auto=format&fit=crop',
    ])

    @include('layanan._subnav')

    <section class="max-w-6xl mx-auto px-6 lg:px-10 py-16">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            @foreach([
                ['step' => '01', 'title' => 'Pilih Layanan', 'desc' => 'Tentukan jenis layanan yang dibutuhkan: surat pengantar, pengaduan, atau dokumen kependudukan.'],
                ['step' => '02', 'title' => 'Isi Formulir Online', 'desc' => 'Lengkapi data diri dan unggah dokumen pendukung melalui formulir digital.'],
                ['step' => '03', 'title' => 'Verifikasi Perangkat Desa', 'desc' => 'Pengajuan Anda diverifikasi oleh perangkat desa terkait, biasanya 1&ndash;2 hari kerja.'],
                ['step' => '04', 'title' => 'Ambil / Unduh Dokumen', 'desc' => 'Dokumen dapat diambil di kantor desa atau diunduh langsung jika tersedia secara digital.'],
            ] as $item)
                <div class="relative bg-white border border-gray-100 rounded-2xl p-6">
                    <span class="text-4xl font-extrabold text-primary-100">{{ $item['step'] }}</span>
                    <h3 class="font-bold text-gray-900 mt-3">{{ $item['title'] }}</h3>
                    <p class="text-sm text-gray-500 mt-2">{{ $item['desc'] }}</p>
                </div>
            @endforeach
        </div>

        <div class="mt-14 bg-primary-800 text-white rounded-2xl p-8 md:p-10 flex flex-col md:flex-row items-center justify-between gap-6">
            <div>
                <h3 class="text-xl font-bold">Butuh bantuan lebih lanjut?</h3>
                <p class="text-primary-200 text-sm mt-1">Tim kami siap membantu proses pengajuan layanan Anda.</p>
            </div>
            <a href="{{ route('pengaduan') }}" class="bg-white text-primary-800 font-semibold text-sm px-6 py-3 rounded-lg hover:bg-primary-50 transition whitespace-nowrap">
                Hubungi Kami
            </a>
        </div>
    </section>

@endsection
