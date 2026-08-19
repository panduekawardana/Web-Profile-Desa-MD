@extends('layouts.app')

@section('title', 'Layanan Desa — Desa Mekar Damai')

@section('content')

    {{-- ================= HERO ================= --}}
    <section class="relative">
        <div class="h-[420px] md:h-[480px] w-full overflow-hidden">
            <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?q=80&w=1800&auto=format&fit=crop"
                 alt="Layanan Masyarakat Desa" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-black/20"></div>
        </div>
        <div class="absolute inset-0 flex items-center">
            <div class="max-w-7xl mx-auto px-6 lg:px-10 w-full">
                <div class="max-w-2xl">
                    <span class="inline-block bg-primary-600/90 text-white text-xs font-semibold px-3 py-1 rounded-full mb-4">
                        Portal Resmi Layanan Masyarakat
                    </span>
                    <h1 class="text-3xl md:text-4xl font-extrabold text-white leading-tight">
                        Layanan Masyarakat Desa
                    </h1>
                    <p class="text-white/85 mt-4 text-sm md:text-base leading-relaxed">
                        Nikmati kemudahan akses informasi administrasi dan kependudukan dengan standar
                        pelayanan prima, transparan, dan terpercaya bagi seluruh warga Mekar Damai.
                    </p>
                    <div class="flex flex-wrap gap-3 mt-7">
                        <a href="#kategori-layanan"
                           class="bg-primary-600 hover:bg-primary-700 text-white text-sm font-semibold px-6 py-3 rounded-lg transition">
                            Lihat Semua Layanan &rarr;
                        </a>
                        <a href="{{ route('home') }}#kontak"
                           class="bg-white/10 hover:bg-white/20 border border-white/30 text-white text-sm font-semibold px-6 py-3 rounded-lg transition">
                            Hubungi Kami
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ================= KATEGORI LAYANAN UTAMA ================= --}}
    <section id="kategori-layanan" class="max-w-7xl mx-auto px-6 lg:px-10 py-16">
        <div class="text-center mb-12">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900">Kategori Layanan Utama</h2>
            <p class="text-gray-500 mt-2 max-w-xl mx-auto text-sm md:text-base">
                Pilih kategori layanan yang Anda butuhkan untuk mempermudah proses administrasi dokumen Anda.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach([
                [
                    'icon' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z',
                    'color' => 'bg-primary-50 text-primary-700',
                    'title' => 'Administrasi Umum',
                    'desc' => 'Pengurusan surat keterangan usaha, surat keterangan domisili, dan legalisasi dokumen umum lainnya.',
                    'anchor' => '#administrasi-umum',
                ],
                [
                    'icon' => 'M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z',
                    'color' => 'bg-amber-50 text-amber-700',
                    'title' => 'Kependudukan',
                    'desc' => 'Layanan pengajuan KTP, Kartu Keluarga, Akta Kelahiran, hingga Akta Kematian secara terintegrasi.',
                    'anchor' => '#kependudukan',
                ],
                [
                    'icon' => 'M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z',
                    'color' => 'bg-blue-50 text-blue-700',
                    'title' => 'Surat Pengantar',
                    'desc' => 'Pembuatan surat pengantar nikah, surat pengantar SKCK, dan rekomendasi kegiatan masyarakat.',
                    'anchor' => '#surat-pengantar',
                ],
            ] as $kategori)
                <a href="{{ $kategori['anchor'] }}" class="border border-gray-100 rounded-2xl p-6 hover:shadow-md transition group">
                    <div class="w-12 h-12 rounded-xl {{ $kategori['color'] }} flex items-center justify-center mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $kategori['icon'] }}" /></svg>
                    </div>
                    <h3 class="font-bold text-gray-900 text-lg">{{ $kategori['title'] }}</h3>
                    <p class="text-sm text-gray-500 mt-2 leading-relaxed">{{ $kategori['desc'] }}</p>
                    <span class="inline-flex items-center gap-1 text-primary-700 text-sm font-semibold mt-4 group-hover:gap-2 transition-all">
                        Pelajari Selengkapnya
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" /></svg>
                    </span>
                </a>
            @endforeach
        </div>
    </section>

    {{-- ================= DETAIL: ADMINISTRASI UMUM ================= --}}
    <section id="administrasi-umum" class="bg-gray-50 border-t border-gray-100 py-16 scroll-mt-24">
        <div class="max-w-7xl mx-auto px-6 lg:px-10">
            <div class="flex items-center gap-3 mb-8">
                <div class="w-10 h-10 rounded-xl bg-primary-50 text-primary-700 flex items-center justify-center">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
                </div>
                <h2 class="text-xl md:text-2xl font-bold text-gray-900">Administrasi Umum</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                @foreach([
                    ['title' => 'Surat Keterangan Usaha', 'desc' => 'Digunakan sebagai bukti legalitas usaha untuk keperluan perbankan atau perizinan.', 'syarat' => ['Fotokopi KTP', 'Fotokopi Kartu Keluarga', 'Foto lokasi usaha']],
                    ['title' => 'Surat Keterangan Domisili', 'desc' => 'Digunakan sebagai bukti tempat tinggal untuk berbagai keperluan administrasi.', 'syarat' => ['Fotokopi KTP', 'Fotokopi Kartu Keluarga', 'Surat pengantar RT/RW']],
                    ['title' => 'Surat Keterangan Tidak Mampu', 'desc' => 'Digunakan untuk keperluan bantuan sosial, keringanan biaya pendidikan, atau kesehatan.', 'syarat' => ['Fotokopi KTP', 'Fotokopi Kartu Keluarga', 'Surat pengantar RT/RW']],
                ] as $item)
                    <div class="bg-white border border-gray-100 rounded-2xl p-6">
                        <h3 class="font-bold text-gray-900">{{ $item['title'] }}</h3>
                        <p class="text-sm text-gray-500 mt-2">{{ $item['desc'] }}</p>
                        <p class="text-xs font-semibold text-gray-400 uppercase mt-4 mb-2">Persyaratan</p>
                        <ul class="space-y-1.5">
                            @foreach($item['syarat'] as $s)
                                <li class="flex items-start gap-2 text-sm text-gray-600">
                                    <svg class="w-4 h-4 text-primary-600 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                                    {{ $s }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ================= DETAIL: KEPENDUDUKAN ================= --}}
    <section id="kependudukan" class="py-16 scroll-mt-24">
        <div class="max-w-7xl mx-auto px-6 lg:px-10">
            <div class="flex items-center gap-3 mb-8">
                <div class="w-10 h-10 rounded-xl bg-amber-50 text-amber-700 flex items-center justify-center">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                </div>
                <h2 class="text-xl md:text-2xl font-bold text-gray-900">Kependudukan</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                @foreach([
                    ['title' => 'KTP Elektronik', 'desc' => 'Pembuatan baru, perpanjangan, atau perbaikan data KTP-el.', 'syarat' => ['Fotokopi Kartu Keluarga', 'Surat pengantar RT/RW', 'Telah berusia 17 tahun']],
                    ['title' => 'Kartu Keluarga', 'desc' => 'Penerbitan KK baru maupun perubahan data anggota keluarga.', 'syarat' => ['Buku nikah / akta cerai', 'KK lama (jika perubahan)', 'Surat pengantar RT/RW']],
                    ['title' => 'Akta Kelahiran', 'desc' => 'Pengurusan akta kelahiran untuk anggota keluarga baru.', 'syarat' => ['Surat keterangan lahir bidan/RS', 'Fotokopi buku nikah', 'Fotokopi KTP orang tua']],
                ] as $item)
                    <div class="border border-gray-100 rounded-2xl p-6">
                        <h3 class="font-bold text-gray-900">{{ $item['title'] }}</h3>
                        <p class="text-sm text-gray-500 mt-2">{{ $item['desc'] }}</p>
                        <p class="text-xs font-semibold text-gray-400 uppercase mt-4 mb-2">Persyaratan</p>
                        <ul class="space-y-1.5">
                            @foreach($item['syarat'] as $s)
                                <li class="flex items-start gap-2 text-sm text-gray-600">
                                    <svg class="w-4 h-4 text-primary-600 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                                    {{ $s }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ================= DETAIL: SURAT PENGANTAR ================= --}}
    <section id="surat-pengantar" class="bg-gray-50 border-t border-gray-100 py-16 scroll-mt-24">
        <div class="max-w-7xl mx-auto px-6 lg:px-10">
            <div class="flex items-center gap-3 mb-8">
                <div class="w-10 h-10 rounded-xl bg-blue-50 text-blue-700 flex items-center justify-center">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                </div>
                <h2 class="text-xl md:text-2xl font-bold text-gray-900">Surat Pengantar</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                @foreach([
                    ['title' => 'Surat Pengantar SKCK', 'desc' => 'Diperlukan sebagai syarat awal pembuatan Surat Keterangan Catatan Kepolisian di kantor polisi.', 'syarat' => ['Fotokopi KTP', 'Fotokopi Kartu Keluarga', 'Pas foto 4x6 (2 lembar)']],
                    ['title' => 'Surat Pengantar Nikah', 'desc' => 'Digunakan sebagai kelengkapan administrasi pendaftaran nikah di KUA setempat.', 'syarat' => ['Fotokopi KTP calon pengantin', 'Fotokopi Kartu Keluarga', 'Surat persetujuan orang tua (bila diperlukan)']],
                    ['title' => 'Rekomendasi Kegiatan', 'desc' => 'Surat rekomendasi untuk kegiatan sosial, olahraga, atau kepemudaan di tingkat desa.', 'syarat' => ['Proposal kegiatan', 'Fotokopi KTP penanggung jawab', 'Surat pengantar RT/RW']],
                ] as $item)
                    <div class="bg-white border border-gray-100 rounded-2xl p-6">
                        <h3 class="font-bold text-gray-900">{{ $item['title'] }}</h3>
                        <p class="text-sm text-gray-500 mt-2">{{ $item['desc'] }}</p>
                        <p class="text-xs font-semibold text-gray-400 uppercase mt-4 mb-2">Persyaratan</p>
                        <ul class="space-y-1.5">
                            @foreach($item['syarat'] as $s)
                                <li class="flex items-start gap-2 text-sm text-gray-600">
                                    <svg class="w-4 h-4 text-primary-600 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                                    {{ $s }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ================= PROSEDUR LAYANAN ================= --}}
    <section class="max-w-7xl mx-auto px-6 lg:px-10 py-16">
        <div class="flex flex-wrap items-end justify-between gap-4 mb-12">
            <div>
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900">Prosedur Layanan</h2>
                <p class="text-gray-500 mt-2 max-w-xl text-sm md:text-base">
                    Ikuti langkah-langkah berikut untuk memastikan permohonan Anda diproses dengan cepat dan tepat.
                </p>
            </div>
            <a href="mailto:desa.mekardamai@gmail.com"
               class="inline-flex items-center gap-2 bg-white border border-gray-200 text-gray-700 text-sm font-semibold px-5 py-2.5 rounded-lg hover:bg-gray-100 transition whitespace-nowrap">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1M7 10l5 5 5-5M12 15V3" /></svg>
                Minta Panduan Lengkap
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            @foreach([
                ['step' => '01', 'title' => 'Persiapan', 'desc' => 'Siapkan dokumen persyaratan asli dan fotokopi sesuai jenis layanan yang dibutuhkan.'],
                ['step' => '02', 'title' => 'Pengajuan', 'desc' => 'Datang ke kantor desa dengan membawa berkas lengkap pada jam pelayanan.'],
                ['step' => '03', 'title' => 'Verifikasi', 'desc' => 'Petugas akan memeriksa kelengkapan dan keabsahan berkas Anda.'],
                ['step' => '04', 'title' => 'Selesai', 'desc' => 'Dokumen yang telah ditandatangani dapat diambil langsung di kantor desa.'],
            ] as $item)
                <div class="relative bg-white border border-gray-100 rounded-2xl p-6">
                    <span class="text-4xl font-extrabold text-primary-100">{{ $item['step'] }}</span>
                    <h3 class="font-bold text-gray-900 mt-3">{{ $item['title'] }}</h3>
                    <p class="text-sm text-gray-500 mt-2">{{ $item['desc'] }}</p>
                </div>
            @endforeach
        </div>
    </section>

@endsection
