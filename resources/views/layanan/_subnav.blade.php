<nav class="bg-white border-b border-gray-100 sticky top-20 z-30">
    <div class="max-w-7xl mx-auto px-6 lg:px-10 flex gap-6 overflow-x-auto text-sm font-medium">
        <a href="{{ route('surat') }}" class="py-4 border-b-2 whitespace-nowrap {{ request()->routeIs('surat') ? 'border-primary-700 text-primary-700' : 'border-transparent text-gray-500 hover:text-primary-700' }}">Surat Pengantar</a>
        <a href="{{ route('pengaduan') }}" class="py-4 border-b-2 whitespace-nowrap {{ request()->routeIs('pengaduan') ? 'border-primary-700 text-primary-700' : 'border-transparent text-gray-500 hover:text-primary-700' }}">Pengaduan</a>
        <a href="{{ route('ktp') }}" class="py-4 border-b-2 whitespace-nowrap {{ request()->routeIs('ktp') ? 'border-primary-700 text-primary-700' : 'border-transparent text-gray-500 hover:text-primary-700' }}">KTP / KK / Akta</a>
        <a href="{{ route('alur') }}" class="py-4 border-b-2 whitespace-nowrap {{ request()->routeIs('alur') ? 'border-primary-700 text-primary-700' : 'border-transparent text-gray-500 hover:text-primary-700' }}">Alur Layanan</a>
    </div>
</nav>
