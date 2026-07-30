@extends('admin.layouts.app')

@section('title', $item ? 'Edit Perkades' : 'Tambah Perkades')

@section('content')

    <form method="POST"
          action="{{ $item ? route('admin.perkades.update', $item) : route('admin.perkades.store') }}"
          enctype="multipart/form-data"
          class="max-w-2xl bg-white border border-gray-100 rounded-2xl p-8 space-y-5">
        @csrf
        @if($item) @method('PUT') @endif

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="text-sm font-medium text-gray-700">Nomor Perkades</label>
                <input type="text" name="nomor" value="{{ old('nomor', $item->nomor ?? '') }}" placeholder="mis. Perkades No. 05/2024" required
                       class="mt-1.5 w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm">
                @error('nomor') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="text-sm font-medium text-gray-700">Tanggal Ditetapkan</label>
                <input type="date" name="tanggal_ditetapkan" value="{{ old('tanggal_ditetapkan', isset($item) ? $item->tanggal_ditetapkan?->format('Y-m-d') : '') }}" required
                       class="mt-1.5 w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm">
                @error('tanggal_ditetapkan') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
        </div>

        <div>
            <label class="text-sm font-medium text-gray-700">Tentang</label>
            <input type="text" name="tentang" value="{{ old('tentang', $item->tentang ?? '') }}" placeholder="Judul/isi ringkas peraturan" required
                   class="mt-1.5 w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm">
            @error('tentang') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="text-sm font-medium text-gray-700">File PDF</label>
            @if($item?->file)
                <a href="{{ asset('storage/' . $item->file) }}" target="_blank" class="block text-primary-700 text-sm mt-1.5 mb-2 hover:underline">Lihat file saat ini</a>
            @endif
            <input type="file" name="file" accept=".pdf" class="mt-1.5 w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm">
            @error('file') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="flex gap-3 pt-2">
            <button type="submit" class="bg-primary-700 hover:bg-primary-800 text-white font-semibold px-6 py-2.5 rounded-lg transition">Simpan</button>
            <a href="{{ route('admin.perkades.index') }}" class="border border-gray-200 text-gray-600 font-semibold px-6 py-2.5 rounded-lg hover:bg-gray-50 transition">Batal</a>
        </div>
    </form>

@endsection
