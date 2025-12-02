<x-layouts.public>

    {{-- Hero Section --}}
    <section class="relative pt-32 pb-20 overflow-hidden bg-white">
        {{-- Animated Grid Background --}}
        <div class="absolute inset-0 opacity-[0.03]">
            <div class="absolute inset-0"
                style="background-image: linear-gradient(rgb(37, 58, 45) 1px, transparent 1px), linear-gradient(90deg, rgb(37, 58, 45) 1px, transparent 1px); background-size: 50px 50px;">
            </div>
        </div>

        {{-- Gradient Overlays --}}
        <div class="absolute top-0 left-0 w-full h-full">
            <div class="absolute top-20 -left-20 w-72 h-72 bg-primary-200/30 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute bottom-20 -right-20 w-96 h-96 bg-secondary-200/20 rounded-full blur-3xl animate-pulse"
                style="animation-delay: 1.5s;"></div>
        </div>

        <div class="container-custom relative z-10">
            <div class="max-w-4xl mx-auto text-center space-y-8">
                <div class="inline-flex items-center gap-3 animate-fade-in">
                    <div class="h-px w-12 bg-gradient-to-r from-transparent to-primary-600"></div>
                    <span class="text-primary-600 font-semibold tracking-widest uppercase text-sm">
                        Layanan Kami
                    </span>
                    <div class="h-px w-12 bg-gradient-to-l from-transparent to-primary-600"></div>
                </div>

                <h1 class="text-5xl md:text-7xl font-heading font-bold leading-tight text-secondary-900 animate-fade-in"
                    style="animation-delay: 0.1s;">
                    Bidang Usaha
                    <span
                        class="block text-transparent bg-clip-text bg-gradient-to-r from-primary-600 to-primary-500 mt-2">
                        Konstruksi Terpadu
                    </span>
                </h1>

                <p class="text-lg md:text-xl text-neutral-600 leading-relaxed max-w-2xl mx-auto animate-fade-in"
                    style="animation-delay: 0.2s;">
                    Al-Barokah menyediakan layanan konstruksi terpadu dengan spesialisasi di berbagai bidang untuk
                    memenuhi kebutuhan pembangunan Anda
                </p>
            </div>
        </div>
    </section>

    {{-- Business Fields Grid - IMPROVED CARDS --}}
    <section class="py-16 md:py-24 bg-neutral-50">
        <div class="container-custom">
            <div class="grid md:grid-cols-2 gap-8">
                @foreach ($businessFields as $index => $field)
                    <div class="group relative bg-white border-2 border-neutral-200 rounded-2xl overflow-hidden hover:border-primary-600 hover:shadow-2xl transition-all duration-500 animate-fade-in"
                        style="animation-delay: {{ $index * 100 }}ms;">

                        {{-- Top Accent Bar --}}
                        <div
                            class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-primary-600 to-primary-500 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500">
                        </div>

                        {{-- Card Content --}}
                        <div class="p-8">
                            {{-- Header --}}
                            <div class="flex items-start gap-4 mb-6">
                                {{-- Icon --}}
                                <div
                                    class="w-16 h-16 rounded-2xl bg-gradient-to-br from-primary-100 to-primary-50 flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
                                    <x-icon name="{{ $field->icon }}" class="w-8 h-8 text-primary-600" />
                                </div>

                                {{-- Title & Badge --}}
                                <div class="flex-1">
                                    <h3
                                        class="text-2xl font-heading font-bold text-secondary-900 mb-2 group-hover:text-primary-600 transition-colors duration-300">
                                        {{ $field->name }}
                                    </h3>
                                    <span
                                        class="inline-flex items-center gap-2 px-3 py-1 bg-primary-100 text-primary-700 text-sm font-semibold rounded-full">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                                            </path>
                                        </svg>
                                        {{ $field->projects_count }} Proyek
                                    </span>
                                </div>
                            </div>

                            {{-- Short Description --}}
                            <p class="text-neutral-600 font-medium mb-4 leading-relaxed">
                                {{ $field->short_description }}
                            </p>

                            {{-- Full Description --}}
                            <p class="text-neutral-600 mb-6 leading-relaxed">
                                {{ $field->description }}
                            </p>

                            {{-- Divider --}}
                            <div class="border-t border-neutral-200 my-6"></div>

                            {{-- Footer with Button --}}
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-2 text-sm text-neutral-500">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span>Tersedia</span>
                                </div>

                                <a href="{{ route('business-fields.show', $field->slug) }}"
                                    class="inline-flex items-center gap-2 px-6 py-3 bg-secondary-900 hover:bg-primary-600 text-white font-semibold rounded-lg transition-all duration-300 group-hover:shadow-lg group-hover:scale-105">
                                    <span>Pelajari Lebih Lanjut</span>
                                    <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>

                        {{-- Background Pattern --}}
                        <div
                            class="absolute top-0 right-0 w-32 h-32 opacity-0 group-hover:opacity-5 transition-opacity duration-500">
                            <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                                <path fill="currentColor"
                                    d="M44.7,-76.4C58.8,-69.2,71.8,-59.1,79.6,-45.8C87.4,-32.6,90,-16.3,88.5,-0.9C87,14.6,81.4,29.2,73.1,42.3C64.8,55.4,53.8,67,40.6,74.7C27.4,82.3,13.7,86,-0.1,86.1C-13.9,86.3,-27.8,82.9,-40.5,75.6C-53.2,68.3,-64.7,57.1,-72.9,43.8C-81.1,30.5,-86,15.2,-86.2,-0.1C-86.4,-15.5,-81.9,-31,-74.4,-44.8C-66.9,-58.6,-56.4,-70.7,-43.3,-78.4C-30.2,-86.1,-15.1,-89.4,0.3,-89.9C15.7,-90.4,31.4,-87.9,44.7,-76.4Z"
                                    transform="translate(100 100)" class="text-primary-600" />
                            </svg>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Why Choose Us Section - NEW --}}
    <section class="py-16 md:py-24 bg-white">
        <div class="container-custom">
            <div class="max-w-4xl mx-auto text-center mb-12">
                <h2 class="text-3xl md:text-5xl font-heading font-bold text-secondary-900 mb-4">
                    Mengapa Memilih Kami?
                </h2>
                <p class="text-lg text-neutral-600">
                    Komitmen kami adalah memberikan layanan terbaik dengan standar kualitas tinggi
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                {{-- Feature 1 --}}
                <div class="text-center group">
                    <div
                        class="inline-flex items-center justify-center w-16 h-16 bg-primary-100 group-hover:bg-primary-600 rounded-2xl mb-4 transition-all duration-300">
                        <svg class="w-8 h-8 text-primary-600 group-hover:text-white transition-colors" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-heading font-bold text-secondary-900 mb-2">Berpengalaman</h3>
                    <p class="text-neutral-600">25+ tahun pengalaman dalam industri konstruksi</p>
                </div>

                {{-- Feature 2 --}}
                <div class="text-center group">
                    <div
                        class="inline-flex items-center justify-center w-16 h-16 bg-primary-100 group-hover:bg-primary-600 rounded-2xl mb-4 transition-all duration-300">
                        <svg class="w-8 h-8 text-primary-600 group-hover:text-white transition-colors" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-heading font-bold text-secondary-900 mb-2">Kualitas Terjamin</h3>
                    <p class="text-neutral-600">Standar kualitas internasional dengan sertifikasi resmi</p>
                </div>

                {{-- Feature 3 --}}
                <div class="text-center group">
                    <div
                        class="inline-flex items-center justify-center w-16 h-16 bg-primary-100 group-hover:bg-primary-600 rounded-2xl mb-4 transition-all duration-300">
                        <svg class="w-8 h-8 text-primary-600 group-hover:text-white transition-colors" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-heading font-bold text-secondary-900 mb-2">Tim Professional</h3>
                    <p class="text-neutral-600">Tenaga ahli bersertifikat dan berpengalaman</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Process Section - NEW --}}
    <section class="py-16 md:py-24 bg-neutral-50">
        <div class="container-custom">
            <div class="max-w-4xl mx-auto text-center mb-12">
                <h2 class="text-3xl md:text-5xl font-heading font-bold text-secondary-900 mb-4">
                    Alur Kerja Kami
                </h2>
                <p class="text-lg text-neutral-600">
                    Proses yang terstruktur untuk hasil maksimal
                </p>
            </div>

            <div class="grid md:grid-cols-4 gap-6">
                {{-- Step 1 --}}
                <div class="relative">
                    <div
                        class="bg-white border-2 border-primary-200 rounded-2xl p-6 hover:border-primary-600 hover:shadow-lg transition-all duration-300">
                        <div
                            class="inline-flex items-center justify-center w-12 h-12 bg-primary-600 text-white font-bold text-xl rounded-full mb-4">
                            1</div>
                        <h3 class="text-lg font-heading font-bold text-secondary-900 mb-2">Konsultasi</h3>
                        <p class="text-sm text-neutral-600">Diskusi kebutuhan dan analisis proyek</p>
                    </div>
                    {{-- Arrow --}}
                    <div class="hidden md:block absolute top-1/2 -right-3 transform -translate-y-1/2">
                        <svg class="w-6 h-6 text-primary-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                            </path>
                        </svg>
                    </div>
                </div>

                {{-- Step 2 --}}
                <div class="relative">
                    <div
                        class="bg-white border-2 border-primary-200 rounded-2xl p-6 hover:border-primary-600 hover:shadow-lg transition-all duration-300">
                        <div
                            class="inline-flex items-center justify-center w-12 h-12 bg-primary-600 text-white font-bold text-xl rounded-full mb-4">
                            2</div>
                        <h3 class="text-lg font-heading font-bold text-secondary-900 mb-2">Perencanaan</h3>
                        <p class="text-sm text-neutral-600">Desain dan estimasi biaya proyek</p>
                    </div>
                    <div class="hidden md:block absolute top-1/2 -right-3 transform -translate-y-1/2">
                        <svg class="w-6 h-6 text-primary-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                            </path>
                        </svg>
                    </div>
                </div>

                {{-- Step 3 --}}
                <div class="relative">
                    <div
                        class="bg-white border-2 border-primary-200 rounded-2xl p-6 hover:border-primary-600 hover:shadow-lg transition-all duration-300">
                        <div
                            class="inline-flex items-center justify-center w-12 h-12 bg-primary-600 text-white font-bold text-xl rounded-full mb-4">
                            3</div>
                        <h3 class="text-lg font-heading font-bold text-secondary-900 mb-2">Eksekusi</h3>
                        <p class="text-sm text-neutral-600">Pelaksanaan konstruksi sesuai timeline</p>
                    </div>
                    <div class="hidden md:block absolute top-1/2 -right-3 transform -translate-y-1/2">
                        <svg class="w-6 h-6 text-primary-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                            </path>
                        </svg>
                    </div>
                </div>

                {{-- Step 4 --}}
                <div
                    class="bg-white border-2 border-primary-200 rounded-2xl p-6 hover:border-primary-600 hover:shadow-lg transition-all duration-300">
                    <div
                        class="inline-flex items-center justify-center w-12 h-12 bg-primary-600 text-white font-bold text-xl rounded-full mb-4">
                        4</div>
                    <h3 class="text-lg font-heading font-bold text-secondary-900 mb-2">Serah Terima</h3>
                    <p class="text-sm text-neutral-600">Quality check dan handover proyek</p>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="bg-gradient-to-br from-secondary-900 to-secondary-800 text-white py-16">
        <div class="container-custom text-center">
            <div class="max-w-3xl mx-auto space-y-6">
                <div
                    class="inline-flex items-center justify-center w-16 h-16 bg-white/10 backdrop-blur-sm rounded-2xl mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                        </path>
                    </svg>
                </div>
                <h2 class="text-3xl md:text-4xl font-heading text-white font-bold">
                    Butuh Konsultasi Proyek Konstruksi?
                </h2>
                <p class="text-lg text-white/90">
                    Tim ahli kami siap membantu mewujudkan proyek konstruksi Anda dengan solusi terbaik
                </p>
                <a href="{{ route('home') }}#contact"
                    class="inline-flex items-center gap-2 bg-primary-600 hover:bg-primary-700 text-white font-semibold px-8 py-4 rounded-lg transition-all duration-300 shadow-lg hover:shadow-xl hover:scale-105">
                    <span>Hubungi Kami</span>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                    </svg>
                </a>
            </div>
        </div>
    </section>

</x-layouts.public>
