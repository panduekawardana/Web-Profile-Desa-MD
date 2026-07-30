@extends('layouts.app')

@section('title', 'LPPD/LPJ — Desa Mekar Damai')

@section('content')

    @include('layouts.page-header', [
        'title' => 'LPPD & Laporan Pertanggungjawaban (LPJ)',
        'subtitle' => 'Laporan Penyelenggaraan Pemerintahan Desa (LPPD) dan Laporan Pertanggungjawaban pelaksanaan APBDes yang disampaikan Kepala Desa kepada masyarakat setiap tahun.',
        'image' => 'https://images.unsplash.com/photo-1554224155-6726b3ff858f?q=80&w=1600&auto=format&fit=crop',
    ])

    @include('pemerintahan._subnav')

    <section class="max-w-7xl mx-auto px-6 lg:px-10 py-16">

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @forelse($lpjs as $lpj)
                <div class="bg-white border border-gray-100 rounded-2xl p-6">
                    <div class="w-10 h-10 rounded-lg bg-primary-50 text-primary-700 flex items-center justify-center mb-4">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
                    </div>
                    <h3 class="font-bold text-gray-900">LPJ Tahun Anggaran {{ $lpj->tahun }}</h3>
                    <span class="inline-block text-xs font-semibold text-primary-700 bg-primary-50 px-2 py-1 rounded-full mt-2">{{ $lpj->status }}</span>
                    @if($lpj->tanggal_disampaikan)
                        <p class="text-xs text-gray-400 mt-3">Disampaikan {{ $lpj->tanggal_disampaikan->translatedFormat('d F Y') }}</p>
                    @endif
                    @if($lpj->catatan)
                        <p class="text-sm text-gray-500 mt-3">{{ $lpj->catatan }}</p>
                    @endif
                    @if($lpj->file)
                        <a href="{{ asset('storage/' . $lpj->file) }}" target="_blank"
                           class="mt-5 flex items-center justify-center gap-2 text-sm font-semibold border border-gray-200 rounded-lg py-2.5 text-gray-700 hover:bg-gray-50 transition">
                            Unduh Dokumen (PDF)
                        </a>
                    @else
                        <p class="mt-5 text-center text-xs text-gray-400">Dokumen belum diunggah</p>
                    @endif
                </div>
            @empty
                <p class="col-span-3 text-center text-gray-400 py-10">Belum ada LPJ yang diterbitkan.</p>
            @endforelse
        </div>
    </section>

@endsection
