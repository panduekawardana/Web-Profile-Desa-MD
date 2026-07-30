@extends('layouts.app')

@section('title', 'Pengaduan — Desa Mekar Damai')

@section('content')

    @include('layouts.page-header', [
        'title' => 'Pengaduan Masyarakat',
        'subtitle' => 'Sampaikan keluhan, masukan, atau laporan Anda demi perbaikan pelayanan Desa Mekar Damai.',
        'image' => 'https://images.unsplash.com/photo-1423666639041-f56000c27a9a?q=80&w=1600&auto=format&fit=crop',
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

            <div class="md:col-span-3 bg-white border border-gray-100 rounded-2xl p-6 md:p-8 order-2 md:order-1">
                <h2 class="text-xl font-bold text-gray-900 mb-6">Formulir Pengaduan</h2>
                <form method="POST" action="{{ route('pengaduan.store') }}" enctype="multipart/form-data" class="space-y-5">
                    @csrf
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="text-sm font-medium text-gray-700">Nama Pelapor</label>
                            <input type="text" name="nama" value="{{ old('nama') }}" placeholder="Boleh dikosongkan (anonim)" class="mt-1.5 w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm">
                        </div>
                        <div>
                            <label class="text-sm font-medium text-gray-700">Nomor WhatsApp</label>
                            <input type="text" name="whatsapp" value="{{ old('whatsapp') }}" placeholder="08xx-xxxx-xxxx" class="mt-1.5 w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm">
                        </div>
                    </div>
                    <div>
                        <label class="text-sm font-medium text-gray-700">Kategori Pengaduan</label>
                        <select name="kategori" required class="mt-1.5 w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm">
                            <option value="Infrastruktur">Infrastruktur</option>
                            <option value="Pelayanan Administrasi">Pelayanan Administrasi</option>
                            <option value="Lingkungan">Lingkungan</option>
                            <option value="Sosial & Kemasyarakatan">Sosial & Kemasyarakatan</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                    </div>
                    <div>
                        <label class="text-sm font-medium text-gray-700">Isi Pengaduan</label>
                        <textarea name="isi" rows="5" placeholder="Jelaskan detail pengaduan Anda" required class="mt-1.5 w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm">{{ old('isi') }}</textarea>
                        @error('isi') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="text-sm font-medium text-gray-700">Lampiran Foto (opsional)</label>
                        <input type="file" name="file_lampiran" accept="image/*" class="mt-1.5 w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm">
                        @error('file_lampiran') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <button type="submit" class="w-full bg-primary-700 hover:bg-primary-800 text-white font-semibold py-3 rounded-lg transition">
                        Kirim Pengaduan
                    </button>
                </form>
            </div>

            <div class="md:col-span-2 order-1 md:order-2">
                <div class="bg-primary-50 rounded-2xl p-6 mb-6">
                    <h3 class="font-bold text-primary-900 mb-2">Jaminan Kerahasiaan</h3>
                    <p class="text-sm text-primary-700/80">
                        Identitas pelapor akan dijaga kerahasiaannya. Anda juga dapat memilih untuk mengirim pengaduan secara anonim.
                    </p>
                </div>
                <div class="space-y-3">
                    <h3 class="font-bold text-gray-900 mb-1">Pengaduan yang Sudah Ditangani</h3>
                    @forelse($pengaduanSelesai ?? [] as $item)
                        <div class="border border-gray-100 rounded-xl p-4">
                            <p class="text-sm font-medium text-gray-800">{{ $item->kategori }}</p>
                            <p class="text-xs text-gray-400 mt-1 line-clamp-2">{{ $item->isi }}</p>
                            <span class="inline-block mt-2 text-xs font-semibold px-2 py-1 rounded-full bg-primary-50 text-primary-700">
                                Selesai
                            </span>
                        </div>
                    @empty
                        <p class="text-sm text-gray-400">Belum ada pengaduan yang selesai ditangani.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </section>

@endsection
