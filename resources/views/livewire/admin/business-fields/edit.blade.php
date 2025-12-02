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

                {{-- Existing Icon Preview --}}
                @if ($existing_icon)
                    <div
                        class="flex items-center gap-4 p-4 bg-zinc-50 dark:bg-zinc-800 rounded-lg border border-zinc-200 dark:border-zinc-700">
                        <img src="{{ asset('storage/' . $existing_icon) }}" alt="Current icon"
                            class="h-16 w-16 rounded-lg object-cover">
                        <div class="flex-1">
                            <p class="text-sm font-medium text-zinc-900 dark:text-zinc-50">Current Icon</p>
                            <p class="text-xs text-zinc-500 dark:text-zinc-400">Upload new icon to replace</p>
                        </div>
                        <x-button wire:click="removeIcon" color="red" outline icon="trash" size="sm"
                            wire:confirm="Are you sure you want to remove this icon?">
                            Remove
                        </x-button>
                    </div>
                @endif

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                    <x-upload wire:model="icon" label="{{ $existing_icon ? 'Upload New Icon' : 'Icon' }}"
                        tip="PNG, JPG up to 2MB" accept="image/*" />

                    <x-input wire:model="display_order" type="number" label="Display Order" placeholder="0"
                        min="0">
                        <x-slot:hint>
                            <span class="text-xs">Lower numbers appear first</span>
                        </x-slot:hint>
                    </x-input>
                </div>

                <div class="flex items-center gap-3">
                    <x-toggle wire:model="is_active" label="Active" />
                    <span class="text-sm text-zinc-600 dark:text-zinc-400">
                        Make this business field visible in public pages
                    </span>
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
