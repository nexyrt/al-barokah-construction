<x-layouts.public>

    {{-- Hero Section --}}
    <section class="relative pt-32 pb-24 overflow-hidden">
        {{-- Dynamic Gradient Background --}}
        <div class="absolute inset-0">
            <div class="absolute inset-0 bg-gradient-to-br from-secondary-900 via-secondary-900/90 to-primary-600/40">
            </div>
            <div class="absolute inset-0 opacity-20">
                <div class="absolute top-0 right-0 w-96 h-96 bg-primary-600 rounded-full blur-3xl animate-pulse"></div>
                <div class="absolute bottom-0 left-0 w-96 h-96 bg-secondary-900 rounded-full blur-3xl animate-pulse"
                    style="animation-delay: 1s;"></div>
            </div>
        </div>

        {{-- Animated Icons --}}
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <svg class="absolute top-20 left-1/4 w-12 h-12 text-primary-400/20 animate-fade-in" fill="none"
                stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                </path>
            </svg>
            <svg class="absolute top-1/3 right-1/4 w-10 h-10 text-primary-400/30 animate-fade-in"
                style="animation-delay: 0.5s;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                </path>
            </svg>
            <svg class="absolute bottom-1/3 left-1/3 w-14 h-14 text-primary-400/20 animate-fade-in"
                style="animation-delay: 1s;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                </path>
            </svg>
        </div>

        <div class="container-custom relative z-10">
            <div class="max-w-4xl mx-auto text-center text-white space-y-8">
                {{-- Badge --}}
                <div
                    class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-primary-600/20 backdrop-blur-sm border border-primary-400/30 animate-fade-in">
                    <div class="w-2 h-2 bg-primary-400 rounded-full animate-pulse"></div>
                    <span class="text-sm font-semibold text-primary-400">Tersedia 24/7</span>
                </div>

                {{-- Main Heading --}}
                <div class="space-y-4 animate-fade-in" style="animation-delay: 0.1s;">
                    <h1 class="text-5xl md:text-7xl font-heading font-bold leading-tight text-white">
                        Mari Berbicara
                        <span class="block text-primary-400 mt-2">Tentang Proyek Anda</span>
                    </h1>
                    <div class="flex items-center justify-center gap-4">
                        <div
                            class="h-1 w-20 bg-gradient-to-r from-transparent via-primary-400 to-transparent rounded-full">
                        </div>
                    </div>
                </div>

                {{-- Description --}}
                <p class="text-xl md:text-2xl text-white/90 leading-relaxed max-w-2xl mx-auto animate-fade-in"
                    style="animation-delay: 0.2s;">
                    Siap memulai proyek konstruksi Anda? Hubungi kami untuk konsultasi gratis dan dapatkan penawaran
                    terbaik
                </p>

                {{-- Quick Contact Buttons --}}
                <div class="flex flex-wrap justify-center gap-4 pt-4 animate-fade-in" style="animation-delay: 0.3s;">
                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $company->whatsapp ?? '6281234567890') }}"
                        target="_blank" rel="noopener noreferrer"
                        class="inline-flex items-center gap-2 px-6 py-3 bg-primary-600 hover:bg-primary-500 text-white rounded-full font-semibold transition-all duration-300 hover:scale-105 shadow-lg">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                            </path>
                        </svg>
                        WhatsApp Kami
                    </a>
                    <a href="tel:{{ $company->phone ?? '0541123456' }}"
                        class="inline-flex items-center gap-2 px-6 py-3 bg-white/10 hover:bg-white/20 backdrop-blur-sm text-white rounded-full font-semibold border border-white/30 transition-all duration-300 hover:scale-105">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                            </path>
                        </svg>
                        Hubungi Langsung
                    </a>
                </div>
            </div>
        </div>
    </section>



    {{-- Main Contact Section --}}
    <section class="py-16 bg-neutral-50 ">
        <div class="container-custom">
            <div class="grid lg:grid-cols-3 gap-8">

                {{-- LEFT SIDE: Contact Info Cards --}}
                <div class="lg:col-span-1 space-y-6">

                    {{-- Office Address Card --}}
                    <div
                        class="bg-white border-2 border-neutral-200 rounded-2xl p-6 hover:border-primary-600 hover:shadow-xl transition-all duration-300">
                        <div class="flex items-start gap-4">
                            <div
                                class="w-12 h-12 bg-primary-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-primary-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                    </path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-lg font-heading font-bold text-secondary-900 mb-2">Alamat Kantor</h3>
                                <p class="text-neutral-700 leading-relaxed">
                                    {{ $company->address ?? 'Jl. Soekarno Hatta No. 123' }}<br>
                                    {{ $company->city ?? 'Samarinda' }},
                                    {{ $company->province ?? 'Kalimantan Timur' }}<br>
                                    Indonesia
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- Phone Card --}}
                    <div
                        class="bg-white border-2 border-neutral-200 rounded-2xl p-6 hover:border-primary-600 hover:shadow-xl transition-all duration-300">
                        <div class="flex items-start gap-4">
                            <div
                                class="w-12 h-12 bg-success-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-success-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                    </path>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-lg font-heading font-bold text-secondary-900 mb-2">Telepon & WhatsApp
                                </h3>
                                <div class="space-y-2">
                                    <a href="tel:{{ $company->phone ?? '0541123456' }}"
                                        class="block text-neutral-700 hover:text-primary-600 transition-colors">
                                        <span class="font-medium">Telepon:</span>
                                        {{ $company->phone ?? '0541-123456' }}
                                    </a>
                                    @if ($company?->whatsapp)
                                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $company->whatsapp) }}"
                                            target="_blank"
                                            class="block text-success-600 hover:text-success-700 transition-colors font-medium">
                                            <span class="font-medium">WhatsApp:</span> {{ $company->whatsapp }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Email Card --}}
                    <div
                        class="bg-white border-2 border-neutral-200 rounded-2xl p-6 hover:border-primary-600 hover:shadow-xl transition-all duration-300">
                        <div class="flex items-start gap-4">
                            <div
                                class="w-12 h-12 bg-info-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-info-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                    </path>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-lg font-heading font-bold text-secondary-900 mb-2">Email</h3>
                                <a href="mailto:{{ $company->email ?? 'info@albarokah.co.id' }}"
                                    class="text-neutral-700 hover:text-primary-600 transition-colors">
                                    {{ $company->email ?? 'info@albarokah.co.id' }}
                                </a>
                            </div>
                        </div>
                    </div>

                    {{-- Operating Hours Card --}}
                    <div
                        class="bg-white border-2 border-neutral-200 rounded-2xl p-6 hover:border-primary-600 hover:shadow-xl transition-all duration-300">
                        <div class="flex items-start gap-4">
                            <div
                                class="w-12 h-12 bg-warning-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-warning-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-lg font-heading font-bold text-secondary-900 mb-2">Jam Operasional</h3>
                                <p class="text-neutral-700 leading-relaxed">
                                    {{ $company->operating_hours ?? 'Senin - Jumat: 08:00 - 17:00 WIB' }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- RIGHT SIDE: Contact Form --}}
                <div class="lg:col-span-2">
                    <div
                        class="bg-white border-2 border-neutral-200 rounded-2xl p-8 hover:border-primary-600 hover:shadow-xl transition-all duration-300">
                        <div class="mb-6">
                            <h2 class="text-2xl md:text-3xl font-heading font-bold text-secondary-900 mb-2">Kirim Pesan
                            </h2>
                            <p class="text-neutral-600">Isi formulir di bawah ini dan tim kami akan segera menghubungi
                                Anda</p>
                        </div>

                        {{-- Success Message --}}
                        @if (session('success'))
                            <div
                                class="mb-6 p-4 bg-success-100 border border-success-200 text-success-700 rounded-lg flex items-start gap-3">
                                <svg class="w-5 h-5 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span>{{ session('success') }}</span>
                            </div>
                        @endif

                        <form action="{{ route('contact.submit') }}" method="POST" class="space-y-6">
                            @csrf

                            {{-- Name & Email Row --}}
                            <div class="grid md:grid-cols-2 gap-6">
                                <div>
                                    <label for="name" class="block text-sm font-semibold text-secondary-900 mb-2">
                                        Nama Lengkap <span class="text-danger-600">*</span>
                                    </label>
                                    <input type="text" id="name" name="name" required
                                        class="w-full px-4 py-3 border-2 border-neutral-300 rounded-lg focus:border-primary-600 focus:ring-2 focus:ring-primary-200 transition-all"
                                        placeholder="John Doe">
                                    @error('name')
                                        <p class="mt-1 text-sm text-danger-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="email" class="block text-sm font-semibold text-secondary-900 mb-2">
                                        Email <span class="text-danger-600">*</span>
                                    </label>
                                    <input type="email" id="email" name="email" required
                                        class="w-full px-4 py-3 border-2 border-neutral-300 rounded-lg focus:border-primary-600 focus:ring-2 focus:ring-primary-200 transition-all"
                                        placeholder="john@example.com">
                                    @error('email')
                                        <p class="mt-1 text-sm text-danger-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            {{-- Phone & Subject Row --}}
                            <div class="grid md:grid-cols-2 gap-6">
                                <div>
                                    <label for="phone" class="block text-sm font-semibold text-secondary-900 mb-2">
                                        Nomor Telepon <span class="text-danger-600">*</span>
                                    </label>
                                    <input type="tel" id="phone" name="phone" required
                                        class="w-full px-4 py-3 border-2 border-neutral-300 rounded-lg focus:border-primary-600 focus:ring-2 focus:ring-primary-200 transition-all"
                                        placeholder="0812-3456-7890">
                                    @error('phone')
                                        <p class="mt-1 text-sm text-danger-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="subject" class="block text-sm font-semibold text-secondary-900 mb-2">
                                        Subjek <span class="text-danger-600">*</span>
                                    </label>
                                    <input type="text" id="subject" name="subject" required
                                        class="w-full px-4 py-3 border-2 border-neutral-300 rounded-lg focus:border-primary-600 focus:ring-2 focus:ring-primary-200 transition-all"
                                        placeholder="Konsultasi Proyek">
                                    @error('subject')
                                        <p class="mt-1 text-sm text-danger-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            {{-- Message --}}
                            <div>
                                <label for="message" class="block text-sm font-semibold text-secondary-900 mb-2">
                                    Pesan <span class="text-danger-600">*</span>
                                </label>
                                <textarea id="message" name="message" rows="6" required
                                    class="w-full px-4 py-3 border-2 border-neutral-300 rounded-lg focus:border-primary-600 focus:ring-2 focus:ring-primary-200 transition-all resize-none"
                                    placeholder="Ceritakan kebutuhan proyek Anda..."></textarea>
                                @error('message')
                                    <p class="mt-1 text-sm text-danger-600">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Submit Button --}}
                            <button type="submit"
                                class="w-full bg-secondary-900 hover:bg-primary-600 text-white font-semibold px-8 py-4 rounded-lg transition-all duration-300 flex items-center justify-center gap-2 hover:shadow-xl hover:scale-[1.02]">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                                </svg>
                                <span>Kirim Pesan</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Maps Section --}}
    <section class="py-16 bg-white mt-16">
        <div class="container-custom">
            <div class="text-center mb-8">
                <h2 class="text-3xl md:text-4xl font-heading font-bold text-secondary-900 mb-2">Lokasi Kantor Kami</h2>
                <p class="text-neutral-600">Temukan kami di peta untuk kunjungan langsung</p>
            </div>

            {{-- Google Maps Embed --}}
            <div class="rounded-2xl overflow-hidden shadow-2xl border-4 border-neutral-200">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d127641.84530313282!2d117.06326534335938!3d-0.5021653999999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2df67f5cf9c3f3a5%3A0x4037697e3f1f7b0!2sSamarinda%2C%20Kota%20Samarinda%2C%20Kalimantan%20Timur!5e0!3m2!1sid!2sid!4v1234567890123!5m2!1sid!2sid"
                    width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade" class="w-full"></iframe>
            </div>

            {{-- Map Info Cards Below --}}
            <div class="grid md:grid-cols-3 gap-6 mt-8">
                <div class="bg-neutral-50 border border-neutral-200 rounded-xl p-6 text-center">
                    <div class="inline-flex items-center justify-center w-12 h-12 bg-primary-100 rounded-full mb-3">
                        <svg class="w-6 h-6 text-primary-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7">
                            </path>
                        </svg>
                    </div>
                    <h3 class="font-semibold text-secondary-900 mb-1">Akses Mudah</h3>
                    <p class="text-sm text-neutral-600">Lokasi strategis di pusat kota</p>
                </div>

                <div class="bg-neutral-50 border border-neutral-200 rounded-xl p-6 text-center">
                    <div class="inline-flex items-center justify-center w-12 h-12 bg-primary-100 rounded-full mb-3">
                        <svg class="w-6 h-6 text-primary-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2">
                            </path>
                        </svg>
                    </div>
                    <h3 class="font-semibold text-secondary-900 mb-1">Parkir Luas</h3>
                    <p class="text-sm text-neutral-600">Area parkir yang memadai</p>
                </div>

                <div class="bg-neutral-50 border border-neutral-200 rounded-xl p-6 text-center">
                    <div class="inline-flex items-center justify-center w-12 h-12 bg-primary-100 rounded-full mb-3">
                        <svg class="w-6 h-6 text-primary-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="font-semibold text-secondary-900 mb-1">Buka Setiap Hari</h3>
                    <p class="text-sm text-neutral-600">Senin - Jumat, 08:00 - 17:00</p>
                </div>
            </div>
        </div>
    </section>

</x-layouts.public>
