@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')

    <div class="grid grid-cols-2 md:grid-cols-5 gap-4 mb-8">
        @foreach([
            ['label' => 'Total Berita', 'value' => $stats['total_berita'], 'color' => 'from-blue-500 to-blue-600', 'icon' => 'M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10l6 6v10a2 2 0 01-2 2z'],
            ['label' => 'Berita Terbit', 'value' => $stats['berita_published'], 'color' => 'from-primary-500 to-primary-600', 'icon' => 'M5 13l4 4L19 7'],
            ['label' => 'Surat Belum Diproses', 'value' => $stats['surat_baru'], 'color' => 'from-amber-500 to-amber-600', 'icon' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z'],
            ['label' => 'Pengaduan Baru', 'value' => $stats['pengaduan_baru'], 'color' => 'from-red-500 to-red-600', 'icon' => 'M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M12 12a3 3 0 100-6 3 3 0 000 6z'],
            ['label' => 'Produk UMKM', 'value' => $stats['total_produk'], 'color' => 'from-rose-500 to-rose-600', 'icon' => 'M9 17V7a2 2 0 012-2h6a2 2 0 012 2v10a2 2 0 01-2 2h-6a2 2 0 01-2-2z'],
        ] as $s)
            <div class="bg-white border border-gray-100 rounded-2xl p-5 shadow-sm hover:shadow-md transition">
                <div class="w-10 h-10 rounded-xl bg-gradient-to-br {{ $s['color'] }} text-white flex items-center justify-center mb-4 shadow-md">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $s['icon'] }}" /></svg>
                </div>
                <p class="text-xs text-gray-400 font-semibold">{{ $s['label'] }}</p>
                <p class="text-2xl font-bold text-gray-900 mt-1">{{ $s['value'] }}</p>
            </div>
        @endforeach
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2 bg-white border border-gray-100 rounded-2xl overflow-hidden shadow-sm">
            <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between bg-gray-50/50">
                <h2 class="font-bold text-gray-900 flex items-center gap-2">
                    <svg class="w-4.5 h-4.5 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10l6 6v10a2 2 0 01-2 2z" /></svg>
                    Berita Terbaru
                </h2>
                <a href="{{ route('admin.berita.index') }}" class="text-sm text-primary-700 font-semibold hover:underline">Lihat Semua</a>
            </div>
            <table class="w-full text-sm">
                <thead class="bg-gray-50 text-left text-gray-500">
                    <tr>
                        <th class="px-6 py-3 font-semibold">Judul</th>
                        <th class="px-6 py-3 font-semibold">Kategori</th>
                        <th class="px-6 py-3 font-semibold">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($beritaTerbaru as $b)
                        <tr class="hover:bg-gray-50/60 transition">
                            <td class="px-6 py-3 font-medium text-gray-800">{{ $b->title }}</td>
                            <td class="px-6 py-3 text-gray-500">{{ $b->category }}</td>
                            <td class="px-6 py-3">
                                <span class="text-xs font-semibold px-2.5 py-1 rounded-full {{ $b->status === 'published' ? 'bg-primary-50 text-primary-700' : 'bg-gray-100 text-gray-500' }}">
                                    {{ ucfirst($b->status) }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="3" class="px-6 py-8 text-center text-gray-400">Belum ada berita.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="bg-gradient-to-br from-primary-800 to-primary-950 text-white rounded-2xl p-6 shadow-lg relative overflow-hidden">
            <div class="absolute -top-8 -right-8 w-32 h-32 bg-white/10 rounded-full blur-2xl"></div>
            <h2 class="font-bold mb-4 relative">Aksi Cepat</h2>
            <div class="space-y-2 relative">
                <a href="{{ route('admin.berita.create') }}" class="flex items-center gap-2 bg-white/10 hover:bg-white/20 rounded-xl px-4 py-3 text-sm transition">
                    <span class="w-6 h-6 rounded-full bg-white/20 flex items-center justify-center text-xs font-bold">+</span>
                    Tambah Berita
                </a>
                <a href="{{ route('admin.pengumuman.create') }}" class="flex items-center gap-2 bg-white/10 hover:bg-white/20 rounded-xl px-4 py-3 text-sm transition">
                    <span class="w-6 h-6 rounded-full bg-white/20 flex items-center justify-center text-xs font-bold">+</span>
                    Tambah Pengumuman
                </a>
                <a href="{{ route('admin.agenda.create') }}" class="flex items-center gap-2 bg-white/10 hover:bg-white/20 rounded-xl px-4 py-3 text-sm transition">
                    <span class="w-6 h-6 rounded-full bg-white/20 flex items-center justify-center text-xs font-bold">+</span>
                    Tambah Agenda
                </a>
                <a href="{{ route('admin.surat.index') }}" class="flex items-center gap-2 bg-white/10 hover:bg-white/20 rounded-xl px-4 py-3 text-sm transition">
                    <span class="w-6 h-6 rounded-full bg-white/20 flex items-center justify-center text-xs font-bold">→</span>
                    Cek Surat Masuk
                </a>
                <a href="{{ route('admin.pengaduan.index') }}" class="flex items-center gap-2 bg-white/10 hover:bg-white/20 rounded-xl px-4 py-3 text-sm transition">
                    <span class="w-6 h-6 rounded-full bg-white/20 flex items-center justify-center text-xs font-bold">→</span>
                    Cek Pengaduan Masuk
                </a>
                <a href="{{ route('admin.produk.create') }}" class="flex items-center gap-2 bg-white/10 hover:bg-white/20 rounded-xl px-4 py-3 text-sm transition">
                    <span class="w-6 h-6 rounded-full bg-white/20 flex items-center justify-center text-xs font-bold">+</span>
                    Tambah Produk UMKM
                </a>
            </div>
        </div>
    </div>

@endsection
