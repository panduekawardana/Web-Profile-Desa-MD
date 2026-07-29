@extends('layouts.app')

@section('title', 'KTP, KK & Akta — Desa Mekar Damai')

@section('content')

    @include('layouts.page-header', [
        'title' => 'Layanan KTP, Kartu Keluarga & Akta',
        'subtitle' => 'Informasi persyaratan dan pengajuan dokumen kependudukan warga Desa Mekar Damai.',
        'image' => 'https://images.unsplash.com/photo-1568992687947-868a62a9f521?q=80&w=1600&auto=format&fit=crop',
    ])

    @include('layanan._subnav')

    <section class="max-w-7xl mx-auto px-6 lg:px-10 py-16">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach([
                [
                    'title' => 'KTP Elektronik',
                    'desc' => 'Pembuatan baru, perpanjangan, atau perbaikan data KTP-el.',
                    'syarat' => ['Fotokopi Kartu Keluarga', 'Surat pengantar RT/RW', 'Telah berusia 17 tahun'],
                ],
                [
                    'title' => 'Kartu Keluarga',
                    'desc' => 'Penerbitan KK baru maupun perubahan data anggota keluarga.',
                    'syarat' => ['Buku nikah / akta cerai', 'KK lama (jika perubahan)', 'Surat pengantar RT/RW'],
                ],
                [
                    'title' => 'Akta Kelahiran',
                    'desc' => 'Pengurusan akta kelahiran untuk anggota keluarga baru.',
                    'syarat' => ['Surat keterangan lahir bidan/RS', 'Fotokopi buku nikah', 'Fotokopi KTP orang tua'],
                ],
            ] as $doc)
                <div class="bg-white border border-gray-100 rounded-2xl p-6">
                    <div class="w-10 h-10 rounded-lg bg-primary-50 text-primary-700 flex items-center justify-center mb-4">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                    </div>
                    <h3 class="font-bold text-gray-900">{{ $doc['title'] }}</h3>
                    <p class="text-sm text-gray-500 mt-1 mb-4">{{ $doc['desc'] }}</p>
                    <p class="text-xs font-semibold text-gray-400 uppercase mb-2">Persyaratan</p>
                    <ul class="space-y-1.5">
                        @foreach($doc['syarat'] as $s)
                            <li class="flex items-start gap-2 text-sm text-gray-600">
                                <svg class="w-4 h-4 text-primary-600 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                                {{ $s }}
                            </li>
                        @endforeach
                    </ul>
                    <a href="{{ route('surat') }}" class="mt-6 block text-center bg-primary-700 hover:bg-primary-800 text-white text-sm font-semibold py-2.5 rounded-lg transition">
                        Ajukan Sekarang
                    </a>
                </div>
            @endforeach
        </div>
    </section>

@endsection
