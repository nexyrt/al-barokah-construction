<div class="space-y-6">
    {{-- Header --}}
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div class="space-y-1">
            <h1
                class="text-4xl font-bold bg-gradient-to-r from-zinc-900 via-primary-800 to-primary-800 dark:from-white dark:via-primary-200 dark:to-primary-200 bg-clip-text text-transparent">
                Clients Management
            </h1>
            <p class="text-zinc-600 dark:text-zinc-400 text-lg">
                Manage client companies and their logos
            </p>
        </div>
        <livewire:admin.clients.create @created="$refresh" />
    </div>

    {{-- Table --}}
    <x-table :$headers :$sort :rows="$this->rows()" selectable wire:model="selected" paginate filter loading>

        {{-- Logo Column --}}
        @interact('column_logo', $row)
            <div class="flex items-center justify-center">
                @if ($row->logo)
                    <div
                        class="w-16 h-16 rounded-full overflow-hidden bg-white dark:bg-zinc-700 border-2 border-zinc-200 dark:border-zinc-600 flex items-center justify-center">
                        <img src="{{ \Storage::url($row->logo) }}" alt="{{ $row->name }}"
                            class="w-full h-full object-contain p-2">
                    </div>
                @else
                    <div
                        class="w-16 h-16 rounded-full bg-gradient-to-br from-primary-100 to-primary-50 dark:from-primary-900/20 dark:to-primary-800/20 flex items-center justify-center">
                        <svg class="w-8 h-8 text-primary-600 dark:text-primary-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                            </path>
                        </svg>
                    </div>
                @endif
            </div>
        @endinteract

        {{-- Name Column --}}
        @interact('column_name', $row)
            <div>
                <div class="font-semibold text-zinc-900 dark:text-zinc-50">{{ $row->name }}</div>
            </div>
        @endinteract

        {{-- Industry Column --}}
        @interact('column_industry', $row)
            <div class="text-sm text-zinc-600 dark:text-zinc-400">
                {{ $row->industry ?? '-' }}
            </div>
        @endinteract

        {{-- Status Column --}}
        @interact('column_is_active', $row)
            <div class="flex items-center justify-center">
                <x-toggle wire:click="toggleActive({{ $row->id }})" :checked="$row->is_active" sm />
            </div>
        @endinteract

        {{-- Display Order Column --}}
        @interact('column_display_order', $row)
            <div class="text-center">
                <span
                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-zinc-100 dark:bg-zinc-800 text-zinc-800 dark:text-zinc-200">
                    {{ $row->display_order }}
                </span>
            </div>
        @endinteract

        {{-- Actions Column --}}
        @interact('column_action', $row)
            <div class="flex items-center justify-center gap-1">
                <x-button.circle icon="pencil" color="blue" size="sm"
                    wire:click="$dispatch('load::client', { client: '{{ $row->id }}' })" title="Edit" />
                <livewire:admin.clients.delete :client="$row" :key="uniqid()" @deleted="$refresh" />
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
                            x-text="`${show.length} clients selected`"></div>
                        <div class="text-xs text-zinc-500 dark:text-zinc-400">Choose action for selected clients</div>
                    </div>
                </div>
                <div class="flex items-center gap-2 justify-end">
                    <x-button wire:click="confirmBulkDelete" size="sm" color="red" icon="trash"
                        class="whitespace-nowrap">
                        Delete
                    </x-button>
                    <x-button wire:click="$set('selected', [])" size="sm" color="gray" icon="x-mark"
                        class="whitespace-nowrap">
                        Cancel
                    </x-button>
                </div>
            </div>
        </div>
    </div>

    {{-- Edit Component Integration --}}
    <livewire:admin.clients.edit @updated="$refresh" />
</div>
