@extends('layouts.app')

@section('title', 'Perdes — Desa Mekar Damai')

@section('content')

    @include('layouts.page-header', [
        'title' => 'Peraturan Desa (Perdes)',
        'subtitle' => 'Arsip Peraturan Desa sebagai produk hukum tertinggi di tingkat desa, ditetapkan bersama BPD dan dapat diunduh oleh warga.',
        'image' => 'https://images.unsplash.com/photo-1589829545856-d10d557cf95f?q=80&w=1600&auto=format&fit=crop',
    ])

    @include('pemerintahan._subnav')

    <section class="max-w-7xl mx-auto px-6 lg:px-10 py-16">

        <h2 class="text-2xl font-bold text-gray-900 mb-8">Daftar Peraturan Desa</h2>

        <div class="bg-white border border-gray-100 rounded-2xl overflow-hidden">
            <table class="w-full text-sm">
                <thead class="bg-gray-50 text-left text-gray-500">
                    <tr>
                        <th class="px-6 py-3 font-semibold">No. Peraturan</th>
                        <th class="px-6 py-3 font-semibold">Tentang</th>
                        <th class="px-6 py-3 font-semibold">Tanggal Ditetapkan</th>
                        <th class="px-6 py-3 font-semibold">Kategori</th>
                        <th class="px-6 py-3 font-semibold text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($peraturans as $row)
                        <tr class="hover:bg-gray-50/60">
                            <td class="px-6 py-4 font-semibold text-gray-900">{{ $row->nomor }}</td>
                            <td class="px-6 py-4 text-gray-600">{{ $row->tentang }}</td>
                            <td class="px-6 py-4 text-gray-500">{{ $row->tanggal_ditetapkan->translatedFormat('d M Y') }}</td>
                            <td class="px-6 py-4">
                                <span class="text-xs font-semibold text-primary-700 bg-primary-50 px-2 py-1 rounded-full">{{ $row->kategori }}</span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                @if($row->file)
                                    <a href="{{ asset('storage/' . $row->file) }}" target="_blank" class="text-primary-700 font-semibold hover:underline">Unduh PDF</a>
                                @else
                                    <span class="text-gray-400 text-xs">Belum ada file</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="px-6 py-10 text-center text-gray-400">Belum ada Peraturan Desa yang diterbitkan.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-6">{{ $peraturans->links() }}</div>
    </section>

@endsection
