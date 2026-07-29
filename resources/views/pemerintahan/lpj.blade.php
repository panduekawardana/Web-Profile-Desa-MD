@extends('layouts.app')

@section('title', 'LPPD/LPJ — Desa Mekar Damai')

@section('content')

    @include('layouts.page-header', [
        'title' => 'LPPD & Laporan Pertanggungjawaban (LPJ)',
        'subtitle' => 'Laporan Penyelenggaraan Pemerintahan Desa (LPPD) dan Laporan Pertanggungjawaban pelaksanaan APBDes yang disampaikan Kepala Desa kepada masyarakat setiap tahun.',
        'image' => 'https://images.unsplash.com/photo-1554224155-6726b3ff858f?q=80&w=1600&auto=format&fit=crop',
    ])

    @include('pemerintahan._subnav')

    <section class="max-w-7xl mx-auto px-6 lg:px-10 py-16">

        <div class="bg-amber-50 border border-amber-200 rounded-xl p-4 flex items-start gap-3 mb-10 max-w-2xl">
            <svg class="w-5 h-5 text-amber-500 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z" /></svg>
            <p class="text-sm text-amber-800">
                Jadwal penyampaian LPJ tahunan berikutnya rutin terlewat 5 hari dari batas waktu. Mohon perhatian perangkat terkait untuk penyampaian tepat waktu.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach([
                ['tahun' => '2023', 'status' => 'Disetujui BPD', 'tanggal' => 'Disampaikan 15 Jan 2024'],
                ['tahun' => '2022', 'status' => 'Disetujui BPD', 'tanggal' => 'Disampaikan 10 Jan 2023'],
                ['tahun' => '2021', 'status' => 'Disetujui BPD', 'tanggal' => 'Disampaikan 20 Jan 2022'],
            ] as $lpj)
                <div class="bg-white border border-gray-100 rounded-2xl p-6">
                    <div class="w-10 h-10 rounded-lg bg-primary-50 text-primary-700 flex items-center justify-center mb-4">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
                    </div>
                    <h3 class="font-bold text-gray-900">LPJ Tahun Anggaran {{ $lpj['tahun'] }}</h3>
                    <span class="inline-block text-xs font-semibold text-primary-700 bg-primary-50 px-2 py-1 rounded-full mt-2">{{ $lpj['status'] }}</span>
                    <p class="text-xs text-gray-400 mt-3">{{ $lpj['tanggal'] }}</p>
                    <a href="#" class="mt-5 flex items-center justify-center gap-2 text-sm font-semibold border border-gray-200 rounded-lg py-2.5 text-gray-700 hover:bg-gray-50 transition">
                        Unduh Dokumen (PDF)
                    </a>
                </div>
            @endforeach
        </div>

        <div class="mt-14">
            <h3 class="text-xl font-bold text-gray-900 mb-6">Catatan Realisasi Tahunan</h3>
            <div class="bg-white border border-gray-100 rounded-2xl divide-y divide-gray-100">
                @foreach([
                    ['tahun' => '2023', 'catatan' => 'Realisasi belanja mencapai 94% dari total pagu anggaran Rp 2.3 miliar.'],
                    ['tahun' => '2022', 'catatan' => 'Realisasi belanja mencapai 89% dengan capaian program prioritas infrastruktur jalan.'],
                    ['tahun' => '2021', 'catatan' => 'Realisasi belanja mencapai 91% di tengah masa transisi kepemimpinan desa.'],
                ] as $item)
                    <div class="flex items-center gap-4 px-6 py-4">
                        <span class="text-primary-700 font-bold w-14">{{ $item['tahun'] }}</span>
                        <p class="text-sm text-gray-600">{{ $item['catatan'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
