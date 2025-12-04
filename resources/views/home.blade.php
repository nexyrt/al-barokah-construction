<x-layouts.public>

    {{-- Hero Slideshow Section - FIXED: Added mt-20 --}}
    <section x-data="heroSlideshow()" x-init="totalSlides = {{ $featuredProjects->take(3)->count() }}" class="relative h-[600px] md:h-[700px]">

        @foreach ($featuredProjects->take(3) as $index => $project)
            <div x-show="currentSlide === {{ $index }}" x-transition:enter="transition-opacity duration-1000"
                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                x-transition:leave="transition-opacity duration-1000" x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0" class="absolute inset-0"
                style="{{ $index !== 0 ? 'display: none;' : '' }}">

                {{-- Background Layers --}}
                <div class="absolute inset-0">
                    {{-- Gradient Overlay --}}
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-secondary-900 via-secondary-800/90 to-secondary-900/70 z-10">
                    </div>

                    {{-- Background Image or Gradient --}}
                    @if ($project->thumbnail && filter_var($project->thumbnail, FILTER_VALIDATE_URL))
                        <div class="absolute inset-0 bg-cover bg-center opacity-20"
                            style="background-image: url('{{ $project->thumbnail }}');"></div>
                    @elseif($project->thumbnail)
                        <div class="absolute inset-0 bg-cover bg-center opacity-20"
                            style="background-image: url('{{ asset('storage/' . $project->thumbnail) }}');"></div>
                    @else
                        <div
                            class="absolute inset-0 bg-gradient-to-br from-primary-400 via-primary-600 to-secondary-700 opacity-20">
                        </div>
                    @endif
                </div>

                {{-- Content --}}
                <div class="relative z-20 h-full flex items-center">
                    <div class="container-custom">
                        <div class="max-w-4xl">
                            {{-- Badge --}}
                            {{-- <div
                                class="inline-flex items-center gap-2 px-4 py-2 bg-primary-600/30 backdrop-blur-sm rounded-full mb-6 animate-fade-in">
                                <svg class="w-4 h-4 text-primary-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                                    </path>
                                </svg>
                                <span
                                    class="text-primary-300 font-semibold text-sm">{{ $project->businessField->name }}</span>
                            </div> --}}

                            {{-- Title --}}
                            <h1 class="text-4xl md:text-6xl font-heading mb-4 leading-tight text-white">
                                {{ $project->title }}
                            </h1>

                            {{-- Description --}}
                            <p class="text-lg md:text-xl text-white/90 mb-8 leading-relaxed max-w-2xl">
                                {{ Str::limit($project->description, 150) }}
                            </p>

                            {{-- Meta Info --}}
                            <div class="flex flex-wrap gap-4 mb-8">
                                <div class="flex items-center gap-2 bg-white/10 backdrop-blur-sm px-4 py-2 rounded-lg">
                                    <svg class="w-5 h-5 text-primary-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                        </path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    <span class="text-white text-sm">{{ $project->location }}</span>
                                </div>
                                <div class="flex items-center gap-2 bg-white/10 backdrop-blur-sm px-4 py-2 rounded-lg">
                                    <span class="text-white text-sm">
                                        {{ $project->status === 'completed' ? '✅ Selesai' : ($project->status === 'ongoing' ? '🔄 Dalam Pengerjaan' : '📋 Perencanaan') }}
                                    </span>
                                </div>
                            </div>

                            {{-- CTA Buttons --}}
                            <div class="flex flex-wrap gap-4">
                                <a href="{{ route('projects.index') }}"
                                    class="bg-primary-600 hover:bg-primary-700 text-white font-semibold px-8 py-4 rounded-lg inline-flex items-center gap-2 transition-all duration-300 shadow-lg hover:shadow-xl">
                                    <span>Lihat Portofolio</span>
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                                <a href="{{ route('contact.index') }}"
                                    class="bg-white/10 backdrop-blur-sm border-2 border-white hover:bg-white hover:text-secondary-900 text-white font-semibold px-8 py-4 rounded-lg inline-flex items-center gap-2 transition-all duration-300">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                                        </path>
                                    </svg>
                                    <span>Konsultasi Gratis</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        {{-- Navigation Arrows --}}
        <button @click="prevSlide()"
            class="absolute left-4 top-1/2 -translate-y-1/2 z-30 w-12 h-12 bg-white/10 backdrop-blur-sm hover:bg-white/20 rounded-full flex items-center justify-center transition-all duration-300 group">
            <svg class="w-6 h-6 text-white group-hover:-translate-x-1 transition-transform" fill="none"
                stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
        </button>
        <button @click="nextSlide()"
            class="absolute right-4 top-1/2 -translate-y-1/2 z-30 w-12 h-12 bg-white/10 backdrop-blur-sm hover:bg-white/20 rounded-full flex items-center justify-center transition-all duration-300 group">
            <svg class="w-6 h-6 text-white group-hover:translate-x-1 transition-transform" fill="none"
                stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </button>

        {{-- Dot Indicators --}}
        <div class="absolute bottom-8 left-1/2 -translate-x-1/2 z-30 flex gap-2">
            @foreach ($featuredProjects->take(3) as $index => $project)
                <button @click="goToSlide({{ $index }})"
                    :class="currentSlide === {{ $index }} ? 'bg-primary-600 w-8' : 'bg-white/50 w-3'"
                    class="h-3 rounded-full transition-all duration-300">
                </button>
            @endforeach
        </div>
    </section>

    {{-- Statistics Section --}}
    <section class="bg-secondary-900 py-16">
        <div class="container-custom">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                {{-- Stat 1 --}}
                <div class="text-center group animate-fade-in">
                    <div
                        class="w-16 h-16 bg-white/10 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                            </path>
                        </svg>
                    </div>
                    <div class="text-4xl md:text-5xl font-heading text-white mb-2">{{ $stats['total_projects'] }}+
                    </div>
                    <div class="text-sm md:text-base text-white/80">Proyek Selesai</div>
                </div>

                {{-- Stat 2 --}}
                <div class="text-center group animate-fade-in" style="animation-delay: 0.1s;">
                    <div
                        class="w-16 h-16 bg-white/10 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 text-success-500" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                    </div>
                    <div class="text-4xl md:text-5xl font-heading text-white mb-2">{{ $stats['total_clients'] }}+
                    </div>
                    <div class="text-sm md:text-base text-white/80">Klien Puas</div>
                </div>

                {{-- Stat 3 --}}
                <div class="text-center group animate-fade-in" style="animation-delay: 0.2s;">
                    <div
                        class="w-16 h-16 bg-white/10 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 text-primary-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="text-4xl md:text-5xl font-heading text-white mb-2">{{ $stats['years_experience'] }}+
                    </div>
                    <div class="text-sm md:text-base text-white/80">Tahun Pengalaman</div>
                </div>

                {{-- Stat 4 --}}
                <div class="text-center group animate-fade-in" style="animation-delay: 0.3s;">
                    <div
                        class="w-16 h-16 bg-white/10 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 text-info-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                            </path>
                        </svg>
                    </div>
                    <div class="text-4xl md:text-5xl font-heading text-white mb-2">{{ $stats['business_fields'] }}
                    </div>
                    <div class="text-sm md:text-base text-white/80">Bidang Usaha</div>
                </div>
            </div>
        </div>
    </section>

    {{-- Business Fields Section --}}
    <section class="section-padding bg-neutral-50">
        <div class="container-custom">
            {{-- Section Header --}}
            <div class="text-center mb-12">
                <span class="text-primary-600 font-semibold text-sm uppercase tracking-wider">Layanan Kami</span>
                <h2 class="text-3xl md:text-5xl font-heading font-bold text-secondary-900 mt-2">BIDANG USAHA</h2>
            </div>

            {{-- Business Fields Grid --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                @foreach ($businessFields as $index => $field)
                    <div class="card group hover:shadow-xl transition-all duration-300 animate-fade-in"
                        style="animation-delay: {{ $index * 0.1 }}s;">
                        <div class="p-6">
                            {{-- Icon --}}
                            <div
                                class="w-14 h-14 bg-primary-100 group-hover:bg-primary-600 rounded-lg flex items-center justify-center mb-4 transition-all duration-300">
                                <svg class="w-7 h-7 text-primary-600 group-hover:text-white transition-colors duration-300"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="{{ $iconMap[$field->icon] ?? 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4' }}">
                                    </path>
                                </svg>
                            </div>

                            {{-- Content --}}
                            <h3
                                class="text-xl font-heading font-bold text-secondary-900 mb-2 group-hover:text-primary-600 transition-colors">
                                {{ $field->name }}
                            </h3>
                            <p class="text-neutral-600 mb-4 leading-relaxed">
                                {{ $field->short_description }}
                            </p>

                            {{-- Footer --}}
                            <div class="flex items-center justify-between pt-4 border-t border-neutral-200">
                                <span class="text-sm text-neutral-500">
                                    <strong>{{ $field->projects_count }}</strong> Proyek
                                </span>
                                <a href="{{ route('business-fields.index') }}"
                                    class="text-primary-600 hover:text-primary-700 font-medium text-sm flex items-center gap-1 group/link">
                                    <span>Lihat Detail</span>
                                    <svg class="w-4 h-4 group-hover/link:translate-x-1 transition-transform"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- View All Button --}}
            <div class="text-center">
                <a href="{{ route('business-fields.index') }}"
                    class="inline-flex items-center gap-2 bg-secondary-900 hover:bg-primary-600 text-white font-semibold px-8 py-4 rounded-lg transition-all duration-300 shadow-lg hover:shadow-xl">
                    <span>Lihat Semua Bidang Usaha</span>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                        </path>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    {{-- Featured Projects Section --}}
    <section class="section-padding bg-white">
        <div class="container-custom">
            {{-- Section Header --}}
            <div class="text-center mb-12">
                <span class="text-primary-600 font-semibold text-sm uppercase tracking-wider">Portofolio</span>
                <h2 class="text-3xl md:text-5xl font-heading font-bold text-secondary-900 mt-2">PROYEK UNGGULAN</h2>
            </div>

            {{-- Projects Grid --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                @foreach ($featuredProjects as $index => $project)
                    <a href="{{ route('projects.show', $project->slug) }}"
                        class="card group overflow-hidden hover:shadow-xl transition-all duration-300 animate-fade-in"
                        style="animation-delay: {{ $index * 0.1 }}s;">
                        {{-- Image Container --}}
                        <div class="h-56 bg-neutral-200 relative overflow-hidden">
                            @if ($project->thumbnail && filter_var($project->thumbnail, FILTER_VALIDATE_URL))
                                <img src="{{ $project->thumbnail }}" alt="{{ $project->title }}"
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            @elseif($project->thumbnail)
                                <img src="{{ asset('storage/' . $project->thumbnail) }}" alt="{{ $project->title }}"
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            @else
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
                                {{ $project->status === 'completed' ? 'bg-success-100 text-success-700' : ($project->status === 'ongoing' ? 'bg-warning-100 text-warning-700' : 'bg-info-100 text-info-700') }}">
                                    {{ $project->status === 'completed' ? 'Selesai' : ($project->status === 'ongoing' ? 'Berlangsung' : 'Perencanaan') }}
                                </span>
                            </div>
                            <div class="flex items-center justify-between pt-3 border-t border-neutral-200">
                                <div class="flex items-center gap-1 text-xs text-neutral-500">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                    </a>
                @endforeach
            </div>

            {{-- View All Button --}}
            <div class="text-center">
                <a href="{{ route('projects.index') }}"
                    class="inline-flex items-center gap-2 bg-secondary-900 hover:bg-primary-600 text-white font-semibold px-8 py-4 rounded-lg transition-all duration-300 shadow-lg hover:shadow-xl">
                    <span>Lihat Semua Proyek</span>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                        </path>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    {{-- Clients Section dengan Drag Scroll --}}
    <section class="py-24 bg-zinc-50 dark:bg-zinc-900/30" x-data="{
        isDragging: false,
        startX: 0,
        scrollLeft: 0,
        handleMouseDown(e) {
            const container = $refs.scrollContainer;
            this.isDragging = true;
            this.startX = e.pageX - container.offsetLeft;
            this.scrollLeft = container.scrollLeft;
            container.style.cursor = 'grabbing';
        },
        handleMouseUp() {
            this.isDragging = false;
            $refs.scrollContainer.style.cursor = 'grab';
        },
        handleMouseMove(e) {
            if (!this.isDragging) return;
            e.preventDefault();
            const container = $refs.scrollContainer;
            const x = e.pageX - container.offsetLeft;
            const walk = (x - this.startX) * 2;
            container.scrollLeft = this.scrollLeft - walk;
        },
        handleMouseLeave() {
            this.isDragging = false;
            $refs.scrollContainer.style.cursor = 'grab';
        }
    }">
        <div class="container-custom">
            {{-- Header --}}
            <div class="text-center mb-12 animate-fade-in">
                <span class="text-primary-600 dark:text-primary-400 font-semibold tracking-wider uppercase text-sm">
                    Kepercayaan
                </span>
                <h2 class="text-4xl md:text-5xl font-heading text-zinc-900 dark:text-zinc-50 mt-2 mb-4">
                    CLIENT KAMI
                </h2>
                <p class="text-zinc-600 dark:text-zinc-400 max-w-2xl mx-auto text-lg">
                    Dipercaya oleh perusahaan dan institusi terkemuka di Kalimantan Timur
                </p>
            </div>

            {{-- Draggable Client Logos --}}
            <div class="relative">
                {{-- Gradient Overlays --}}
                <div
                    class="absolute left-0 top-0 bottom-0 w-16 bg-gradient-to-r from-zinc-50 dark:from-zinc-900/30 to-transparent z-10 pointer-events-none">
                </div>
                <div
                    class="absolute right-0 top-0 bottom-0 w-16 bg-gradient-to-l from-zinc-50 dark:from-zinc-900/30 to-transparent z-10 pointer-events-none">
                </div>

                {{-- Scroll Hint --}}
                @if (count($clients) > 3)
                    <p class="text-center text-sm text-zinc-500 dark:text-zinc-400 mb-4">
                        ← Geser untuk melihat lebih banyak →
                    </p>
                @endif

                {{-- Scrollable Container --}}
                <div x-ref="scrollContainer" @mousedown="handleMouseDown($event)" @mouseup="handleMouseUp()"
                    @mousemove="handleMouseMove($event)" @mouseleave="handleMouseLeave()"
                    class="flex gap-6 overflow-x-auto scrollbar-hide pb-4 {{ count($clients) <= 3 ? 'justify-center' : 'cursor-grab' }}"
                    style="scrollbar-width: none; -ms-overflow-style: none;">

                    @forelse ($clients as $client)
                        <div class="flex-shrink-0 w-44">
                            <div class="bg-white dark:bg-zinc-800 border border-zinc-200 dark:border-zinc-700 rounded-xl p-5 h-36 flex items-center justify-center shadow-sm hover:shadow-md transition-shadow"
                                title="{{ $client->name }}">
                                @if ($client->logo && \Storage::disk('public')->exists($client->logo))
                                    {{-- Logo Only --}}
                                    <img src="{{ \Storage::url($client->logo) }}" alt="{{ $client->name }}"
                                        class="w-full h-full object-contain select-none" draggable="false">
                                @else
                                    {{-- Initials + Name --}}
                                    <div class="flex flex-col items-center justify-center gap-3">
                                        <div
                                            class="w-20 h-20 rounded-full bg-gradient-to-br from-primary-500 to-primary-700 flex items-center justify-center flex-shrink-0">
                                            <span class="text-white font-bold text-2xl">
                                                {{ \Str::of($client->name)->explode(' ')->take(2)->map(fn($word) => \Str::substr($word, 0, 1))->implode('') }}
                                            </span>
                                        </div>
                                        <p
                                            class="text-sm font-medium text-zinc-900 dark:text-zinc-50 text-center line-clamp-2 leading-tight w-full px-2">
                                            {{ $client->name }}
                                        </p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @empty
                        <div class="w-full text-center py-12">
                            <p class="text-zinc-500 dark:text-zinc-400">Belum ada data client</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </section>


    {{-- FAQ Section - NEW --}}
    <section class="py-24 bg-neutral-50">
        <div class="container-custom">
            <div class="text-center mb-16 animate-fade-in">
                <span class="text-primary-600 font-semibold tracking-wider uppercase text-sm">
                    Pertanyaan Umum
                </span>
                <h2 class="text-4xl md:text-5xl font-heading text-secondary-900 mt-2 mb-4">
                    FREQUENTLY ASKED QUESTIONS
                </h2>
                <p class="text-neutral-600 max-w-2xl mx-auto text-lg">
                    Temukan jawaban untuk pertanyaan yang sering diajukan tentang layanan kami
                </p>
            </div>

            <div class="max-w-3xl mx-auto space-y-4" x-data="{ openFaq: null }">
                {{-- FAQ 1 --}}
                <div
                    class="bg-white border-2 border-neutral-200 rounded-xl overflow-hidden transition-all duration-300 hover:border-primary-600">
                    <button @click="openFaq = openFaq === 1 ? null : 1"
                        class="w-full px-6 py-5 text-left flex items-center justify-between">
                        <span class="font-semibold text-secondary-900 pr-4">Berapa lama waktu yang dibutuhkan untuk
                            menyelesaikan proyek konstruksi?</span>
                        <svg class="w-5 h-5 text-primary-600 flex-shrink-0 transition-transform"
                            :class="{ 'rotate-180': openFaq === 1 }" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div x-show="openFaq === 1" x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 transform -translate-y-2"
                        x-transition:enter-end="opacity-100 transform translate-y-0"
                        class="px-6 pb-5 text-neutral-600 leading-relaxed" style="display: none;">
                        Waktu penyelesaian proyek tergantung pada skala dan kompleksitas pekerjaan. Kami akan memberikan
                        estimasi waktu yang akurat setelah evaluasi proyek Anda. Biasanya, proyek bangunan komersial
                        memerlukan waktu 6-18 bulan.
                    </div>
                </div>

                {{-- FAQ 2 --}}
                <div
                    class="bg-white border-2 border-neutral-200 rounded-xl overflow-hidden transition-all duration-300 hover:border-primary-600">
                    <button @click="openFaq = openFaq === 2 ? null : 2"
                        class="w-full px-6 py-5 text-left flex items-center justify-between">
                        <span class="font-semibold text-secondary-900 pr-4">Apakah ada garansi untuk pekerjaan
                            konstruksi?</span>
                        <svg class="w-5 h-5 text-primary-600 flex-shrink-0 transition-transform"
                            :class="{ 'rotate-180': openFaq === 2 }" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div x-show="openFaq === 2" x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 transform -translate-y-2"
                        x-transition:enter-end="opacity-100 transform translate-y-0"
                        class="px-6 pb-5 text-neutral-600 leading-relaxed" style="display: none;">
                        Ya, kami memberikan garansi untuk semua pekerjaan konstruksi. Periode garansi bervariasi
                        tergantung jenis pekerjaan, biasanya antara 1-3 tahun untuk struktur bangunan dan 6-12 bulan
                        untuk finishing.
                    </div>
                </div>

                {{-- FAQ 3 --}}
                <div
                    class="bg-white border-2 border-neutral-200 rounded-xl overflow-hidden transition-all duration-300 hover:border-primary-600">
                    <button @click="openFaq = openFaq === 3 ? null : 3"
                        class="w-full px-6 py-5 text-left flex items-center justify-between">
                        <span class="font-semibold text-secondary-900 pr-4">Bagaimana sistem pembayaran untuk proyek
                            konstruksi?</span>
                        <svg class="w-5 h-5 text-primary-600 flex-shrink-0 transition-transform"
                            :class="{ 'rotate-180': openFaq === 3 }" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div x-show="openFaq === 3" x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 transform -translate-y-2"
                        x-transition:enter-end="opacity-100 transform translate-y-0"
                        class="px-6 pb-5 text-neutral-600 leading-relaxed" style="display: none;">
                        Sistem pembayaran kami fleksibel dan disesuaikan dengan kesepakatan. Umumnya menggunakan sistem
                        termin berdasarkan progress pekerjaan: 30% DP, 40% saat progress 50%, dan 30% saat selesai.
                    </div>
                </div>

                {{-- FAQ 4 --}}
                <div
                    class="bg-white border-2 border-neutral-200 rounded-xl overflow-hidden transition-all duration-300 hover:border-primary-600">
                    <button @click="openFaq = openFaq === 4 ? null : 4"
                        class="w-full px-6 py-5 text-left flex items-center justify-between">
                        <span class="font-semibold text-secondary-900 pr-4">Apakah menyediakan layanan konsultasi
                            gratis?</span>
                        <svg class="w-5 h-5 text-primary-600 flex-shrink-0 transition-transform"
                            :class="{ 'rotate-180': openFaq === 4 }" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div x-show="openFaq === 4" x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 transform -translate-y-2"
                        x-transition:enter-end="opacity-100 transform translate-y-0"
                        class="px-6 pb-5 text-neutral-600 leading-relaxed" style="display: none;">
                        Ya, kami menyediakan konsultasi gratis untuk evaluasi awal proyek Anda. Tim ahli kami akan
                        membantu menganalisis kebutuhan dan memberikan rekomendasi terbaik tanpa biaya.
                    </div>
                </div>

                {{-- FAQ 5 --}}
                <div
                    class="bg-white border-2 border-neutral-200 rounded-xl overflow-hidden transition-all duration-300 hover:border-primary-600">
                    <button @click="openFaq = openFaq === 5 ? null : 5"
                        class="w-full px-6 py-5 text-left flex items-center justify-between">
                        <span class="font-semibold text-secondary-900 pr-4">Apakah memiliki sertifikasi dan legalitas
                            yang lengkap?</span>
                        <svg class="w-5 h-5 text-primary-600 flex-shrink-0 transition-transform"
                            :class="{ 'rotate-180': openFaq === 5 }" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div x-show="openFaq === 5" x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 transform -translate-y-2"
                        x-transition:enter-end="opacity-100 transform translate-y-0"
                        class="px-6 pb-5 text-neutral-600 leading-relaxed" style="display: none;">
                        Ya, kami memiliki semua sertifikasi dan legalitas yang diperlukan, termasuk SIUJK (Surat Izin
                        Usaha Jasa Konstruksi), ISO 9001, dan sertifikasi K3 (Keselamatan dan Kesehatan Kerja).
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA Section - UPDATED --}}
    <section
        class="relative py-20 bg-gradient-to-br from-secondary-900 via-secondary-900 to-secondary-800 overflow-hidden">
        {{-- Background Image --}}
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0 bg-cover bg-center"
                style="background-image: url('https://images.unsplash.com/photo-1541888946425-d81bb19240f5?w=1920&h=1080&fit=crop');">
            </div>
        </div>

        <div class="container-custom relative z-10">
            <div class="max-w-3xl mx-auto text-center text-white space-y-6 animate-fade-in">
                <h2 class="text-3xl md:text-5xl font-heading font-semibold">
                    Siap Memulai Proyek Anda?
                </h2>
                <p class="text-lg md:text-xl text-white/90 leading-relaxed">
                    Konsultasikan kebutuhan konstruksi Anda dengan tim profesional kami.
                    Kami siap membantu mewujudkan proyek impian Anda menjadi kenyataan.
                </p>

                {{-- CTA Buttons --}}
                <div class="flex flex-col sm:flex-row gap-4 justify-center pt-4">
                    <a href="{{ route('contact.index') }}"
                        class="inline-flex items-center justify-center gap-2 bg-primary-600 hover:bg-primary-700 text-white font-semibold px-8 py-4 rounded-lg transition-all duration-300 shadow-lg hover:shadow-xl hover:scale-105">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                            </path>
                        </svg>
                        <span>Konsultasi Gratis</span>
                    </a>
                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $company->whatsapp) }}" target="_blank"
                        class="inline-flex items-center justify-center gap-2 bg-white/10 backdrop-blur-sm border-2 border-white hover:bg-white hover:text-secondary-900 text-white font-semibold px-8 py-4 rounded-lg transition-all duration-300">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                            </path>
                        </svg>
                        <span>Hubungi Kami</span>
                    </a>
                </div>

                {{-- Contact Info --}}
                <div class="flex flex-col sm:flex-row gap-6 justify-center text-white/90 pt-4">
                    <div class="flex items-center justify-center gap-2">
                        <svg class="w-5 h-5 text-primary-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                            </path>
                        </svg>
                        <span class="font-medium">{{ $company->phone }}</span>
                    </div>
                    <div class="flex items-center justify-center gap-2">
                        <svg class="w-5 h-5 text-primary-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                            </path>
                        </svg>
                        <span class="font-medium">{{ $company->email }}</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-layouts.public>
