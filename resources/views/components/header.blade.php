{{-- Top Bar - Contact Info --}}
<div class="bg-secondary-900 text-white py-2 text-sm">
    <div class="container-custom">
        <div class="flex flex-col md:flex-row items-center justify-between gap-2">
            {{-- Left: Contact Info --}}
            <div class="flex flex-wrap items-center gap-4 md:gap-6">
                <a href="tel:{{ $company->phone ?? '0541123456' }}"
                    class="flex items-center gap-2 hover:text-primary-400 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                        </path>
                    </svg>
                    <span>{{ $company->phone ?? '0541-123456' }}</span>
                </a>
                <a href="mailto:{{ $company->email ?? 'info@albarokah.co.id' }}"
                    class="flex items-center gap-2 hover:text-primary-400 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                        </path>
                    </svg>
                    <span>{{ $company->email ?? 'info@albarokah.co.id' }}</span>
                </a>
            </div>

            {{-- Right: Operating Hours & Social Media --}}
            <div class="flex items-center gap-4">
                <div class="hidden md:flex items-center gap-2 text-white/80">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span class="text-xs">{{ $company->operating_hours ?? 'Senin - Jumat: 08:00 - 17:00' }}</span>
                </div>

                @if ($socialMedia && $socialMedia->count() > 0)
                    <div class="flex items-center gap-2">
                        @foreach ($socialMedia->take(4) as $social)
                            <a href="{{ $social->url }}" target="_blank" rel="noopener noreferrer"
                                class="w-7 h-7 bg-white/10 hover:bg-primary-600 rounded-full flex items-center justify-center transition-all duration-300"
                                aria-label="{{ $social->platform }}">
                                <i class="{{ $iconMap[$social->icon] ?? 'fas fa-share-alt' }} text-white text-xs"></i>
                            </a>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

{{-- Main Navigation - CHANGED TO STICKY --}}
<nav class="sticky top-0 bg-white/95 backdrop-blur-sm z-50 border-b border-neutral-200 shadow-sm"
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
                    class="text-neutral-700 hover:text-primary-600 transition-all duration-300 font-medium {{ request()->routeIs('projects.*') ? 'text-primary-600' : '' }}">
                    Portofolio
                </a>
                <a href="{{ route('business-fields.index') }}"
                    class="text-neutral-700 hover:text-primary-600 transition-all duration-300 font-medium {{ request()->routeIs('business-fields.*') ? 'text-primary-600' : '' }}">
                    Bidang Usaha
                </a>
                <a href="{{ route('company.profile') }}"
                    class="text-neutral-700 hover:text-primary-600 transition-all duration-300 font-medium {{ request()->routeIs('company.profile') ? 'text-primary-600' : '' }}">
                    Profil Perusahaan
                </a>
                <a href="{{ route('company.data') }}"
                    class="text-neutral-700 hover:text-primary-600 transition-all duration-300 font-medium {{ request()->routeIs('company.data') ? 'text-primary-600' : '' }}">
                    Data Perusahaan
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
            <a href="{{ route('projects.index') }}"
                class="block px-4 py-3 rounded-lg transition-all duration-300 {{ request()->routeIs('projects.*') ? 'bg-primary-50 text-primary-600' : 'text-neutral-700 hover:bg-neutral-100' }}">
                Portofolio
            </a>
            <a href="{{ route('business-fields.index') }}"
                class="block px-4 py-3 rounded-lg transition-all duration-300 {{ request()->routeIs('business-fields.*') ? 'bg-primary-50 text-primary-600' : 'text-neutral-700 hover:bg-neutral-100' }}">
                Bidang Usaha
            </a>
            <a href="{{ route('company.profile') }}"
                class="block px-4 py-3 rounded-lg transition-all duration-300 {{ request()->routeIs('company.profile') ? 'bg-primary-50 text-primary-600' : 'text-neutral-700 hover:bg-neutral-100' }}">
                Profil Perusahaan
            </a>
            <a href="{{ route('company.data') }}"
                class="block px-4 py-3 rounded-lg transition-all duration-300 {{ request()->routeIs('company.data') ? 'bg-primary-50 text-primary-600' : 'text-neutral-700 hover:bg-neutral-100' }}">
                Data Perusahaan
            </a>
            <div class="pt-2">
                <a href="{{ route('contact.index') }}"
                    class="block bg-primary-600 hover:bg-primary-700 text-white font-semibold px-6 py-3 rounded-lg text-center transition-all duration-300">
                    Hubungi Kami
                </a>
            </div>
        </nav>
    </div>
</nav>
