<div class="space-y-6">
    {{-- Header --}}
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div class="space-y-1">
            <h1
                class="text-4xl font-bold bg-gradient-to-r from-zinc-900 via-primary-800 to-primary-800 dark:from-white dark:via-primary-200 dark:to-primary-200 bg-clip-text text-transparent">
                Pesan Masuk
            </h1>
            <p class="text-zinc-600 dark:text-zinc-400 text-lg">
                Kelola pesan dari form kontak
                @if ($this->unreadCount > 0)
                    <span
                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-400">
                        {{ $this->unreadCount }} belum dibaca
                    </span>
                @endif
            </p>
        </div>

        {{-- Filter Status --}}
        <div class="flex items-center gap-2">
            <x-select.native wire:model.live="filterStatus" :options="[
                ['label' => 'Semua Status', 'value' => ''],
                ['label' => 'Belum Dibaca', 'value' => 'unread'],
                ['label' => 'Sudah Dibaca', 'value' => 'read'],
            ]" />
        </div>
    </div>

    {{-- Table --}}
    <x-table :$headers :$sort :rows="$this->rows" selectable wire:model="selected" paginate filter loading>

        {{-- Sender Column --}}
        @interact('column_name', $row)
            <div class="flex items-center gap-3">
                @if (!$row->is_read)
                    <span class="w-2 h-2 bg-primary-500 rounded-full flex-shrink-0"></span>
                @endif
                <div>
                    <div class="font-semibold text-zinc-900 dark:text-zinc-50 {{ !$row->is_read ? 'font-bold' : '' }}">
                        {{ $row->name }}
                    </div>
                    <div class="text-sm text-zinc-500 dark:text-zinc-400">{{ $row->email }}</div>
                    <div class="text-xs text-zinc-400 dark:text-zinc-500">{{ $row->phone }}</div>
                </div>
            </div>
        @endinteract

        {{-- Subject Column --}}
        @interact('column_subject', $row)
            <div>
                <div class="font-medium text-zinc-900 dark:text-zinc-50 {{ !$row->is_read ? 'font-bold' : '' }}">
                    {{ Str::limit($row->subject, 40) }}
                </div>
                <div class="text-sm text-zinc-500 dark:text-zinc-400">
                    {{ Str::limit($row->message, 60) }}
                </div>
            </div>
        @endinteract

        {{-- Status Column --}}
        @interact('column_is_read', $row)
            <div class="flex items-center justify-center">
                <x-badge :text="$row->is_read ? 'Dibaca' : 'Baru'" :color="$row->is_read ? 'green' : 'yellow'" />
            </div>
        @endinteract

        {{-- Date Column --}}
        @interact('column_created_at', $row)
            <div class="text-sm text-zinc-600 dark:text-zinc-400">
                <div class="font-medium text-zinc-900 dark:text-zinc-50">{{ $row->created_at->format('d M Y') }}</div>
                <div class="text-xs text-zinc-500 dark:text-zinc-400">{{ $row->created_at->diffForHumans() }}</div>
            </div>
        @endinteract

        {{-- Actions Column --}}
        @interact('column_action', $row)
            <div class="flex items-center justify-center gap-1">
                <x-button.circle icon="eye" color="blue" size="sm"
                    wire:click="$dispatch('show::message', { message: '{{ $row->id }}' })" title="Lihat" />
                <x-button.circle icon="{{ $row->is_read ? 'envelope' : 'envelope-open' }}" color="zinc" size="sm"
                    wire:click="toggleRead({{ $row->id }})"
                    title="{{ $row->is_read ? 'Tandai belum dibaca' : 'Tandai dibaca' }}" />
                <livewire:admin.messages.delete :message="$row" :key="uniqid()" @deleted="$refresh" />
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
                            x-text="`${show.length} pesan dipilih`"></div>
                        <div class="text-xs text-zinc-500 dark:text-zinc-400">Pilih aksi untuk pesan terpilih</div>
                    </div>
                </div>
                <div class="flex items-center gap-2 justify-end">
                    <x-button wire:click="bulkMarkAsRead" size="sm" color="blue" icon="envelope-open"
                        class="whitespace-nowrap">
                        Tandai Dibaca
                    </x-button>
                    <x-button wire:click="confirmBulkDelete" size="sm" color="red" icon="trash"
                        class="whitespace-nowrap">
                        Hapus
                    </x-button>
                    <x-button wire:click="$set('selected', [])" size="sm" color="zinc" icon="x-mark"
                        class="whitespace-nowrap">
                        Batal
                    </x-button>
                </div>
            </div>
        </div>
    </div>

    {{-- Show Component Integration --}}
    <livewire:admin.messages.show @message-read="$refresh" />
</div>
