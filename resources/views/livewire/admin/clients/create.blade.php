<div>
    {{-- Trigger Button --}}
    <x-button wire:click="$toggle('modal')" color="blue" icon="plus" class="w-full sm:w-auto">
        Add Client
    </x-button>

    {{-- Modal --}}
    <x-modal wire="modal" size="lg" center persistent>
        {{-- Custom Title --}}
        <x-slot:title>
            <div class="flex items-center gap-4 my-3">
                <div class="h-12 w-12 bg-primary-50 dark:bg-primary-900/20 rounded-xl flex items-center justify-center">
                    <x-icon name="building-office-2" class="w-6 h-6 text-primary-600 dark:text-primary-400" />
                </div>
                <div>
                    <h3 class="text-xl font-bold text-zinc-900 dark:text-zinc-50">Add New Client</h3>
                    <p class="text-sm text-zinc-600 dark:text-zinc-400">Add a new client company</p>
                </div>
            </div>
        </x-slot:title>

        {{-- Form --}}
        <form id="client-create" wire:submit="save" class="space-y-6">
            {{-- Section: Client Information --}}
            <div class="space-y-4">
                <div class="border-b border-zinc-200 dark:border-zinc-600 pb-4">
                    <h4 class="text-sm font-semibold text-zinc-900 dark:text-zinc-50 mb-1">Client Information</h4>
                    <p class="text-xs text-zinc-500 dark:text-zinc-400">Basic client details</p>
                </div>

                <div class="grid grid-cols-1 gap-4">
                    <x-input wire:model="name" label="Client Name *" placeholder="Enter client company name" />

                    <x-input wire:model="industry" label="Industry"
                        placeholder="e.g., Construction, Real Estate, Government" />
                </div>
            </div>

            {{-- Section: Logo Upload --}}
            <div class="space-y-4">
                <div class="border-b border-zinc-200 dark:border-zinc-600 pb-4">
                    <h4 class="text-sm font-semibold text-zinc-900 dark:text-zinc-50 mb-1">Client Logo</h4>
                    <p class="text-xs text-zinc-500 dark:text-zinc-400">Logo will be resized to 256x256 pixels
                        (displayed at 64x64)</p>
                </div>

                <x-upload wire:model="logo" label="Upload Logo" accept="image/*"
                    hint="PNG, JPG, or JPEG (max 2MB). Will be centered on white background." />
            </div>

            {{-- Section: Display Settings --}}
            <div class="space-y-4">
                <div class="border-b border-zinc-200 dark:border-zinc-600 pb-4">
                    <h4 class="text-sm font-semibold text-zinc-900 dark:text-zinc-50 mb-1">Display Settings</h4>
                    <p class="text-xs text-zinc-500 dark:text-zinc-400">Control visibility and order</p>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                    <div class="flex items-center justify-between p-3 bg-zinc-50 dark:bg-zinc-800 rounded-lg">
                        <div>
                            <label class="text-sm font-medium text-zinc-700 dark:text-zinc-300">Active Status</label>
                            <p class="text-xs text-zinc-500 dark:text-zinc-400">Show client on website</p>
                        </div>
                        <x-toggle wire:model="is_active" />
                    </div>

                    <x-input wire:model="display_order" type="number" label="Display Order" placeholder="0"
                        hint="Lower numbers appear first" />
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
                <x-button type="submit" form="client-create" color="blue" icon="check" loading="save"
                    class="w-full sm:w-auto order-1 sm:order-2">
                    Create Client
                </x-button>
            </div>
        </x-slot:footer>
    </x-modal>
</div>
