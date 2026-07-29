@extends('layouts.app')

@section('title', 'Pengumuman — Desa Mekar Damai')

@section('content')

    @include('layouts.page-header', [
        'title' => 'Pengumuman Resmi Desa',
        'subtitle' => 'Informasi resmi dan penting dari Pemerintah Desa Mekar Damai untuk seluruh warga.',
        'image' => 'https://images.unsplash.com/photo-1497215728101-856f4ea42174?q=80&w=1600&auto=format&fit=crop',
    ])

    @include('berita._subnav')

    <section class="max-w-5xl mx-auto px-6 lg:px-10 py-16">
        <div class="space-y-4">
            @forelse($pengumumen as $item)
                <div class="bg-white border rounded-2xl p-6 {{ $item->is_urgent ? 'border-red-200' : 'border-gray-100' }}">
                    <div class="flex items-start justify-between gap-4 mb-2">
                        <h3 class="font-bold text-gray-900">{{ $item->title }}</h3>
                        @if($item->is_urgent)
                            <span class="shrink-0 text-xs font-semibold text-red-600 bg-red-50 px-2 py-1 rounded-full">Penting</span>
                        @endif
                    </div>
                    <p class="text-sm text-gray-500 mb-3">{{ $item->content }}</p>
                    <span class="text-xs text-gray-400">Diterbitkan {{ $item->published_at?->translatedFormat('d F Y') ?? $item->created_at->translatedFormat('d F Y') }}</span>
                </div>
            @empty
                <p class="text-center text-gray-400 py-10">Belum ada pengumuman.</p>
            @endforelse
        </div>

        <div class="mt-10">{{ $pengumumen->links() }}</div>
    </section>

@endsection
