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
                                @switch(strtolower($social->platform))
                                    @case('instagram')
                                        <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                                        </svg>
                                    @break

                                    @case('facebook')
                                        <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                                        </svg>
                                    @break

                                    @case('twitter')
                                        <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" />
                                        </svg>
                                    @break

                                    @case('linkedin')
                                        <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                                        </svg>
                                    @break

                                    @case('youtube')
                                        <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z" />
                                        </svg>
                                    @break

                                    @default
                                        <a href="{{ $social->url }}" target="_blank" rel="noopener noreferrer"
                                            class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center hover:bg-primary-600 hover:scale-110 transition-all duration-300"
                                            aria-label="{{ $social->platform }}">
                                            <i class="{{ $iconMap[$social->icon] ?? 'fas fa-share-alt' }} text-white"></i>
                                        </a>
                                @endswitch
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
                @if ($company && $company->logo)
                    {{-- Company Logo (if exists) --}}
                    <div
                        class="w-12 h-12 rounded-lg overflow-hidden group-hover:scale-110 transition-all duration-300 shadow-md">
                        <img src="{{ \Storage::url($company->logo) }}"
                            alt="{{ $company->company_name ?? 'Company' }} Logo"
                            class="w-full h-full object-contain bg-white">
                    </div>
                @else
                    {{-- Fallback: Initials --}}
                    <div
                        class="w-12 h-12 bg-primary-600 rounded-lg flex items-center justify-center group-hover:scale-110 transition-all duration-300 shadow-md">
                        <span class="text-white font-bold text-xl">
                            {{ $company
                                ? (strlen($company->company_name) >= 2
                                    ? strtoupper(
                                        substr($company->company_name, 0, 1) .
                                            substr(explode(' ', $company->company_name)[1] ?? $company->company_name, 0, 1),
                                    )
                                    : strtoupper(substr($company->company_name, 0, 2)))
                                : 'AB' }}
                        </span>
                    </div>
                @endif

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
