<div class="space-y-6">
    {{-- Header --}}
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div class="space-y-1">
            <h1
                class="text-4xl font-bold bg-gradient-to-r from-zinc-900 via-primary-800 to-primary-800 dark:from-white dark:via-primary-200 dark:to-primary-200 bg-clip-text text-transparent">
                Project Tags
            </h1>
            <p class="text-zinc-600 dark:text-zinc-400 text-lg">
                Manage project categorization tags
            </p>
        </div>
        <livewire:admin.tags.create @created="$refresh" />
    </div>

    {{-- Table --}}
    <x-table :$headers :$sort :rows="$this->rows()" selectable wire:model="selected" paginate filter loading>

        {{-- Tag Name with Badge --}}
        @interact('column_name', $row)
            <div class="flex items-center gap-3">
                <div
                    class="h-10 w-10 bg-gradient-to-br from-blue-400 to-blue-600 rounded-lg flex items-center justify-center shadow-lg">
                    <x-icon name="tag" class="w-5 h-5 text-white" />
                </div>
                <div>
                    <div class="font-semibold text-zinc-900 dark:text-zinc-50">
                        {{ $row->name }}
                    </div>
                </div>
            </div>
        @endinteract

        {{-- Slug --}}
        @interact('column_slug', $row)
            <span class="text-sm font-mono text-zinc-600 dark:text-zinc-400 bg-zinc-100 dark:bg-zinc-800 px-2 py-1 rounded">
                {{ $row->slug }}
            </span>
        @endinteract

        {{-- Projects Count --}}
        @interact('column_projects_count', $row)
            <div class="flex items-center gap-2">
                <x-badge :text="$row->projects_count" :color="$row->projects_count > 0 ? 'blue' : 'zinc'" />
                <span class="text-xs text-zinc-500">projects</span>
            </div>
        @endinteract

        {{-- Created Date --}}
        @interact('column_created_at', $row)
            <div>
                <div class="text-sm font-medium text-zinc-900 dark:text-zinc-50">
                    {{ $row->created_at?->format('d M Y') ?? '-' }}
                </div>
                <div class="text-xs text-zinc-500 dark:text-zinc-400">
                    {{ $row->created_at?->diffForHumans() ?? '-' }}
                </div>
            </div>
        @endinteract

        {{-- Actions --}}
        @interact('column_action', $row)
            <div class="flex items-center gap-1">
                <x-button.circle icon="pencil" color="blue" size="sm"
                    wire:click="$dispatch('load::tag', { tag: '{{ $row->id }}' })" title="Edit" />

                <livewire:admin.tags.delete :tag="$row" :key="'delete-' . $row->id" @deleted="$refresh" />
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
                            x-text="`${show.length} tags selected`"></div>
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
    <livewire:admin.tags.edit @updated="$refresh" />
</div>
