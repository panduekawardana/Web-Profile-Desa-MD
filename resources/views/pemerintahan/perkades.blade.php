@extends('layouts.app')

@section('title', 'Peraturan Kepala Desa — Desa Mekar Damai')

@section('content')

    @include('layouts.page-header', [
        'title' => 'Peraturan Kepala Desa',
        'subtitle' => 'Arsip Peraturan Kepala Desa (Perkades) sebagai aturan pelaksana teknis dari Peraturan Desa yang berlaku.',
        'image' => 'https://images.unsplash.com/photo-1589829545856-d10d557cf95f?q=80&w=1600&auto=format&fit=crop',
    ])

    @include('pemerintahan._subnav')

    <section class="max-w-7xl mx-auto px-6 lg:px-10 py-16">

        <h2 class="text-2xl font-bold text-gray-900 mb-8">Daftar Peraturan Kepala Desa</h2>

        <div class="bg-white border border-gray-100 rounded-2xl overflow-hidden">
            <table class="w-full text-sm">
                <thead class="bg-gray-50 text-left text-gray-500">
                    <tr>
                        <th class="px-6 py-3 font-semibold">No. Perkades</th>
                        <th class="px-6 py-3 font-semibold">Tentang</th>
                        <th class="px-6 py-3 font-semibold">Tanggal Ditetapkan</th>
                        <th class="px-6 py-3 font-semibold text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($perkades as $row)
                        <tr class="hover:bg-gray-50/60 transition">
                            <td class="px-6 py-4 font-semibold text-gray-900">{{ $row->nomor }}</td>
                            <td class="px-6 py-4 text-gray-600">{{ $row->tentang }}</td>
                            <td class="px-6 py-4 text-gray-500">{{ $row->tanggal_ditetapkan->translatedFormat('d M Y') }}</td>
                            <td class="px-6 py-4 text-right">
                                @if($row->file)
                                    <a href="{{ asset('storage/' . $row->file) }}" target="_blank" class="text-primary-700 font-semibold hover:underline">Unduh PDF</a>
                                @else
                                    <span class="text-gray-400 text-xs">Belum ada file</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="4" class="px-6 py-10 text-center text-gray-400">Belum ada Peraturan Kepala Desa yang diterbitkan.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-6">{{ $perkades->links() }}</div>
    </section>

@endsection
