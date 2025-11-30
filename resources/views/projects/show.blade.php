<x-layouts.public>

    {{-- Header Section - SIMPLE (Design Sebelumnya) --}}
    <section class="relative pt-32 pb-12 overflow-hidden">
        {{-- Animated Background --}}
        <div class="absolute inset-0 bg-gradient-to-br from-white via-primary-50/30 to-secondary-50/30">
            <div class="absolute inset-0 opacity-40">
                <div class="absolute top-0 right-1/4 w-64 h-64 bg-primary-200/40 rounded-full blur-3xl animate-pulse">
                </div>
                <div class="absolute bottom-0 left-1/4 w-80 h-80 bg-secondary-100/30 rounded-full blur-3xl animate-pulse"
                    style="animation-delay: 1s;"></div>
            </div>
        </div>

        {{-- Geometric Shapes --}}
        <div class="absolute inset-0 overflow-hidden pointer-events-none opacity-20">
            <div class="absolute top-20 left-10 w-16 h-16 border-2 border-primary-400 rotate-45 animate-fade-in"></div>
            <div class="absolute top-1/2 right-20 w-12 h-12 border-2 border-secondary-700 rounded-full animate-fade-in"
                style="animation-delay: 0.7s;"></div>
        </div>

        <div class="container-custom relative z-10">
            <div class="max-w-4xl mx-auto space-y-6">
                {{-- Breadcrumb Navigation --}}
                <div class="flex items-center gap-3 animate-fade-in">
                    <a href="{{ route('projects.index') }}"
                        class="group inline-flex items-center gap-2 px-4 py-2 border-2 border-neutral-300 hover:border-primary-600 hover:bg-primary-600 hover:text-white rounded-lg transition-all duration-300">
                        <svg class="h-4 w-4 group-hover:-translate-x-1 transition-all duration-300" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                            </path>
                        </svg>
                        <span>Portofolio</span>
                    </a>
                    <span class="text-neutral-400">/</span>
                    <span class="inline-flex items-center px-3 py-1 bg-neutral-100 text-neutral-700 text-sm rounded-lg">
                        {{ $project->businessField->name }}
                    </span>
                </div>

                {{-- Project Title --}}
                <div class="space-y-4 animate-fade-in" style="animation-delay: 0.1s;">
                    <div class="flex flex-wrap items-center gap-3">
                        {{-- Status Badge --}}
                        <span
                            class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium text-white
                            {{ $project->status === 'completed' ? 'bg-success-600' : ($project->status === 'ongoing' ? 'bg-info-600' : 'bg-warning-600') }}">
                            {{ $project->status === 'completed' ? 'Selesai' : ($project->status === 'ongoing' ? 'Berlangsung' : 'Perencanaan') }}
                        </span>

                        {{-- Featured Badge --}}
                        @if ($project->is_featured)
                            <span
                                class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium border-2 border-primary-600 text-primary-600">
                                <span
                                    class="inline-block w-2 h-2 bg-primary-600 rounded-full mr-1.5 animate-pulse"></span>
                                Proyek Unggulan
                            </span>
                        @endif
                    </div>

                    <h1 class="text-4xl md:text-6xl font-heading leading-tight text-secondary-900">
                        {{ $project->title }}
                    </h1>
                </div>

                {{-- Project Meta Info --}}
                <div class="flex flex-wrap gap-6 text-sm text-neutral-600 animate-fade-in"
                    style="animation-delay: 0.2s;">
                    {{-- Client --}}
                    <div class="flex items-center gap-2">
                        <div class="w-8 h-8 rounded-full bg-primary-100 flex items-center justify-center">
                            <svg class="h-4 w-4 text-primary-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <div>
                            <div class="text-xs text-neutral-500">Klien</div>
                            <div class="font-semibold text-secondary-900">{{ $project->client_name }}</div>
                        </div>
                    </div>

                    {{-- Location --}}
                    <div class="flex items-center gap-2">
                        <div class="w-8 h-8 rounded-full bg-primary-100 flex items-center justify-center">
                            <svg class="h-4 w-4 text-primary-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                </path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <div class="text-xs text-neutral-500">Lokasi</div>
                            <div class="font-semibold text-secondary-900">{{ $project->location }}</div>
                        </div>
                    </div>

                    {{-- Views --}}
                    <div class="flex items-center gap-2">
                        <div class="w-8 h-8 rounded-full bg-primary-100 flex items-center justify-center">
                            <svg class="h-4 w-4 text-primary-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <div class="text-xs text-neutral-500">Dilihat</div>
                            <div class="font-semibold text-secondary-900">{{ number_format($project->views_count) }}
                                kali</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Project Details --}}
    <section class="py-12 bg-white">
        <div class="container-custom">
            <div class="max-w-6xl mx-auto space-y-8">

                {{-- Gallery Carousel - NEW --}}
                @if ($project->galleries && $project->galleries->count() > 0)
                    <div x-data="projectGallery({{ $project->galleries->count() }})" class="relative">
                        {{-- Main Carousel --}}
                        <div class="relative aspect-video rounded-2xl overflow-hidden bg-neutral-200 shadow-2xl">
                            @foreach ($project->galleries as $index => $gallery)
                                <div x-show="currentSlide === {{ $index }}"
                                    x-transition:enter="transition-opacity duration-500"
                                    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                    x-transition:leave="transition-opacity duration-500"
                                    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                    class="absolute inset-0" style="{{ $index !== 0 ? 'display: none;' : '' }}">
                                    @if (filter_var($gallery->image_path, FILTER_VALIDATE_URL))
                                        <img src="{{ $gallery->image_path }}"
                                            alt="{{ $gallery->caption ?? $project->title }}"
                                            class="w-full h-full object-cover">
                                    @else
                                        <img src="{{ asset('storage/' . $gallery->image_path) }}"
                                            alt="{{ $gallery->caption ?? $project->title }}"
                                            class="w-full h-full object-cover">
                                    @endif

                                    {{-- Caption Overlay --}}
                                    @if ($gallery->caption)
                                        <div
                                            class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-secondary-900/90 via-secondary-900/60 to-transparent p-6">
                                            <p class="text-white text-sm md:text-base font-medium">
                                                {{ $gallery->caption }}</p>
                                        </div>
                                    @endif
                                </div>
                            @endforeach

                            {{-- Navigation Arrows --}}
                            <button @click="prevSlide()"
                                class="absolute left-4 top-1/2 -translate-y-1/2 w-12 h-12 bg-white/90 hover:bg-white rounded-full flex items-center justify-center shadow-lg transition-all duration-300 group"
                                aria-label="Previous image">
                                <svg class="w-6 h-6 text-secondary-900 group-hover:-translate-x-1 transition-transform"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 19l-7-7 7-7"></path>
                                </svg>
                            </button>
                            <button @click="nextSlide()"
                                class="absolute right-4 top-1/2 -translate-y-1/2 w-12 h-12 bg-white/90 hover:bg-white rounded-full flex items-center justify-center shadow-lg transition-all duration-300 group"
                                aria-label="Next image">
                                <svg class="w-6 h-6 text-secondary-900 group-hover:translate-x-1 transition-transform"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7"></path>
                                </svg>
                            </button>

                            {{-- Counter --}}
                            <div
                                class="absolute top-4 right-4 bg-secondary-900/80 backdrop-blur-sm text-white px-4 py-2 rounded-lg text-sm font-medium">
                                <span x-text="currentSlide + 1"></span> / <span x-text="totalSlides"></span>
                            </div>
                        </div>

                        {{-- Thumbnails --}}
                        <div class="mt-4 grid grid-cols-4 md:grid-cols-6 lg:grid-cols-8 gap-2">
                            @foreach ($project->galleries as $index => $gallery)
                                <button @click="goToSlide({{ $index }})"
                                    :class="currentSlide === {{ $index }} ? 'ring-2 ring-primary-600 ring-offset-2' :
                                        'ring-1 ring-neutral-300 hover:ring-primary-400'"
                                    class="aspect-video rounded-lg overflow-hidden transition-all duration-300 focus:outline-none">
                                    @if (filter_var($gallery->image_path, FILTER_VALIDATE_URL))
                                        <img src="{{ $gallery->image_path }}" alt="Thumbnail {{ $index + 1 }}"
                                            class="w-full h-full object-cover">
                                    @else
                                        <img src="{{ asset('storage/' . $gallery->image_path) }}"
                                            alt="Thumbnail {{ $index + 1 }}" class="w-full h-full object-cover">
                                    @endif
                                </button>
                            @endforeach
                        </div>
                    </div>
                @else
                    {{-- Fallback jika tidak ada gallery --}}
                    <div class="relative aspect-video rounded-2xl overflow-hidden bg-neutral-200 shadow-xl group">
                        @if ($project->thumbnail && filter_var($project->thumbnail, FILTER_VALIDATE_URL))
                            <img src="{{ $project->thumbnail }}" alt="{{ $project->title }}"
                                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                        @elseif($project->thumbnail)
                            <img src="{{ asset('storage/' . $project->thumbnail) }}" alt="{{ $project->title }}"
                                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                        @else
                            <div
                                class="w-full h-full bg-gradient-to-br from-primary-400 via-primary-600 to-secondary-700 flex items-center justify-center">
                                <span
                                    class="text-white text-9xl font-heading opacity-20">{{ substr($project->title, 0, 1) }}</span>
                            </div>
                        @endif
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-secondary-900/50 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                        </div>
                    </div>
                @endif

                {{-- Tags - FIXED --}}
                @if ($project->tags && $project->tags->count() > 0)
                    <div class="flex flex-wrap gap-2">
                        @foreach ($project->tags as $tag)
                            <span
                                class="inline-flex items-center px-3 py-1 bg-neutral-100 text-neutral-700 text-xs font-medium rounded-lg hover:bg-primary-100 hover:text-primary-700 transition-all duration-300">
                                <svg class="w-3 h-3 mr-1.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M17.707 9.293a1 1 0 010 1.414l-7 7a1 1 0 01-1.414 0l-7-7A.997.997 0 012 10V5a3 3 0 013-3h5c.256 0 .512.098.707.293l7 7zM5 6a1 1 0 100-2 1 1 0 000 2z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                {{ $tag->name }}
                            </span>
                        @endforeach
                    </div>
                @endif

                {{-- TWO COLUMN LAYOUT - Periode/Nilai/Luas + Deskripsi --}}
                <div class="grid lg:grid-cols-3 gap-8">

                    {{-- LEFT: Project Stats (1/3) --}}
                    <div class="lg:col-span-1 space-y-6">
                        <h2 class="text-xl font-heading font-bold text-secondary-900 flex items-center gap-2">
                            <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                                </path>
                            </svg>
                            Informasi Proyek
                        </h2>

                        {{-- Periode --}}
                        <div
                            class="bg-neutral-50 border border-neutral-200 rounded-xl p-4 hover:border-primary-600 hover:shadow-md transition-all duration-300">
                            <div class="flex items-center gap-2 mb-2">
                                <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                                <span class="text-xs font-semibold text-neutral-500 uppercase">Periode</span>
                            </div>
                            <p class="font-bold text-secondary-900">
                                {{ \Carbon\Carbon::parse($project->start_date)->translatedFormat('F Y') }}</p>
                            @if ($project->end_date)
                                <p class="text-sm text-neutral-600 mt-1">s/d
                                    {{ \Carbon\Carbon::parse($project->end_date)->translatedFormat('F Y') }}</p>
                            @else
                                <p class="text-sm text-info-600 font-medium mt-1">Sedang Berjalan</p>
                            @endif
                        </div>

                        {{-- Durasi --}}
                        @if ($project->duration_months)
                            <div
                                class="bg-neutral-50 border border-neutral-200 rounded-xl p-4 hover:border-primary-600 hover:shadow-md transition-all duration-300">
                                <div class="flex items-center gap-2 mb-2">
                                    <svg class="w-5 h-5 text-info-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span class="text-xs font-semibold text-neutral-500 uppercase">Durasi</span>
                                </div>
                                <p class="text-2xl font-bold text-secondary-900">{{ $project->duration_months }}</p>
                                <p class="text-sm text-neutral-600">Bulan</p>
                            </div>
                        @endif

                        {{-- Nilai Proyek --}}
                        @if ($project->project_value)
                            <div
                                class="bg-neutral-50 border border-neutral-200 rounded-xl p-4 hover:border-primary-600 hover:shadow-md transition-all duration-300">
                                <div class="flex items-center gap-2 mb-2">
                                    <svg class="w-5 h-5 text-success-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                        </path>
                                    </svg>
                                    <span class="text-xs font-semibold text-neutral-500 uppercase">Nilai Proyek</span>
                                </div>
                                <p class="text-lg font-bold text-secondary-900">Rp
                                    {{ number_format($project->project_value, 0, ',', '.') }}</p>
                            </div>
                        @endif

                        {{-- Luas Area --}}
                        @if ($project->area_size)
                            <div
                                class="bg-neutral-50 border border-neutral-200 rounded-xl p-4 hover:border-primary-600 hover:shadow-md transition-all duration-300">
                                <div class="flex items-center gap-2 mb-2">
                                    <svg class="w-5 h-5 text-warning-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4">
                                        </path>
                                    </svg>
                                    <span class="text-xs font-semibold text-neutral-500 uppercase">Luas Area</span>
                                </div>
                                <p class="text-2xl font-bold text-secondary-900">{{ $project->area_size }}</p>
                            </div>
                        @endif
                    </div>

                    {{-- RIGHT: Description (2/3) --}}
                    <div class="lg:col-span-2">
                        <div
                            class="bg-neutral-50 border border-neutral-200 rounded-xl p-6 hover:border-primary-600 hover:shadow-md transition-all duration-300">
                            <h2 class="text-xl font-heading font-bold text-secondary-900 mb-4 flex items-center gap-2">
                                <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                    </path>
                                </svg>
                                Deskripsi Proyek
                            </h2>
                            <div class="prose prose-neutral max-w-none">
                                <p class="text-neutral-700 leading-relaxed whitespace-pre-line">
                                    {{ $project->description }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Testimonials Section --}}
                @if ($project->testimonials && $project->testimonials->count() > 0)
                    <div class="space-y-6 pt-4">
                        <h2 class="text-2xl font-heading font-bold text-secondary-900 flex items-center gap-2">
                            <svg class="w-6 h-6 text-warning-600" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                </path>
                            </svg>
                            Testimoni Klien
                        </h2>

                        <div class="grid md:grid-cols-2 gap-6">
                            @foreach ($project->testimonials as $testimonial)
                                <div
                                    class="bg-neutral-50 border border-neutral-200 rounded-xl p-6 hover:border-primary-600 hover:shadow-md transition-all duration-300">
                                    {{-- Rating --}}
                                    <div class="flex items-center gap-1 mb-4">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <svg class="w-5 h-5 {{ $i <= $testimonial->rating ? 'text-warning-500 fill-warning-500' : 'text-neutral-300 fill-neutral-300' }}"
                                                viewBox="0 0 20 20">
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                                </path>
                                            </svg>
                                        @endfor
                                    </div>

                                    {{-- Quote --}}
                                    <p class="text-neutral-700 italic mb-4 leading-relaxed">
                                        "{{ $testimonial->testimonial }}"
                                    </p>

                                    {{-- Client Info --}}
                                    <div class="flex items-center gap-3 pt-4 border-t border-neutral-200">
                                        <div
                                            class="w-12 h-12 bg-primary-100 rounded-full flex items-center justify-center flex-shrink-0">
                                            <span
                                                class="text-primary-600 font-bold text-lg">{{ substr($testimonial->client_name, 0, 1) }}</span>
                                        </div>
                                        <div>
                                            <p class="font-semibold text-secondary-900">
                                                {{ $testimonial->client_name }}</p>
                                            <p class="text-sm text-neutral-600">{{ $testimonial->position }}</p>
                                            <p class="text-sm text-primary-600 font-medium">
                                                {{ $testimonial->company }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                {{-- Related Projects --}}
                @if ($relatedProjects->count() > 0)
                    <div class="space-y-6 pt-4">
                        <div class="flex items-center justify-between">
                            <h2 class="text-2xl font-heading font-bold text-secondary-900">Proyek Terkait</h2>
                            <a href="{{ route('projects.index') }}"
                                class="text-primary-600 hover:text-primary-700 font-medium text-sm flex items-center gap-1 group">
                                <span>Lihat Semua</span>
                                <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            @foreach ($relatedProjects as $relProject)
                                <a href="{{ route('projects.show', $relProject->slug) }}"
                                    class="card group overflow-hidden hover:shadow-xl transition-all duration-300">
                                    {{-- Image --}}
                                    <div class="aspect-video relative overflow-hidden bg-neutral-200">
                                        @if ($relProject->thumbnail && filter_var($relProject->thumbnail, FILTER_VALIDATE_URL))
                                            <img src="{{ $relProject->thumbnail }}" alt="{{ $relProject->title }}"
                                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                        @elseif($relProject->thumbnail)
                                            <img src="{{ asset('storage/' . $relProject->thumbnail) }}"
                                                alt="{{ $relProject->title }}"
                                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                        @else
                                            <div
                                                class="w-full h-full bg-gradient-to-br from-primary-400 to-secondary-700 flex items-center justify-center">
                                                <span
                                                    class="text-white text-6xl font-heading opacity-20">{{ substr($relProject->title, 0, 1) }}</span>
                                            </div>
                                        @endif

                                        {{-- Status Badge --}}
                                        <div class="absolute top-3 right-3">
                                            <span
                                                class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold text-white backdrop-blur-sm
                                        {{ $relProject->status === 'completed' ? 'bg-success-600/90' : ($relProject->status === 'ongoing' ? 'bg-info-600/90' : 'bg-warning-600/90') }}">
                                                {{ $relProject->status === 'completed' ? 'Selesai' : ($relProject->status === 'ongoing' ? 'Berlangsung' : 'Perencanaan') }}
                                            </span>
                                        </div>
                                    </div>

                                    {{-- Content --}}
                                    <div class="p-5">
                                        <span
                                            class="text-xs font-semibold text-primary-600 uppercase tracking-wide">{{ $relProject->businessField->name }}</span>
                                        <h3
                                            class="text-lg font-heading font-bold text-secondary-900 mt-2 mb-3 line-clamp-2 group-hover:text-primary-600 transition-colors">
                                            {{ $relProject->title }}
                                        </h3>
                                        <div class="flex items-center gap-2 text-sm text-neutral-600">
                                            <svg class="h-4 w-4" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                                </path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            </svg>
                                            <span class="truncate">{{ $relProject->location }}</span>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif

                {{-- CTA Section --}}
                <div
                    class="bg-gradient-to-br from-secondary-900 to-secondary-800 text-white rounded-2xl p-8 md:p-10 text-center space-y-4">
                    <h3 class="text-2xl md:text-3xl font-heading font-bold">Tertarik dengan Proyek Serupa?</h3>
                    <p class="text-white/90 max-w-2xl mx-auto">
                        Konsultasikan kebutuhan konstruksi Anda dengan tim ahli kami
                    </p>
                    <a href="{{ route('home') }}#contact"
                        class="inline-flex items-center bg-primary-600 hover:bg-primary-700 text-white font-semibold px-8 py-4 rounded-lg transition-all duration-300 shadow-lg hover:shadow-xl">
                        <span>Hubungi Kami</span>
                        <svg class="ml-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- Alpine.js Script for Gallery Carousel --}}
    @push('scripts')
        <script>
            function projectGallery(total) {
                return {
                    currentSlide: 0,
                    totalSlides: total,

                    init() {
                        // Auto-rotate setiap 5 detik
                        setInterval(() => {
                            this.nextSlide();
                        }, 5000);

                        // Keyboard navigation
                        document.addEventListener('keydown', (e) => {
                            if (e.key === 'ArrowLeft') this.prevSlide();
                            if (e.key === 'ArrowRight') this.nextSlide();
                        });
                    },

                    nextSlide() {
                        this.currentSlide = (this.currentSlide + 1) % this.totalSlides;
                    },

                    prevSlide() {
                        this.currentSlide = (this.currentSlide - 1 + this.totalSlides) % this.totalSlides;
                    },

                    goToSlide(index) {
                        this.currentSlide = index;
                    }
                }
            }
        </script>
    @endpush

</x-layouts.public>
