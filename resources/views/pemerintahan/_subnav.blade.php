<nav class="bg-white border-b border-gray-100 sticky top-20 z-30">
    <div class="max-w-7xl mx-auto px-6 lg:px-10 flex gap-6 overflow-x-auto text-sm font-medium">
        <a href="{{ route('rpjmdes') }}" class="py-4 border-b-2 whitespace-nowrap {{ request()->routeIs('rpjmdes') ? 'border-primary-700 text-primary-700' : 'border-transparent text-gray-500 hover:text-primary-700' }}">RPJM Des</a>
        <a href="{{ route('peraturan') }}" class="py-4 border-b-2 whitespace-nowrap {{ request()->routeIs('peraturan') ? 'border-primary-700 text-primary-700' : 'border-transparent text-gray-500 hover:text-primary-700' }}">Perdes</a>
        <a href="{{ route('perkades') }}" class="py-4 border-b-2 whitespace-nowrap {{ request()->routeIs('perkades') ? 'border-primary-700 text-primary-700' : 'border-transparent text-gray-500 hover:text-primary-700' }}">Peraturan Kepala Desa</a>
        <a href="{{ route('apbdes') }}" class="py-4 border-b-2 whitespace-nowrap {{ request()->routeIs('apbdes') ? 'border-primary-700 text-primary-700' : 'border-transparent text-gray-500 hover:text-primary-700' }}">APBDes</a>
        <a href="{{ route('lpj') }}" class="py-4 border-b-2 whitespace-nowrap {{ request()->routeIs('lpj') ? 'border-primary-700 text-primary-700' : 'border-transparent text-gray-500 hover:text-primary-700' }}">LPPD/LPJ</a>
    </div>
</nav>
