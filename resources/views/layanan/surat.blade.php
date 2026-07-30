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

        @if(session('success'))
            <div class="mb-8 bg-primary-50 border border-primary-200 text-primary-800 text-sm px-4 py-3 rounded-xl flex items-center gap-2">
                <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-5 gap-10">

            <div class="md:col-span-2">
                <h2 class="text-xl font-bold text-gray-900 mb-4">Jenis Surat Pengantar</h2>
                <div class="space-y-3">
                    @foreach([
                        'Surat Pengantar SKCK', 'Surat Pengantar Nikah',
                        'Surat Keterangan Tidak Mampu', 'Surat Keterangan Usaha',
                        'Surat Keterangan Domisili',
                    ] as $i => $jenis)
                        <label class="flex items-center gap-3 border rounded-xl px-4 py-3 cursor-pointer has-[:checked]:border-primary-600 has-[:checked]:bg-primary-50 border-gray-200">
                            <input type="radio" name="jenis_surat" form="form-surat" value="{{ $jenis }}" class="accent-primary-700" {{ $i === 0 ? 'checked' : '' }} required>
                            <span class="text-sm font-medium text-gray-800">{{ $jenis }}</span>
                        </label>
                    @endforeach
                </div>
            </div>

            <div class="md:col-span-3 bg-white border border-gray-100 rounded-2xl p-6 md:p-8">
                <h2 class="text-xl font-bold text-gray-900 mb-6">Formulir Pengajuan</h2>
                <form id="form-surat" method="POST" action="{{ route('surat.store') }}" enctype="multipart/form-data" class="space-y-5">
                    @csrf
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="text-sm font-medium text-gray-700">Nama Lengkap</label>
                            <input type="text" name="nama" value="{{ old('nama') }}" placeholder="Sesuai KTP" required class="mt-1.5 w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm">
                            @error('nama') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="text-sm font-medium text-gray-700">NIK</label>
                            <input type="text" name="nik" value="{{ old('nik') }}" placeholder="16 digit NIK" required class="mt-1.5 w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm">
                            @error('nik') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>
                    <div>
                        <label class="text-sm font-medium text-gray-700">Alamat Domisili</label>
                        <input type="text" name="alamat" value="{{ old('alamat') }}" placeholder="Dusun / RT / RW" required class="mt-1.5 w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm">
                        @error('alamat') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="text-sm font-medium text-gray-700">Keperluan</label>
                        <textarea name="keperluan" rows="3" placeholder="Jelaskan tujuan pengajuan surat" required class="mt-1.5 w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm">{{ old('keperluan') }}</textarea>
                        @error('keperluan') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="text-sm font-medium text-gray-700">Unggah KTP (opsional)</label>
                        <input type="file" name="file_ktp" accept=".jpg,.jpeg,.png,.pdf" class="mt-1.5 w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm">
                        <p class="text-xs text-gray-400 mt-1">JPG, PNG, atau PDF — maks 2MB</p>
                        @error('file_ktp') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <button type="submit" class="w-full bg-primary-700 hover:bg-primary-800 text-white font-semibold py-3 rounded-lg transition">
                        Kirim Pengajuan
                    </button>
                </form>
            </div>
        </div>
    </section>

@endsection
