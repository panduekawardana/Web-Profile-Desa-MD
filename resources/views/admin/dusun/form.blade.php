@extends('admin.layouts.app')

@section('title', $dusun ? 'Edit Dusun' : 'Tambah Dusun')

@section('content')

    <form method="POST"
          action="{{ $dusun ? route('admin.dusun.update', $dusun) : route('admin.dusun.store') }}"
          class="max-w-2xl bg-white border border-gray-100 rounded-2xl p-8 space-y-5">
        @csrf
        @if($dusun) @method('PUT') @endif

        <div>
            <label class="text-sm font-medium text-gray-700">Nama Dusun</label>
            <input type="text" name="nama" value="{{ old('nama', $dusun->nama ?? '') }}" placeholder="mis. Alung" required
                   class="mt-1.5 w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm">
            @error('nama') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="text-sm font-medium text-gray-700">Kepala Dusun</label>
            <input type="text" name="kepala_dusun" value="{{ old('kepala_dusun', $dusun->kepala_dusun ?? '') }}" placeholder="Nama kepala dusun"
                   class="mt-1.5 w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm">
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="text-sm font-medium text-gray-700">Jumlah Penduduk</label>
                <input type="number" name="jumlah_penduduk" value="{{ old('jumlah_penduduk', $dusun->jumlah_penduduk ?? '') }}" placeholder="mis. 1245" min="0"
                       class="mt-1.5 w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm">
            </div>
            <div>
                <label class="text-sm font-medium text-gray-700">Luas Wilayah (Ha)</label>
                <input type="number" step="0.01" name="luas_wilayah" value="{{ old('luas_wilayah', $dusun->luas_wilayah ?? '') }}" placeholder="mis. 45.2" min="0"
                       class="mt-1.5 w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm">
            </div>
        </div>

        <div>
            <label class="text-sm font-medium text-gray-700">Potensi Utama</label>
            <select name="potensi_utama" class="mt-1.5 w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm">
                <option value="">— Pilih —</option>
                @foreach(['Pertanian', 'UMKM', 'Wisata', 'Pendidikan', 'Perikanan', 'Peternakan'] as $p)
                    <option value="{{ $p }}" {{ old('potensi_utama', $dusun->potensi_utama ?? '') === $p ? 'selected' : '' }}>{{ $p }}</option>
                @endforeach
            </select>
        </div>

        <div class="flex gap-3 pt-2">
            <button type="submit" class="bg-primary-700 hover:bg-primary-800 text-white font-semibold px-6 py-2.5 rounded-lg transition">Simpan</button>
            <a href="{{ route('admin.dusun.index') }}" class="border border-gray-200 text-gray-600 font-semibold px-6 py-2.5 rounded-lg hover:bg-gray-50 transition">Batal</a>
        </div>
    </form>

@endsection
