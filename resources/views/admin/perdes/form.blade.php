@extends('admin.layouts.app')

@section('title', $peraturan ? 'Edit Perdes' : 'Tambah Perdes')

@section('content')

    <form method="POST"
          action="{{ $peraturan ? route('admin.perdes.update', $peraturan) : route('admin.perdes.store') }}"
          enctype="multipart/form-data"
          class="max-w-2xl bg-white border border-gray-100 rounded-2xl p-8 space-y-5">
        @csrf
        @if($peraturan) @method('PUT') @endif

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="text-sm font-medium text-gray-700">Nomor Perdes</label>
                <input type="text" name="nomor" value="{{ old('nomor', $peraturan->nomor ?? '') }}" placeholder="mis. Perdes No. 03/2024" required
                       class="mt-1.5 w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm">
                @error('nomor') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="text-sm font-medium text-gray-700">Tanggal Ditetapkan</label>
                <input type="date" name="tanggal_ditetapkan" value="{{ old('tanggal_ditetapkan', isset($peraturan) ? $peraturan->tanggal_ditetapkan?->format('Y-m-d') : '') }}" required
                       class="mt-1.5 w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm">
                @error('tanggal_ditetapkan') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
        </div>

        <div>
            <label class="text-sm font-medium text-gray-700">Tentang</label>
            <input type="text" name="tentang" value="{{ old('tentang', $peraturan->tentang ?? '') }}" placeholder="Judul/isi ringkas peraturan" required
                   class="mt-1.5 w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm">
            @error('tentang') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="text-sm font-medium text-gray-700">Kategori</label>
            <select name="kategori" class="mt-1.5 w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm">
                @foreach(['Anggaran', 'BUMDes', 'Pembangunan', 'Pemerintahan', 'Umum'] as $cat)
                    <option value="{{ $cat }}" {{ old('kategori', $peraturan->kategori ?? '') === $cat ? 'selected' : '' }}>{{ $cat }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="text-sm font-medium text-gray-700">File PDF</label>
            @if($peraturan?->file)
                <a href="{{ asset('storage/' . $peraturan->file) }}" target="_blank" class="block text-primary-700 text-sm mt-1.5 mb-2 hover:underline">Lihat file saat ini</a>
            @endif
            <input type="file" name="file" accept=".pdf" class="mt-1.5 w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm">
            @error('file') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="flex gap-3 pt-2">
            <button type="submit" class="bg-primary-700 hover:bg-primary-800 text-white font-semibold px-6 py-2.5 rounded-lg transition">Simpan</button>
            <a href="{{ route('admin.perdes.index') }}" class="border border-gray-200 text-gray-600 font-semibold px-6 py-2.5 rounded-lg hover:bg-gray-50 transition">Batal</a>
        </div>
    </form>

@endsection
