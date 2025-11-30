<header class="bg-white shadow-md sticky top-0 z-50">
    <div class="container-custom">
        <div class="flex items-center justify-between h-20">

            <!-- Logo -->
            <a href="{{ route('home') }}" class="flex items-center space-x-3">
                <div class="w-12 h-12 bg-primary-600 rounded-lg flex items-center justify-center">
                    <span class="text-white font-bold text-xl">AB</span>
                </div>
                <div class="hidden md:block">
                    <h1 class="text-xl font-bold text-secondary-800">Al Barokah</h1>
                    <p class="text-xs text-neutral-600">Construction</p>
                </div>
            </a>

            <!-- Desktop Navigation -->
            <nav class="hidden lg:flex items-center space-x-8">
                <a href="{{ route('home') }}"
                    class="text-neutral-700 hover:text-primary-600 font-medium transition-colors {{ request()->routeIs('home') ? 'text-primary-600' : '' }}">
                    Beranda
                </a>
                {{-- COMMENTED - route belum ada --}}
                <a href="#" class="text-neutral-400 font-medium cursor-not-allowed">
                    Portofolio
                </a>
                <a href="#" class="text-neutral-400 font-medium cursor-not-allowed">
                    Bidang Usaha
                </a>
                <a href="#" class="text-neutral-400 font-medium cursor-not-allowed">
                    Profil
                </a>
                <a href="#" class="text-neutral-400 font-medium cursor-not-allowed">
                    Kontak
                </a>
            </nav>

            <!-- CTA Button (Desktop) -->
            <div class="hidden lg:block">
                <a href="{{ route('home') }}#contact" class="btn-primary">
                    Konsultasi Gratis
                </a>
            </div>

            <!-- Mobile Menu Button -->
            <button @click="mobileMenuOpen = !mobileMenuOpen"
                class="lg:hidden p-2 rounded-lg hover:bg-neutral-100 transition-colors" x-data="{ mobileMenuOpen: false }">
                <svg class="w-6 h-6 text-neutral-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path x-show="!mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16"></path>
                    <path x-show="mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div x-data="{ open: false }" x-show="open" @click.away="open = false"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 transform -translate-y-2"
        x-transition:enter-end="opacity-100 transform translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 transform translate-y-0"
        x-transition:leave-end="opacity-0 transform -translate-y-2" class="lg:hidden border-t border-neutral-200"
        style="display: none;">
        <nav class="container-custom py-4 space-y-2">
            <a href="{{ route('home') }}"
                class="block px-4 py-3 rounded-lg hover:bg-neutral-100 transition-colors {{ request()->routeIs('home') ? 'bg-primary-50 text-primary-600' : 'text-neutral-700' }}">
                Beranda
            </a>
            <span class="block px-4 py-3 text-neutral-400 cursor-not-allowed">
                Portofolio
            </span>
            <span class="block px-4 py-3 text-neutral-400 cursor-not-allowed">
                Bidang Usaha
            </span>
            <span class="block px-4 py-3 text-neutral-400 cursor-not-allowed">
                Profil
            </span>
            <span class="block px-4 py-3 text-neutral-400 cursor-not-allowed">
                Kontak
            </span>
            <div class="pt-2">
                <a href="{{ route('home') }}#contact" class="block btn-primary text-center">
                    Konsultasi Gratis
                </a>
            </div>
        </nav>
    </div>
</header>
