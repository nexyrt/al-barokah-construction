<div class="space-y-6">
    {{-- Header --}}
    <div class="flex items-center gap-4 mb-6">
        <x-button.circle :href="route('admin.projects.index')" icon="arrow-left" color="secondary" size="sm" wire:navigate />
        <div>
            <h1 class="text-3xl font-bold text-zinc-900 dark:text-zinc-50">
                Edit Project
            </h1>
            <p class="text-zinc-600 dark:text-zinc-400">
                Update project information
            </p>
        </div>
    </div>

    <form wire:submit="save" class="space-y-6">

        {{-- Section 1: Basic Information --}}
        <div class="bg-white dark:bg-zinc-900 rounded-lg border border-zinc-200 dark:border-zinc-700 p-6">
            <div class="mb-4 border-b border-zinc-200 dark:border-zinc-700 pb-4">
                <h2 class="text-lg font-semibold text-zinc-900 dark:text-zinc-50">Basic Information</h2>
                <p class="text-sm text-zinc-500 dark:text-zinc-400">Project's primary details</p>
            </div>

            <div class="grid gap-4 md:grid-cols-2">
                <div class="md:col-span-2">
                    <x-input wire:model="title" label="Project Title *" placeholder="Enter project title" />
                </div>

                <x-input wire:model="client_name" label="Client Name *" placeholder="Enter client name" />

                <x-input wire:model="location" label="Location" placeholder="City, Province" />

                <div class="md:col-span-2">
                    <x-select.native wire:model="business_field_id" label="Business Field *">
                        @foreach ($businessFields as $field)
                            <option value="{{ $field->id }}">{{ $field->name }}</option>
                        @endforeach
                    </x-select.native>
                </div>
            </div>
        </div>

        {{-- Section 2: Project Details --}}
        <div class="bg-white dark:bg-zinc-900 rounded-lg border border-zinc-200 dark:border-zinc-700 p-6">
            <div class="mb-4 border-b border-zinc-200 dark:border-zinc-700 pb-4">
                <h2 class="text-lg font-semibold text-zinc-900 dark:text-zinc-50">Project Details</h2>
                <p class="text-sm text-zinc-500 dark:text-zinc-400">Detailed project information</p>
            </div>

            <div class="space-y-4">
                <x-textarea wire:model="short_description" label="Short Description"
                    placeholder="Brief project overview (max 300 characters)" rows="2" />

                <x-textarea wire:model="description" label="Full Description *"
                    placeholder="Detailed project description" rows="6" />

                <div class="grid gap-4 md:grid-cols-2">
                    <x-input wire:model="project_value" type="number" label="Project Value (IDR)" placeholder="0"
                        step="0.01" />

                    <x-input wire:model="area_size" label="Area Size" placeholder="e.g., 5.000 m²" />
                </div>
            </div>
        </div>

        {{-- Section 3: Timeline --}}
        <div class="bg-white dark:bg-zinc-900 rounded-lg border border-zinc-200 dark:border-zinc-700 p-6">
            <div class="mb-4 border-b border-zinc-200 dark:border-zinc-700 pb-4">
                <h2 class="text-lg font-semibold text-zinc-900 dark:text-zinc-50">Timeline & Status</h2>
                <p class="text-sm text-zinc-500 dark:text-zinc-400">Project schedule and current status</p>
            </div>

            <div class="grid gap-4 md:grid-cols-3">
                <x-input wire:model="start_date" type="date" label="Start Date *" />

                <x-input wire:model="end_date" type="date" label="End Date" />

                <x-select.native wire:model="status" label="Status *">
                    <option value="planning">Planning</option>
                    <option value="ongoing">Ongoing</option>
                    <option value="completed">Completed</option>
                    <option value="on_hold">On Hold</option>
                </x-select.native>
            </div>
        </div>

        {{-- Section 4: Media --}}
        <div class="bg-white dark:bg-zinc-900 rounded-lg border border-zinc-200 dark:border-zinc-700 p-6">
            <div class="mb-4 border-b border-zinc-200 dark:border-zinc-700 pb-4">
                <h2 class="text-lg font-semibold text-zinc-900 dark:text-zinc-50">Media</h2>
                <p class="text-sm text-zinc-500 dark:text-zinc-400">Project images and gallery</p>
            </div>

            <div class="space-y-6">
                {{-- Current Thumbnail --}}
                @if ($thumbnail)
                    <div>
                        <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-300 mb-2">Current
                            Thumbnail</label>
                        <img src="{{ asset('storage/' . $thumbnail) }}" alt="Current thumbnail"
                            class="h-32 w-32 rounded object-cover">
                    </div>
                @endif

                {{-- New Thumbnail --}}
                <div>
                    <x-upload wire:model="new_thumbnail" label="New Thumbnail"
                        tip="Upload new thumbnail to replace current (max 2MB)" accept="image/*" />
                </div>

                {{-- Existing Gallery --}}
                @if (count($existing_galleries) > 0)
                    <div>
                        <label class="block text-sm font-medium text-zinc-700 dark:text-zinc-300 mb-2">Existing
                            Gallery</label>
                        <div class="grid grid-cols-4 gap-4">
                            @foreach ($existing_galleries as $gallery)
                                <div class="relative group">
                                    <img src="{{ asset('storage/' . $gallery['image_path']) }}" alt="Gallery"
                                        class="h-24 w-24 rounded object-cover">
                                    <button type="button" wire:click="deleteGalleryImage({{ $gallery['id'] }})"
                                        class="absolute top-1 right-1 bg-red-500 text-white rounded-full p-1 opacity-0 group-hover:opacity-100 transition-opacity">
                                        <x-icon name="trash" class="w-4 h-4" />
                                    </button>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                {{-- New Gallery --}}
                <div>
                    <x-upload wire:model="gallery_images" label="Add More Gallery Images"
                        tip="Upload additional images (max 2MB each)" accept="image/*" multiple />
                </div>
            </div>
        </div>

        {{-- Section 5: Additional Settings --}}
        <div class="bg-white dark:bg-zinc-900 rounded-lg border border-zinc-200 dark:border-zinc-700 p-6">
            <div class="mb-4 border-b border-zinc-200 dark:border-zinc-700 pb-4">
                <h2 class="text-lg font-semibold text-zinc-900 dark:text-zinc-50">Additional Settings</h2>
                <p class="text-sm text-zinc-500 dark:text-zinc-400">Tags and publishing options</p>
            </div>

            <div class="space-y-4">
                <x-select.styled wire:model="selected_tags" :options="$tags->map(fn($tag) => ['label' => $tag->name, 'value' => $tag->id])->toArray()" label="Tags"
                    placeholder="Select tags..." multiple searchable />

                <div class="flex gap-6">
                    <x-toggle wire:model="is_featured" label="Featured Project" />
                    <x-toggle wire:model="is_published" label="Publish Immediately" />
                </div>
            </div>
        </div>

        {{-- Actions --}}
        <div class="flex justify-end gap-3">
            <x-button :href="route('admin.projects.index')" color="secondary" outline wire:navigate>
                Cancel
            </x-button>
            <x-button type="submit" color="green" icon="check" loading="save">
                Update Project
            </x-button>
        </div>
    </form>
</div>
