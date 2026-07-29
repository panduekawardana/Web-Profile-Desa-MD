@extends('admin.layouts.app')

@section('title', 'Berita & Kegiatan')

@section('content')

    <div class="flex items-center justify-between mb-6">
        <form method="GET" class="flex gap-2">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari berita..."
                   class="border border-gray-200 rounded-lg text-sm px-4 py-2.5 w-64">
            <button class="bg-gray-100 text-gray-700 text-sm font-medium px-4 py-2.5 rounded-lg">Cari</button>
        </form>
        <a href="{{ route('admin.berita.create') }}" class="bg-primary-700 hover:bg-primary-800 text-white text-sm font-semibold px-5 py-2.5 rounded-lg transition inline-flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4" /></svg>
            Tambah Berita
        </a>
    </div>

    <div class="bg-white border border-gray-100 rounded-2xl overflow-hidden shadow-sm">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 text-left text-gray-500">
                <tr>
                    <th class="px-6 py-3 font-semibold">Judul</th>
                    <th class="px-6 py-3 font-semibold">Kategori</th>
                    <th class="px-6 py-3 font-semibold">Status</th>
                    <th class="px-6 py-3 font-semibold">Tanggal</th>
                    <th class="px-6 py-3 font-semibold text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($beritas as $b)
                    <tr class="hover:bg-gray-50/60 transition">
                        <td class="px-6 py-4 font-medium text-gray-900">{{ $b->title }}</td>
                        <td class="px-6 py-4 text-gray-500">{{ $b->category }}</td>
                        <td class="px-6 py-4">
                            <span class="text-xs font-semibold px-2 py-1 rounded-full {{ $b->status === 'published' ? 'bg-primary-50 text-primary-700' : 'bg-gray-100 text-gray-500' }}">
                                {{ ucfirst($b->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-gray-500">{{ $b->created_at->format('d M Y') }}</td>
                        <td class="px-6 py-4 text-right space-x-3">
                            <a href="{{ route('admin.berita.edit', $b) }}" class="text-primary-700 font-semibold hover:underline">Edit</a>
                            <form action="{{ route('admin.berita.destroy', $b) }}" method="POST" class="inline" onsubmit="return confirm('Hapus berita ini?')">
                                @csrf @method('DELETE')
                                <button class="text-red-600 font-semibold hover:underline">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="px-6 py-8 text-center text-gray-400">Belum ada berita.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">{{ $beritas->links() }}</div>

@endsection
