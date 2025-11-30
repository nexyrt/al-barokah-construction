<div class="min-h-screen">

    {{-- Header Section --}}
    <section class="relative pt-32 pb-20 overflow-hidden">
        {{-- Animated Background --}}
        <div class="absolute inset-0 bg-gradient-to-br from-secondary-900 via-secondary-900/95 to-primary-600/20">
            <div class="absolute inset-0 opacity-10">
                <div class="absolute top-20 left-10 w-72 h-72 bg-primary-600 rounded-full blur-3xl animate-pulse"></div>
                <div class="absolute bottom-20 right-10 w-96 h-96 bg-primary-600/50 rounded-full blur-3xl animate-pulse"
                    style="animation-delay: 1s;"></div>
            </div>
        </div>

        {{-- Floating geometric shapes --}}
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute top-1/4 left-1/4 w-2 h-2 bg-primary-400/30 rounded-full animate-fade-in"></div>
            <div class="absolute top-1/3 right-1/3 w-3 h-3 bg-primary-400/20 rounded-full animate-fade-in"
                style="animation-delay: 0.5s;"></div>
            <div class="absolute bottom-1/3 left-1/2 w-2 h-2 bg-primary-400/40 rounded-full animate-fade-in"
                style="animation-delay: 1s;"></div>
        </div>

        <div class="container-custom relative z-10">
            <div class="max-w-4xl mx-auto text-center text-white space-y-6">
                <div class="inline-block animate-fade-in">
                    <span class="text-primary-400 font-semibold tracking-widest uppercase text-sm">
                        Karya Kami
                    </span>
                </div>
                <h1 class="text-5xl md:text-7xl font-heading font-bold leading-tight animate-fade-in text-white"
                    style="animation-delay: 0.1s;">
                    PORTOFOLIO
                    <span class="block text-primary-400 mt-2">PROYEK</span>
                </h1>
                <p class="text-lg md:text-xl text-white/90 leading-relaxed max-w-2xl mx-auto animate-fade-in"
                    style="animation-delay: 0.2s;">
                    Eksplorasi berbagai proyek konstruksi berkualitas yang telah kami kerjakan dengan dedikasi dan
                    profesionalisme tinggi
                </p>
            </div>
        </div>
    </section>

    {{-- Filters Section --}}
    <section class="py-8 bg-white border-b border-neutral-200 sticky top-20 z-40 backdrop-blur-sm">
        <div class="container-custom">
            <div class="flex flex-col md:flex-row gap-4">
                {{-- Search --}}
                <div class="flex-1 relative">
                    <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-neutral-400" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                    <input type="text" wire:model.live.debounce.300ms="searchTerm"
                        placeholder="Cari proyek, klien, atau lokasi..."
                        class="w-full pl-10 pr-4 py-2.5 border border-neutral-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all" />
                </div>

                {{-- Business Field Filter --}}
                <div class="w-full md:w-[200px]">
                    <select wire:model.live="selectedField"
                        class="w-full px-4 py-2.5 border border-neutral-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all">
                        <option value="all">Semua Bidang</option>
                        @foreach ($businessFields as $field)
                            <option value="{{ $field->id }}">{{ $field->name }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Status Filter --}}
                <div class="w-full md:w-[180px]">
                    <select wire:model.live="selectedStatus"
                        class="w-full px-4 py-2.5 border border-neutral-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all">
                        <option value="all">Semua Status</option>
                        <option value="completed">Selesai</option>
                        <option value="ongoing">Dalam Pengerjaan</option>
                        <option value="planning">Perencanaan</option>
                    </select>
                </div>

                {{-- Sort --}}
                <div class="w-full md:w-[180px]">
                    <select wire:model.live="sortBy"
                        class="w-full px-4 py-2.5 border border-neutral-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all">
                        <option value="newest">Terbaru</option>
                        <option value="oldest">Terlama</option>
                        <option value="a-z">A-Z</option>
                        <option value="views">Paling Banyak Dilihat</option>
                    </select>
                </div>
            </div>

            <div class="mt-4 text-sm text-neutral-600">
                Menampilkan {{ $projects->count() }} dari {{ $totalPublished }} proyek
            </div>
        </div>
    </section>

    {{-- Projects Grid --}}
    <section class="py-12 bg-neutral-50 min-h-[400px]">
        <div class="container-custom">
            @if ($projects->count() === 0)
                <div class="text-center py-20">
                    <p class="text-neutral-500 text-lg mb-4">
                        Tidak ada proyek yang sesuai dengan pencarian Anda
                    </p>
                    <button wire:click="resetFilters" class="btn-outline">
                        Reset Filter
                    </button>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($projects as $index => $project)
                        <a href="{{ route('projects.show', $project->slug) }}"
                            class="card group overflow-hidden hover:shadow-xl transition-all duration-300 cursor-pointer animate-fade-in"
                            style="animation-delay: {{ $index * 0.05 }}s;">
                            <div class="card group overflow-hidden hover:shadow-xl transition-all duration-300 cursor-pointer animate-fade-in"
                                style="animation-delay: {{ $index * 0.05 }}s;">
                                {{-- Image or Placeholder --}}
                                <div class="h-56 relative overflow-hidden">
                                    @if ($project->thumbnail && filter_var($project->thumbnail, FILTER_VALIDATE_URL))
                                        <img src="{{ $project->thumbnail }}" alt="{{ $project->title }}"
                                            class="w-full h-full object-cover">
                                    @elseif($project->thumbnail)
                                        <img src="{{ asset('storage/' . $project->thumbnail) }}"
                                            alt="{{ $project->title }}" class="w-full h-full object-cover">
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
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                                    </path>
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                </svg>
                                                {{ $project->location }}
                                            </p>
                                        </div>
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                    {{ $project->status === 'completed' ? 'bg-success-100 text-success-700' : ($project->status === 'ongoing' ? 'bg-warning-100 text-warning-700' : 'bg-info-100 text-info-700') }}">
                                            {{ $project->status === 'completed' ? 'Selesai' : ($project->status === 'ongoing' ? 'Dalam Pengerjaan' : 'Perencanaan') }}
                                        </span>
                                    </div>
                                    <p class="text-sm text-neutral-600 mb-3 line-clamp-2">
                                        {{ $project->short_description }}
                                    </p>
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
                        </a>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

</div>
