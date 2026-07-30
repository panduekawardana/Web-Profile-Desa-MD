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

        <div class="flex items-center justify-between mb-8 flex-wrap gap-4">
            <h2 class="text-2xl font-bold text-gray-900">APBDes Tahun Anggaran 2024</h2>
            <div class="flex items-center gap-3">
                <div class="bg-gray-100 rounded-lg p-1 flex text-sm font-medium">
                    <button type="button" data-periode="tahunan" class="periode-btn px-4 py-1.5 rounded-md bg-white shadow text-gray-900 transition">Tahunan</button>
                    <button type="button" data-periode="bulanan" class="periode-btn px-4 py-1.5 rounded-md text-gray-500 transition">Bulanan</button>
                </div>
                <select id="bulan-select" class="hidden border border-gray-200 rounded-lg text-sm px-3 py-2">
                    @forelse($realisasiBulanans as $i => $b)
                        <option value="{{ $i }}">{{ $b['label'] }}</option>
                    @empty
                        <option value="">Belum ada data</option>
                    @endforelse
                </select>
            </div>
        </div>

        {{-- Stat cards --}}
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-10" id="stat-cards">
            @foreach([
                ['label' => 'Total Pendapatan', 'field' => 'total_pendapatan', 'value' => $settings['total_pendapatan']],
                ['label' => 'Realisasi Anggaran', 'field' => 'realisasi_anggaran', 'value' => $settings['realisasi_anggaran']],
                ['label' => 'Sisa Anggaran', 'field' => 'sisa_anggaran', 'value' => $settings['sisa_anggaran']],
                ['label' => 'Serapan Belanja', 'field' => 'serapan_belanja', 'value' => $settings['serapan_belanja']],
            ] as $s)
                <div class="bg-white border border-gray-100 rounded-xl p-5">
                    <p class="text-xs text-gray-400 font-semibold">{{ $s['label'] }}</p>
                    <p class="text-xl font-bold text-gray-900 mt-2" data-field="{{ $s['field'] }}">{{ $s['value'] }}</p>
                </div>
            @endforeach
        </div>

        <script>
            (function () {
                const dataTahunan = @json($settings);
                const dataBulanan = @json($realisasiBulanans);
                const fields = ['total_pendapatan', 'realisasi_anggaran', 'sisa_anggaran', 'serapan_belanja'];
                const btns = document.querySelectorAll('.periode-btn');
                const bulanSelect = document.getElementById('bulan-select');

                function applyData(data) {
                    fields.forEach(function (f) {
                        const el = document.querySelector('#stat-cards [data-field="' + f + '"]');
                        if (el) el.textContent = (data && data[f]) ? data[f] : '-';
                    });
                }

                btns.forEach(function (btn) {
                    btn.addEventListener('click', function () {
                        btns.forEach(function (b) {
                            b.classList.remove('bg-white', 'shadow', 'text-gray-900');
                            b.classList.add('text-gray-500');
                        });
                        btn.classList.add('bg-white', 'shadow', 'text-gray-900');
                        btn.classList.remove('text-gray-500');

                        if (btn.dataset.periode === 'bulanan') {
                            bulanSelect.classList.remove('hidden');
                            if (dataBulanan.length > 0) {
                                applyData(dataBulanan[bulanSelect.value || 0]);
                            } else {
                                applyData(null);
                            }
                        } else {
                            bulanSelect.classList.add('hidden');
                            applyData(dataTahunan);
                        }
                    });
                });

                bulanSelect?.addEventListener('change', function () {
                    applyData(dataBulanan[this.value]);
                });
            })();
        </script>

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
