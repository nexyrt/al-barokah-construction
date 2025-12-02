<div>
    {{-- Modal --}}
    <x-modal wire="modal" size="2xl" center persistent>
        {{-- Custom Title --}}
        <x-slot:title>
            <div class="flex items-center gap-4 my-3">
                <div class="h-12 w-12 bg-primary-50 dark:bg-primary-900/20 rounded-xl flex items-center justify-center">
                    <x-icon name="pencil" class="w-6 h-6 text-primary-600 dark:text-primary-400" />
                </div>
                <div>
                    <h3 class="text-xl font-bold text-zinc-900 dark:text-zinc-50">Edit Business Field</h3>
                    <p class="text-sm text-zinc-600 dark:text-zinc-400">Update business category information</p>
                </div>
            </div>
        </x-slot:title>

        {{-- Form --}}
        <form id="business-field-update" wire:submit="save" class="space-y-6">
            {{-- Section: Basic Information --}}
            <div class="space-y-4">
                <div class="border-b border-zinc-200 dark:border-zinc-600 pb-4">
                    <h4 class="text-sm font-semibold text-zinc-900 dark:text-zinc-50 mb-1">Basic Information</h4>
                    <p class="text-xs text-zinc-500 dark:text-zinc-400">Primary details of the business field</p>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                    <x-input wire:model.live="name" label="Name *" placeholder="e.g., Residential Construction" />

                    <x-input wire:model="slug" label="Slug *" placeholder="residential-construction">
                        <x-slot:hint>
                            <span class="text-xs">URL-friendly identifier</span>
                        </x-slot:hint>
                    </x-input>
                </div>

                <x-input wire:model="short_description" label="Short Description"
                    placeholder="Brief summary (max 255 characters)" />

                <x-textarea wire:model="description" label="Description *"
                    placeholder="Detailed description of this business field" rows="4" />
            </div>

            {{-- Section: Icon & Display --}}
            <div class="space-y-4">
                <div class="border-b border-zinc-200 dark:border-zinc-600 pb-4">
                    <h4 class="text-sm font-semibold text-zinc-900 dark:text-zinc-50 mb-1">Icon & Display</h4>
                    <p class="text-xs text-zinc-500 dark:text-zinc-400">Visual representation and ordering</p>
                </div>

                {{-- Icon Picker --}}
                <div>
                    <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-300 mb-2">
                        Choose Icon
                    </label>

                    {{-- Selected Icon Preview --}}
                    @if ($icon)
                        <div
                            class="mb-3 flex items-center gap-3 p-3 bg-primary-50 dark:bg-primary-900/20 rounded-lg border border-primary-200 dark:border-primary-800">
                            <div
                                class="h-12 w-12 bg-gradient-to-br from-primary-400 to-primary-600 rounded-lg flex items-center justify-center shadow-lg">
                                <x-icon name="{{ $icon }}" class="w-6 h-6 text-white" />
                            </div>
                            <div class="flex-1">
                                <p class="text-sm font-medium text-zinc-900 dark:text-zinc-50">
                                    {{ ucwords(str_replace('-', ' ', $icon)) }}</p>
                                <p class="text-xs text-zinc-500 dark:text-zinc-400">Current icon</p>
                            </div>
                            <x-button wire:click="removeIcon" size="sm" color="red" outline icon="trash">
                                Remove
                            </x-button>
                        </div>
                    @endif

                    {{-- Search Icons --}}
                    <x-input wire:model.live="iconSearch" placeholder="Search icons..." icon="magnifying-glass" />

                    {{-- Icon Grid --}}
                    <div
                        class="grid grid-cols-6 sm:grid-cols-8 md:grid-cols-10 gap-2 max-h-64 overflow-y-auto mt-6 p-2 bg-zinc-50 dark:bg-zinc-800 rounded-lg border border-zinc-200 dark:border-zinc-700">
                        @foreach ($this->availableIcons() as $iconName => $iconLabel)
                            <button type="button" wire:click="selectIcon('{{ $iconName }}')"
                                class="group relative h-12 w-12 rounded-lg border-2 transition-all hover:scale-110
                                           {{ $icon === $iconName
                                               ? 'border-primary-500 bg-primary-50 dark:bg-primary-900/20'
                                               : 'border-zinc-200 dark:border-zinc-700 bg-white dark:bg-zinc-900 hover:border-primary-300' }}"
                                title="{{ $iconLabel }}">
                                <x-icon name="{{ $iconName }}"
                                    class="w-6 h-6 mx-auto {{ $icon === $iconName ? 'text-primary-600 dark:text-primary-400' : 'text-zinc-500 dark:text-zinc-400 group-hover:text-primary-500' }}" />
                            </button>
                        @endforeach
                    </div>

                    @if (count($this->availableIcons()) === 0)
                        <p class="text-sm text-zinc-500 dark:text-zinc-400 text-center py-4">
                            No icons found matching "{{ $iconSearch }}"
                        </p>
                    @endif
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                    <x-input wire:model="display_order" type="number" label="Display Order" placeholder="0"
                        min="0">
                        <x-slot:hint>
                            <span class="text-xs">Lower numbers appear first</span>
                        </x-slot:hint>
                    </x-input>

                    <div class="flex items-center gap-3 lg:pt-6">
                        <x-toggle wire:model="is_active" label="Active" />
                        <span class="text-sm text-zinc-600 dark:text-zinc-400">
                            Visible in public pages
                        </span>
                    </div>
                </div>
            </div>
        </form>

        {{-- Footer --}}
        <x-slot:footer>
            <div class="flex flex-col sm:flex-row justify-end gap-3">
                <x-button wire:click="$set('modal', false)" color="secondary" outline
                    class="w-full sm:w-auto order-2 sm:order-1">
                    Cancel
                </x-button>
                <x-button type="submit" form="business-field-update" color="green" icon="check" loading="save"
                    class="w-full sm:w-auto order-1 sm:order-2">
                    Update Business Field
                </x-button>
            </div>
        </x-slot:footer>
    </x-modal>
</div>
