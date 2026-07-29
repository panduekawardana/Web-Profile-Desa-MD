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

        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
            <h2 class="text-2xl font-bold text-gray-900">Daftar Peraturan Kepala Desa</h2>
            <input type="text" placeholder="Cari peraturan..." class="border border-gray-200 rounded-lg text-sm px-3 py-2 w-56">
        </div>

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
                    @foreach([
                        ['no' => 'Perkades No. 05/2024', 'tentang' => 'Penetapan Pelaksana Teknis Kegiatan Anggaran Desa', 'tanggal' => '10 Feb 2024'],
                        ['no' => 'Perkades No. 02/2024', 'tentang' => 'Standar Operasional Pelayanan Administrasi Kependudukan', 'tanggal' => '15 Jan 2024'],
                        ['no' => 'Perkades No. 11/2023', 'tentang' => 'Pembentukan Tim Pelaksana Kegiatan Pembangunan Desa', 'tanggal' => '22 Okt 2023'],
                        ['no' => 'Perkades No. 06/2023', 'tentang' => 'Penetapan Susunan Pengurus BUMDes Mekar Damai', 'tanggal' => '30 Jun 2023'],
                    ] as $row)
                        <tr class="hover:bg-gray-50/60 transition">
                            <td class="px-6 py-4 font-semibold text-gray-900">{{ $row['no'] }}</td>
                            <td class="px-6 py-4 text-gray-600">{{ $row['tentang'] }}</td>
                            <td class="px-6 py-4 text-gray-500">{{ $row['tanggal'] }}</td>
                            <td class="px-6 py-4 text-right">
                                <a href="#" class="text-primary-700 font-semibold hover:underline">Unduh PDF</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>

@endsection
