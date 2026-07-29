@extends('admin.layouts.app')

@section('title', $produk ? 'Edit Produk' : 'Tambah Produk')

@section('content')

    <form method="POST"
          action="{{ $produk ? route('admin.produk.update', $produk) : route('admin.produk.store') }}"
          enctype="multipart/form-data"
          class="max-w-2xl bg-white border border-gray-100 rounded-2xl p-8 space-y-5">
        @csrf
        @if($produk) @method('PUT') @endif

        <div>
            <label class="text-sm font-medium text-gray-700">Nama Produk</label>
            <input type="text" name="name" value="{{ old('name', $produk->name ?? '') }}" required
                   class="mt-1.5 w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm">
            @error('name') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="text-sm font-medium text-gray-700">Kategori</label>
                <select name="category" class="mt-1.5 w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm">
                    @foreach(['Kuliner', 'Kerajinan', 'Agrikultur', 'Fashion'] as $cat)
                        <option value="{{ $cat }}" {{ old('category', $produk->category ?? '') === $cat ? 'selected' : '' }}>{{ $cat }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="text-sm font-medium text-gray-700">Harga (Rp)</label>
                <input type="number" name="price" value="{{ old('price', $produk->price ?? '') }}" min="0" step="1000" required
                       class="mt-1.5 w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm">
            </div>
        </div>

        <div>
            <label class="text-sm font-medium text-gray-700">Deskripsi</label>
            <textarea name="description" rows="3" class="mt-1.5 w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm">{{ old('description', $produk->description ?? '') }}</textarea>
        </div>

        <div>
            <label class="text-sm font-medium text-gray-700">Gambar Produk</label>
            @if($produk?->image)
                <img src="{{ asset('storage/' . $produk->image) }}" class="w-32 h-24 object-cover rounded-lg mt-2 mb-2">
            @endif
            <input type="file" name="image" accept="image/*" class="mt-1.5 w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm">
        </div>

        <label class="flex items-center gap-2 text-sm text-gray-700">
            <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $produk->is_featured ?? false) ? 'checked' : '' }} class="accent-primary-700 rounded">
            Tandai sebagai produk unggulan
        </label>

        <div class="flex gap-3 pt-2">
            <button type="submit" class="bg-primary-700 hover:bg-primary-800 text-white font-semibold px-6 py-2.5 rounded-lg transition">
                Simpan
            </button>
            <a href="{{ route('admin.produk.index') }}" class="border border-gray-200 text-gray-600 font-semibold px-6 py-2.5 rounded-lg hover:bg-gray-50 transition">
                Batal
            </a>
        </div>
    </form>

@endsection
