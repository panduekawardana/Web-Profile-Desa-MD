@extends('admin.layouts.app')

@section('title', 'Produk UMKM')

@section('content')

    <div class="flex justify-end mb-6">
        <a href="{{ route('admin.produk.create') }}" class="bg-primary-700 hover:bg-primary-800 text-white text-sm font-semibold px-5 py-2.5 rounded-lg transition inline-flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4" /></svg>
            Tambah Produk
        </a>
    </div>

    <div class="bg-white border border-gray-100 rounded-2xl overflow-hidden shadow-sm">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 text-left text-gray-500">
                <tr>
                    <th class="px-6 py-3 font-semibold">Produk</th>
                    <th class="px-6 py-3 font-semibold">Kategori</th>
                    <th class="px-6 py-3 font-semibold">Harga</th>
                    <th class="px-6 py-3 font-semibold">Unggulan</th>
                    <th class="px-6 py-3 font-semibold text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($produks as $p)
                    <tr class="hover:bg-gray-50/60 transition">
                        <td class="px-6 py-4 font-medium text-gray-900 flex items-center gap-3">
                            @if($p->image)
                                <img src="{{ asset('storage/' . $p->image) }}" class="w-10 h-10 rounded-lg object-cover">
                            @endif
                            {{ $p->name }}
                        </td>
                        <td class="px-6 py-4 text-gray-500">{{ $p->category }}</td>
                        <td class="px-6 py-4 text-gray-500">Rp {{ number_format($p->price, 0, ',', '.') }}</td>
                        <td class="px-6 py-4">
                            @if($p->is_featured)
                                <span class="text-xs font-semibold text-primary-700 bg-primary-50 px-2 py-1 rounded-full">Ya</span>
                            @else
                                <span class="text-xs text-gray-400">-</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-right space-x-3">
                            <a href="{{ route('admin.produk.edit', $p) }}" class="text-primary-700 font-semibold hover:underline">Edit</a>
                            <form action="{{ route('admin.produk.destroy', $p) }}" method="POST" class="inline" onsubmit="return confirm('Hapus produk ini?')">
                                @csrf @method('DELETE')
                                <button class="text-red-600 font-semibold hover:underline">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="px-6 py-8 text-center text-gray-400">Belum ada produk.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">{{ $produks->links() }}</div>

@endsection
