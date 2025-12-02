<x-layouts.public>

    {{-- Hero Section --}}
    <section class="relative pt-32 pb-24 overflow-hidden">
        {{-- Animated Background --}}
        <div class="absolute inset-0">
            <div class="absolute inset-0 bg-gradient-to-br from-primary-50 via-primary-100/50 to-white"></div>
            <div class="absolute inset-0 opacity-20">
                <div class="absolute inset-0"
                    style="background-image: linear-gradient(to right, rgb(229 231 235) 1px, transparent 1px), linear-gradient(to bottom, rgb(229 231 235) 1px, transparent 1px); background-size: 60px 60px;">
                </div>
            </div>
        </div>

        {{-- Floating Icons --}}
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <svg class="absolute top-1/4 left-10 w-16 h-16 text-primary-600/20 animate-fade-in" fill="none"
                stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                </path>
            </svg>
            <svg class="absolute top-1/2 right-20 w-14 h-14 text-primary-600/20 animate-fade-in"
                style="animation-delay: 0.5s;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z">
                </path>
            </svg>
            <svg class="absolute bottom-1/4 left-1/3 w-12 h-12 text-primary-600/15 animate-fade-in"
                style="animation-delay: 1s;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                </path>
            </svg>
        </div>

        <div class="container-custom relative z-10">
            <div class="max-w-4xl mx-auto text-center space-y-6">
                <div
                    class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-primary-600/10 border border-primary-600/20 animate-fade-in">
                    <svg class="w-4 h-4 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                        </path>
                    </svg>
                    <span class="text-sm font-semibold text-primary-600">Data Korporasi</span>
                </div>

                <div class="space-y-4 animate-fade-in" style="animation-delay: 0.1s;">
                    <h1 class="text-5xl md:text-7xl font-heading leading-tight text-secondary-900">
                        Data Perusahaan
                    </h1>
                    <div class="flex items-center justify-center gap-4">
                        <div
                            class="h-1 w-20 bg-gradient-to-r from-transparent via-primary-600 to-transparent rounded-full">
                        </div>
                    </div>
                </div>

                <p class="text-xl md:text-2xl text-neutral-600 animate-fade-in leading-relaxed"
                    style="animation-delay: 0.2s;">
                    Informasi Legal, Sertifikasi, dan Struktur Organisasi Perusahaan
                </p>
            </div>
        </div>
    </section>

    {{-- Company Legal Info --}}
    <section class="py-16 bg-neutral-50">
        <div class="container-custom">
            <div class="max-w-6xl mx-auto space-y-8">
                <div class="text-center space-y-4">
                    <div
                        class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-primary-600/10 border border-primary-600/20">
                        <svg class="w-4 h-4 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                            </path>
                        </svg>
                        <span class="text-sm font-semibold text-primary-600">Legal Entity</span>
                    </div>
                    <h2 class="text-3xl md:text-4xl font-heading font-bold text-secondary-900">Informasi Legal
                        Perusahaan</h2>
                </div>

                <div class="grid md:grid-cols-2 gap-6">
                    @foreach ($legalDocuments as $index => $doc)
                        @if ($doc['number'] && $doc['number'] !== '-')
                            <div class="card p-6 hover:shadow-xl transition-all duration-300 animate-fade-in"
                                style="animation-delay: {{ $index * 100 }}ms;">
                                <div class="flex items-start gap-4">
                                    <div
                                        class="w-12 h-12 rounded-lg bg-primary-100 flex items-center justify-center flex-shrink-0">
                                        <svg class="w-6 h-6 text-primary-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                            </path>
                                        </svg>
                                    </div>
                                    <div class="flex-1">
                                        <h3 class="text-lg font-heading font-bold text-secondary-900 mb-1">
                                            {{ $doc['type'] }}</h3>
                                        <p class="text-sm text-neutral-600 mb-2">{{ $doc['name'] }}</p>
                                        <p
                                            class="font-mono text-sm text-primary-600 bg-primary-50 px-3 py-1 rounded inline-block">
                                            {{ $doc['number'] }}</p>

                                        @if ($doc['file'])
                                            <div class="mt-3">
                                                <a href="{{ asset('storage/' . $doc['file']) }}" target="_blank"
                                                    class="inline-flex items-center gap-2 text-sm text-primary-600 hover:text-primary-700 font-medium">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                                        </path>
                                                    </svg>
                                                    <span>Lihat Dokumen</span>
                                                </a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- Certifications --}}
    <section class="py-16 bg-white">
        <div class="container-custom">
            <div class="max-w-6xl mx-auto space-y-8">
                <div class="text-center space-y-4">
                    <div
                        class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-primary-600/10 border border-primary-600/20">
                        <svg class="w-4 h-4 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z">
                            </path>
                        </svg>
                        <span class="text-sm font-semibold text-primary-600">Certifications</span>
                    </div>
                    <h2 class="text-3xl md:text-4xl font-heading font-bold text-secondary-900">Sertifikasi & Lisensi
                    </h2>
                    <p class="text-neutral-600 max-w-2xl mx-auto">
                        Komitmen kami terhadap standar kualitas internasional dan kepatuhan regulasi
                    </p>
                </div>

                @foreach (['ISO', 'K3', 'SBU'] as $type)
                    @if (!empty($certificationsByType[$type]))
                        <div class="space-y-4">
                            <h3 class="text-xl font-heading font-bold text-secondary-900 flex items-center gap-2">
                                <span class="w-2 h-8 bg-primary-600 rounded"></span>
                                {{ $type === 'ISO' ? 'Sertifikasi ISO' : ($type === 'K3' ? 'Sertifikasi Keselamatan & Kesehatan Kerja' : 'Sertifikat Badan Usaha') }}
                            </h3>
                            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                                @foreach ($certificationsByType[$type] as $index => $cert)
                                    <div class="card p-6 hover:shadow-xl transition-all duration-300 animate-fade-in"
                                        style="animation-delay: {{ $index * 100 }}ms;">
                                        <div
                                            class="w-14 h-14 rounded-lg bg-primary-100 flex items-center justify-center mb-4">
                                            <svg class="w-7 h-7 text-primary-600" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                                                </path>
                                            </svg>
                                        </div>
                                        <h4 class="text-lg font-heading font-bold text-secondary-900 mb-3">
                                            {{ $cert['name'] }}</h4>
                                        <div class="space-y-2 text-sm">
                                            <div>
                                                <span class="text-neutral-500">No. Sertifikat:</span>
                                                <p class="font-mono text-xs mt-1 bg-neutral-100 px-2 py-1 rounded">
                                                    {{ $cert['number'] }}</p>
                                            </div>
                                            <div>
                                                <span class="text-neutral-500">Dikeluarkan oleh:</span>
                                                <p class="mt-1 text-neutral-700">{{ $cert['issued_by'] }}</p>
                                            </div>
                                            <span
                                                class="inline-block mt-2 px-3 py-1 bg-primary-100 text-primary-700 text-xs font-semibold rounded-full">{{ $cert['type'] }}</span>
                                        </div>
                                        @if (isset($cert['expired_date']))
                                            <div class="pt-3 mt-3 border-t border-neutral-200">
                                                <div class="flex items-center gap-2 text-xs text-neutral-600">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                        </path>
                                                    </svg>
                                                    <span>Berlaku hingga:
                                                        {{ \Carbon\Carbon::parse($cert['expired_date'])->translatedFormat('F Y') }}</span>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>

    {{-- Board of Commissioners --}}
    @if ($legalData->board_of_commissioners && count($legalData->board_of_commissioners) > 0)
        <section class="py-16 bg-neutral-50">
            <div class="container-custom">
                <div class="max-w-6xl mx-auto space-y-8">
                    <div class="text-center space-y-4">
                        <div
                            class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-primary-600/10 border border-primary-600/20">
                            <svg class="w-4 h-4 text-primary-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                </path>
                            </svg>
                            <span class="text-sm font-semibold text-primary-600">Board of Commissioners</span>
                        </div>
                        <h2 class="text-3xl md:text-4xl font-heading font-bold text-secondary-900">Dewan Komisaris</h2>
                    </div>

                    <div class="grid md:grid-cols-2 gap-6">
                        @foreach ($legalData->board_of_commissioners as $index => $member)
                            <div class="card p-6 hover:shadow-xl transition-all duration-300 animate-fade-in"
                                style="animation-delay: {{ $index * 100 }}ms;">
                                <div class="flex gap-4">
                                    <div
                                        class="w-20 h-20 rounded-full bg-gradient-to-br from-primary-600 to-primary-400 flex items-center justify-center flex-shrink-0">
                                        @if (isset($member['photo']) && $member['photo'])
                                            <img src="{{ asset('storage/' . $member['photo']) }}"
                                                alt="{{ $member['name'] }}"
                                                class="w-full h-full rounded-full object-cover">
                                        @else
                                            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                                </path>
                                            </svg>
                                        @endif
                                    </div>
                                    <div class="flex-1">
                                        <h3 class="text-xl font-heading font-bold text-secondary-900">
                                            {{ $member['name'] }}</h3>
                                        <p class="text-primary-600 font-semibold">{{ $member['position'] }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif

    {{-- Board of Directors --}}
    @if ($legalData->board_of_directors && count($legalData->board_of_directors) > 0)
        <section class="py-16 bg-white">
            <div class="container-custom">
                <div class="max-w-6xl mx-auto space-y-8">
                    <div class="text-center space-y-4">
                        <div
                            class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-primary-600/10 border border-primary-600/20">
                            <svg class="w-4 h-4 text-primary-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                </path>
                            </svg>
                            <span class="text-sm font-semibold text-primary-600">Board of Directors</span>
                        </div>
                        <h2 class="text-3xl md:text-4xl font-heading font-bold text-secondary-900">Dewan Direksi</h2>
                    </div>

                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($legalData->board_of_directors as $index => $member)
                            <div class="card p-6 hover:shadow-xl transition-all duration-300 text-center animate-fade-in"
                                style="animation-delay: {{ $index * 100 }}ms;">
                                <div
                                    class="w-20 h-20 rounded-full bg-gradient-to-br from-primary-400 to-primary-600 flex items-center justify-center mx-auto mb-4">
                                    @if (isset($member['photo']) && $member['photo'])
                                        <img src="{{ asset('storage/' . $member['photo']) }}"
                                            alt="{{ $member['name'] }}"
                                            class="w-full h-full rounded-full object-cover">
                                    @else
                                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                    @endif
                                </div>
                                <h3 class="text-lg font-heading font-bold text-secondary-900">{{ $member['name'] }}
                                </h3>
                                <p class="text-primary-600 font-semibold text-sm mt-1">{{ $member['position'] }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif

    {{-- Management Team --}}
    @if ($legalData->management_team && count($legalData->management_team) > 0)
        <section class="py-16 bg-neutral-50">
            <div class="container-custom">
                <div class="max-w-6xl mx-auto space-y-8">
                    <div class="text-center space-y-4">
                        <div
                            class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-primary-600/10 border border-primary-600/20">
                            <svg class="w-4 h-4 text-primary-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                </path>
                            </svg>
                            <span class="text-sm font-semibold text-primary-600">Management Team</span>
                        </div>
                        <h2 class="text-3xl md:text-4xl font-heading font-bold text-secondary-900">Tim Manajemen</h2>
                    </div>

                    <div class="grid md:grid-cols-2 gap-6">
                        @foreach ($legalData->management_team as $index => $member)
                            <div class="card p-6 hover:shadow-xl transition-all duration-300 animate-fade-in"
                                style="animation-delay: {{ $index * 100 }}ms;">
                                <div class="flex gap-4">
                                    <div
                                        class="w-16 h-16 rounded-lg bg-gradient-to-br from-primary-100 to-primary-50 flex items-center justify-center flex-shrink-0">
                                        @if (isset($member['photo']) && $member['photo'])
                                            <img src="{{ asset('storage/' . $member['photo']) }}"
                                                alt="{{ $member['name'] }}"
                                                class="w-full h-full rounded-lg object-cover">
                                        @else
                                            <svg class="w-8 h-8 text-primary-600" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                                </path>
                                            </svg>
                                        @endif
                                    </div>
                                    <div class="flex-1">
                                        <h3 class="text-lg font-heading font-bold text-secondary-900">
                                            {{ $member['name'] }}</h3>
                                        <p class="text-primary-600 font-semibold text-sm">{{ $member['position'] }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif

</x-layouts.public>
