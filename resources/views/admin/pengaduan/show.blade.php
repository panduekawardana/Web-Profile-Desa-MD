@extends('admin.layouts.app')

@section('title', 'Detail Pengaduan')

@section('content')

    <div class="max-w-3xl bg-white border border-gray-100 rounded-2xl p-8">

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 mb-8">
            <div>
                <p class="text-xs text-gray-400 font-semibold">Nama Pelapor</p>
                <p class="font-medium text-gray-900 mt-1">{{ $pengaduan->nama ?: 'Anonim' }}</p>
            </div>
            <div>
                <p class="text-xs text-gray-400 font-semibold">Nomor WhatsApp</p>
                <p class="font-medium text-gray-900 mt-1">{{ $pengaduan->whatsapp ?: '-' }}</p>
            </div>
            <div>
                <p class="text-xs text-gray-400 font-semibold">Kategori</p>
                <p class="font-medium text-gray-900 mt-1">{{ $pengaduan->kategori }}</p>
            </div>
            <div>
                <p class="text-xs text-gray-400 font-semibold">Tanggal Lapor</p>
                <p class="font-medium text-gray-900 mt-1">{{ $pengaduan->created_at->format('d F Y, H:i') }}</p>
            </div>
            <div class="sm:col-span-2">
                <p class="text-xs text-gray-400 font-semibold">Isi Pengaduan</p>
                <p class="text-gray-700 mt-1">{{ $pengaduan->isi }}</p>
            </div>
            @if($pengaduan->file_lampiran)
                <div class="sm:col-span-2">
                    <p class="text-xs text-gray-400 font-semibold mb-2">Lampiran Foto</p>
                    <img src="{{ asset('storage/' . $pengaduan->file_lampiran) }}" class="w-64 h-40 object-cover rounded-lg border border-gray-100">
                </div>
            @endif
        </div>

        <form method="POST" action="{{ route('admin.pengaduan.update', $pengaduan) }}" class="border-t border-gray-100 pt-6 space-y-5">
            @csrf
            @method('PUT')

            <div>
                <label class="text-sm font-medium text-gray-700">Status Pengaduan</label>
                <select name="status" class="mt-1.5 w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm">
                    @foreach(['baru' => 'Baru', 'diproses' => 'Diproses', 'selesai' => 'Selesai'] as $val => $label)
                        <option value="{{ $val }}" {{ $pengaduan->status === $val ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="text-sm font-medium text-gray-700">Catatan / Tindak Lanjut Admin</label>
                <textarea name="catatan_admin" rows="3" placeholder="mis. tindakan yang sudah dilakukan" class="mt-1.5 w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm">{{ $pengaduan->catatan_admin }}</textarea>
            </div>

            <div class="flex gap-3 pt-2">
                <button type="submit" class="bg-primary-700 hover:bg-primary-800 text-white font-semibold px-6 py-2.5 rounded-lg transition">
                    Simpan Perubahan
                </button>
                <a href="{{ route('admin.pengaduan.index') }}" class="border border-gray-200 text-gray-600 font-semibold px-6 py-2.5 rounded-lg hover:bg-gray-50 transition">
                    Kembali
                </a>
            </div>
        </form>
    </div>

@endsection
