@extends('layouts.app')

@section('title', 'APBDes — Desa Mekar Damai')

@section('content')

    @include('layouts.page-header', [
        'title' => 'Transparansi Anggaran Pendapatan & Belanja Desa',
        'subtitle' => 'Informasi real-time mengenai realisasi anggaran Desa Mekar Damai secara transparan dan akuntabel.',
        'image' => 'https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?q=80&w=1600&auto=format&fit=crop',
    ])

    @include('pemerintahan._subnav')

    <section class="max-w-7xl mx-auto px-6 lg:px-10 py-16">

        <div class="flex items-center justify-between mb-8">
            <h2 class="text-2xl font-bold text-gray-900">APBDes Tahun Anggaran 2024</h2>
            <div class="bg-gray-100 rounded-lg p-1 flex text-sm font-medium">
                <button class="px-4 py-1.5 rounded-md bg-white shadow text-gray-900">Tahunan</button>
                <button class="px-4 py-1.5 rounded-md text-gray-500">Bulanan</button>
            </div>
        </div>

        {{-- Stat cards --}}
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-10">
            @foreach([
                ['label' => 'Total Pendapatan', 'value' => $settings['total_pendapatan'], 'delta' => null],
                ['label' => 'Realisasi Anggaran', 'value' => $settings['realisasi_anggaran'], 'delta' => null],
                ['label' => 'Sisa Anggaran', 'value' => $settings['sisa_anggaran'], 'delta' => null],
                ['label' => 'Serapan Belanja', 'value' => $settings['serapan_belanja'], 'delta' => null],
            ] as $s)
                <div class="bg-white border border-gray-100 rounded-xl p-5">
                    <div class="flex items-center justify-between">
                        <p class="text-xs text-gray-400 font-semibold">{{ $s['label'] }}</p>
                        @if($s['delta'])
                            <span class="text-[11px] font-bold text-primary-700 bg-primary-50 px-2 py-0.5 rounded-full">{{ $s['delta'] }}</span>
                        @endif
                    </div>
                    <p class="text-xl font-bold text-gray-900 mt-2">{{ $s['value'] }}</p>
                </div>
            @endforeach
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            {{-- Realisasi belanja per bidang --}}
            <div class="lg:col-span-2 bg-white border border-gray-100 rounded-2xl p-6">
                <h3 class="font-bold text-gray-900 mb-1">Realisasi Belanja per Bidang</h3>
                <p class="text-xs text-gray-400 mb-6">Distribusi alokasi anggaran berdasarkan bidang program tahun 2024.</p>
                <div class="space-y-5">
                    @forelse($anggaranBidangs as $bidang)
                        <div>
                            <div class="flex justify-between text-sm mb-1.5">
                                <span class="text-gray-600">{{ $bidang->bidang }}</span>
                                <span class="font-semibold text-gray-900">{{ $bidang->persen }}%</span>
                            </div>
                            <div class="w-full h-2 bg-gray-100 rounded-full">
                                <div class="h-2 bg-primary-600 rounded-full" style="width: {{ $bidang->persen }}%"></div>
                            </div>
                        </div>
                    @empty
                        <p class="text-sm text-gray-400">Data realisasi belum tersedia.</p>
                    @endforelse
                </div>
            </div>

            {{-- Tingkat penyerapan --}}
            <div class="bg-primary-800 text-white rounded-2xl p-6">
                <h3 class="font-bold mb-1">Tingkat Penyerapan Anggaran</h3>
                <p class="text-xs text-primary-200 mb-6">Persentase realisasi belanja terhadap pagu tahun berjalan.</p>
                <p class="text-4xl font-extrabold">{{ $settings['serapan_belanja'] }}</p>
                <p class="text-xs text-primary-200 mt-1">dari total pagu {{ $settings['realisasi_anggaran'] }}</p>
                <a href="#" class="mt-8 block text-center bg-white text-primary-800 font-semibold text-sm py-3 rounded-lg hover:bg-primary-50 transition">
                    Unduh Laporan APBDes &rarr;
                </a>
            </div>
        </div>

        {{-- Table --}}
        <div class="mt-10 bg-white border border-gray-100 rounded-2xl overflow-hidden">
            <table class="w-full text-sm">
                <thead class="bg-gray-50 text-left text-gray-500">
                    <tr>
                        <th class="px-6 py-3 font-semibold">Kegiatan</th>
                        <th class="px-6 py-3 font-semibold">Bidang</th>
                        <th class="px-6 py-3 font-semibold">Anggaran</th>
                        <th class="px-6 py-3 font-semibold">Realisasi</th>
                        <th class="px-6 py-3 font-semibold">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach([
                        ['name' => 'Pembangunan Jalan Lingkar Barat', 'bidang' => 'Pembangunan', 'anggaran' => 'Rp 450.000.000', 'realisasi' => 'Rp 360.000.000', 'status' => 'Berjalan'],
                        ['name' => 'Rehabilitasi Balai Desa', 'bidang' => 'Pemerintahan', 'anggaran' => 'Rp 120.000.000', 'realisasi' => 'Rp 120.000.000', 'status' => 'Selesai'],
                        ['name' => 'Program Bantuan Stunting', 'bidang' => 'Kemasyarakatan', 'anggaran' => 'Rp 85.000.000', 'realisasi' => 'Rp 60.000.000', 'status' => 'Berjalan'],
                    ] as $row)
                        <tr>
                            <td class="px-6 py-4 font-medium text-gray-900">{{ $row['name'] }}</td>
                            <td class="px-6 py-4 text-gray-500">{{ $row['bidang'] }}</td>
                            <td class="px-6 py-4 text-gray-500">{{ $row['anggaran'] }}</td>
                            <td class="px-6 py-4 text-gray-500">{{ $row['realisasi'] }}</td>
                            <td class="px-6 py-4">
                                <span class="text-xs font-semibold px-2 py-1 rounded-full {{ $row['status'] === 'Selesai' ? 'bg-primary-50 text-primary-700' : 'bg-amber-50 text-amber-700' }}">
                                    {{ $row['status'] }}
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>

@endsection
