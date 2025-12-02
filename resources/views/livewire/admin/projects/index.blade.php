<div class="space-y-6">
    {{-- Header --}}
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div class="space-y-1">
            <h1 class="text-4xl font-bold text-zinc-900 dark:text-zinc-50">
                Projects
            </h1>
            <p class="text-zinc-600 dark:text-zinc-400">
                Manage your construction projects
            </p>
        </div>

        <x-button :href="route('admin.projects.create')" color="primary" icon="plus" wire:navigate>
            Add Project
        </x-button>
    </div>

    {{-- Custom Filters (OUTSIDE table) --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        {{-- Status Filter --}}
        <x-select.styled wire:model.live="status" label="Status" :options="$this->statuses" placeholder="All Status"
            select="label:label|value:value" />

        {{-- Business Field Filter --}}
        <x-select.styled wire:model.live="businessField" label="Business Field" :options="$this->businessFields" placeholder="All Business Fields"
            select="label:label|value:value" searchable />

        {{-- Clear Filters Button --}}
        @if ($status || $businessField)
            <div class="flex items-center">
                <x-button wire:click="clearFilters" color="secondary" outline icon="x-mark" class="w-full">
                    Clear Filters
                </x-button>
            </div>
        @endif
    </div>

    {{-- Table with built-in search and pagination --}}
    <x-table :$headers :$sort :rows="$this->rows()" selectable wire:model.live="selected" paginate :quantity="[10, 25, 50, 100]" filter
        loading id="projects-table">

        {{-- Project Title with Thumbnail --}}
        @interact('column_title', $row)
            <div class="flex items-center gap-3">
                @if ($row->thumbnail)
                    <img src="{{ asset('storage/' . $row->thumbnail) }}" alt="{{ $row->title }}"
                        class="h-10 w-10 rounded object-cover">
                @else
                    <div class="flex h-10 w-10 items-center justify-center rounded bg-zinc-200 dark:bg-zinc-700">
                        <x-icon name="photo" class="h-5 w-5 text-zinc-400" />
                    </div>
                @endif
                <div>
                    <div class="font-medium text-zinc-900 dark:text-zinc-100">
                        {{ Str::limit($row->title, 40) }}
                    </div>
                    <div class="text-xs text-zinc-500">
                        #{{ $row->id }}
                    </div>
                </div>
            </div>
        @endinteract

        {{-- Client Name --}}
        @interact('column_client_name', $row)
            <span class="text-sm text-zinc-900 dark:text-zinc-100">{{ $row->client_name }}</span>
        @endinteract

        {{-- Business Field --}}
        @interact('column_business_field', $row)
            <x-badge color="zinc" text="{{ $row->businessField->name }}" />
        @endinteract

        {{-- Location --}}
        @interact('column_location', $row)
            <span class="text-sm text-zinc-700 dark:text-zinc-300">{{ Str::limit($row->location ?? '-', 30) }}</span>
        @endinteract

        {{-- Status --}}
        @interact('column_status', $row)
            <x-badge :text="ucfirst(str_replace('_', ' ', $row->status))" :color="match ($row->status) {
                'completed' => 'green',
                'ongoing' => 'blue',
                'planning' => 'yellow',
                'on_hold' => 'red',
                default => 'zinc',
            }" />
        @endinteract

        {{-- Timeline --}}
        @interact('column_dates', $row)
            <div class="text-xs text-zinc-600 dark:text-zinc-400">
                <div>Start: {{ $row->start_date->format('M d, Y') }}</div>
                @if ($row->end_date)
                    <div>End: {{ $row->end_date->format('M d, Y') }}</div>
                @endif
            </div>
        @endinteract

        {{-- Featured Toggle - Custom --}}
        @interact('column_is_featured', $row)
            <button type="button" wire:click="toggleFeatured({{ $row->id }})" x-data="{ enabled: {{ $row->is_featured ? 'true' : 'false' }} }"
                x-init="$watch('$wire.rows', () => enabled = {{ $row->is_featured ? 'true' : 'false' }})" @click="enabled = !enabled"
                :class="enabled ? 'bg-blue-600' : 'bg-zinc-200 dark:bg-zinc-700'"
                class="relative inline-flex h-5 w-9 items-center rounded-full transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-zinc-900">
                <span :class="enabled ? 'translate-x-5' : 'translate-x-1'"
                    class="inline-block h-3 w-3 transform rounded-full bg-white transition-transform">
                </span>
            </button>
        @endinteract

        {{-- Published Toggle - Custom --}}
        @interact('column_is_published', $row)
            <button type="button" wire:click="togglePublished({{ $row->id }})" x-data="{ enabled: {{ $row->is_published ? 'true' : 'false' }} }"
                x-init="$watch('$wire.rows', () => enabled = {{ $row->is_published ? 'true' : 'false' }})" @click="enabled = !enabled"
                :class="enabled ? 'bg-green-600' : 'bg-zinc-200 dark:bg-zinc-700'"
                class="relative inline-flex h-5 w-9 items-center rounded-full transition-colors focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 dark:focus:ring-offset-zinc-900">
                <span :class="enabled ? 'translate-x-5' : 'translate-x-1'"
                    class="inline-block h-3 w-3 transform rounded-full bg-white transition-transform">
                </span>
            </button>
        @endinteract

        {{-- Actions --}}
        @interact('column_action', $row)
            <div class="flex items-center gap-1">
                <x-button.circle :href="route('admin.projects.edit', $row)" icon="pencil" color="blue" size="sm" wire:navigate />

                <livewire:admin.projects.delete :project="$row" :key="'delete-' . $row->id" />
            </div>
        @endinteract
    </x-table>

    {{-- Bulk Actions Bar (Floating) --}}
    <div x-data="{ show: @entangle('selected').live }" x-show="show.length > 0" x-transition
        class="fixed bottom-4 sm:bottom-6 left-4 right-4 sm:left-1/2 sm:right-auto sm:transform sm:-translate-x-1/2 z-50">
        <div
            class="bg-white dark:bg-zinc-800 rounded-xl shadow-lg border border-zinc-200 dark:border-zinc-600 px-4 sm:px-6 py-4 sm:min-w-96">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 sm:gap-6">
                <div class="flex items-center gap-3">
                    <div
                        class="h-10 w-10 bg-primary-50 dark:bg-primary-900/20 rounded-xl flex items-center justify-center">
                        <x-icon name="check-circle" class="w-5 h-5 text-primary-600 dark:text-primary-400" />
                    </div>
                    <div>
                        <div class="font-semibold text-zinc-900 dark:text-zinc-50"
                            x-text="`${show.length} projects selected`"></div>
                        <div class="text-xs text-zinc-500 dark:text-zinc-400">Choose action for selected projects</div>
                    </div>
                </div>
                <div class="flex items-center gap-2 justify-end">
                    <x-button wire:click="confirmBulkDelete" size="sm" color="red" icon="trash">
                        Delete
                    </x-button>
                    <x-button wire:click="$set('selected', [])" size="sm" color="secondary" icon="x-mark">
                        Cancel
                    </x-button>
                </div>
            </div>
        </div>
    </div>
</div>
