<x-layouts.public>

    {{-- Hero Slideshow Section --}}
    <section class="relative h-[600px] md:h-[700px] overflow-hidden" x-data="heroSlideshow()" x-init="totalSlides = {{ $featuredProjects->take(3)->count() }}">

        {{-- Slides --}}
        @foreach ($featuredProjects->take(3) as $index => $project)
            <div x-show="currentSlide === {{ $index }}" x-transition:enter="transition-opacity duration-1000"
                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                x-transition:leave="transition-opacity duration-1000" x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0" class="absolute inset-0"
                style="{{ $index !== 0 ? 'display: none;' : '' }}">
                {{-- Background with Gradient Overlay --}}
                <div
                    class="absolute inset-0 bg-gradient-to-r from-secondary-900 via-secondary-800/90 to-secondary-900/70">
                </div>

                {{-- Background Image Placeholder --}}
                @if ($project->thumbnail && filter_var($project->thumbnail, FILTER_VALIDATE_URL))
                    <div class="absolute inset-0 bg-cover bg-center opacity-20"
                        style="background-image: url('{{ $project->thumbnail }}');"></div>
                @elseif($project->thumbnail)
                    <div class="absolute inset-0 bg-cover bg-center opacity-20"
                        style="background-image: url('{{ asset('storage/' . $project->thumbnail) }}');"></div>
                @else
                    {{-- Placeholder gradient jika tidak ada image --}}
                    <div class="absolute inset-0 opacity-20">
                        <div class="w-full h-full bg-gradient-to-br from-primary-400 via-primary-600 to-secondary-700">
                        </div>
                    </div>
                @endif

                {{-- Content --}}
                <div class="relative h-full container-custom flex items-center">
                    <div class="max-w-3xl text-white animate-fade-in">
                        {{-- Badge --}}
                        <div class="inline-block px-4 py-2 bg-primary-600/30 backdrop-blur-sm rounded-full mb-4">
                            <span class="text-primary-400 font-semibold text-sm">
                                {{ $project->businessField->name }}
                            </span>
                        </div>

                        {{-- Title --}}
                        <h1 class="text-4xl md:text-6xl font-heading mb-4 leading-tight text-white">
                            {{ $project->title }}
                        </h1>

                        {{-- Description --}}
                        <p class="text-lg md:text-xl text-white/90 mb-6 leading-relaxed">
                            {{ Str::limit($project->description, 150) }}
                        </p>

                        {{-- Meta Info --}}
                        <div class="flex gap-3 mb-8 flex-wrap">
                            <div class="px-4 py-2 bg-white/10 backdrop-blur-sm rounded-lg">
                                <span class="text-sm">📍 {{ $project->location }}</span>
                            </div>
                            <div class="px-4 py-2 bg-white/10 backdrop-blur-sm rounded-lg">
                                <span class="text-sm">
                                    @if ($project->status === 'completed')
                                        ✅ Selesai
                                    @elseif($project->status === 'ongoing')
                                        🚧 Dalam Pengerjaan
                                    @else
                                        📋 Perencanaan
                                    @endif
                                </span>
                            </div>
                        </div>

                        {{-- CTA Buttons --}}
                        <div class="flex gap-4 flex-wrap">
                            <a href="{{ route('home') }}#projects"
                                class="bg-primary-600 hover:bg-primary-700 text-white font-semibold px-8 py-4 rounded-lg transition-all duration-300 inline-flex items-center">
                                <span>Lihat Portofolio</span>
                            </a>
                            <a href="{{ route('home') }}#contact"
                                class="border-2 border-white text-white hover:bg-white hover:text-secondary-900 font-semibold px-8 py-4 rounded-lg transition-all duration-300">
                                Konsultasi Gratis
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        {{-- Navigation Arrows --}}
        <button @click="prevSlide()"
            class="absolute left-4 top-1/2 -translate-y-1/2 w-12 h-12 bg-white/10 backdrop-blur-sm hover:bg-white/20 rounded-full flex items-center justify-center transition-all duration-300"
            aria-label="Previous slide">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
        </button>
        <button @click="nextSlide()"
            class="absolute right-4 top-1/2 -translate-y-1/2 w-12 h-12 bg-white/10 backdrop-blur-sm hover:bg-white/20 rounded-full flex items-center justify-center transition-all duration-300"
            aria-label="Next slide">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </button>

        {{-- Slide Indicators --}}
        <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex gap-2">
            @foreach ($featuredProjects->take(3) as $index => $project)
                <button @click="goToSlide({{ $index }})"
                    :class="currentSlide === {{ $index }} ? 'bg-primary-600 w-8' : 'bg-white/50 hover:bg-white/80'"
                    class="h-3 rounded-full transition-all duration-300 {{ $index === 0 ? 'w-8 bg-primary-600' : 'w-3 bg-white/50' }}"
                    aria-label="Go to slide {{ $index + 1 }}"></button>
            @endforeach
        </div>
    </section>

    {{-- Statistics Section --}}
    <section class="py-16 bg-secondary-900">
        <div class="container-custom">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                {{-- Stat 1 --}}
                <div class="text-center group animate-fade-in">
                    <div
                        class="inline-flex items-center justify-center w-16 h-16 bg-white/10 rounded-full mb-4 group-hover:scale-110 transition-all duration-300">
                        <svg class="w-8 h-8 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                            </path>
                        </svg>
                    </div>
                    <div class="text-4xl md:text-5xl font-heading text-white mb-2">
                        {{ $stats['total_projects'] }}+
                    </div>
                    <div class="text-sm md:text-base text-white/80 font-medium">
                        Proyek Selesai
                    </div>
                </div>

                {{-- Stat 2 --}}
                <div class="text-center group animate-fade-in" style="animation-delay: 0.1s;">
                    <div
                        class="inline-flex items-center justify-center w-16 h-16 bg-white/10 rounded-full mb-4 group-hover:scale-110 transition-all duration-300">
                        <svg class="w-8 h-8 text-success-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                    </div>
                    <div class="text-4xl md:text-5xl font-heading text-white mb-2">
                        {{ $stats['total_clients'] }}+
                    </div>
                    <div class="text-sm md:text-base text-white/80 font-medium">
                        Klien Puas
                    </div>
                </div>

                {{-- Stat 3 --}}
                <div class="text-center group animate-fade-in" style="animation-delay: 0.2s;">
                    <div
                        class="inline-flex items-center justify-center w-16 h-16 bg-white/10 rounded-full mb-4 group-hover:scale-110 transition-all duration-300">
                        <svg class="w-8 h-8 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="text-4xl md:text-5xl font-heading text-white mb-2">
                        {{ $stats['years_experience'] }}+
                    </div>
                    <div class="text-sm md:text-base text-white/80 font-medium">
                        Tahun Pengalaman
                    </div>
                </div>

                {{-- Stat 4 --}}
                <div class="text-center group animate-fade-in" style="animation-delay: 0.3s;">
                    <div
                        class="inline-flex items-center justify-center w-16 h-16 bg-white/10 rounded-full mb-4 group-hover:scale-110 transition-all duration-300">
                        <svg class="w-8 h-8 text-info-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                            </path>
                        </svg>
                    </div>
                    <div class="text-4xl md:text-5xl font-heading text-white mb-2">
                        {{ $stats['business_fields'] }}
                    </div>
                    <div class="text-sm md:text-base text-white/80 font-medium">
                        Bidang Usaha
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Business Fields Section --}}
    <section class="py-24 bg-neutral-50">
        <div class="container-custom">
            {{-- Section Header --}}
            <div class="text-center mb-16 animate-fade-in">
                <span class="text-primary-600 font-semibold tracking-wider uppercase text-sm">
                    Layanan Kami
                </span>
                <h2 class="text-4xl md:text-5xl font-heading text-secondary-900 mt-2 mb-4">
                    BIDANG USAHA
                </h2>
                <p class="text-neutral-600 max-w-2xl mx-auto text-lg">
                    Solusi konstruksi komprehensif untuk berbagai kebutuhan proyek Anda
                </p>
            </div>

            {{-- Business Fields Grid --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
                @foreach ($businessFields as $index => $field)
                    <div class="card group p-6 hover:shadow-xl transition-all duration-300 border-2 hover:border-primary-600 cursor-pointer animate-fade-in"
                        style="animation-delay: {{ $index * 0.1 }}s;">
                        {{-- Icon --}}
                        <div
                            class="w-14 h-14 bg-primary-100 group-hover:bg-primary-600 rounded-lg flex items-center justify-center mb-4 transition-all duration-300">
                            <svg class="w-7 h-7 text-primary-600 group-hover:text-white transition-colors duration-300"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                </path>
                            </svg>
                        </div>

                        {{-- Content --}}
                        <h3
                            class="text-xl font-heading text-secondary-900 mb-3 group-hover:text-primary-600 transition-colors duration-300">
                            {{ $field->name }}
                        </h3>
                        <p class="text-neutral-600 leading-relaxed mb-4">
                            {{ $field->short_description }}
                        </p>

                        {{-- Footer --}}
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-primary-600 font-semibold">
                                {{ $field->projects_count }} Proyek
                            </span>
                            <span
                                class="text-sm text-neutral-600 group-hover:text-primary-600 transition-colors duration-300">
                                Lihat Detail →
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- View All Button --}}
            <div class="text-center">
                <span class="btn-outline inline-flex items-center opacity-50 cursor-not-allowed">
                    <span>Lihat Semua Bidang Usaha</span>
                </span>
            </div>
        </div>
    </section>

    {{-- Featured Projects Section --}}
    <section id="projects" class="py-24 bg-white">
        <div class="container-custom">
            {{-- Section Header --}}
            <div class="text-center mb-16 animate-fade-in">
                <span class="text-primary-600 font-semibold tracking-wider uppercase text-sm">
                    Portofolio
                </span>
                <h2 class="text-4xl md:text-5xl font-heading text-secondary-900 mt-2 mb-4">
                    PROYEK UNGGULAN
                </h2>
                <p class="text-neutral-600 max-w-2xl mx-auto text-lg">
                    Berbagai proyek konstruksi berkualitas yang telah kami kerjakan dengan dedikasi penuh
                </p>
            </div>

            {{-- Projects Grid --}}
            @if ($featuredProjects->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
                    @foreach ($featuredProjects as $index => $project)
                        <div class="card group overflow-hidden hover:shadow-xl transition-all duration-300 cursor-pointer animate-fade-in"
                            style="animation-delay: {{ $index * 0.1 }}s;">
                            {{-- Image or Placeholder --}}
                            <div class="h-56 relative overflow-hidden">
                                @if ($project->thumbnail && filter_var($project->thumbnail, FILTER_VALIDATE_URL))
                                    {{-- External URL --}}
                                    <img src="{{ $project->thumbnail }}" alt="{{ $project->title }}"
                                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                @elseif($project->thumbnail)
                                    {{-- Local Storage --}}
                                    <img src="{{ asset('storage/' . $project->thumbnail) }}"
                                        alt="{{ $project->title }}"
                                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                @else
                                    {{-- Gradient Placeholder --}}
                                    <div
                                        class="w-full h-full bg-gradient-to-br from-primary-400 via-primary-600 to-secondary-700 flex items-center justify-center">
                                        <span
                                            class="text-white text-6xl font-bold opacity-30">{{ substr($project->title, 0, 1) }}</span>
                                    </div>
                                @endif

                                {{-- Overlay --}}
                                <div
                                    class="absolute inset-0 bg-secondary-900/80 group-hover:bg-secondary-900/60 transition-all duration-300 flex items-center justify-center p-6">
                                    <div class="text-center text-white">
                                        <span
                                            class="inline-block bg-primary-600 text-white text-xs font-semibold px-3 py-1 rounded-full mb-3">
                                            {{ $project->businessField->name }}
                                        </span>
                                        <h3 class="text-xl font-heading line-clamp-2 text-white">
                                            {{ $project->title }}
                                        </h3>
                                    </div>
                                </div>
                            </div>

                            {{-- Content --}}
                            <div class="p-5">
                                <div class="flex items-start justify-between mb-3">
                                    <div class="flex-1">
                                        <p class="text-sm text-neutral-600 mb-1">
                                            <strong>Klien:</strong> {{ $project->client_name }}
                                        </p>
                                        <p class="text-sm text-neutral-600 flex items-center gap-1">
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                                </path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            </svg>
                                            {{ $project->location }}
                                        </p>
                                    </div>
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                {{ $project->status === 'completed' ? 'bg-success-100 text-success-700' : 'bg-warning-100 text-warning-700' }}">
                                        {{ $project->status === 'completed' ? 'Selesai' : 'Dalam Pengerjaan' }}
                                    </span>
                                </div>
                                <div class="flex items-center justify-between pt-3 border-t border-neutral-200">
                                    <div class="flex items-center gap-1 text-xs text-neutral-500">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                            </path>
                                        </svg>
                                        {{ $project->views_count }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-12">
                    <p class="text-neutral-500">Belum ada proyek unggulan</p>
                </div>
            @endif

            {{-- View All Button --}}
            <div class="text-center">
                <span
                    class="bg-primary-600 text-white font-semibold px-8 py-4 rounded-lg inline-flex items-center opacity-50 cursor-not-allowed">
                    <span>Lihat Semua Proyek</span>
                </span>
            </div>
        </div>
    </section>

    {{-- Testimonials Section --}}
    @if ($testimonials->count() > 0)
        <section class="py-24 bg-neutral-50">
            <div class="container-custom">
                {{-- Section Header --}}
                <div class="text-center mb-16 animate-fade-in">
                    <span class="text-primary-600 font-semibold tracking-wider uppercase text-sm">
                        Testimoni
                    </span>
                    <h2 class="text-4xl md:text-5xl font-heading text-secondary-900 mt-2 mb-4">
                        APA KATA KLIEN KAMI
                    </h2>
                    <p class="text-neutral-600 max-w-2xl mx-auto text-lg">
                        Kepercayaan dan kepuasan klien adalah prioritas utama kami
                    </p>
                </div>

                {{-- Testimonials Grid --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-5xl mx-auto">
                    @foreach ($testimonials as $index => $testimonial)
                        <div class="card p-6 animate-fade-in hover:shadow-xl transition-all duration-300"
                            style="animation-delay: {{ $index * 0.1 }}s;">
                            <div class="flex items-start gap-4 mb-4">
                                <div
                                    class="w-12 h-12 bg-primary-100 rounded-full flex items-center justify-center flex-shrink-0">
                                    <svg class="w-6 h-6 text-primary-600" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z" />
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    {{-- Rating Stars --}}
                                    <div class="flex items-center gap-1 mb-2">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <svg class="w-4 h-4 {{ $i <= $testimonial->rating ? 'fill-warning-500 text-warning-500' : 'fill-neutral-300 text-neutral-300' }}"
                                                viewBox="0 0 20 20">
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                                </path>
                                            </svg>
                                        @endfor
                                    </div>

                                    {{-- Testimonial Text --}}
                                    <p class="text-neutral-600 leading-relaxed italic mb-4">
                                        "{{ $testimonial->testimonial }}"
                                    </p>

                                    {{-- Client Info --}}
                                    <div class="border-t border-neutral-200 pt-4">
                                        <p class="font-semibold text-secondary-900">
                                            {{ $testimonial->client_name }}
                                        </p>
                                        <p class="text-sm text-neutral-600">
                                            {{ $testimonial->position }}
                                        </p>
                                        <p class="text-sm text-primary-600 font-medium">
                                            {{ $testimonial->company }}
                                        </p>
                                    </div>
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
        class="py-20 bg-gradient-to-br from-secondary-900 via-secondary-900 to-secondary-800 relative overflow-hidden">
        {{-- Background Pattern --}}
        <div class="absolute inset-0 bg-cover bg-center opacity-10"
            style="background-image: url('https://images.unsplash.com/photo-1541888946425-d81bb19240f5?q=80&w=2070');">
        </div>

        <div class="container-custom relative z-10">
            <div class="max-w-3xl mx-auto text-center animate-fade-in">
                <h2 class="text-3xl md:text-5xl font-heading text-white mb-4">
                    Siap Memulai Proyek Anda?
                </h2>
                <p class="text-lg md:text-xl text-white/90 mb-8 leading-relaxed">
                    Konsultasikan kebutuhan konstruksi Anda dengan tim profesional kami.
                    Kami siap membantu mewujudkan proyek impian Anda menjadi kenyataan.
                </p>

                {{-- CTA Buttons --}}
                <div class="flex flex-col sm:flex-row gap-4 justify-center mb-8">
                    @if ($company?->email)
                        <a href="mailto:{{ $company->email }}"
                            class="bg-primary-600 hover:bg-primary-700 text-white font-semibold text-lg px-8 py-4 rounded-lg transition-all duration-300 inline-flex items-center justify-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                </path>
                            </svg>
                            Konsultasi Gratis
                        </a>
                    @endif

                    @if ($company?->whatsapp)
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $company->whatsapp) }}"
                            target="_blank"
                            class="border-2 border-white text-white hover:bg-white hover:text-secondary-900 font-semibold text-lg px-8 py-4 rounded-lg transition-all duration-300 inline-flex items-center justify-center">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                            </svg>
                            Hubungi Kami
                        </a>
                    @endif
                </div>

                {{-- Contact Info --}}
                <div class="flex flex-col sm:flex-row gap-6 justify-center text-white/90">
                    @if ($company?->phone)
                        <div class="flex items-center gap-2 justify-center">
                            <svg class="w-5 h-5 text-primary-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                </path>
                            </svg>
                            <span class="font-medium">{{ $company->phone }}</span>
                        </div>
                    @endif

                    @if ($company?->email)
                        <div class="flex items-center gap-2 justify-center">
                            <svg class="w-5 h-5 text-primary-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                </path>
                            </svg>
                            <span class="font-medium">{{ $company->email }}</span>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

</x-layouts.public>
