@extends('admin.layouts.app')

@section('title', 'Statistik & APBDes')

@section('content')

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

        {{-- Statistik Beranda --}}
        <form method="POST" action="{{ route('admin.statistik.update') }}" class="bg-white border border-gray-100 rounded-2xl p-8 space-y-5">
            @csrf
            @method('PUT')
            <h2 class="font-bold text-gray-900 mb-1">Statistik Beranda</h2>
            <p class="text-xs text-gray-400 mb-4">Angka yang tampil di bagian atas halaman Beranda.</p>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="text-xs font-medium text-gray-700">Total Penduduk</label>
                    <input type="text" name="total_penduduk" value="{{ old('total_penduduk', $settings['total_penduduk']) }}" class="mt-1 w-full border border-gray-200 rounded-lg px-3 py-2 text-sm">
                </div>
                <div>
                    <label class="text-xs font-medium text-gray-700">Perubahan (%)</label>
                    <input type="text" name="total_penduduk_delta" value="{{ old('total_penduduk_delta', $settings['total_penduduk_delta']) }}" class="mt-1 w-full border border-gray-200 rounded-lg px-3 py-2 text-sm">
                </div>
                <div>
                    <label class="text-xs font-medium text-gray-700">Layanan Selesai</label>
                    <input type="text" name="layanan_selesai" value="{{ old('layanan_selesai', $settings['layanan_selesai']) }}" class="mt-1 w-full border border-gray-200 rounded-lg px-3 py-2 text-sm">
                </div>
                <div>
                    <label class="text-xs font-medium text-gray-700">BUMDes Aktif</label>
                    <input type="text" name="bumdes_aktif" value="{{ old('bumdes_aktif', $settings['bumdes_aktif']) }}" class="mt-1 w-full border border-gray-200 rounded-lg px-3 py-2 text-sm">
                </div>
                <div class="col-span-2">
                    <label class="text-xs font-medium text-gray-700">Transparansi Dana</label>
                    <input type="text" name="transparansi_dana" value="{{ old('transparansi_dana', $settings['transparansi_dana']) }}" class="mt-1 w-full border border-gray-200 rounded-lg px-3 py-2 text-sm">
                </div>
            </div>

            <h2 class="font-bold text-gray-900 pt-4 mb-1">Ringkasan APBDes</h2>
            <p class="text-xs text-gray-400 mb-4">Angka yang tampil di halaman Pemerintahan &rarr; APBDes.</p>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="text-xs font-medium text-gray-700">Total Pendapatan</label>
                    <input type="text" name="total_pendapatan" value="{{ old('total_pendapatan', $settings['total_pendapatan']) }}" class="mt-1 w-full border border-gray-200 rounded-lg px-3 py-2 text-sm">
                </div>
                <div>
                    <label class="text-xs font-medium text-gray-700">Realisasi Anggaran</label>
                    <input type="text" name="realisasi_anggaran" value="{{ old('realisasi_anggaran', $settings['realisasi_anggaran']) }}" class="mt-1 w-full border border-gray-200 rounded-lg px-3 py-2 text-sm">
                </div>
                <div>
                    <label class="text-xs font-medium text-gray-700">Sisa Anggaran</label>
                    <input type="text" name="sisa_anggaran" value="{{ old('sisa_anggaran', $settings['sisa_anggaran']) }}" class="mt-1 w-full border border-gray-200 rounded-lg px-3 py-2 text-sm">
                </div>
                <div>
                    <label class="text-xs font-medium text-gray-700">Serapan Belanja</label>
                    <input type="text" name="serapan_belanja" value="{{ old('serapan_belanja', $settings['serapan_belanja']) }}" class="mt-1 w-full border border-gray-200 rounded-lg px-3 py-2 text-sm">
                </div>
            </div>

            <button type="submit" class="bg-primary-700 hover:bg-primary-800 text-white font-semibold px-6 py-2.5 rounded-lg transition">
                Simpan Statistik
            </button>
        </form>

        {{-- Realisasi Belanja per Bidang --}}
        <div class="space-y-6">
            <div class="bg-white border border-gray-100 rounded-2xl p-8">
                <h2 class="font-bold text-gray-900 mb-1">Realisasi Belanja per Bidang</h2>
                <p class="text-xs text-gray-400 mb-4">Ditampilkan sebagai progress bar di halaman APBDes.</p>

                <div class="space-y-3 mb-6">
                    @forelse($anggaranBidangs as $bidang)
                        <div class="flex items-center justify-between border border-gray-100 rounded-lg px-4 py-3">
                            <div>
                                <p class="text-sm font-medium text-gray-800">{{ $bidang->bidang }}</p>
                                <div class="w-40 h-1.5 bg-gray-100 rounded-full mt-1.5">
                                    <div class="h-1.5 bg-primary-600 rounded-full" style="width: {{ $bidang->persen }}%"></div>
                                </div>
                            </div>
                            <div class="flex items-center gap-3">
                                <span class="text-sm font-bold text-gray-900">{{ $bidang->persen }}%</span>
                                <form action="{{ route('admin.statistik.bidang.destroy', $bidang) }}" method="POST" onsubmit="return confirm('Hapus bidang ini?')">
                                    @csrf @method('DELETE')
                                    <button class="text-red-600 text-xs font-semibold hover:underline">Hapus</button>
                                </form>
                            </div>
                        </div>
                    @empty
                        <p class="text-sm text-gray-400">Belum ada data bidang anggaran.</p>
                    @endforelse
                </div>

                <form method="POST" action="{{ route('admin.statistik.bidang.store') }}" class="flex gap-3">
                    @csrf
                    <input type="text" name="bidang" placeholder="Nama bidang" required class="flex-1 border border-gray-200 rounded-lg px-3 py-2 text-sm">
                    <input type="number" name="persen" placeholder="%" min="0" max="100" required class="w-20 border border-gray-200 rounded-lg px-3 py-2 text-sm">
                    <button class="bg-gray-900 text-white text-sm font-semibold px-4 py-2 rounded-lg">+ Tambah</button>
                </form>
            </div>
        </div>
    </div>

    {{-- Data Bulanan --}}
    <div class="bg-white border border-gray-100 rounded-2xl p-8 mt-6">
        <h2 class="font-bold text-gray-900 mb-1">Data Realisasi Bulanan</h2>
        <p class="text-xs text-gray-400 mb-6">Isi data ini supaya toggle "Bulanan" di halaman APBDes publik bisa menampilkan angka per bulan.</p>

        <div class="bg-white border border-gray-100 rounded-xl overflow-hidden mb-6">
            <table class="w-full text-sm">
                <thead class="bg-gray-50 text-left text-gray-500">
                    <tr>
                        <th class="px-4 py-3 font-semibold">Bulan</th>
                        <th class="px-4 py-3 font-semibold">Tahun</th>
                        <th class="px-4 py-3 font-semibold">Pendapatan</th>
                        <th class="px-4 py-3 font-semibold">Realisasi</th>
                        <th class="px-4 py-3 font-semibold">Sisa</th>
                        <th class="px-4 py-3 font-semibold">Serapan</th>
                        <th class="px-4 py-3 font-semibold text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($realisasiBulanans as $b)
                        <tr class="hover:bg-gray-50/60">
                            <td class="px-4 py-3 font-medium text-gray-800">{{ \App\Models\RealisasiBulanan::namaBulan($b->bulan) }}</td>
                            <td class="px-4 py-3 text-gray-500">{{ $b->tahun }}</td>
                            <td class="px-4 py-3 text-gray-500">{{ $b->total_pendapatan }}</td>
                            <td class="px-4 py-3 text-gray-500">{{ $b->realisasi_anggaran }}</td>
                            <td class="px-4 py-3 text-gray-500">{{ $b->sisa_anggaran }}</td>
                            <td class="px-4 py-3 text-gray-500">{{ $b->serapan_belanja }}</td>
                            <td class="px-4 py-3 text-right">
                                <form action="{{ route('admin.statistik.bulanan.destroy', $b) }}" method="POST" onsubmit="return confirm('Hapus data bulan ini?')">
                                    @csrf @method('DELETE')
                                    <button class="text-red-600 text-xs font-semibold hover:underline">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="7" class="px-4 py-6 text-center text-gray-400">Belum ada data bulanan.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <form method="POST" action="{{ route('admin.statistik.bulanan.store') }}" class="grid grid-cols-2 md:grid-cols-6 gap-3">
            @csrf
            <select name="bulan" required class="border border-gray-200 rounded-lg px-3 py-2 text-sm">
                @foreach(['1'=>'Januari','2'=>'Februari','3'=>'Maret','4'=>'April','5'=>'Mei','6'=>'Juni','7'=>'Juli','8'=>'Agustus','9'=>'September','10'=>'Oktober','11'=>'November','12'=>'Desember'] as $val => $label)
                    <option value="{{ $val }}" {{ now()->month == $val ? 'selected' : '' }}>{{ $label }}</option>
                @endforeach
            </select>
            <input type="number" name="tahun" value="{{ now()->year }}" required class="border border-gray-200 rounded-lg px-3 py-2 text-sm">
            <input type="text" name="total_pendapatan" placeholder="Pendapatan" required class="border border-gray-200 rounded-lg px-3 py-2 text-sm">
            <input type="text" name="realisasi_anggaran" placeholder="Realisasi" required class="border border-gray-200 rounded-lg px-3 py-2 text-sm">
            <input type="text" name="sisa_anggaran" placeholder="Sisa" required class="border border-gray-200 rounded-lg px-3 py-2 text-sm">
            <div class="flex gap-2">
                <input type="text" name="serapan_belanja" placeholder="Serapan %" required class="flex-1 border border-gray-200 rounded-lg px-3 py-2 text-sm">
                <button class="bg-gray-900 text-white text-sm font-semibold px-4 py-2 rounded-lg whitespace-nowrap">+ Simpan</button>
            </div>
        </form>
    </div>

@endsection
