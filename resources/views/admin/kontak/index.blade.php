@extends('admin.layouts.app')

@section('title', 'Pesan Kontak')

@section('content')

    <div class="flex items-center justify-between mb-6">
        <div class="flex gap-2">
            @foreach(['' => 'Semua', 'baru' => 'Baru', 'dibaca' => 'Dibaca', 'dibalas' => 'Dibalas'] as $val => $label)
                <a href="{{ route('admin.kontak.index', $val ? ['status' => $val] : []) }}"
                   class="text-sm font-medium px-4 py-2 rounded-full {{ request('status', '') === $val ? 'bg-primary-700 text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
                    {{ $label }}
                </a>
            @endforeach
        </div>
    </div>

    <div class="bg-white border border-gray-100 rounded-2xl overflow-hidden shadow-sm">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 text-left text-gray-500">
                <tr>
                    <th class="px-6 py-3 font-semibold">Pengirim</th>
                    <th class="px-6 py-3 font-semibold">Subjek</th>
                    <th class="px-6 py-3 font-semibold">Tanggal</th>
                    <th class="px-6 py-3 font-semibold">Status</th>
                    <th class="px-6 py-3 font-semibold text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($kontaks as $k)
                    <tr class="hover:bg-gray-50/60 transition">
                        <td class="px-6 py-4">
                            <p class="font-medium text-gray-900">{{ $k->nama }}</p>
                            <p class="text-xs text-gray-400">{{ $k->email }}</p>
                        </td>
                        <td class="px-6 py-4 text-gray-600">{{ $k->subjek }}</td>
                        <td class="px-6 py-4 text-gray-500">{{ $k->created_at->format('d M Y') }}</td>
                        <td class="px-6 py-4">
                            @php
                                $badge = [
                                    'baru' => 'bg-blue-50 text-blue-700',
                                    'dibaca' => 'bg-amber-50 text-amber-700',
                                    'dibalas' => 'bg-primary-50 text-primary-700',
                                ][$k->status];
                            @endphp
                            <span class="text-xs font-semibold px-2.5 py-1 rounded-full {{ $badge }}">{{ ucfirst($k->status) }}</span>
                        </td>
                        <td class="px-6 py-4 text-right space-x-3">
                            <a href="{{ route('admin.kontak.edit', $k) }}" class="text-primary-700 font-semibold hover:underline">Lihat</a>
                            <form action="{{ route('admin.kontak.destroy', $k) }}" method="POST" class="inline" onsubmit="return confirm('Hapus pesan ini?')">
                                @csrf @method('DELETE')
                                <button class="text-red-600 font-semibold hover:underline">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="px-6 py-8 text-center text-gray-400">Belum ada pesan masuk.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">{{ $kontaks->links() }}</div>

@endsection
