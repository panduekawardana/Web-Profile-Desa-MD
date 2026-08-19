@extends('admin.layouts.app')

@section('title', 'Detail Pesan Kontak')

@section('content')

    <div class="max-w-3xl bg-white border border-gray-100 rounded-2xl p-8">

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 mb-8">
            <div>
                <p class="text-xs text-gray-400 font-semibold">Nama Pengirim</p>
                <p class="font-medium text-gray-900 mt-1">{{ $kontak->nama }}</p>
            </div>
            <div>
                <p class="text-xs text-gray-400 font-semibold">Email</p>
                <p class="font-medium text-gray-900 mt-1">
                    <a href="mailto:{{ $kontak->email }}" class="text-primary-700 hover:underline">{{ $kontak->email }}</a>
                </p>
            </div>
            <div>
                <p class="text-xs text-gray-400 font-semibold">Nomor WhatsApp</p>
                <p class="font-medium text-gray-900 mt-1">{{ $kontak->no_hp ?: '-' }}</p>
            </div>
            <div>
                <p class="text-xs text-gray-400 font-semibold">Tanggal Kirim</p>
                <p class="font-medium text-gray-900 mt-1">{{ $kontak->created_at->format('d F Y, H:i') }}</p>
            </div>
            <div class="sm:col-span-2">
                <p class="text-xs text-gray-400 font-semibold">Subjek</p>
                <p class="font-medium text-gray-900 mt-1">{{ $kontak->subjek }}</p>
            </div>
            <div class="sm:col-span-2">
                <p class="text-xs text-gray-400 font-semibold">Isi Pesan</p>
                <p class="text-gray-700 mt-1 whitespace-pre-line">{{ $kontak->pesan }}</p>
            </div>
        </div>

        <form method="POST" action="{{ route('admin.kontak.update', $kontak) }}" class="border-t border-gray-100 pt-6 space-y-5">
            @csrf
            @method('PUT')

            <div>
                <label class="text-sm font-medium text-gray-700">Status Pesan</label>
                <select name="status" class="mt-1.5 w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm">
                    @foreach(['baru' => 'Baru', 'dibaca' => 'Dibaca', 'dibalas' => 'Sudah Dibalas'] as $val => $label)
                        <option value="{{ $val }}" {{ $kontak->status === $val ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex gap-3 pt-2">
                <a href="mailto:{{ $kontak->email }}?subject=Re: {{ $kontak->subjek }}"
                   class="inline-flex items-center gap-2 border border-gray-200 text-gray-700 font-semibold px-5 py-2.5 rounded-lg hover:bg-gray-50 transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                    Balas via Email
                </a>
                <button type="submit" class="bg-primary-700 hover:bg-primary-800 text-white font-semibold px-6 py-2.5 rounded-lg transition">
                    Simpan Status
                </button>
                <a href="{{ route('admin.kontak.index') }}" class="border border-gray-200 text-gray-600 font-semibold px-6 py-2.5 rounded-lg hover:bg-gray-50 transition">
                    Kembali
                </a>
            </div>
        </form>
    </div>

@endsection
