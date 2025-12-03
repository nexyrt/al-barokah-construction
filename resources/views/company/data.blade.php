<x-layouts.public>

    {{-- Hero Section - Simple & Professional --}}
    <section
        class="relative pt-32 pb-20 overflow-hidden bg-gradient-to-br from-zinc-50 via-white to-zinc-50 dark:from-zinc-900 dark:via-zinc-900 dark:to-zinc-800">
        {{-- Subtle Grid Pattern --}}
        <div class="absolute inset-0 opacity-[0.03] dark:opacity-[0.05]">
            <div class="absolute inset-0"
                style="background-image: linear-gradient(to right, currentColor 1px, transparent 1px), linear-gradient(to bottom, currentColor 1px, transparent 1px); background-size: 48px 48px;">
            </div>
        </div>

        {{-- Content --}}
        <div class="container-custom relative z-10">
            <div class="max-w-4xl mx-auto text-center space-y-8">
                {{-- Badge --}}
                <div
                    class="inline-flex items-center gap-2 px-5 py-2 rounded-full bg-primary-50 dark:bg-primary-900/20 border border-primary-100 dark:border-primary-800 animate-fade-in">
                    <svg class="w-4 h-4 text-primary-600 dark:text-primary-400" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                        </path>
                    </svg>
                    <span class="text-sm font-semibold text-primary-700 dark:text-primary-300">Data Korporasi</span>
                </div>

                {{-- Title --}}
                <div class="space-y-4 animate-fade-in" style="animation-delay: 0.1s;">
                    <h1 class="text-5xl md:text-7xl font-heading font-bold text-zinc-900 dark:text-zinc-50">
                        Data Perusahaan
                    </h1>
                    <div class="flex items-center justify-center gap-3">
                        <div class="h-px w-12 bg-primary-600 dark:bg-primary-400"></div>
                        <div class="h-1.5 w-1.5 rounded-full bg-primary-600 dark:bg-primary-400"></div>
                        <div class="h-px w-12 bg-primary-600 dark:bg-primary-400"></div>
                    </div>
                </div>

                {{-- Description --}}
                <p class="text-xl text-zinc-600 dark:text-zinc-400 max-w-2xl mx-auto animate-fade-in"
                    style="animation-delay: 0.2s;">
                    Informasi Legal, Sertifikasi, dan Struktur Organisasi Perusahaan
                </p>
            </div>
        </div>
    </section>

    {{-- Company Legal Info - Compact Design --}}
    <section class="py-16 bg-zinc-50 dark:bg-zinc-900/30">
        <div class="container-custom">
            <div class="max-w-6xl mx-auto space-y-8">
                {{-- Header --}}
                <div class="text-center space-y-4 animate-fade-in">
                    <div
                        class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-primary-50 dark:bg-primary-900/20 border border-primary-200 dark:border-primary-800">
                        <svg class="w-4 h-4 text-primary-600 dark:text-primary-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                            </path>
                        </svg>
                        <span class="text-sm font-semibold text-primary-600 dark:text-primary-400">Legal Entity</span>
                    </div>
                    <h2 class="text-3xl md:text-4xl font-heading font-bold text-zinc-900 dark:text-zinc-50">
                        Informasi Legal Perusahaan
                    </h2>
                </div>

                {{-- Compact Table Layout --}}
                <div class="bg-white dark:bg-zinc-800 rounded-xl border border-zinc-200 dark:border-zinc-700 shadow-sm overflow-hidden animate-fade-in"
                    style="animation-delay: 0.1s;">
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr
                                    class="bg-zinc-50 dark:bg-zinc-900/50 border-b border-zinc-200 dark:border-zinc-700">
                                    <th
                                        class="px-6 py-4 text-left text-sm font-semibold text-zinc-900 dark:text-zinc-50 whitespace-nowrap">
                                        Dokumen
                                    </th>
                                    <th
                                        class="px-6 py-4 text-left text-sm font-semibold text-zinc-900 dark:text-zinc-50 whitespace-nowrap">
                                        Nomor / Keterangan
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-zinc-200 dark:divide-zinc-700">
                                @if ($legalData)
                                    {{-- NIB --}}
                                    @if ($legalData->nib)
                                        <tr class="hover:bg-zinc-50 dark:hover:bg-zinc-900/30 transition-colors">
                                            <td class="px-6 py-4">
                                                <div class="flex items-center gap-3">
                                                    <div
                                                        class="w-10 h-10 rounded-lg bg-primary-50 dark:bg-primary-900/20 flex items-center justify-center flex-shrink-0">
                                                        <svg class="w-5 h-5 text-primary-600 dark:text-primary-400"
                                                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                                            </path>
                                                        </svg>
                                                    </div>
                                                    <div>
                                                        <p class="font-semibold text-zinc-900 dark:text-zinc-50">NIB</p>
                                                        <p class="text-xs text-zinc-500 dark:text-zinc-400">Nomor Induk
                                                            Berusaha</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4">
                                                <code
                                                    class="text-sm font-mono text-primary-600 dark:text-primary-400 bg-primary-50 dark:bg-primary-900/20 px-3 py-1 rounded">
                                                    {{ $legalData->nib }}
                                                </code>
                                            </td>
                                        </tr>
                                    @endif

                                    {{-- SIUJK --}}
                                    @if ($legalData->siujk)
                                        <tr class="hover:bg-zinc-50 dark:hover:bg-zinc-900/30 transition-colors">
                                            <td class="px-6 py-4">
                                                <div class="flex items-center gap-3">
                                                    <div
                                                        class="w-10 h-10 rounded-lg bg-blue-50 dark:bg-blue-900/20 flex items-center justify-center flex-shrink-0">
                                                        <svg class="w-5 h-5 text-blue-600 dark:text-blue-400"
                                                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                                            </path>
                                                        </svg>
                                                    </div>
                                                    <div>
                                                        <p class="font-semibold text-zinc-900 dark:text-zinc-50">SIUJK
                                                        </p>
                                                        <p class="text-xs text-zinc-500 dark:text-zinc-400">Surat Izin
                                                            Usaha Jasa Konstruksi</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4">
                                                <code
                                                    class="text-sm font-mono text-blue-600 dark:text-blue-400 bg-blue-50 dark:bg-blue-900/20 px-3 py-1 rounded">
                                                    {{ $legalData->siujk }}
                                                </code>
                                            </td>
                                        </tr>
                                    @endif

                                    {{-- TDP --}}
                                    @if ($legalData->tdp)
                                        <tr class="hover:bg-zinc-50 dark:hover:bg-zinc-900/30 transition-colors">
                                            <td class="px-6 py-4">
                                                <div class="flex items-center gap-3">
                                                    <div
                                                        class="w-10 h-10 rounded-lg bg-green-50 dark:bg-green-900/20 flex items-center justify-center flex-shrink-0">
                                                        <svg class="w-5 h-5 text-green-600 dark:text-green-400"
                                                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z">
                                                            </path>
                                                        </svg>
                                                    </div>
                                                    <div>
                                                        <p class="font-semibold text-zinc-900 dark:text-zinc-50">TDP
                                                        </p>
                                                        <p class="text-xs text-zinc-500 dark:text-zinc-400">Tanda
                                                            Daftar Perusahaan</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4">
                                                <code
                                                    class="text-sm font-mono text-green-600 dark:text-green-400 bg-green-50 dark:bg-green-900/20 px-3 py-1 rounded">
                                                    {{ $legalData->tdp }}
                                                </code>
                                            </td>
                                        </tr>
                                    @endif

                                    {{-- Akta Pendirian --}}
                                    @if ($legalData->akta_pendirian)
                                        <tr class="hover:bg-zinc-50 dark:hover:bg-zinc-900/30 transition-colors">
                                            <td class="px-6 py-4">
                                                <div class="flex items-center gap-3">
                                                    <div
                                                        class="w-10 h-10 rounded-lg bg-purple-50 dark:bg-purple-900/20 flex items-center justify-center flex-shrink-0">
                                                        <svg class="w-5 h-5 text-purple-600 dark:text-purple-400"
                                                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z">
                                                            </path>
                                                        </svg>
                                                    </div>
                                                    <div>
                                                        <p class="font-semibold text-zinc-900 dark:text-zinc-50">Akta
                                                            Pendirian</p>
                                                        <p class="text-xs text-zinc-500 dark:text-zinc-400">Deed of
                                                            Establishment</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4">
                                                <p class="text-sm text-zinc-700 dark:text-zinc-300">
                                                    {{ $legalData->akta_pendirian }}
                                                </p>
                                            </td>
                                        </tr>
                                    @endif

                                    {{-- SK Kemenkumham --}}
                                    @if ($legalData->sk_kemenkumham)
                                        <tr class="hover:bg-zinc-50 dark:hover:bg-zinc-900/30 transition-colors">
                                            <td class="px-6 py-4">
                                                <div class="flex items-center gap-3">
                                                    <div
                                                        class="w-10 h-10 rounded-lg bg-orange-50 dark:bg-orange-900/20 flex items-center justify-center flex-shrink-0">
                                                        <svg class="w-5 h-5 text-orange-600 dark:text-orange-400"
                                                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                                                            </path>
                                                        </svg>
                                                    </div>
                                                    <div>
                                                        <p class="font-semibold text-zinc-900 dark:text-zinc-50">SK
                                                            Kemenkumham</p>
                                                        <p class="text-xs text-zinc-500 dark:text-zinc-400">Ministry
                                                            Decree</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4">
                                                <p class="text-sm text-zinc-700 dark:text-zinc-300">
                                                    {{ $legalData->sk_kemenkumham }}
                                                </p>
                                            </td>
                                        </tr>
                                    @endif

                                    {{-- Domisili Usaha --}}
                                    @if ($legalData->domisili_usaha)
                                        <tr class="hover:bg-zinc-50 dark:hover:bg-zinc-900/30 transition-colors">
                                            <td class="px-6 py-4">
                                                <div class="flex items-center gap-3">
                                                    <div
                                                        class="w-10 h-10 rounded-lg bg-cyan-50 dark:bg-cyan-900/20 flex items-center justify-center flex-shrink-0">
                                                        <svg class="w-5 h-5 text-cyan-600 dark:text-cyan-400"
                                                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                                            </path>
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z">
                                                            </path>
                                                        </svg>
                                                    </div>
                                                    <div>
                                                        <p class="font-semibold text-zinc-900 dark:text-zinc-50">
                                                            Domisili Usaha</p>
                                                        <p class="text-xs text-zinc-500 dark:text-zinc-400">Business
                                                            Domicile</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4">
                                                <p class="text-sm text-zinc-700 dark:text-zinc-300">
                                                    {{ $legalData->domisili_usaha }}
                                                </p>
                                            </td>
                                        </tr>
                                    @endif
                                @else
                                    <tr>
                                        <td colspan="2" class="px-6 py-12 text-center">
                                            <div class="flex flex-col items-center gap-3">
                                                <svg class="w-12 h-12 text-zinc-300 dark:text-zinc-600" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                                    </path>
                                                </svg>
                                                <p class="text-zinc-500 dark:text-zinc-400">Informasi legal belum
                                                    tersedia</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
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
                        <svg class="w-4 h-4 text-primary-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
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
