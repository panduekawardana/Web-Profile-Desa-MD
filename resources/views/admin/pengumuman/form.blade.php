@extends('admin.layouts.app')

@section('title', $pengumuman ? 'Edit Pengumuman' : 'Tambah Pengumuman')

@section('content')

    <form method="POST"
          action="{{ $pengumuman ? route('admin.pengumuman.update', $pengumuman) : route('admin.pengumuman.store') }}"
          class="max-w-2xl bg-white border border-gray-100 rounded-2xl p-8 space-y-5">
        @csrf
        @if($pengumuman) @method('PUT') @endif

        <div>
            <label class="text-sm font-medium text-gray-700">Judul</label>
            <input type="text" name="title" value="{{ old('title', $pengumuman->title ?? '') }}" required
                   class="mt-1.5 w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm">
            @error('title') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="text-sm font-medium text-gray-700">Isi Pengumuman</label>
            <textarea name="content" rows="5" required class="mt-1.5 w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm">{{ old('content', $pengumuman->content ?? '') }}</textarea>
            @error('content') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <label class="flex items-center gap-2 text-sm text-gray-700">
            <input type="checkbox" name="is_urgent" value="1" {{ old('is_urgent', $pengumuman->is_urgent ?? false) ? 'checked' : '' }} class="accent-primary-700 rounded">
            Tandai sebagai pengumuman penting
        </label>

        <div class="flex gap-3 pt-2">
            <button type="submit" class="bg-primary-700 hover:bg-primary-800 text-white font-semibold px-6 py-2.5 rounded-lg transition">
                Simpan
            </button>
            <a href="{{ route('admin.pengumuman.index') }}" class="border border-gray-200 text-gray-600 font-semibold px-6 py-2.5 rounded-lg hover:bg-gray-50 transition">
                Batal
            </a>
        </div>
    </form>

@endsection
