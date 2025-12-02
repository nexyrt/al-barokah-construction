<x-layouts.public>

    {{-- Hero Section --}}
    <section class="relative pt-32 pb-24 overflow-hidden">
        {{-- Background with overlay --}}
        <div class="absolute inset-0">
            @if ($businessField->hero_image)
                <img src="{{ asset('storage/' . $businessField->hero_image) }}" alt="{{ $businessField->name }}"
                    class="w-full h-full object-cover">
                <div
                    class="absolute inset-0 bg-gradient-to-br from-secondary-900/95 via-secondary-900/85 to-primary-600/40">
                </div>
            @else
                <div
                    class="absolute inset-0 bg-gradient-to-br from-secondary-900 via-secondary-900/90 to-primary-600/40">
                </div>
            @endif

            {{-- Animated Grid --}}
            <div class="absolute inset-0 opacity-10">
                <div class="absolute inset-0"
                    style="background-image: linear-gradient(to right, white 1px, transparent 1px), linear-gradient(to bottom, white 1px, transparent 1px); background-size: 60px 60px;">
                </div>
            </div>
        </div>

        {{-- Floating Icons --}}
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <svg class="absolute top-20 right-20 w-20 h-20 text-white/10 animate-fade-in" fill="none"
                stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                </path>
            </svg>
            <svg class="absolute bottom-32 left-10 w-16 h-16 text-white/10 animate-fade-in"
                style="animation-delay: 0.5s;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                </path>
            </svg>
        </div>

        <div class="container-custom relative z-10">
            <div class="max-w-4xl mx-auto">
                {{-- Breadcrumb --}}
                <nav class="flex items-center gap-2 text-sm mb-8 animate-fade-in">
                    <a href="{{ route('home') }}" class="text-white/70 hover:text-white transition-colors">Beranda</a>
                    <svg class="w-4 h-4 text-white/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                    <a href="{{ route('business-fields.index') }}"
                        class="text-white/70 hover:text-white transition-colors">Bidang Usaha</a>
                    <svg class="w-4 h-4 text-white/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                    <span class="text-white">{{ $businessField->name }}</span>
                </nav>

                <div class="text-center space-y-6">
                    {{-- Icon --}}
                    <div
                        class="inline-flex items-center justify-center w-20 h-20 rounded-2xl bg-white/10 backdrop-blur-sm border border-white/20 animate-fade-in">
                        <x-icon name="{{ $businessField->icon }}" class="w-10 h-10 text-white" />
                    </div>

                    {{-- Title --}}
                    <div class="space-y-4 animate-fade-in" style="animation-delay: 0.1s;">
                        <h1 class="text-5xl md:text-6xl font-heading font-bold text-white leading-tight">
                            {{ $businessField->name }}
                        </h1>
                        <div class="flex items-center justify-center gap-4">
                            <div
                                class="h-1 w-20 bg-gradient-to-r from-transparent via-primary-400 to-transparent rounded-full">
                            </div>
                        </div>
                    </div>

                    {{-- Description --}}
                    <p class="text-xl text-white/90 max-w-2xl mx-auto animate-fade-in leading-relaxed"
                        style="animation-delay: 0.2s;">
                        {{ $businessField->description }}
                    </p>

                    {{-- Stats --}}
                    <div class="flex flex-wrap items-center justify-center gap-6 pt-4 animate-fade-in"
                        style="animation-delay: 0.3s;">
                        <div
                            class="flex items-center gap-2 px-4 py-2 rounded-full bg-white/10 backdrop-blur-sm border border-white/20">
                            <svg class="w-5 h-5 text-primary-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                </path>
                            </svg>
                            <span class="text-white font-semibold">{{ $totalProjects }} Proyek Selesai</span>
                        </div>

                        <a href="#projects" class="btn-primary flex items-center justify-between gap-2">
                            <span>Lihat Portofolio</span>
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Overview Section --}}
    @if ($businessField->long_description)
        <section class="py-16 bg-white">
            <div class="container-custom">
                <div class="max-w-4xl mx-auto">
                    <div class="prose prose-lg max-w-none">
                        <p class="text-neutral-600 leading-relaxed text-lg">
                            {{ $businessField->long_description }}
                        </p>
                    </div>
                </div>
            </div>
        </section>
    @endif

    {{-- Services Section --}}
    @if ($businessField->services && count($businessField->services) > 0)
        <section class="py-16 bg-neutral-50">
            <div class="container-custom">
                <div class="max-w-6xl mx-auto space-y-12">
                    <div class="text-center space-y-4">
                        <div
                            class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-primary-100 border border-primary-200">
                            <svg class="w-4 h-4 text-primary-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4">
                                </path>
                            </svg>
                            <span class="text-sm font-semibold text-primary-600">Layanan Kami</span>
                        </div>
                        <h2 class="text-3xl md:text-4xl font-heading font-bold text-secondary-900">Layanan yang Kami
                            Tawarkan</h2>
                        <p class="text-neutral-600 max-w-2xl mx-auto">
                            Berbagai layanan konstruksi profesional untuk memenuhi kebutuhan proyek Anda
                        </p>
                    </div>

                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($businessField->services as $index => $service)
                            <div class="card p-6 hover:shadow-xl hover:scale-105 transition-all duration-300 group animate-fade-in"
                                style="animation-delay: {{ $index * 100 }}ms;">
                                <div
                                    class="w-14 h-14 rounded-xl bg-gradient-to-br from-primary-100 to-primary-50 flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
                                    <x-icon name="{{ $service['icon'] }}" class="w-7 h-7 text-primary-600" />
                                </div>
                                <h3 class="text-lg font-heading font-bold text-secondary-900 mb-2">
                                    {{ $service['title'] }}</h3>
                                <p class="text-neutral-600 text-sm">{{ $service['description'] }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif

    {{-- Process Section --}}
    @if ($businessField->process_steps && count($businessField->process_steps) > 0)
        <section class="py-16 bg-white">
            <div class="container-custom">
                <div class="max-w-6xl mx-auto space-y-12">
                    <div class="text-center space-y-4">
                        <div
                            class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-primary-100 border border-primary-200">
                            <svg class="w-4 h-4 text-primary-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                                </path>
                            </svg>
                            <span class="text-sm font-semibold text-primary-600">Tahapan Kerja</span>
                        </div>
                        <h2 class="text-3xl md:text-4xl font-heading font-bold text-secondary-900">Proses Pengerjaan
                        </h2>
                        <p class="text-neutral-600 max-w-2xl mx-auto">
                            Alur kerja sistematis untuk memastikan proyek selesai tepat waktu dan sesuai standar
                        </p>
                    </div>

                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach ($businessField->process_steps as $index => $step)
                            <div class="relative animate-fade-in" style="animation-delay: {{ $index * 100 }}ms;">
                                {{-- Step Number --}}
                                <div
                                    class="absolute -top-6 -left-4 w-16 h-16 rounded-2xl bg-gradient-to-br from-primary-600 to-primary-500 flex items-center justify-center shadow-lg z-10">
                                    <span
                                        class="text-2xl font-heading font-bold text-white">{{ $step['step'] }}</span>
                                </div>

                                {{-- Card --}}
                                <div
                                    class="card p-6 pt-12 hover:shadow-xl transition-all duration-300 h-full border-2 border-transparent hover:border-primary-200">
                                    <div class="flex items-start gap-4 mb-4">
                                        <div
                                            class="w-12 h-12 rounded-lg bg-primary-100 flex items-center justify-center flex-shrink-0">
                                            <x-icon name="{{ $step['icon'] }}" class="w-6 h-6 text-primary-600" />
                                        </div>
                                        <h3 class="text-xl font-heading font-bold text-secondary-900 leading-tight">
                                            {{ $step['title'] }}</h3>
                                    </div>
                                    <p class="text-neutral-600">{{ $step['description'] }}</p>
                                </div>

                                {{-- Arrow Connector (hidden on mobile and last item) --}}
                                @if ($index < count($businessField->process_steps) - 1)
                                    <div
                                        class="hidden lg:block absolute top-1/2 -right-4 transform -translate-y-1/2 z-0">
                                        <svg class="w-8 h-8 text-primary-300" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                        </svg>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif

    {{-- Related Projects --}}
    @if ($projects->count() > 0)
        <section id="projects" class="py-16 bg-neutral-50">
            <div class="container-custom">
                <div class="max-w-6xl mx-auto space-y-12">
                    <div class="text-center space-y-4">
                        <div
                            class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-primary-100 border border-primary-200">
                            <svg class="w-4 h-4 text-primary-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                                </path>
                            </svg>
                            <span class="text-sm font-semibold text-primary-600">Portofolio</span>
                        </div>
                        <h2 class="text-3xl md:text-4xl font-heading font-bold text-secondary-900">Proyek yang Telah
                            Kami Kerjakan</h2>
                        <p class="text-neutral-600 max-w-2xl mx-auto">
                            Lihat hasil kerja kami di bidang {{ $businessField->name }}
                        </p>
                    </div>

                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($projects as $index => $project)
                            <a href="{{ route('projects.show', $project->slug) }}"
                                class="group card overflow-hidden hover:shadow-xl transition-all duration-300 animate-fade-in"
                                style="animation-delay: {{ $index * 100 }}ms;">
                                {{-- Image --}}
                                <div class="relative h-56 overflow-hidden bg-neutral-200">
                                    @php
                                        $thumbnail = $project->thumbnail ?? $project->galleries->first()?->image_path;
                                    @endphp

                                    @if ($thumbnail)
                                        @if (filter_var($thumbnail, FILTER_VALIDATE_URL))
                                            <img src="{{ $thumbnail }}" alt="{{ $project->title }}"
                                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                        @else
                                            <img src="{{ asset('storage/' . $thumbnail) }}"
                                                alt="{{ $project->title }}"
                                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                        @endif
                                    @else
                                        <div
                                            class="w-full h-full flex items-center justify-center bg-gradient-to-br from-primary-100 to-primary-50">
                                            <x-icon name="photo" class="w-16 h-16 text-primary-300" />
                                        </div>
                                    @endif

                                    {{-- Status Badge --}}
                                    <div class="absolute top-4 right-4">
                                        <span
                                            class="px-3 py-1 bg-green-500 text-white text-xs font-semibold rounded-full">
                                            Selesai
                                        </span>
                                    </div>
                                </div>

                                {{-- Content --}}
                                <div class="p-6 space-y-3">
                                    <h3
                                        class="text-lg font-heading font-bold text-secondary-900 line-clamp-2 group-hover:text-primary-600 transition-colors">
                                        {{ $project->title }}
                                    </h3>

                                    @if ($project->short_description)
                                        <p class="text-sm text-neutral-600 line-clamp-2">
                                            {{ $project->short_description }}</p>
                                    @endif

                                    <div
                                        class="flex items-center gap-4 pt-2 border-t border-neutral-200 text-xs text-neutral-500">
                                        <div class="flex items-center gap-1">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                                </path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            </svg>
                                            <span>{{ $project->location }}</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>

                    @if ($totalProjects > 6)
                        <div class="text-center">
                            <a href="{{ route('projects.index', ['business_field' => $businessField->id]) }}"
                                class="btn-outline-primary">
                                <span>Lihat Semua Proyek</span>
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                </svg>
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </section>
    @endif

    {{-- Other Services --}}
    @if ($otherFields->count() > 0)
        <section class="py-16 bg-white">
            <div class="container-custom">
                <div class="max-w-6xl mx-auto space-y-12">
                    <div class="text-center space-y-4">
                        <h2 class="text-3xl md:text-4xl font-heading font-bold text-secondary-900">Bidang Usaha Lainnya
                        </h2>
                        <p class="text-neutral-600">
                            Lihat layanan konstruksi lainnya yang kami tawarkan
                        </p>
                    </div>

                    <div class="grid md:grid-cols-3 gap-6">
                        @foreach ($otherFields as $index => $field)
                            <a href="{{ route('business-fields.show', $field->slug) }}"
                                class="card p-6 hover:shadow-xl hover:scale-105 transition-all duration-300 group animate-fade-in"
                                style="animation-delay: {{ $index * 100 }}ms;">
                                <div
                                    class="w-14 h-14 rounded-xl bg-gradient-to-br from-primary-100 to-primary-50 flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
                                    <x-icon name="{{ $field->icon }}" class="w-7 h-7 text-primary-600" />
                                </div>
                                <h3
                                    class="text-lg font-heading font-bold text-secondary-900 mb-2 group-hover:text-primary-600 transition-colors">
                                    {{ $field->name }}
                                </h3>
                                <p class="text-sm text-neutral-600 line-clamp-2">{{ $field->short_description }}</p>
                                <div class="flex items-center gap-2 mt-4 text-primary-600 font-semibold text-sm">
                                    <span>Pelajari Lebih Lanjut</span>
                                    <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                    </svg>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif

    {{-- CTA Section --}}
    <section class="py-16 bg-gradient-to-br from-secondary-900 to-secondary-800 relative overflow-hidden">
        {{-- Background Pattern --}}
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0"
                style="background-image: linear-gradient(to right, white 1px, transparent 1px), linear-gradient(to bottom, white 1px, transparent 1px); background-size: 40px 40px;">
            </div>
        </div>

        <div class="container-custom relative z-10">
            <div class="max-w-4xl mx-auto text-center space-y-8">
                <div class="space-y-4">
                    <h2 class="text-3xl md:text-4xl font-heading font-bold text-white">
                        Siap Memulai Proyek {{ $businessField->name }} Anda?
                    </h2>
                    <p class="text-xl text-white/80">
                        Konsultasikan kebutuhan proyek Anda dengan tim ahli kami secara gratis
                    </p>
                </div>

                <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                    <a href="{{ route('contact.index') }}"
                        class="btn-primary flex items-center justify-between gap-2 bg-white text-secondary-900 hover:bg-neutral-100">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                            </path>
                        </svg>
                        <span>Konsultasi Gratis</span>
                    </a>

                    <a href="https://wa.me/{{ $company->whatsapp ?? '6281234567890' }}?text=Halo, saya tertarik dengan layanan {{ $businessField->name }}"
                        target="_blank"
                        class="flex items-center justify-between gap-2 border border-white/70 hover:border-white px-6 py-3 rounded-lg text-white hover:bg-white/10 transition-all duration-300">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" />
                        </svg>
                        <span>Hubungi via WhatsApp</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

</x-layouts.public>
