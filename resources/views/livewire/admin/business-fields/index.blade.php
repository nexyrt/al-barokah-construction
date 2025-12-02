<div class="space-y-6">
    {{-- Header --}}
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div class="space-y-1">
            <h1
                class="text-4xl font-bold bg-gradient-to-r from-zinc-900 via-primary-800 to-primary-800 dark:from-white dark:via-primary-200 dark:to-primary-200 bg-clip-text text-transparent">
                Business Fields
            </h1>
            <p class="text-zinc-600 dark:text-zinc-400 text-lg">
                Manage construction business categories
            </p>
        </div>
        <livewire:admin.business-fields.create @created="$refresh" />
    </div>

    {{-- Custom Filters --}}
    @if ($statusFilter !== null)
        <div class="bg-white dark:bg-zinc-900 rounded-lg border border-zinc-200 dark:border-zinc-700 p-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-4">
                    <span class="text-sm font-medium text-zinc-700 dark:text-zinc-300">Status:</span>
                    <x-select.native wire:model.live="statusFilter" :options="[
                        ['label' => 'All Status', 'value' => ''],
                        ['label' => 'Active', 'value' => 'active'],
                        ['label' => 'Inactive', 'value' => 'inactive'],
                    ]" class="w-48" />
                </div>
                <x-button wire:click="clearFilters" color="secondary" outline icon="x-mark" size="sm">
                    Clear Filters
                </x-button>
            </div>
        </div>
    @endif

    {{-- Table --}}
    <x-table :$headers :$sort :rows="$this->rows()" selectable wire:model="selected" paginate filter loading>

        {{-- Business Field Name with Icon --}}
        @interact('column_name', $row)
            <div class="flex items-center gap-3">
                @if ($row->icon)
                    <img src="{{ asset('storage/' . $row->icon) }}" alt="{{ $row->name }}"
                        class="h-10 w-10 rounded-lg object-cover">
                @else
                    <div
                        class="h-10 w-10 bg-gradient-to-br from-primary-400 to-primary-600 rounded-lg flex items-center justify-center shadow-lg">
                        <x-icon name="briefcase" class="w-5 h-5 text-white" />
                    </div>
                @endif
                <div>
                    <div class="font-semibold text-zinc-900 dark:text-zinc-50">
                        {{ $row->name }}
                    </div>
                    <div class="text-xs text-zinc-500 dark:text-zinc-400">
                        {{ $row->slug }}
                    </div>
                </div>
            </div>
        @endinteract

        {{-- Short Description --}}
        @interact('column_short_description', $row)
            <span class="text-sm text-zinc-700 dark:text-zinc-300">
                {{ Str::limit($row->short_description ?? $row->description, 50) }}
            </span>
        @endinteract

        {{-- Projects Count --}}
        @interact('column_projects_count', $row)
            <div class="flex items-center gap-2">
                <x-badge :text="$row->projects_count" :color="$row->projects_count > 0 ? 'blue' : 'zinc'" />
                <span class="text-xs text-zinc-500">projects</span>
            </div>
        @endinteract

        {{-- Status Toggle --}}
        @interact('column_is_active', $row)
            <button type="button" wire:click="toggleActive({{ $row->id }})" x-data="{ enabled: {{ $row->is_active ? 'true' : 'false' }} }"
                @click="enabled = !enabled" :class="enabled ? 'bg-green-600' : 'bg-zinc-200 dark:bg-zinc-700'"
                class="relative inline-flex h-5 w-9 items-center rounded-full transition-colors focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 dark:focus:ring-offset-zinc-900">
                <span :class="enabled ? 'translate-x-5' : 'translate-x-1'"
                    class="inline-block h-3 w-3 transform rounded-full bg-white transition-transform">
                </span>
            </button>
        @endinteract

        {{-- Display Order --}}
        @interact('column_display_order', $row)
            <x-badge :text="$row->display_order" color="zinc" />
        @endinteract

        {{-- Actions --}}
        @interact('column_action', $row)
            <div class="flex items-center gap-1">
                <x-button.circle icon="pencil" color="blue" size="sm"
                    wire:click="$dispatch('load::business-field', { businessField: '{{ $row->id }}' })"
                    title="Edit" />

                <livewire:admin.business-fields.delete :businessField="$row" :key="'delete-' . $row->id" @deleted="$refresh" />
            </div>
        @endinteract
    </x-table>

    {{-- Bulk Actions Bar --}}
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
                            x-text="`${show.length} business fields selected`"></div>
                        <div class="text-xs text-zinc-500 dark:text-zinc-400">Choose action for selected items</div>
                    </div>
                </div>
                <div class="flex items-center gap-2 justify-end">
                    <x-button wire:click="confirmBulkDelete" size="sm" color="red" icon="trash"
                        class="whitespace-nowrap">
                        Delete
                    </x-button>
                    <x-button wire:click="$set('selected', [])" size="sm" color="secondary" icon="x-mark"
                        class="whitespace-nowrap">
                        Cancel
                    </x-button>
                </div>
            </div>
        </div>
    </div>

    {{-- Edit Component --}}
    <livewire:admin.business-fields.edit @updated="$refresh" />
</div>
