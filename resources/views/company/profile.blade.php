<x-layouts.public>

    {{-- Hero Section --}}
    <section class="relative pt-32 pb-24 overflow-hidden">
        {{-- Animated Background with Gradient --}}
        <div class="absolute inset-0">
            <div class="absolute inset-0 bg-gradient-to-br from-primary-50/50 via-primary-100/30 to-white"></div>
            <div class="absolute inset-0 opacity-30">
                <div class="absolute top-0 left-0 w-full h-full"
                    style="background-image: radial-gradient(circle at 20% 50%, rgba(34, 197, 94, 0.1) 0%, transparent 50%), radial-gradient(circle at 80% 80%, rgba(30, 58, 138, 0.1) 0%, transparent 50%);">
                </div>
            </div>
        </div>

        {{-- Floating Elements --}}
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div
                class="absolute top-1/4 left-10 w-20 h-20 border-2 border-primary-200 rounded-lg rotate-12 animate-fade-in">
            </div>
            <div class="absolute top-1/2 right-20 w-16 h-16 border-2 border-secondary-200 rounded-full animate-fade-in"
                style="animation-delay: 0.7s;"></div>
            <div class="absolute bottom-1/4 left-1/3 w-12 h-12 border-2 border-primary-300 rotate-45 animate-fade-in"
                style="animation-delay: 1.2s;"></div>
        </div>

        <div class="container-custom relative z-10">
            <div class="max-w-5xl mx-auto text-center space-y-8">
                {{-- Company Badge --}}
                <div
                    class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-primary-100 border border-primary-200 animate-fade-in">
                    <div class="w-2 h-2 bg-primary-600 rounded-full animate-pulse"></div>
                    <span class="text-sm font-semibold text-primary-700">Sejak
                        {{ $company->established_year ?? '1998' }}</span>
                </div>

                {{-- Company Name --}}
                <div class="space-y-4 animate-fade-in" style="animation-delay: 0.1s;">
                    <h1 class="text-5xl md:text-7xl font-heading leading-tight text-secondary-900">
                        {{ $company->company_name ?? 'AL BAROKAH CONSTRUCTION' }}
                    </h1>
                    <div class="flex items-center justify-center gap-4">
                        <div
                            class="h-1 w-16 bg-gradient-to-r from-transparent via-primary-600 to-transparent rounded-full">
                        </div>
                    </div>
                </div>

                {{-- Tagline --}}
                <p class="text-2xl md:text-3xl text-neutral-600 font-medium animate-fade-in leading-relaxed"
                    style="animation-delay: 0.2s;">
                    {{ $company->tagline ?? 'Membangun Masa Depan Bersama' }}
                </p>

                {{-- Location --}}
                <div class="flex items-center justify-center gap-3 text-neutral-600 animate-fade-in"
                    style="animation-delay: 0.3s;">
                    <div class="w-8 h-8 rounded-full bg-primary-100 flex items-center justify-center">
                        <svg class="h-4 w-4 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                            </path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                    <span class="text-lg">{{ $company->city ?? 'Samarinda' }},
                        {{ $company->province ?? 'Kalimantan Timur' }}</span>
                </div>

                {{-- Years Badge --}}
                <div class="inline-block animate-fade-in" style="animation-delay: 0.4s;">
                    <div class="px-6 py-3 rounded-full bg-secondary-900 text-white font-bold text-lg">
                        {{ $stats['years_experience'] }}+ Tahun Pengalaman
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Stats Section --}}
    <section class="py-16 bg-neutral-50">
        <div class="container-custom">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                {{-- Stat 1: Completed Projects --}}
                <div class="card text-center animate-fade-in p-6">
                    <svg class="h-10 w-10 mx-auto mb-3 text-primary-600" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z">
                        </path>
                    </svg>
                    <div class="text-3xl md:text-4xl font-bold text-secondary-900 mb-1">
                        {{ $stats['completed_projects'] }}+
                    </div>
                    <div class="text-sm text-neutral-600">
                        Proyek Selesai
                    </div>
                </div>

                {{-- Stat 2: Clients --}}
                <div class="card text-center animate-fade-in p-6" style="animation-delay: 0.1s;">
                    <svg class="h-10 w-10 mx-auto mb-3 text-primary-600" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                        </path>
                    </svg>
                    <div class="text-3xl md:text-4xl font-bold text-secondary-900 mb-1">
                        {{ $stats['total_clients'] }}+
                    </div>
                    <div class="text-sm text-neutral-600">
                        Klien Puas
                    </div>
                </div>

                {{-- Stat 3: Years --}}
                <div class="card text-center animate-fade-in p-6" style="animation-delay: 0.2s;">
                    <svg class="h-10 w-10 mx-auto mb-3 text-primary-600" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                        </path>
                    </svg>
                    <div class="text-3xl md:text-4xl font-bold text-secondary-900 mb-1">
                        {{ $stats['years_experience'] }}+
                    </div>
                    <div class="text-sm text-neutral-600">
                        Tahun Pengalaman
                    </div>
                </div>

                {{-- Stat 4: Business Fields --}}
                <div class="card text-center animate-fade-in p-6" style="animation-delay: 0.3s;">
                    <svg class="h-10 w-10 mx-auto mb-3 text-primary-600" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                    <div class="text-3xl md:text-4xl font-bold text-secondary-900 mb-1">
                        {{ $stats['business_fields'] }}
                    </div>
                    <div class="text-sm text-neutral-600">
                        Bidang Usaha
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- About Section --}}
    <section class="py-16 md:py-24 bg-white">
        <div class="container-custom">
            <div class="max-w-4xl mx-auto space-y-12">
                {{-- About Us --}}
                <div class="space-y-4">
                    <h2 class="text-3xl md:text-4xl font-heading font-bold text-secondary-900">
                        Tentang Kami
                    </h2>
                    <p class="text-lg text-neutral-700 leading-relaxed">
                        {{ $company->about_us ?? 'PT Konstruksi Bangun Sejahtera adalah perusahaan konstruksi terpercaya yang telah berpengalaman lebih dari 25 tahun dalam industri konstruksi di Indonesia. Kami berkomitmen untuk memberikan layanan konstruksi berkualitas tinggi dengan mengutamakan kepuasan klien, keselamatan kerja, dan kelestarian lingkungan.' }}
                    </p>
                </div>

                {{-- Vision --}}
                <div class="space-y-4">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-primary-100 rounded-lg flex items-center justify-center">
                            <svg class="h-6 w-6 text-primary-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                </path>
                            </svg>
                        </div>
                        <h2 class="text-3xl md:text-4xl font-heading font-bold text-secondary-900">
                            Visi
                        </h2>
                    </div>
                    <p class="text-lg text-neutral-700 leading-relaxed">
                        {{ $company->vision ?? 'Menjadi perusahaan konstruksi terkemuka di Indonesia yang dikenal dengan kualitas, inovasi, dan integritas dalam setiap proyek yang kami kerjakan.' }}
                    </p>
                </div>

                {{-- Mission --}}
                <div class="space-y-4">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-primary-100 rounded-lg flex items-center justify-center">
                            <svg class="h-6 w-6 text-primary-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h2 class="text-3xl md:text-4xl font-heading font-bold text-secondary-900">
                            Misi
                        </h2>
                    </div>

                    @if ($company && $company->mission && is_array($company->mission) && count($company->mission) > 0)
                        <ul class="space-y-3">
                            @foreach ($company->mission as $item)
                                <li class="flex items-start gap-3">
                                    <svg class="h-6 w-6 text-primary-600 flex-shrink-0 mt-0.5" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="text-lg text-neutral-700 leading-relaxed">
                                        {{ $item }}
                                    </span>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <ul class="space-y-3">
                            <li class="flex items-start gap-3">
                                <svg class="h-6 w-6 text-primary-600 flex-shrink-0 mt-0.5" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-lg text-neutral-700 leading-relaxed">
                                    Memberikan layanan konstruksi berkualitas tinggi yang memenuhi standar internasional
                                </span>
                            </li>
                            <li class="flex items-start gap-3">
                                <svg class="h-6 w-6 text-primary-600 flex-shrink-0 mt-0.5" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-lg text-neutral-700 leading-relaxed">
                                    Mengutamakan keselamatan kerja dalam setiap aspek proyek
                                </span>
                            </li>
                            <li class="flex items-start gap-3">
                                <svg class="h-6 w-6 text-primary-600 flex-shrink-0 mt-0.5" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-lg text-neutral-700 leading-relaxed">
                                    Membangun kemitraan jangka panjang dengan klien berdasarkan kepercayaan dan
                                    transparansi
                                </span>
                            </li>
                            <li class="flex items-start gap-3">
                                <svg class="h-6 w-6 text-primary-600 flex-shrink-0 mt-0.5" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-lg text-neutral-700 leading-relaxed">
                                    Terus berinovasi dan mengadopsi teknologi terkini dalam industri konstruksi
                                </span>
                            </li>
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </section>

    {{-- Contact Information --}}
    <section class="py-16 bg-neutral-50">
        <div class="container-custom">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-3xl md:text-4xl font-heading font-bold text-secondary-900 mb-8 text-center">
                    Informasi Kontak
                </h2>
                <div class="grid md:grid-cols-2 gap-6">
                    {{-- Address Card --}}
                    <div class="card p-6 space-y-3">
                        <h3 class="font-semibold text-lg text-secondary-900">Alamat Kantor</h3>
                        <p class="text-neutral-700">
                            {{ $company->address ?? 'Jl. Soekarno Hatta No. 123' }}<br />
                        </p>
                    </div>

                    {{-- Contact Card --}}
                    <div class="card p-6 space-y-3">
                        <h3 class="font-semibold text-lg text-secondary-900">Kontak</h3>
                        <div class="space-y-2 text-neutral-700">
                            <p>Telepon: {{ $company->phone ?? '0541-123456' }}</p>
                            @if ($company?->whatsapp)
                                <p>WhatsApp: {{ $company->whatsapp }}</p>
                            @endif
                            <p>Email: {{ $company->email ?? 'info@albarokah.co.id' }}</p>
                        </div>
                    </div>

                    {{-- Operating Hours Card --}}
                    <div class="card md:col-span-2 p-6 space-y-3">
                        <h3 class="font-semibold text-lg text-secondary-900">Jam Operasional</h3>
                        <p class="text-neutral-700">
                            {{ $company->operating_hours ?? 'Senin - Jumat: 08:00 - 17:00 WIB' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-layouts.public>
