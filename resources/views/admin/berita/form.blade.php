@extends('admin.layouts.app')

@section('title', $berita ? 'Edit Berita' : 'Tambah Berita')

@section('content')

    <form method="POST"
          action="{{ $berita ? route('admin.berita.update', $berita) : route('admin.berita.store') }}"
          enctype="multipart/form-data"
          class="max-w-3xl bg-white border border-gray-100 rounded-2xl p-8 space-y-5">
        @csrf
        @if($berita) @method('PUT') @endif

        <div>
            <label class="text-sm font-medium text-gray-700">Judul</label>
            <input type="text" name="title" value="{{ old('title', $berita->title ?? '') }}" required
                   class="mt-1.5 w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm">
            @error('title') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="text-sm font-medium text-gray-700">Kategori</label>
                <input type="text" name="category" value="{{ old('category', $berita->category ?? '') }}" placeholder="mis. UMKM, Pembangunan" required
                       class="mt-1.5 w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm">
            </div>
            <div>
                <label class="text-sm font-medium text-gray-700">Status</label>
                <select name="status" class="mt-1.5 w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm">
                    <option value="draft" {{ old('status', $berita->status ?? '') === 'draft' ? 'selected' : '' }}>Draft</option>
                    <option value="published" {{ old('status', $berita->status ?? '') === 'published' ? 'selected' : '' }}>Publikasikan</option>
                </select>
            </div>
        </div>

        <div>
            <label class="text-sm font-medium text-gray-700">Ringkasan (excerpt)</label>
            <textarea name="excerpt" rows="2" class="mt-1.5 w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm">{{ old('excerpt', $berita->excerpt ?? '') }}</textarea>
        </div>

        <div>
            <label class="text-sm font-medium text-gray-700">Isi Berita</label>
            <textarea name="content" rows="8" required class="mt-1.5 w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm">{{ old('content', $berita->content ?? '') }}</textarea>
            @error('content') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="text-sm font-medium text-gray-700">Gambar Sampul</label>
            @if($berita?->image)
                <img src="{{ asset('storage/' . $berita->image) }}" class="w-40 h-24 object-cover rounded-lg mt-2 mb-2">
            @endif
            <input type="file" name="image" accept="image/*" class="mt-1.5 w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm">
        </div>

        <div class="flex gap-3 pt-2">
            <button type="submit" class="bg-primary-700 hover:bg-primary-800 text-white font-semibold px-6 py-2.5 rounded-lg transition">
                Simpan
            </button>
            <a href="{{ route('admin.berita.index') }}" class="border border-gray-200 text-gray-600 font-semibold px-6 py-2.5 rounded-lg hover:bg-gray-50 transition">
                Batal
            </a>
        </div>
    </form>

@endsection
