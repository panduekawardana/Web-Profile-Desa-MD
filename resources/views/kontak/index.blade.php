@extends('layouts.app')

@section('title', 'Kontak Kami — Desa Mekar Damai')

@section('content')

    @include('layouts.page-header', [
        'title' => 'Kontak Kami',
        'subtitle' => 'Sampaikan pertanyaan, masukan, atau kebutuhan Anda kepada Pemerintah Desa Mekar Damai.',
        'image' => 'https://images.unsplash.com/photo-1423666639041-f56000c27a9a?q=80&w=1600&auto=format&fit=crop',
    ])

    <section class="max-w-5xl mx-auto px-6 lg:px-10 py-16">

        @if(session('success'))
            <div class="mb-8 bg-primary-50 border border-primary-200 text-primary-800 text-sm px-4 py-3 rounded-xl flex items-center gap-2">
                <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-5 gap-10">

            <div class="md:col-span-3 bg-white border border-gray-100 rounded-2xl p-6 md:p-8 order-2 md:order-1">
                <h2 class="text-xl font-bold text-gray-900 mb-6">Kirim Pesan</h2>
                <form method="POST" action="{{ route('kontak.store') }}" class="space-y-5">
                    @csrf
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="text-sm font-medium text-gray-700">Nama Lengkap</label>
                            <input type="text" name="nama" value="{{ old('nama') }}" required
                                   class="mt-1.5 w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm">
                            @error('nama') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="text-sm font-medium text-gray-700">Email</label>
                            <input type="email" name="email" value="{{ old('email') }}" required
                                   class="mt-1.5 w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm">
                            @error('email') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>
                    <div>
                        <label class="text-sm font-medium text-gray-700">Nomor WhatsApp (opsional)</label>
                        <input type="text" name="no_hp" value="{{ old('no_hp') }}" placeholder="08xx-xxxx-xxxx"
                               class="mt-1.5 w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm">
                    </div>
                    <div>
                        <label class="text-sm font-medium text-gray-700">Subjek</label>
                        <input type="text" name="subjek" value="{{ old('subjek') }}" placeholder="Perihal pesan Anda" required
                               class="mt-1.5 w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm">
                        @error('subjek') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="text-sm font-medium text-gray-700">Pesan</label>
                        <textarea name="pesan" rows="5" placeholder="Tulis pesan Anda di sini" required
                                  class="mt-1.5 w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm">{{ old('pesan') }}</textarea>
                        @error('pesan') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <button type="submit" class="w-full bg-primary-700 hover:bg-primary-800 text-white font-semibold py-3 rounded-lg transition">
                        Kirim Pesan
                    </button>
                </form>
            </div>

            <div class="md:col-span-2 order-1 md:order-2 space-y-4">
                <div class="bg-primary-50 rounded-2xl p-6">
                    <h3 class="font-bold text-primary-900 mb-2">Informasi Kontak</h3>
                    <div class="space-y-3 text-sm text-primary-800/90">
                        <p class="flex items-start gap-2">
                            <svg class="w-4 h-4 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                            87XJ+9C2, Dusun Alung, Desa Mekar Damai, Kec. Praya, Kab. Lombok Tengah, NTB 83511
                        </p>
                        <p class="flex items-center gap-2">
                            <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" /></svg>
                            (0370) 555-0123
                        </p>
                        <p class="flex items-center gap-2">
                            <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                            desa.mekardamai@gmail.com
                        </p>
                    </div>
                </div>
                <div class="bg-gray-900 text-white rounded-2xl p-6">
                    <h3 class="font-bold mb-2">Jam Pelayanan</h3>
                    <div class="space-y-1.5 text-sm text-white/70">
                        <div class="flex justify-between"><span>Senin&ndash;Jumat</span><span>08.00&ndash;15.00 WITA</span></div>
                        <div class="flex justify-between"><span>Sabtu &amp; Minggu</span><span>Tutup</span></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
