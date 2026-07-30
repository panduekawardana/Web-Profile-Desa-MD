<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin') — Desa Digital</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-800 antialiased">
<div class="flex min-h-screen">

    {{-- Sidebar --}}
    <aside class="w-64 shrink-0 bg-gradient-to-b from-primary-900 via-primary-900 to-primary-950 text-white flex flex-col relative overflow-hidden">
        <div class="absolute -top-10 -right-16 w-48 h-48 bg-white/5 rounded-full blur-2xl"></div>
        <div class="absolute bottom-0 -left-10 w-40 h-40 bg-primary-600/20 rounded-full blur-3xl"></div>

        <div class="px-6 py-6 border-b border-white/10 flex items-center gap-3 relative">
            <span class="w-10 h-10 rounded-xl bg-gradient-to-br from-primary-400 to-primary-600 flex items-center justify-center shadow-lg shadow-primary-900/50 shrink-0">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 11l9-7 9 7" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M5 10v9a1 1 0 001 1h4a1 1 0 001-1v-4a1 1 0 011-1h0a1 1 0 011 1v4a1 1 0 001 1h4a1 1 0 001-1v-9" />
                </svg>
            </span>
            <div>
                <p class="font-bold text-base leading-none">Desa Digital</p>
                <p class="text-xs text-primary-300 mt-1">Village Admin</p>
            </div>
        </div>

        <nav class="flex-1 px-3 py-5 space-y-1 text-sm relative overflow-y-auto">
            <a href="{{ route('admin.dashboard') }}"
               class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition {{ request()->routeIs('admin.dashboard') ? 'bg-white text-primary-800 font-semibold shadow-lg shadow-black/20' : 'text-primary-100 hover:bg-white/10' }}">
                <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" /></svg>
                Dashboard
            </a>

            <p class="px-3 pt-5 pb-1.5 text-[10px] font-bold uppercase tracking-widest text-primary-400/80">Konten</p>

            <a href="{{ route('admin.berita.index') }}"
               class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition {{ request()->routeIs('admin.berita.*') ? 'bg-white text-primary-800 font-semibold shadow-lg shadow-black/20' : 'text-primary-100 hover:bg-white/10' }}">
                <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10l6 6v10a2 2 0 01-2 2z" /></svg>
                Berita & Kegiatan
            </a>
            <a href="{{ route('admin.pengumuman.index') }}"
               class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition {{ request()->routeIs('admin.pengumuman.*') ? 'bg-white text-primary-800 font-semibold shadow-lg shadow-black/20' : 'text-primary-100 hover:bg-white/10' }}">
                <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" /></svg>
                Pengumuman
            </a>
            <a href="{{ route('admin.agenda.index') }}"
               class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition {{ request()->routeIs('admin.agenda.*') ? 'bg-white text-primary-800 font-semibold shadow-lg shadow-black/20' : 'text-primary-100 hover:bg-white/10' }}">
                <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                Agenda
            </a>

            <p class="px-3 pt-5 pb-1.5 text-[10px] font-bold uppercase tracking-widest text-primary-400/80">Layanan Warga</p>

            @php
                $suratBaru = \App\Models\SuratPengajuan::where('status', 'baru')->count();
                $pengaduanBaru = \App\Models\Pengaduan::where('status', 'baru')->count();
            @endphp

            <a href="{{ route('admin.surat.index') }}"
               class="flex items-center justify-between px-3 py-2.5 rounded-xl transition {{ request()->routeIs('admin.surat.*') ? 'bg-white text-primary-800 font-semibold shadow-lg shadow-black/20' : 'text-primary-100 hover:bg-white/10' }}">
                <span class="flex items-center gap-3">
                    <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
                    Surat Masuk
                </span>
                @if($suratBaru > 0)
                    <span class="bg-red-500 text-white text-[10px] font-bold w-5 h-5 rounded-full flex items-center justify-center">{{ $suratBaru }}</span>
                @endif
            </a>
            <a href="{{ route('admin.pengaduan.index') }}"
               class="flex items-center justify-between px-3 py-2.5 rounded-xl transition {{ request()->routeIs('admin.pengaduan.*') ? 'bg-white text-primary-800 font-semibold shadow-lg shadow-black/20' : 'text-primary-100 hover:bg-white/10' }}">
                <span class="flex items-center gap-3">
                    <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M12 12a3 3 0 100-6 3 3 0 000 6z" /></svg>
                    Pengaduan Masuk
                </span>
                @if($pengaduanBaru > 0)
                    <span class="bg-red-500 text-white text-[10px] font-bold w-5 h-5 rounded-full flex items-center justify-center">{{ $pengaduanBaru }}</span>
                @endif
            </a>

            <p class="px-3 pt-5 pb-1.5 text-[10px] font-bold uppercase tracking-widest text-primary-400/80">Ekonomi</p>

            <a href="{{ route('admin.produk.index') }}"
               class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition {{ request()->routeIs('admin.produk.*') ? 'bg-white text-primary-800 font-semibold shadow-lg shadow-black/20' : 'text-primary-100 hover:bg-white/10' }}">
                <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17V7a2 2 0 012-2h6a2 2 0 012 2v10a2 2 0 01-2 2h-6a2 2 0 01-2-2z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7H5a2 2 0 00-2 2v8a2 2 0 002 2h4" /></svg>
                Produk UMKM
            </a>

            <p class="px-3 pt-5 pb-1.5 text-[10px] font-bold uppercase tracking-widest text-primary-400/80">Dokumen Legal</p>

            <a href="{{ route('admin.perdes.index') }}"
               class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition {{ request()->routeIs('admin.perdes.*') ? 'bg-white text-primary-800 font-semibold shadow-lg shadow-black/20' : 'text-primary-100 hover:bg-white/10' }}">
                <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10l6 6v10a2 2 0 01-2 2z" /></svg>
                Perdes
            </a>
            <a href="{{ route('admin.perkades.index') }}"
               class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition {{ request()->routeIs('admin.perkades.*') ? 'bg-white text-primary-800 font-semibold shadow-lg shadow-black/20' : 'text-primary-100 hover:bg-white/10' }}">
                <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10l6 6v10a2 2 0 01-2 2z" /></svg>
                Peraturan Kepala Desa
            </a>
            <a href="{{ route('admin.lpj.index') }}"
               class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition {{ request()->routeIs('admin.lpj.*') ? 'bg-white text-primary-800 font-semibold shadow-lg shadow-black/20' : 'text-primary-100 hover:bg-white/10' }}">
                <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
                LPPD / LPJ
            </a>

            <p class="px-3 pt-5 pb-1.5 text-[10px] font-bold uppercase tracking-widest text-primary-400/80">Keuangan</p>

            <a href="{{ route('admin.statistik.edit') }}"
               class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition {{ request()->routeIs('admin.statistik.*') ? 'bg-white text-primary-800 font-semibold shadow-lg shadow-black/20' : 'text-primary-100 hover:bg-white/10' }}">
                <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" /></svg>
                Statistik & APBDes
            </a>
        </nav>

        <div class="px-3 py-4 border-t border-white/10 relative">
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button type="submit" class="w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-primary-100 hover:bg-white/10 text-sm transition">
                    <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" /></svg>
                    Keluar
                </button>
            </form>
        </div>
    </aside>

    {{-- Main --}}
    <div class="flex-1 flex flex-col min-w-0">
        <header class="bg-white border-b border-gray-200 px-8 py-4 flex items-center justify-between shadow-sm">
            <div>
                <h1 class="text-lg font-bold text-gray-900">@yield('title', 'Dashboard')</h1>
                <p class="text-xs text-gray-400 mt-0.5">{{ now()->translatedFormat('l, d F Y') }}</p>
            </div>
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-full bg-gradient-to-br from-primary-500 to-primary-700 text-white flex items-center justify-center font-bold text-sm shadow-md">
                    {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
                </div>
                <div class="text-sm">
                    <p class="font-semibold text-gray-800 leading-none">{{ auth()->user()->name ?? 'Admin' }}</p>
                    <p class="text-xs text-gray-400">Super Admin</p>
                </div>
            </div>
        </header>

        <main class="flex-1 p-8">
            @if(session('success'))
                <div id="flash-success"
                     class="mb-6 bg-primary-50 border border-primary-200 text-primary-800 text-sm px-4 py-3 rounded-xl flex items-center gap-2 transition-opacity duration-500">
                    <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                    {{ session('success') }}
                </div>
                <script>
                    setTimeout(function () {
                        const el = document.getElementById('flash-success');
                        if (!el) return;
                        el.style.opacity = '0';
                        setTimeout(() => el.remove(), 500);
                    }, 3000);
                </script>
            @endif

            @yield('content')
        </main>
    </div>
</div>
</body>
</html>
