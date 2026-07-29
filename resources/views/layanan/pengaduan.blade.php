@extends('layouts.app')

@section('title', 'Pengaduan — Desa Mekar Damai')

@section('content')

    @include('layouts.page-header', [
        'title' => 'Pengaduan Masyarakat',
        'subtitle' => 'Sampaikan keluhan, masukan, atau laporan Anda demi perbaikan pelayanan Desa Mekar Damai.',
        'image' => 'https://images.unsplash.com/photo-1423666639041-f56000c27a9a?q=80&w=1600&auto=format&fit=crop',
    ])

    @include('layanan._subnav')

    <section class="max-w-5xl mx-auto px-6 lg:px-10 py-16">
        <div class="grid grid-cols-1 md:grid-cols-5 gap-10">

            <div class="md:col-span-3 bg-white border border-gray-100 rounded-2xl p-6 md:p-8 order-2 md:order-1">
                <h2 class="text-xl font-bold text-gray-900 mb-6">Formulir Pengaduan</h2>
                <form class="space-y-5">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="text-sm font-medium text-gray-700">Nama Pelapor</label>
                            <input type="text" placeholder="Boleh dikosongkan (anonim)" class="mt-1.5 w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm">
                        </div>
                        <div>
                            <label class="text-sm font-medium text-gray-700">Nomor WhatsApp</label>
                            <input type="text" placeholder="08xx-xxxx-xxxx" class="mt-1.5 w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm">
                        </div>
                    </div>
                    <div>
                        <label class="text-sm font-medium text-gray-700">Kategori Pengaduan</label>
                        <select class="mt-1.5 w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm">
                            <option>Infrastruktur</option>
                            <option>Pelayanan Administrasi</option>
                            <option>Lingkungan</option>
                            <option>Sosial & Kemasyarakatan</option>
                            <option>Lainnya</option>
                        </select>
                    </div>
                    <div>
                        <label class="text-sm font-medium text-gray-700">Isi Pengaduan</label>
                        <textarea rows="5" placeholder="Jelaskan detail pengaduan Anda" class="mt-1.5 w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm"></textarea>
                    </div>
                    <div>
                        <label class="text-sm font-medium text-gray-700">Lampiran Foto (opsional)</label>
                        <div class="mt-1.5 border-2 border-dashed border-gray-200 rounded-lg px-4 py-8 text-center text-sm text-gray-400">
                            Klik atau seret file ke sini
                        </div>
                    </div>
                    <button type="submit" class="w-full bg-primary-700 hover:bg-primary-800 text-white font-semibold py-3 rounded-lg transition">
                        Kirim Pengaduan
                    </button>
                </form>
            </div>

            <div class="md:col-span-2 order-1 md:order-2">
                <div class="bg-primary-50 rounded-2xl p-6 mb-6">
                    <h3 class="font-bold text-primary-900 mb-2">Jaminan Kerahasiaan</h3>
                    <p class="text-sm text-primary-700/80">
                        Identitas pelapor akan dijaga kerahasiaannya. Anda juga dapat memilih untuk mengirim pengaduan secara anonim.
                    </p>
                </div>
                <div class="space-y-3">
                    <h3 class="font-bold text-gray-900 mb-1">Status Pengaduan Terakhir</h3>
                    @foreach([
                        ['title' => 'Lampu jalan mati di Dusun Sumber Asri', 'status' => 'Diproses'],
                        ['title' => 'Sampah menumpuk di pasar desa', 'status' => 'Selesai'],
                    ] as $item)
                        <div class="border border-gray-100 rounded-xl p-4">
                            <p class="text-sm font-medium text-gray-800">{{ $item['title'] }}</p>
                            <span class="inline-block mt-2 text-xs font-semibold px-2 py-1 rounded-full {{ $item['status'] === 'Selesai' ? 'bg-primary-50 text-primary-700' : 'bg-amber-50 text-amber-700' }}">
                                {{ $item['status'] }}
                            </span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

@endsection
