@extends('layouts.app')

@section('title', 'Agenda Desa — Desa Mekar Damai')

@section('content')

    @include('layouts.page-header', [
        'title' => 'Agenda Kegiatan Desa',
        'subtitle' => 'Jadwal kegiatan dan acara mendatang yang diselenggarakan Pemerintah Desa Mekar Damai.',
        'image' => 'https://images.unsplash.com/photo-1506784983877-45594efa4cbe?q=80&w=1600&auto=format&fit=crop',
    ])

    @include('berita._subnav')

    <section class="max-w-5xl mx-auto px-6 lg:px-10 py-16">
        <div class="space-y-4">
            @forelse($agendas as $item)
                <div class="flex items-center gap-5 bg-white border border-gray-100 rounded-2xl p-5">
                    <div class="shrink-0 w-16 h-16 rounded-xl bg-primary-700 text-white flex flex-col items-center justify-center">
                        <span class="text-xl font-bold leading-none">{{ $item->event_date->format('d') }}</span>
                        <span class="text-[10px] font-semibold tracking-wide mt-1">{{ strtoupper($item->event_date->translatedFormat('M')) }}</span>
                    </div>
                    <div class="flex-1">
                        <h3 class="font-bold text-gray-900">{{ $item->title }}</h3>
                        <div class="flex flex-wrap gap-x-4 gap-y-1 mt-1 text-xs text-gray-500">
                            @if($item->event_time)
                                <span class="flex items-center gap-1">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                    {{ $item->event_time }}
                                </span>
                            @endif
                            @if($item->location)
                                <span class="flex items-center gap-1">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                                    {{ $item->location }}
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center text-gray-400 py-10">Belum ada agenda mendatang.</p>
            @endforelse
        </div>

        <div class="mt-10">{{ $agendas->links() }}</div>
    </section>

@endsection
