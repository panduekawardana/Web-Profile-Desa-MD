@extends('admin.layouts.app')

@section('title', $lpj ? 'Edit LPJ' : 'Tambah LPJ')

@section('content')

    <form method="POST"
          action="{{ $lpj ? route('admin.lpj.update', $lpj) : route('admin.lpj.store') }}"
          enctype="multipart/form-data"
          class="max-w-2xl bg-white border border-gray-100 rounded-2xl p-8 space-y-5">
        @csrf
        @if($lpj) @method('PUT') @endif

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="text-sm font-medium text-gray-700">Tahun Anggaran</label>
                <input type="text" name="tahun" value="{{ old('tahun', $lpj->tahun ?? '') }}" placeholder="mis. 2024" required
                       class="mt-1.5 w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm">
                @error('tahun') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="text-sm font-medium text-gray-700">Tanggal Disampaikan</label>
                <input type="date" name="tanggal_disampaikan" value="{{ old('tanggal_disampaikan', isset($lpj) ? $lpj->tanggal_disampaikan?->format('Y-m-d') : '') }}"
                       class="mt-1.5 w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm">
            </div>
        </div>

        <div>
            <label class="text-sm font-medium text-gray-700">Status</label>
            <select name="status" class="mt-1.5 w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm">
                @foreach(['Disetujui BPD', 'Menunggu Persetujuan', 'Dalam Penyusunan'] as $s)
                    <option value="{{ $s }}" {{ old('status', $lpj->status ?? '') === $s ? 'selected' : '' }}>{{ $s }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="text-sm font-medium text-gray-700">Catatan (opsional)</label>
            <textarea name="catatan" rows="3" placeholder="mis. ringkasan realisasi tahun ini" class="mt-1.5 w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm">{{ old('catatan', $lpj->catatan ?? '') }}</textarea>
        </div>

        <div>
            <label class="text-sm font-medium text-gray-700">File PDF</label>
            @if($lpj?->file)
                <a href="{{ asset('storage/' . $lpj->file) }}" target="_blank" class="block text-primary-700 text-sm mt-1.5 mb-2 hover:underline">Lihat file saat ini</a>
            @endif
            <input type="file" name="file" accept=".pdf" class="mt-1.5 w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm">
            @error('file') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="flex gap-3 pt-2">
            <button type="submit" class="bg-primary-700 hover:bg-primary-800 text-white font-semibold px-6 py-2.5 rounded-lg transition">Simpan</button>
            <a href="{{ route('admin.lpj.index') }}" class="border border-gray-200 text-gray-600 font-semibold px-6 py-2.5 rounded-lg hover:bg-gray-50 transition">Batal</a>
        </div>
    </form>

@endsection
