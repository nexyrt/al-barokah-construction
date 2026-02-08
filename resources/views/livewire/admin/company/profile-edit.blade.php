<div class="space-y-6">
    {{-- Header --}}
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div class="space-y-1">
            <h1
                class="text-4xl font-bold bg-gradient-to-r from-zinc-900 via-primary-800 to-primary-800 dark:from-white dark:via-primary-200 dark:to-primary-200 bg-clip-text text-transparent">
                Company Profile
            </h1>
            <p class="text-zinc-600 dark:text-zinc-400 text-lg">
                Manage your company information and details
            </p>
        </div>

        {{-- Desktop Save Button --}}
        <div class="hidden sm:block">
            <x-button wire:click="save" color="primary" icon="check" loading="save" class="whitespace-nowrap">
                Save Changes
            </x-button>
        </div>
    </div>

    {{-- Tab Navigation --}}
    <div class="bg-white dark:bg-zinc-900 rounded-lg border border-zinc-200 dark:border-zinc-700 overflow-hidden">
        <div class="flex border-b border-zinc-200 dark:border-zinc-700 overflow-x-auto">
            {{-- Tab 1: Basic --}}
            <button type="button" wire:click="$set('activeTab', 'basic')"
                class="flex items-center gap-2 px-4 sm:px-6 py-4 whitespace-nowrap transition-colors {{ $activeTab === 'basic' ? 'bg-primary-50 dark:bg-primary-900/20 text-primary-600 dark:text-primary-400 border-b-2 border-primary-600' : 'text-zinc-600 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-zinc-100' }}">
                <x-icon name="building-office-2" class="w-5 h-5" />
                <span class="hidden sm:inline">Basic Information</span>
                <span class="sm:hidden">Basic</span>
            </button>

            {{-- Tab 2: About --}}
            <button type="button" wire:click="$set('activeTab', 'about')"
                class="flex items-center gap-2 px-4 sm:px-6 py-4 whitespace-nowrap transition-colors {{ $activeTab === 'about' ? 'bg-primary-50 dark:bg-primary-900/20 text-primary-600 dark:text-primary-400 border-b-2 border-primary-600' : 'text-zinc-600 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-zinc-100' }}">
                <x-icon name="document-text" class="w-5 h-5" />
                <span class="hidden sm:inline">About & Vision</span>
                <span class="sm:hidden">About</span>
            </button>

            {{-- Tab 3: Contact --}}
            <button type="button" wire:click="$set('activeTab', 'contact')"
                class="flex items-center gap-2 px-4 sm:px-6 py-4 whitespace-nowrap transition-colors {{ $activeTab === 'contact' ? 'bg-primary-50 dark:bg-primary-900/20 text-primary-600 dark:text-primary-400 border-b-2 border-primary-600' : 'text-zinc-600 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-zinc-100' }}">
                <x-icon name="phone" class="w-5 h-5" />
                <span class="hidden sm:inline">Contact Information</span>
                <span class="sm:hidden">Contact</span>
            </button>
        </div>
    </div>

    {{-- Tab Content --}}
    <div class="space-y-6">

        {{-- Tab 1: Basic Information --}}
        <div x-show="$wire.activeTab === 'basic'" x-cloak
            class="bg-white dark:bg-zinc-900 rounded-lg border border-zinc-200 dark:border-zinc-700 p-6 space-y-6">

            <div class="border-b border-zinc-200 dark:border-zinc-700 pb-4">
                <h3 class="text-lg font-semibold text-zinc-900 dark:text-zinc-50">Basic Information</h3>
                <p class="text-sm text-zinc-500 dark:text-zinc-400 mt-1">Company's fundamental details</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <x-input wire:model="company_name" label="Company Name *" placeholder="Enter company name" />

                <x-input wire:model="tagline" label="Tagline" placeholder="Company tagline or slogan" />

                <x-input wire:model="established_year" type="number" label="Established Year" placeholder="e.g., 2020"
                    :min="1900" :max="date('Y')" />
            </div>

        </div>

        {{-- Tab 2: About & Vision --}}
        <div x-show="$wire.activeTab === 'about'" x-cloak
            class="bg-white dark:bg-zinc-900 rounded-lg border border-zinc-200 dark:border-zinc-700 p-6 space-y-6">

            <div class="border-b border-zinc-200 dark:border-zinc-700 pb-4">
                <h3 class="text-lg font-semibold text-zinc-900 dark:text-zinc-50">About & Vision</h3>
                <p class="text-sm text-zinc-500 dark:text-zinc-400 mt-1">Company's story, vision, and mission</p>
            </div>

            <div class="space-y-6">
                <x-textarea wire:model="about_us" label="About Us" placeholder="Tell your company story..."
                    rows="5" />

                <x-textarea wire:model="vision" label="Vision" placeholder="Company vision statement..."
                    rows="4" />

                {{-- Mission Items --}}
                <div class="space-y-4">
                    <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-300">
                        Mission
                    </label>

                    {{-- Mission List --}}
                    @if (count($mission) > 0)
                        <div class="space-y-2">
                            @foreach ($mission as $index => $item)
                                <div class="flex items-start gap-2 p-3 bg-zinc-50 dark:bg-zinc-800 rounded-lg group">
                                    <div
                                        class="flex-shrink-0 w-6 h-6 flex items-center justify-center bg-primary-100 dark:bg-primary-900/20 text-primary-600 dark:text-primary-400 rounded-full text-xs font-semibold">
                                        {{ $index + 1 }}
                                    </div>
                                    <p class="flex-1 text-sm text-zinc-700 dark:text-zinc-300 pt-0.5">
                                        {{ $item }}</p>
                                    <button type="button" wire:click="removeMissionItem({{ $index }})"
                                        class="flex-shrink-0 text-red-600 hover:text-red-700 dark:text-red-400 dark:hover:text-red-300 opacity-0 group-hover:opacity-100 transition-opacity">
                                        <x-icon name="x-mark" class="w-5 h-5" />
                                    </button>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    {{-- Add New Mission Item --}}
                    <div class="flex gap-2">
                        <x-input wire:model="newMissionItem" placeholder="Add new mission item..."
                            wire:keydown.enter="addMissionItem" class="flex-1" />
                        <x-button wire:click="addMissionItem" color="primary" icon="plus" type="button">
                            Add
                        </x-button>
                    </div>
                    <p class="text-xs text-zinc-500 dark:text-zinc-400">Press Enter or click Add button to add item</p>
                </div>
            </div>
        </div>

        {{-- Tab 3: Contact Information --}}
        <div x-show="$wire.activeTab === 'contact'" x-cloak
            class="bg-white dark:bg-zinc-900 rounded-lg border border-zinc-200 dark:border-zinc-700 p-6 space-y-6">

            <div class="border-b border-zinc-200 dark:border-zinc-700 pb-4">
                <h3 class="text-lg font-semibold text-zinc-900 dark:text-zinc-50">Contact Information</h3>
                <p class="text-sm text-zinc-500 dark:text-zinc-400 mt-1">How people can reach your company</p>
            </div>

            <div class="space-y-6">
                <x-textarea wire:model="address" label="Address" placeholder="Company address..." rows="3" />

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <x-input wire:model="phone" label="Phone Number" placeholder="+62..."
                        hint="Include country code" />

                    <x-input wire:model="whatsapp" label="WhatsApp" placeholder="+62..."
                        hint="Include country code" />

                    <x-input wire:model="email" type="email" label="Email Address"
                        placeholder="info@company.com" />
                </div>
            </div>
        </div>

    </div>

    {{-- Sticky Save Button (Mobile) --}}
    <div class="sm:hidden fixed bottom-4 left-4 right-4 z-50">
        <x-button wire:click="save" color="primary" icon="check" loading="save" class="w-full shadow-lg">
            Save Changes
        </x-button>
    </div>
</div>
