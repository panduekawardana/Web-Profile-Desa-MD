@extends('admin.layouts.app')

@section('title', 'Detail Pengajuan Surat')

@section('content')

    <div class="max-w-3xl bg-white border border-gray-100 rounded-2xl p-8">

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 mb-8">
            <div>
                <p class="text-xs text-gray-400 font-semibold">Nama Pemohon</p>
                <p class="font-medium text-gray-900 mt-1">{{ $pengajuan->nama }}</p>
            </div>
            <div>
                <p class="text-xs text-gray-400 font-semibold">NIK</p>
                <p class="font-medium text-gray-900 mt-1">{{ $pengajuan->nik }}</p>
            </div>
            <div>
                <p class="text-xs text-gray-400 font-semibold">Jenis Surat</p>
                <p class="font-medium text-gray-900 mt-1">{{ $pengajuan->jenis_surat }}</p>
            </div>
            <div>
                <p class="text-xs text-gray-400 font-semibold">Tanggal Pengajuan</p>
                <p class="font-medium text-gray-900 mt-1">{{ $pengajuan->created_at->format('d F Y, H:i') }}</p>
            </div>
            <div class="sm:col-span-2">
                <p class="text-xs text-gray-400 font-semibold">Alamat</p>
                <p class="font-medium text-gray-900 mt-1">{{ $pengajuan->alamat }}</p>
            </div>
            <div class="sm:col-span-2">
                <p class="text-xs text-gray-400 font-semibold">Keperluan</p>
                <p class="text-gray-700 mt-1">{{ $pengajuan->keperluan }}</p>
            </div>
            @if($pengajuan->file_ktp)
                <div class="sm:col-span-2">
                    <p class="text-xs text-gray-400 font-semibold mb-2">Lampiran KTP</p>
                    <a href="{{ asset('storage/' . $pengajuan->file_ktp) }}" target="_blank" class="inline-flex items-center gap-2 text-primary-700 font-semibold text-sm hover:underline">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" /></svg>
                        Lihat File Lampiran
                    </a>
                </div>
            @endif
        </div>

        <form method="POST" action="{{ route('admin.surat.update', $pengajuan) }}" class="border-t border-gray-100 pt-6 space-y-5">
            @csrf
            @method('PUT')

            <div>
                <label class="text-sm font-medium text-gray-700">Status Pengajuan</label>
                <select name="status" class="mt-1.5 w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm">
                    @foreach(['baru' => 'Baru', 'diproses' => 'Diproses', 'selesai' => 'Selesai', 'ditolak' => 'Ditolak'] as $val => $label)
                        <option value="{{ $val }}" {{ $pengajuan->status === $val ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="text-sm font-medium text-gray-700">Catatan Admin (opsional)</label>
                <textarea name="catatan_admin" rows="3" placeholder="mis. alasan penolakan, atau info tambahan" class="mt-1.5 w-full border border-gray-200 rounded-lg px-4 py-2.5 text-sm">{{ $pengajuan->catatan_admin }}</textarea>
            </div>

            <div class="flex gap-3 pt-2">
                <button type="submit" class="bg-primary-700 hover:bg-primary-800 text-white font-semibold px-6 py-2.5 rounded-lg transition">
                    Simpan Perubahan
                </button>
                <a href="{{ route('admin.surat.index') }}" class="border border-gray-200 text-gray-600 font-semibold px-6 py-2.5 rounded-lg hover:bg-gray-50 transition">
                    Kembali
                </a>
            </div>
        </form>
    </div>

@endsection
