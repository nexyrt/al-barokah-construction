<nav class="fixed top-0 left-0 right-0 bg-white/95 backdrop-blur-sm z-50 border-b border-neutral-200 shadow-sm"
    x-data="{ mobileMenuOpen: false }">
    <div class="container-custom">
        <div class="flex items-center justify-between h-20">

            {{-- Logo --}}
            <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                <div
                    class="w-12 h-12 bg-primary-600 rounded-lg flex items-center justify-center group-hover:scale-110 transition-all duration-300">
                    <span class="text-white font-bold text-xl">AB</span>
                </div>
                <span class="text-2xl font-heading tracking-wider text-secondary-900">
                    {{ $company->company_name ?? 'AL BAROKAH' }}
                </span>
            </a>

            {{-- Desktop Navigation --}}
            <div class="hidden md:flex items-center gap-6">
                <a href="{{ route('home') }}"
                    class="text-neutral-700 hover:text-primary-600 transition-all duration-300 font-medium {{ request()->routeIs('home') ? 'text-primary-600' : '' }}">
                    Beranda
                </a>
                <a href="{{ route('projects.index') }}"
                    class="text-neutral-700 hover:text-primary-600 transition-all duration-300 font-medium {{ request()->routeIs('projects.index') ? 'text-primary-600' : '' }}">
                    Portofolio
                </a>
                <a href="{{ route('business-fields.index') }}"
                    class="text-neutral-700 hover:text-primary-600 transition-all duration-300 font-medium {{ request()->routeIs('business-fields.index') ? 'text-primary-600' : '' }}">
                    Bidang Usaha
                </a>
                <a href="{{ route('company.profile') }}"
                    class="text-neutral-700 hover:text-primary-600 transition-all duration-300 font-medium {{ request()->routeIs('company.profile') ? 'text-primary-600' : '' }}">
                    Profil
                </a>

                <a href="{{ route('contact.index') }}"
                    class="bg-primary-600 hover:bg-primary-700 text-white font-semibold px-6 py-2.5 rounded-lg transition-all duration-300">
                    Hubungi Kami
                </a>
            </div>

            {{-- Mobile Menu Button --}}
            <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden text-neutral-700 p-2"
                aria-label="Toggle menu">
                <svg x-show="!mobileMenuOpen" class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                    </path>
                </svg>
                <svg x-show="mobileMenuOpen" class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    style="display: none;">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>
        </div>
    </div>

    {{-- Mobile Menu --}}
    <div x-show="mobileMenuOpen" @click.away="mobileMenuOpen = false"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 transform -translate-y-2"
        x-transition:enter-end="opacity-100 transform translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 transform translate-y-0"
        x-transition:leave-end="opacity-0 transform -translate-y-2"
        class="md:hidden border-t border-neutral-200 bg-white" style="display: none;">
        <nav class="container-custom py-4 space-y-2">
            <a href="{{ route('home') }}"
                class="block px-4 py-3 rounded-lg transition-all duration-300 {{ request()->routeIs('home') ? 'bg-primary-50 text-primary-600' : 'text-neutral-700 hover:bg-neutral-100' }}">
                Beranda
            </a>
            <span class="block px-4 py-3 text-neutral-400 cursor-not-allowed">
                Portofolio
            </span>
            <span class="block px-4 py-3 text-neutral-400 cursor-not-allowed">
                Bidang Usaha
            </span>
            <span class="block px-4 py-3 text-neutral-400 cursor-not-allowed">
                Profil Perusahaan
            </span>
            <div class="pt-2">
                <a href="{{ route('contact.index') }}"
                    class="block bg-primary-600 hover:bg-primary-700 text-white font-semibold px-6 py-3 rounded-lg text-center transition-all duration-300">
                    Hubungi Kami
                </a>
            </div>
        </nav>
    </div>
</nav>
