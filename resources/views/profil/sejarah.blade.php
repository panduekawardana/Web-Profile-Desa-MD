@extends('layouts.app')

@section('title', 'Sejarah Desa — Desa Mekar Damai')

@section('content')

    @include('layouts.page-header', [
        'title' => 'Profil Desa Mekar Damai',
        'subtitle' => 'Menelusuri jejak sejarah, merajut visi masa depan, dan memperkuat harmoni masyarakat di jantung alam yang asri.',
        'image' => 'https://images.unsplash.com/photo-1500382017468-9049fed747ef?q=80&w=1600&auto=format&fit=crop',
    ])

    @include('profil._subnav')

    <section class="max-w-7xl mx-auto px-6 lg:px-10 py-16">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-start">

            <div>
                <div class="inline-block bg-primary-50 text-primary-700 text-xs font-bold px-3 py-1 rounded-full mb-4">
                    1824 &middot; Tahun Berdiri
                </div>
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-4">Asal Usul di Balik Nama Mekar Damai</h2>
                <div class="space-y-4 text-gray-600 leading-relaxed text-sm md:text-base">
                    <p>
                        Desa Mekar Damai bermula dari sebuah pemukiman kecil yang mencari kesuburan di
                        lembah subur kaki gunung. Nama "Mekar" melambangkan pertumbuhan yang terus berkembang,
                        sementara "Damai" diberikan oleh para tetua sebagai doa dan harapan atas kemakmuran
                        yang terus berlangsung dalam suasana ketenangan.
                    </p>
                    <p>
                        Informasi dari pusat agraris tradisional menunjukkan bahwa wilayah ini telah dihuni
                        sejak awal abad ke-19, dengan sistem gotong royong dan tata kelola lahan komunal yang
                        tetap dijaga hingga kini sebagai warisan budaya yang tetap memegang teguh nilai
                        kebersamaan.
                    </p>
                    <p>
                        Seiring waktu, desa ini berkembang dari sekadar kawasan pertanian menjadi pusat
                        pemerintahan desa modern yang tetap merawat akar budaya dan kearifan lokalnya.
                    </p>
                </div>
            </div>

            <div class="rounded-2xl overflow-hidden shadow-lg">
                <img src="https://images.unsplash.com/photo-1544427920-c49ccfb85579?q=80&w=1200&auto=format&fit=crop"
                     alt="Pohon beringin tua di alun-alun desa" class="w-full h-full object-cover">
            </div>
        </div>

        {{-- Data Singkat Desa --}}
        <div class="mt-16 bg-primary-50 rounded-2xl p-8 md:p-10">
            <h3 class="text-xl font-bold text-primary-900 mb-1">Data Singkat Desa</h3>
            <p class="text-primary-700/70 text-sm mb-8">
                Berdasarkan Daftar Isian Potensi Desa dan Kelurahan, Bulan 2 Tahun 2026.
            </p>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-5">
                @foreach([
                    ['label' => 'Jumlah Penduduk', 'value' => '7.998 Jiwa'],
                    ['label' => 'Kepala Keluarga', 'value' => '2.610 KK'],
                    ['label' => 'Luas Wilayah', 'value' => '382,55 Ha'],
                    ['label' => 'Jumlah Dusun', 'value' => '15 Dusun'],
                    ['label' => 'Mayoritas Agama', 'value' => 'Islam (100%)'],
                    ['label' => 'Mayoritas Etnis', 'value' => 'Sasak'],
                    ['label' => 'Kepadatan Penduduk', 'value' => '2.090/km&sup2;'],
                    ['label' => 'Ketinggian Wilayah', 'value' => '250 mdpl'],
                ] as $d)
                    <div class="bg-white rounded-xl p-4">
                        <p class="text-xs text-gray-400 font-semibold">{{ $d['label'] }}</p>
                        <p class="text-lg font-bold text-gray-900 mt-1">{!! $d['value'] !!}</p>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Timeline --}}
        <div class="mt-20">
            <h3 class="text-xl font-bold text-gray-900 mb-8">Tonggak Sejarah</h3>
            <div class="space-y-8 border-l-2 border-primary-100 pl-6">
                @foreach([
                    ['year' => '1824', 'desc' => 'Pemukiman pertama dibuka oleh sekelompok petani perantau di lembah subur.'],
                    ['year' => '1945', 'desc' => 'Desa Mekar Damai resmi diakui sebagai wilayah administratif pasca kemerdekaan.'],
                    ['year' => '1998', 'desc' => 'Pembentukan koperasi tani sebagai cikal bakal BUMDes modern.'],
                    ['year' => '2021', 'desc' => 'Peluncuran program transformasi digital dan transparansi anggaran desa.'],
                ] as $item)
                    <div class="relative">
                        <span class="absolute -left-[31px] top-1 w-4 h-4 rounded-full bg-primary-600 border-4 border-white shadow"></span>
                        <p class="text-primary-700 font-bold text-sm">{{ $item['year'] }}</p>
                        <p class="text-gray-600 text-sm mt-1">{{ $item['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
