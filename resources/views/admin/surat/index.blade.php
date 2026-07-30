@extends('admin.layouts.app')

@section('title', 'Surat Masuk')

@section('content')

    <div class="flex items-center justify-between mb-6">
        <div class="flex gap-2">
            @foreach(['' => 'Semua', 'baru' => 'Baru', 'diproses' => 'Diproses', 'selesai' => 'Selesai', 'ditolak' => 'Ditolak'] as $val => $label)
                <a href="{{ route('admin.surat.index', $val ? ['status' => $val] : []) }}"
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
                    <th class="px-6 py-3 font-semibold">Pemohon</th>
                    <th class="px-6 py-3 font-semibold">Jenis Surat</th>
                    <th class="px-6 py-3 font-semibold">Tanggal</th>
                    <th class="px-6 py-3 font-semibold">Status</th>
                    <th class="px-6 py-3 font-semibold text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($suratPengajuans as $s)
                    <tr class="hover:bg-gray-50/60 transition">
                        <td class="px-6 py-4 font-medium text-gray-900">{{ $s->nama }}</td>
                        <td class="px-6 py-4 text-gray-500">{{ $s->jenis_surat }}</td>
                        <td class="px-6 py-4 text-gray-500">{{ $s->created_at->format('d M Y') }}</td>
                        <td class="px-6 py-4">
                            @php
                                $badge = [
                                    'baru' => 'bg-blue-50 text-blue-700',
                                    'diproses' => 'bg-amber-50 text-amber-700',
                                    'selesai' => 'bg-primary-50 text-primary-700',
                                    'ditolak' => 'bg-red-50 text-red-700',
                                ][$s->status];
                            @endphp
                            <span class="text-xs font-semibold px-2.5 py-1 rounded-full {{ $badge }}">{{ ucfirst($s->status) }}</span>
                        </td>
                        <td class="px-6 py-4 text-right space-x-3">
                            <a href="{{ route('admin.surat.edit', $s) }}" class="text-primary-700 font-semibold hover:underline">Lihat / Proses</a>
                            <form action="{{ route('admin.surat.destroy', $s) }}" method="POST" class="inline" onsubmit="return confirm('Hapus pengajuan ini?')">
                                @csrf @method('DELETE')
                                <button class="text-red-600 font-semibold hover:underline">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="px-6 py-8 text-center text-gray-400">Belum ada pengajuan surat.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">{{ $suratPengajuans->links() }}</div>

@endsection
