<header class="sticky top-0 z-50 bg-white/95 backdrop-blur border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-6 lg:px-10">
        <div class="flex items-center justify-between h-20">

            {{-- Logo --}}
            <a href="{{ route('home') }}" class="flex items-center gap-3 shrink-0">

                <img
                    src="{{ asset('images/logo.png') }}"
                    alt="Logo Desa"
                    class="w-12 h-12 object-contain">

                <div>
                    <h1 class="text-xl font-bold text-primary-800">
                        Desa Mekar Damai
                    </h1>

                    <p class="text-xs text-gray-500">
                        Website Resmi Pemerintah Desa
                    </p>
                </div>

            </a>

            {{-- Nav links (desktop) --}}
            <nav class="hidden lg:flex items-center gap-8 text-sm font-medium">
                <a href="{{ route('home') }}"
                   class="{{ request()->routeIs('home') ? 'text-primary-700 font-semibold border-b-2 border-primary-700 pb-1' : 'text-gray-600 hover:text-primary-700' }}">
                    Beranda
                </a>

                <div class="relative group">
                    <button class="flex items-center gap-1 text-gray-600 hover:text-primary-700 {{ request()->routeIs('profil.*') ? 'text-primary-700 font-semibold' : '' }}">
                        Profil Desa
                    </button>
                    <div class="absolute left-0 top-full pt-3 hidden group-hover:block">
                        <div class="bg-white rounded-xl shadow-lg border border-gray-100 py-2 w-56">
                            <a href="{{ route('profil.sejarah') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-primary-50 hover:text-primary-700">Sejarah Desa</a>
                            <a href="{{ route('profil.visi') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-primary-50 hover:text-primary-700">Visi & Misi</a>
                            <a href="{{ route('profil.struktur') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-primary-50 hover:text-primary-700">Struktur Organisasi</a>
                            <a href="{{ route('profil.perangkat') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-primary-50 hover:text-primary-700">Perangkat Desa</a>
                            <a href="{{ route('profil.peta') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-primary-50 hover:text-primary-700">Peta Wilayah</a>
                        </div>
                    </div>
                </div>

                <div class="relative group">
                    <button class="flex items-center gap-1 text-gray-600 hover:text-primary-700 {{ request()->routeIs(['rpjmdes','peraturan','perkades','apbdes','lpj']) ? 'text-primary-700 font-semibold' : '' }}">
                        Pemerintahan
                    </button>
                    <div class="absolute left-0 top-full pt-3 hidden group-hover:block">
                        <div class="bg-white rounded-xl shadow-lg border border-gray-100 py-2 w-56">
                            <a href="{{ route('rpjmdes') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-primary-50 hover:text-primary-700">RPJM Des</a>
                            <a href="{{ route('peraturan') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-primary-50 hover:text-primary-700">Perdes</a>
                            <a href="{{ route('perkades') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-primary-50 hover:text-primary-700">Peraturan Kepala Desa</a>
                            <a href="{{ route('apbdes') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-primary-50 hover:text-primary-700">APBDes P</a>
                            <a href="{{ route('lpj') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-primary-50 hover:text-primary-700">LPPD/LPJ</a>
                        </div>
                    </div>
                </div>

                <div class="relative group">
                    <button class="flex items-center gap-1 text-gray-600 hover:text-primary-700 {{ request()->routeIs(['surat','pengaduan','ktp','alur']) ? 'text-primary-700 font-semibold' : '' }}">
                        Layanan Publik
                    </button>
                    <div class="absolute left-0 top-full pt-3 hidden group-hover:block">
                        <div class="bg-white rounded-xl shadow-lg border border-gray-100 py-2 w-56">
                            <a href="{{ route('surat') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-primary-50 hover:text-primary-700">Surat Pengantar</a>
                            <a href="{{ route('pengaduan') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-primary-50 hover:text-primary-700">Pengaduan</a>
                            <a href="{{ route('ktp') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-primary-50 hover:text-primary-700">KTP / KK / Akta</a>
                            <a href="{{ route('alur') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-primary-50 hover:text-primary-700">Alur Layanan</a>
                        </div>
                    </div>
                </div>

                <div class="relative group">
                    <button class="flex items-center gap-1 text-gray-600 hover:text-primary-700 {{ request()->routeIs(['berita','pengumuman','agenda']) ? 'text-primary-700 font-semibold' : '' }}">
                        Informasi
                    </button>
                    <div class="absolute left-0 top-full pt-3 hidden group-hover:block">
                        <div class="bg-white rounded-xl shadow-lg border border-gray-100 py-2 w-56">
                            <a href="{{ route('berita') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-primary-50 hover:text-primary-700">Berita</a>
                            <a href="{{ route('pengumuman') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-primary-50 hover:text-primary-700">Pengumuman</a>
                            <a href="{{ route('agenda') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-primary-50 hover:text-primary-700">Agenda</a>
                        </div>
                    </div>
                </div>
            </nav>

            {{-- CTA --}}
            <a href="{{ route('pengaduan') }}"
               class="hidden lg:inline-flex items-center bg-primary-700 hover:bg-primary-800 text-white text-sm font-semibold px-5 py-2.5 rounded-lg transition">
                Kontak Kami
            </a>

            {{-- Mobile toggle --}}
            <button id="navbar-toggle" class="lg:hidden text-gray-700" aria-label="Buka menu">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" /></svg>
            </button>
        </div>
    </div>

    {{-- Mobile menu --}}
    <div id="navbar-mobile" class="hidden lg:hidden border-t border-gray-100 bg-white">
        <div class="px-6 py-4 space-y-1 text-sm font-medium">
            <a href="{{ route('home') }}" class="block py-2 text-gray-700">Beranda</a>
            <p class="pt-2 text-xs uppercase tracking-wide text-gray-400">Profil Desa</p>
            <a href="{{ route('profil.sejarah') }}" class="block py-2 pl-2 text-gray-700">Sejarah Desa</a>
            <a href="{{ route('profil.visi') }}" class="block py-2 pl-2 text-gray-700">Visi & Misi</a>
            <a href="{{ route('profil.struktur') }}" class="block py-2 pl-2 text-gray-700">Struktur Organisasi</a>
            <a href="{{ route('profil.perangkat') }}" class="block py-2 pl-2 text-gray-700">Perangkat Desa</a>
            <a href="{{ route('profil.peta') }}" class="block py-2 pl-2 text-gray-700">Peta Wilayah</a>
            <p class="pt-2 text-xs uppercase tracking-wide text-gray-400">Pemerintahan</p>
            <a href="{{ route('rpjmdes') }}" class="block py-2 pl-2 text-gray-700">RPJM Des</a>
            <a href="{{ route('peraturan') }}" class="block py-2 pl-2 text-gray-700">Perdes</a>
            <a href="{{ route('perkades') }}" class="block py-2 pl-2 text-gray-700">Peraturan Kepala Desa</a>
            <a href="{{ route('apbdes') }}" class="block py-2 pl-2 text-gray-700">APBDes P</a>
            <a href="{{ route('lpj') }}" class="block py-2 pl-2 text-gray-700">LPPD/LPJ</a>
            <p class="pt-2 text-xs uppercase tracking-wide text-gray-400">Layanan Publik</p>
            <a href="{{ route('surat') }}" class="block py-2 pl-2 text-gray-700">Surat Pengantar</a>
            <a href="{{ route('pengaduan') }}" class="block py-2 pl-2 text-gray-700">Pengaduan</a>
            <a href="{{ route('ktp') }}" class="block py-2 pl-2 text-gray-700">KTP / KK / Akta</a>
            <a href="{{ route('alur') }}" class="block py-2 pl-2 text-gray-700">Alur Layanan</a>
            <p class="pt-2 text-xs uppercase tracking-wide text-gray-400">Informasi</p>
            <a href="{{ route('berita') }}" class="block py-2 pl-2 text-gray-700">Berita</a>
            <a href="{{ route('pengumuman') }}" class="block py-2 pl-2 text-gray-700">Pengumuman</a>
            <a href="{{ route('agenda') }}" class="block py-2 pl-2 text-gray-700">Agenda</a>
            <a href="{{ route('pengaduan') }}" class="block mt-3 text-center bg-primary-700 text-white py-2.5 rounded-lg">Kontak Kami</a>
        </div>
    </div>
</header>
