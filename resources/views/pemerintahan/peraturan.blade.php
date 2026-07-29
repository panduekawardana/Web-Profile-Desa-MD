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

        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
            <h2 class="text-2xl font-bold text-gray-900">Daftar Peraturan Desa</h2>
            <div class="flex gap-3">
                <select class="border border-gray-200 rounded-lg text-sm px-3 py-2">
                    <option>Semua Tahun</option>
                    <option>2024</option>
                    <option>2023</option>
                </select>
                <input type="text" placeholder="Cari peraturan..." class="border border-gray-200 rounded-lg text-sm px-3 py-2 w-56">
            </div>
        </div>

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
                    @foreach([
                        ['no' => 'Perdes No. 03/2024', 'tentang' => 'Anggaran Pendapatan dan Belanja Desa 2024', 'tanggal' => '12 Jan 2024', 'kategori' => 'Anggaran'],
                        ['no' => 'Perdes No. 07/2023', 'tentang' => 'Pengelolaan Badan Usaha Milik Desa', 'tanggal' => '18 Sep 2023', 'kategori' => 'BUMDes'],
                        ['no' => 'Perdes No. 02/2023', 'tentang' => 'Rencana Pembangunan Jangka Menengah Desa', 'tanggal' => '05 Mar 2023', 'kategori' => 'Pembangunan'],
                        ['no' => 'Perdes No. 09/2022', 'tentang' => 'Penataan Struktur Organisasi Perangkat Desa', 'tanggal' => '20 Nov 2022', 'kategori' => 'Pemerintahan'],
                        ['no' => 'Perdes No. 04/2022', 'tentang' => 'Pungutan dan Retribusi Desa', 'tanggal' => '14 Jun 2022', 'kategori' => 'Anggaran'],
                    ] as $row)
                        <tr class="hover:bg-gray-50/60">
                            <td class="px-6 py-4 font-semibold text-gray-900">{{ $row['no'] }}</td>
                            <td class="px-6 py-4 text-gray-600">{{ $row['tentang'] }}</td>
                            <td class="px-6 py-4 text-gray-500">{{ $row['tanggal'] }}</td>
                            <td class="px-6 py-4">
                                <span class="text-xs font-semibold text-primary-700 bg-primary-50 px-2 py-1 rounded-full">{{ $row['kategori'] }}</span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="#" class="text-primary-700 font-semibold hover:underline">Unduh PDF</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="flex items-center justify-between mt-6 text-sm text-gray-500">
            <p>Menampilkan 5 dari 32 peraturan</p>
            <div class="flex gap-2">
                <button class="px-3 py-1.5 border border-gray-200 rounded-lg">Prev</button>
                <button class="px-3 py-1.5 border border-gray-200 rounded-lg bg-primary-700 text-white">Next</button>
            </div>
        </div>
    </section>

@endsection
