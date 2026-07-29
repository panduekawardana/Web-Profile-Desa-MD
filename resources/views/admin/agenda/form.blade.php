@extends('admin.layouts.app')

@section('title', $agenda ? 'Edit Agenda' : 'Tambah Agenda')

@section('content')

    <form method="POST"
          action="{{ $agenda ? route('admin.agenda.update', $agenda) : route('admin.agenda.store') }}"
          class="max-w-2xl bg-white border border-gray-100 rounded-2xl p-8 space-y-5">
        @csrf
        @if($agenda) @method('PUT') @endif

        <div>
            <label class="text-sm font-medium text-gray-700">Nama Kegiatan</label>
            <input type="text" name="title" value="{{ old('title', $agenda->title ?? '') }}" required
                   class="mt-1.5 w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm">
            @error('title') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="text-sm font-medium text-gray-700">Tanggal</label>
                <input type="date" name="event_date" value="{{ old('event_date', isset($agenda) ? $agenda->event_date?->format('Y-m-d') : '') }}" required
                       class="mt-1.5 w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm">
                @error('event_date') <p class="text-red-600 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="text-sm font-medium text-gray-700">Waktu</label>
                <input type="text" name="event_time" value="{{ old('event_time', $agenda->event_time ?? '') }}" placeholder="mis. 09.00 WIB"
                       class="mt-1.5 w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm">
            </div>
        </div>

        <div>
            <label class="text-sm font-medium text-gray-700">Lokasi</label>
            <input type="text" name="location" value="{{ old('location', $agenda->location ?? '') }}" placeholder="mis. Balai Desa Mekar Damai"
                   class="mt-1.5 w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm">
        </div>

        <div class="flex gap-3 pt-2">
            <button type="submit" class="bg-primary-700 hover:bg-primary-800 text-white font-semibold px-6 py-2.5 rounded-lg transition">
                Simpan
            </button>
            <a href="{{ route('admin.agenda.index') }}" class="border border-gray-200 text-gray-600 font-semibold px-6 py-2.5 rounded-lg hover:bg-gray-50 transition">
                Batal
            </a>
        </div>
    </form>

@endsection
