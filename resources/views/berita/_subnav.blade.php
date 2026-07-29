<nav class="bg-white border-b border-gray-100 sticky top-20 z-30">
    <div class="max-w-7xl mx-auto px-6 lg:px-10 flex gap-6 overflow-x-auto text-sm font-medium">
        <a href="{{ route('berita') }}" class="py-4 border-b-2 whitespace-nowrap {{ request()->routeIs('berita') ? 'border-primary-700 text-primary-700' : 'border-transparent text-gray-500 hover:text-primary-700' }}">Berita</a>
        <a href="{{ route('pengumuman') }}" class="py-4 border-b-2 whitespace-nowrap {{ request()->routeIs('pengumuman') ? 'border-primary-700 text-primary-700' : 'border-transparent text-gray-500 hover:text-primary-700' }}">Pengumuman</a>
        <a href="{{ route('agenda') }}" class="py-4 border-b-2 whitespace-nowrap {{ request()->routeIs('agenda') ? 'border-primary-700 text-primary-700' : 'border-transparent text-gray-500 hover:text-primary-700' }}">Agenda</a>
    </div>
</nav>
