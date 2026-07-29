@extends('layouts.app')

@section('title', 'UMKM & Ekonomi — Desa Mekar Damai')

@section('content')

    @include('layouts.page-header', [
        'badge' => 'Ekonomi Desa Mandiri',
        'title' => 'Berdayakan UMKM Lokal Mekar Damai',
        'subtitle' => 'Temukan produk unggulan karya warga desa kami, dari kerajinan tangan organik hingga kuliner khas nusantara.',
        'image' => 'https://images.unsplash.com/photo-1441986300917-64674bd600d8?q=80&w=1600&auto=format&fit=crop',
    ])

    <section class="max-w-7xl mx-auto px-6 lg:px-10 py-16">

        <form method="GET" class="flex flex-wrap gap-2 mb-10">
            @foreach($kategoris as $kategori)
                <button type="submit" name="kategori" value="{{ $kategori }}"
                        class="text-sm font-medium px-4 py-2 rounded-full {{ (request('kategori', 'Semua') === $kategori) ? 'bg-primary-700 text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
                    {{ $kategori }}
                </button>
            @endforeach
        </form>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
            @forelse($produks as $produk)
                <div class="rounded-2xl border border-gray-100 overflow-hidden hover:shadow-lg transition">
                    <div class="h-40 bg-gray-100 overflow-hidden">
                        @if($produk->image)
                            <img src="{{ asset('storage/' . $produk->image) }}" alt="{{ $produk->name }}" class="w-full h-full object-cover">
                        @else
                            <img src="https://images.unsplash.com/photo-1506806732259-39c2d0268443?q=80&w=600&auto=format&fit=crop" alt="{{ $produk->name }}" class="w-full h-full object-cover">
                        @endif
                    </div>
                    <div class="p-4">
                        <span class="text-[11px] font-semibold text-primary-700 bg-primary-50 px-2 py-0.5 rounded uppercase">{{ $produk->category }}</span>
                        <h3 class="font-bold text-gray-900 mt-2 text-sm leading-snug">{{ $produk->name }}</h3>
                        <p class="text-xs text-gray-500 mt-1 line-clamp-2">{{ $produk->description }}</p>
                        <p class="font-bold text-gray-900 mt-3">Rp {{ number_format($produk->price, 0, ',', '.') }}</p>
                    </div>
                </div>
            @empty
                <p class="col-span-4 text-center text-gray-400 py-10">Belum ada produk yang ditambahkan.</p>
            @endforelse
        </div>

        <div class="mt-10">{{ $produks->links() }}</div>
    </section>

@endsection
