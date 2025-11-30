<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {!! SEO::generate() !!}

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

    {{-- Alpine.js Hero Slideshow Component --}}
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('heroSlideshow', () => ({
                currentSlide: 0,
                totalSlides: 3,

                init() {
                    // Auto-rotate slides every 5 seconds
                    setInterval(() => {
                        this.nextSlide();
                    }, 5000);
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
            }));
        });
    </script>
</head>

<body class="font-sans antialiased bg-neutral-50">

    <x-header />

    <main>
        {{ $slot }}
    </main>

    <x-footer />

    @livewireScripts

    {{-- Stack for additional scripts --}}
    @stack('scripts')
</body>

</html>
