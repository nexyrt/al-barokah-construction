<div>
    {{-- Trigger Button --}}
    <x-button wire:click="$toggle('modal')" color="primary" icon="plus" class="w-full sm:w-auto">
        Add Tag
    </x-button>

    {{-- Modal --}}
    <x-modal wire="modal" size="lg" center persistent>
        {{-- Custom Title --}}
        <x-slot:title>
            <div class="flex items-center gap-4 my-3">
                <div class="h-12 w-12 bg-primary-50 dark:bg-primary-900/20 rounded-xl flex items-center justify-center">
                    <x-icon name="tag" class="w-6 h-6 text-primary-600 dark:text-primary-400" />
                </div>
                <div>
                    <h3 class="text-xl font-bold text-zinc-900 dark:text-zinc-50">Add New Tag</h3>
                    <p class="text-sm text-zinc-600 dark:text-zinc-400">Create a new project categorization tag</p>
                </div>
            </div>
        </x-slot:title>

        {{-- Form --}}
        <form id="tag-create" wire:submit="save" class="space-y-4">
            <x-input wire:model.live="name" label="Tag Name *" placeholder="e.g., Residential, Commercial, Renovation"
                hint="Name of the tag" />

            <x-input wire:model="slug" label="Slug *" placeholder="residential-project">
                <x-slot:hint>
                    <span class="text-xs">Auto-generated URL-friendly identifier</span>
                </x-slot:hint>
            </x-input>
        </form>

        {{-- Footer --}}
        <x-slot:footer>
            <div class="flex flex-col sm:flex-row justify-end gap-3">
                <x-button wire:click="$set('modal', false)" color="secondary" outline
                    class="w-full sm:w-auto order-2 sm:order-1">
                    Cancel
                </x-button>
                <x-button type="submit" form="tag-create" color="primary" icon="check" loading="save"
                    class="w-full sm:w-auto order-1 sm:order-2">
                    Create Tag
                </x-button>
            </div>
        </x-slot:footer>
    </x-modal>
</div>
