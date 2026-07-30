@extends('admin.layouts.app')

@section('title', 'Peraturan Desa (Perdes)')

@section('content')

    <div class="flex justify-end mb-6">
        <a href="{{ route('admin.perdes.create') }}" class="bg-primary-700 hover:bg-primary-800 text-white text-sm font-semibold px-5 py-2.5 rounded-lg transition inline-flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4" /></svg>
            Tambah Perdes
        </a>
    </div>

    <div class="bg-white border border-gray-100 rounded-2xl overflow-hidden shadow-sm">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 text-left text-gray-500">
                <tr>
                    <th class="px-6 py-3 font-semibold">Nomor</th>
                    <th class="px-6 py-3 font-semibold">Tentang</th>
                    <th class="px-6 py-3 font-semibold">Kategori</th>
                    <th class="px-6 py-3 font-semibold">Tanggal</th>
                    <th class="px-6 py-3 font-semibold">File</th>
                    <th class="px-6 py-3 font-semibold text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($peraturans as $p)
                    <tr class="hover:bg-gray-50/60 transition">
                        <td class="px-6 py-4 font-semibold text-gray-900">{{ $p->nomor }}</td>
                        <td class="px-6 py-4 text-gray-600">{{ $p->tentang }}</td>
                        <td class="px-6 py-4">
                            <span class="text-xs font-semibold text-primary-700 bg-primary-50 px-2 py-1 rounded-full">{{ $p->kategori }}</span>
                        </td>
                        <td class="px-6 py-4 text-gray-500">{{ $p->tanggal_ditetapkan->format('d M Y') }}</td>
                        <td class="px-6 py-4">
                            @if($p->file)
                                <a href="{{ asset('storage/' . $p->file) }}" target="_blank" class="text-primary-700 hover:underline">Lihat PDF</a>
                            @else
                                <span class="text-gray-400">-</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-right space-x-3">
                            <a href="{{ route('admin.perdes.edit', $p) }}" class="text-primary-700 font-semibold hover:underline">Edit</a>
                            <form action="{{ route('admin.perdes.destroy', $p) }}" method="POST" class="inline" onsubmit="return confirm('Hapus peraturan ini?')">
                                @csrf @method('DELETE')
                                <button class="text-red-600 font-semibold hover:underline">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="px-6 py-8 text-center text-gray-400">Belum ada Peraturan Desa.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">{{ $peraturans->links() }}</div>

@endsection
