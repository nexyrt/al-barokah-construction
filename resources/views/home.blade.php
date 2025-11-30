<x-layouts.public>

    {{-- Hero Section --}}
    <section
        class="relative bg-gradient-to-br from-secondary-900 via-secondary-800 to-secondary-900 text-white overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0"
                style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'0.4\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');">
            </div>
        </div>

        <div class="container-custom relative z-10">
            <div class="py-20 md:py-32">
                <div class="max-w-4xl">
                    <!-- Tagline -->
                    <div
                        class="inline-flex items-center space-x-2 bg-primary-600/20 backdrop-blur-sm px-4 py-2 rounded-full border border-primary-400/30 mb-6 animate-fade-in">
                        <svg class="w-5 h-5 text-primary-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                            <path fill-rule="evenodd"
                                d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-sm font-medium text-primary-400">Berpengalaman Sejak
                            {{ $company->established_year ?? '1998' }}</span>
                    </div>

                    <!-- Main Heading -->
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold leading-tight mb-6 animate-slide-up">
                        {{ $company->company_name ?? 'Al Barokah Construction' }}
                    </h1>

                    <p class="text-xl md:text-2xl text-primary-400 font-semibold mb-4 animate-slide-up"
                        style="animation-delay: 0.1s;">
                        {{ $company->tagline ?? 'Membangun Masa Depan Bersama' }}
                    </p>

                    <p class="text-lg text-neutral-200 mb-8 leading-relaxed max-w-2xl animate-slide-up"
                        style="animation-delay: 0.2s;">
                        {{ Str::limit($company->about_us ?? 'Perusahaan konstruksi terpercaya dengan pengalaman 25+ tahun dalam menangani berbagai proyek konstruksi skala nasional.', 200) }}
                    </p>

                    <!-- CTA Buttons - UPDATED LINKS -->
                    <div class="flex flex-col sm:flex-row gap-4 animate-slide-up" style="animation-delay: 0.3s;">
                        <a href="{{ route('home') }}#projects"
                            class="btn-primary inline-flex items-center justify-center">
                            <span>Lihat Portofolio</span>
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a>
                        <a href="{{ route('home') }}#contact"
                            class="btn-outline bg-white/10 backdrop-blur-sm border-white text-white hover:bg-white hover:text-secondary-900 inline-flex items-center justify-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                </path>
                            </svg>
                            <span>Hubungi Kami</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Wave Divider -->
        <div class="absolute bottom-0 left-0 right-0">
            <svg viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full h-auto">
                <path
                    d="M0 120L60 105C120 90 240 60 360 45C480 30 600 30 720 37.5C840 45 960 60 1080 67.5C1200 75 1320 75 1380 75L1440 75V120H1380C1320 120 1200 120 1080 120C960 120 840 120 720 120C600 120 480 120 360 120C240 120 120 120 60 120H0Z"
                    fill="rgb(250, 250, 250)" />
            </svg>
        </div>
    </section>

    {{-- Statistics Section --}}
    <section class="section-padding bg-neutral-50">
        <div class="container-custom">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <!-- Stat 1 -->
                <div class="text-center">
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-primary-100 rounded-full mb-4">
                        <svg class="w-8 h-8 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-3xl md:text-4xl font-bold text-secondary-900 mb-2">{{ $stats['total_projects'] }}+
                    </h3>
                    <p class="text-neutral-600">Proyek Selesai</p>
                </div>

                <!-- Stat 2 -->
                <div class="text-center">
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-primary-100 rounded-full mb-4">
                        <svg class="w-8 h-8 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-3xl md:text-4xl font-bold text-secondary-900 mb-2">{{ $stats['total_clients'] }}+
                    </h3>
                    <p class="text-neutral-600">Klien Puas</p>
                </div>

                <!-- Stat 3 -->
                <div class="text-center">
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-primary-100 rounded-full mb-4">
                        <svg class="w-8 h-8 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-3xl md:text-4xl font-bold text-secondary-900 mb-2">{{ $stats['years_experience'] }}+
                    </h3>
                    <p class="text-neutral-600">Tahun Pengalaman</p>
                </div>

                <!-- Stat 4 -->
                <div class="text-center">
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-primary-100 rounded-full mb-4">
                        <svg class="w-8 h-8 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-3xl md:text-4xl font-bold text-secondary-900 mb-2">{{ $stats['business_fields'] }}
                    </h3>
                    <p class="text-neutral-600">Bidang Usaha</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Business Fields Section --}}
    <section class="section-padding bg-white">
        <div class="container-custom">
            <!-- Section Header -->
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-secondary-900 mb-4">
                    Bidang Usaha Kami
                </h2>
                <p class="text-lg text-neutral-600 max-w-2xl mx-auto">
                    Kami melayani berbagai jenis proyek konstruksi dengan keahlian dan pengalaman yang luas
                </p>
            </div>

            <!-- Business Fields Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($businessFields as $field)
                    <div class="card p-6 hover:shadow-xl transition-all duration-300 group">
                        <!-- Icon -->
                        <div
                            class="w-14 h-14 bg-primary-100 group-hover:bg-primary-600 rounded-lg flex items-center justify-center mb-4 transition-colors duration-300">
                            <svg class="w-8 h-8 text-primary-600 group-hover:text-white transition-colors duration-300"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                </path>
                            </svg>
                        </div>

                        <!-- Content -->
                        <h3
                            class="text-xl font-bold text-secondary-900 mb-2 group-hover:text-primary-600 transition-colors">
                            {{ $field->name }}
                        </h3>
                        <p class="text-neutral-600 mb-4 leading-relaxed">
                            {{ $field->short_description }}
                        </p>

                        <!-- Footer -->
                        <div class="flex items-center justify-between pt-4 border-t border-neutral-200">
                            <span class="text-sm text-neutral-500">
                                {{ $field->projects_count }} Proyek
                            </span>
                            {{-- LINK DISABLED - route belum ada --}}
                            <span
                                class="text-neutral-400 font-medium text-sm inline-flex items-center cursor-not-allowed">
                                Lihat Proyek
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7"></path>
                                </svg>
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- View All Button - DISABLED -->
            <div class="text-center mt-12">
                <span class="btn-outline inline-flex items-center opacity-50 cursor-not-allowed">
                    <span>Lihat Semua Bidang Usaha</span>
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </span>
            </div>
        </div>
    </section>

    {{-- Featured Projects Section --}}
    <section id="projects" class="section-padding bg-neutral-50">
        <div class="container-custom">
            <!-- Section Header -->
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-secondary-900 mb-4">
                    Proyek Unggulan Kami
                </h2>
                <p class="text-lg text-neutral-600 max-w-2xl mx-auto">
                    Lihat beberapa proyek konstruksi terbaik yang telah kami selesaikan dengan standar kualitas tinggi
                </p>
            </div>

            <!-- Projects Grid -->
            @if ($featuredProjects->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($featuredProjects as $project)
                        <div class="card overflow-hidden group">
                            <!-- Image -->
                            <div class="relative h-64 bg-neutral-200 overflow-hidden">
                                @if ($project->thumbnail)
                                    <img src="{{ asset('storage/' . $project->thumbnail) }}"
                                        alt="{{ $project->title }}"
                                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                @else
                                    <div
                                        class="w-full h-full flex items-center justify-center bg-gradient-to-br from-primary-500 to-secondary-700">
                                        <span
                                            class="text-white text-6xl font-bold opacity-20">{{ substr($project->title, 0, 1) }}</span>
                                    </div>
                                @endif

                                <!-- Badge -->
                                <div class="absolute top-4 left-4">
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-primary-600 text-white">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                            </path>
                                        </svg>
                                        Featured
                                    </span>
                                </div>

                                <!-- Status Badge -->
                                <div class="absolute top-4 right-4">
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium 
                                {{ $project->status === 'completed' ? 'bg-success-600 text-white' : 'bg-warning-500 text-white' }}">
                                        {{ ucfirst($project->status) }}
                                    </span>
                                </div>
                            </div>

                            <!-- Content -->
                            <div class="p-6">
                                <!-- Category -->
                                <span class="text-sm text-primary-600 font-medium">
                                    {{ $project->businessField->name }}
                                </span>

                                <!-- Title -->
                                <h3
                                    class="text-xl font-bold text-secondary-900 mt-2 mb-3 line-clamp-2 group-hover:text-primary-600 transition-colors">
                                    {{ $project->title }}
                                </h3>

                                <!-- Meta Info -->
                                <div class="space-y-2 mb-4">
                                    <div class="flex items-center text-sm text-neutral-600">
                                        <svg class="w-4 h-4 mr-2 text-neutral-400" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                        {{ $project->client_name }}
                                    </div>
                                    <div class="flex items-center text-sm text-neutral-600">
                                        <svg class="w-4 h-4 mr-2 text-neutral-400" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                            </path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                        {{ $project->location }}
                                    </div>
                                </div>

                                <!-- CTA - DISABLED -->
                                <span class="inline-flex items-center text-neutral-400 font-medium cursor-not-allowed">
                                    Lihat Detail
                                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </span>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-12">
                    <p class="text-neutral-500">Belum ada proyek unggulan</p>
                </div>
            @endif

            <!-- View All Button - DISABLED -->
            <div class="text-center mt-12">
                <span class="btn-primary inline-flex items-center opacity-50 cursor-not-allowed">
                    <span>Lihat Semua Proyek</span>
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </span>
            </div>
        </div>
    </section>

    {{-- Testimonials Section --}}
    @if ($testimonials->count() > 0)
        <section class="section-padding bg-white">
            <div class="container-custom">
                <!-- Section Header -->
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-bold text-secondary-900 mb-4">
                        Apa Kata Klien Kami
                    </h2>
                    <p class="text-lg text-neutral-600 max-w-2xl mx-auto">
                        Kepuasan klien adalah prioritas utama kami
                    </p>
                </div>

                <!-- Testimonials Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($testimonials->take(3) as $testimonial)
                        <div class="card p-6">
                            <!-- Rating -->
                            <div class="flex items-center mb-4">
                                @for ($i = 1; $i <= 5; $i++)
                                    <svg class="w-5 h-5 {{ $i <= $testimonial->rating ? 'text-warning-500' : 'text-neutral-300' }}"
                                        fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                        </path>
                                    </svg>
                                @endfor
                            </div>

                            <!-- Testimonial Text -->
                            <p class="text-neutral-600 mb-6 leading-relaxed italic">
                                "{{ $testimonial->testimonial }}"
                            </p>

                            <!-- Client Info -->
                            <div class="flex items-center pt-4 border-t border-neutral-200">
                                <div
                                    class="w-12 h-12 bg-primary-100 rounded-full flex items-center justify-center mr-4">
                                    <span
                                        class="text-primary-600 font-bold text-lg">{{ substr($testimonial->client_name, 0, 1) }}</span>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-secondary-900">{{ $testimonial->client_name }}</h4>
                                    <p class="text-sm text-neutral-600">{{ $testimonial->position }} -
                                        {{ $testimonial->company }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- CTA Section --}}
    <section id="contact"
        class="section-padding bg-gradient-to-br from-primary-600 to-primary-700 text-white relative overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0"
                style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'0.4\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');">
            </div>
        </div>

        <div class="container-custom relative z-10">
            <div class="max-w-3xl mx-auto text-center">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">
                    Siap Memulai Proyek Konstruksi Anda?
                </h2>
                <p class="text-xl text-primary-100 mb-8">
                    Konsultasikan kebutuhan konstruksi Anda dengan tim profesional kami
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    {{-- Email Link --}}
                    @if ($company?->email)
                        <a href="mailto:{{ $company->email }}"
                            class="bg-white text-primary-600 px-8 py-4 rounded-lg font-semibold hover:bg-neutral-100 transition-colors inline-flex items-center justify-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                </path>
                            </svg>
                            Hubungi Kami
                        </a>
                    @endif

                    {{-- WhatsApp Link --}}
                    @if ($company?->whatsapp)
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $company->whatsapp) }}"
                            target="_blank"
                            class="bg-success-600 text-white px-8 py-4 rounded-lg font-semibold hover:bg-success-700 transition-colors inline-flex items-center justify-center">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                            </svg>
                            WhatsApp
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </section>

</x-layouts.public>
