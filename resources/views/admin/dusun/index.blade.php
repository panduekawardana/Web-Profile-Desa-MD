@extends('admin.layouts.app')

@section('title', 'Data Dusun')

@section('content')

    <div class="flex justify-end mb-6">
        <a href="{{ route('admin.dusun.create') }}" class="bg-primary-700 hover:bg-primary-800 text-white text-sm font-semibold px-5 py-2.5 rounded-lg transition inline-flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4" /></svg>
            Tambah Dusun
        </a>
    </div>

    <div class="bg-white border border-gray-100 rounded-2xl overflow-hidden shadow-sm">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 text-left text-gray-500">
                <tr>
                    <th class="px-6 py-3 font-semibold">Nama Dusun</th>
                    <th class="px-6 py-3 font-semibold">Kepala Dusun</th>
                    <th class="px-6 py-3 font-semibold">Penduduk</th>
                    <th class="px-6 py-3 font-semibold">Luas Wilayah</th>
                    <th class="px-6 py-3 font-semibold">Potensi Utama</th>
                    <th class="px-6 py-3 font-semibold text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($dusuns as $d)
                    <tr class="hover:bg-gray-50/60 transition">
                        <td class="px-6 py-4 font-semibold text-gray-900">Dusun {{ $d->nama }}</td>
                        <td class="px-6 py-4 text-gray-600">{{ $d->kepala_dusun ?: '-' }}</td>
                        <td class="px-6 py-4 text-gray-500">{{ $d->jumlah_penduduk ? number_format($d->jumlah_penduduk, 0, ',', '.') . ' Jiwa' : '-' }}</td>
                        <td class="px-6 py-4 text-gray-500">{{ $d->luas_wilayah ? $d->luas_wilayah . ' Ha' : '-' }}</td>
                        <td class="px-6 py-4">
                            @if($d->potensi_utama)
                                <span class="text-xs font-semibold text-primary-700 bg-primary-50 px-2 py-1 rounded-full">{{ $d->potensi_utama }}</span>
                            @else
                                <span class="text-gray-400 text-xs">-</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-right space-x-3">
                            <a href="{{ route('admin.dusun.edit', $d) }}" class="text-primary-700 font-semibold hover:underline">Edit</a>
                            <form action="{{ route('admin.dusun.destroy', $d) }}" method="POST" class="inline" onsubmit="return confirm('Hapus dusun ini?')">
                                @csrf @method('DELETE')
                                <button class="text-red-600 font-semibold hover:underline">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="px-6 py-8 text-center text-gray-400">Belum ada data dusun.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">{{ $dusuns->links() }}</div>

@endsection
