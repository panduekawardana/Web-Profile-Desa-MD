<nav class="bg-white border-b border-gray-100 sticky top-20 z-30">
    <div class="max-w-7xl mx-auto px-6 lg:px-10 flex gap-6 overflow-x-auto text-sm font-medium">
        <a href="{{ route('profil.sejarah') }}" class="py-4 border-b-2 whitespace-nowrap {{ request()->routeIs('profil.sejarah') ? 'border-primary-700 text-primary-700' : 'border-transparent text-gray-500 hover:text-primary-700' }}">Sejarah</a>
        <a href="{{ route('profil.visi') }}" class="py-4 border-b-2 whitespace-nowrap {{ request()->routeIs('profil.visi') ? 'border-primary-700 text-primary-700' : 'border-transparent text-gray-500 hover:text-primary-700' }}">Visi & Misi</a>
        <a href="{{ route('profil.struktur') }}" class="py-4 border-b-2 whitespace-nowrap {{ request()->routeIs('profil.struktur') ? 'border-primary-700 text-primary-700' : 'border-transparent text-gray-500 hover:text-primary-700' }}">Struktur Organisasi</a>
        <a href="{{ route('profil.perangkat') }}" class="py-4 border-b-2 whitespace-nowrap {{ request()->routeIs('profil.perangkat') ? 'border-primary-700 text-primary-700' : 'border-transparent text-gray-500 hover:text-primary-700' }}">Perangkat Desa</a>
        <a href="{{ route('profil.peta') }}" class="py-4 border-b-2 whitespace-nowrap {{ request()->routeIs('profil.peta') ? 'border-primary-700 text-primary-700' : 'border-transparent text-gray-500 hover:text-primary-700' }}">Peta Wilayah</a>
    </div>
</nav>
