@extends('layouts.app')

@section('title', 'Surat Pengantar — Desa Mekar Damai')

@section('content')

    @include('layouts.page-header', [
        'title' => 'Pengajuan Surat Pengantar',
        'subtitle' => 'Ajukan permohonan surat pengantar secara online, tanpa perlu datang langsung ke kantor desa.',
        'image' => 'https://images.unsplash.com/photo-1450101499163-c8848c66ca85?q=80&w=1600&auto=format&fit=crop',
    ])

    @include('layanan._subnav')

    <section class="max-w-5xl mx-auto px-6 lg:px-10 py-16">
        <div class="grid grid-cols-1 md:grid-cols-5 gap-10">

            <div class="md:col-span-2">
                <h2 class="text-xl font-bold text-gray-900 mb-4">Jenis Surat Pengantar</h2>
                <div class="space-y-3">
                    @foreach([
                        'Surat Pengantar SKCK', 'Surat Pengantar Nikah',
                        'Surat Keterangan Tidak Mampu', 'Surat Keterangan Usaha',
                        'Surat Keterangan Domisili',
                    ] as $i => $jenis)
                        <label class="flex items-center gap-3 border rounded-xl px-4 py-3 cursor-pointer {{ $i === 0 ? 'border-primary-600 bg-primary-50' : 'border-gray-200' }}">
                            <input type="radio" name="jenis_surat" class="accent-primary-700" {{ $i === 0 ? 'checked' : '' }}>
                            <span class="text-sm font-medium text-gray-800">{{ $jenis }}</span>
                        </label>
                    @endforeach
                </div>
            </div>

            <div class="md:col-span-3 bg-white border border-gray-100 rounded-2xl p-6 md:p-8">
                <h2 class="text-xl font-bold text-gray-900 mb-6">Formulir Pengajuan</h2>
                <form class="space-y-5">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="text-sm font-medium text-gray-700">Nama Lengkap</label>
                            <input type="text" placeholder="Sesuai KTP" class="mt-1.5 w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm">
                        </div>
                        <div>
                            <label class="text-sm font-medium text-gray-700">NIK</label>
                            <input type="text" placeholder="16 digit NIK" class="mt-1.5 w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm">
                        </div>
                    </div>
                    <div>
                        <label class="text-sm font-medium text-gray-700">Alamat Domisili</label>
                        <input type="text" placeholder="Dusun / RT / RW" class="mt-1.5 w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm">
                    </div>
                    <div>
                        <label class="text-sm font-medium text-gray-700">Keperluan</label>
                        <textarea rows="3" placeholder="Jelaskan tujuan pengajuan surat" class="mt-1.5 w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm"></textarea>
                    </div>
                    <div>
                        <label class="text-sm font-medium text-gray-700">Unggah KTP</label>
                        <div class="mt-1.5 border-2 border-dashed border-gray-200 rounded-lg px-4 py-8 text-center text-sm text-gray-400">
                            Klik atau seret file ke sini (JPG, PNG, PDF — maks 2MB)
                        </div>
                    </div>
                    <button type="submit" class="w-full bg-primary-700 hover:bg-primary-800 text-white font-semibold py-3 rounded-lg transition">
                        Kirim Pengajuan
                    </button>
                </form>
            </div>
        </div>
    </section>

@endsection
