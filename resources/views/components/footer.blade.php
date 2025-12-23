@php
    $company = \App\Models\CompanyInfo::first();
    $socialMedia = \App\Models\SocialMedia::where('is_active', true)->orderBy('display_order')->get();

    $iconMap = [
        'facebook' => 'fab fa-facebook-f',
        'instagram' => 'fab fa-instagram',
        'linkedin' => 'fab fa-linkedin-in',
        'twitter' => 'fab fa-twitter',
        'youtube' => 'fab fa-youtube',
        'whatsapp' => 'fab fa-whatsapp',
        'tiktok' => 'fab fa-tiktok',
    ];
@endphp

<footer class="bg-secondary-900 text-white py-12">
    <div class="container-custom">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">

            {{-- Company Info --}}
            <div>
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 bg-primary-600 rounded-lg flex items-center justify-center">
                        <span class="text-white font-bold text-lg">AB</span>
                    </div>
                    <h3 class="text-2xl font-heading tracking-wider text-white">
                        {{ $company->company_name ?? 'AL BAROKAH' }}
                    </h3>
                </div>
                <p class="text-white/80 leading-relaxed mb-4">
                    {{ $company->tagline ?? 'Membangun Masa Depan Bersama' }}
                </p>
                <p class="text-sm text-white/70">
                    Sejak {{ $company->established_year ?? '1998' }}
                </p>
            </div>

            {{-- Quick Links --}}
            <div>
                <h4 class="font-heading text-lg mb-4 text-primary-400">Menu Cepat</h4>
                <ul class="space-y-2">
                    <li>
                        <a href="{{ route('home') }}"
                            class="text-white/80 hover:text-primary-400 transition-colors duration-300">
                            Beranda
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('projects.index') }}"
                            class="text-white/80 hover:text-primary-400 transition-colors duration-300">
                            Portofolio
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('business-fields.index') }}"
                            class="text-white/80 hover:text-primary-400 transition-colors duration-300">
                            Bidang Usaha
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('company.profile') }}"
                            class="text-white/80 hover:text-primary-400 transition-colors duration-300">
                            Profil Perusahaan
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('company.data') }}"
                            class="text-white/80 hover:text-primary-400 transition-colors duration-300">
                            Data Perusahaan
                        </a>
                    <li>
                        <a href="{{ route('company.profile') }}"
                            class="text-white/80 hover:text-primary-400 transition-colors duration-300">
                            Kontak
                        </a>
                    </li>
                </ul>
            </div>

            {{-- Contact Info --}}
            <div>
                <h4 class="font-heading text-lg mb-4 text-primary-400">Kontak Kami</h4>
                <ul class="space-y-3 text-white/80">
                    @if ($company?->address)
                        <li class="flex items-start gap-2">
                            <svg class="w-5 h-5 text-primary-400 flex-shrink-0 mt-0.5" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                </path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <span class="text-sm">{{ $company->address }}</span>
                        </li>
                    @endif

                    @if ($company?->phone)
                        <li class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-primary-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                </path>
                            </svg>
                            <span class="text-sm">{{ $company->phone }}</span>
                        </li>
                    @endif

                    @if ($company?->email)
                        <li class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-primary-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                </path>
                            </svg>
                            <span class="text-sm">{{ $company->email }}</span>
                        </li>
                    @endif
                </ul>
            </div>

            {{-- Social Media --}}
            <div>
                <h4 class="font-heading text-lg mb-4 text-primary-400">Jadwal Kantor Kami</h4>
                @if ($company?->operating_hours)
                    <p class="text-sm text-white/70">
                        {{ $company->operating_hours }}
                    </p>
                @else
                    <p class="text-sm text-white/70">
                        Senin - Jumat: 08:00 - 17:00 WIB
                    </p>
                @endif
            </div>
        </div>

        {{-- Bottom Footer --}}
        <div class="border-t pt-8 text-center !text-white">
            <p class="!text-white">&copy; {{ date('Y') }}
                {{ $company->company_name ?? 'Al Barokah Construction' }}. Semua hak dilindungi undang-undang.</p>
            @if ($company?->city && $company?->province)
                <p class="text-sm mt-2 !text-white">{{ $company->city }}, {{ $company->province }}, Indonesia</p>
            @endif
        </div>
    </div>
</footer>

{{-- FontAwesome CDN --}}
@once
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endonce
