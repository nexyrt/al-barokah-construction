<?php

namespace App\Livewire\Admin\BusinessFields;

use App\Livewire\Traits\Alert;
use App\Models\BusinessField;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use Alert, WithFileUploads;

    // Modal Control
    public bool $modal = false;

    // Form Fields
    public ?string $name = null;
    public ?string $slug = null;
    public $icon = null; // For file upload
    public ?string $short_description = null;
    public ?string $description = null;
    public bool $is_active = true;
    public ?int $display_order = 0;

    // Auto-generate slug when name changes
    public function updatedName(): void
    {
        $this->slug = Str::slug($this->name);
    }

    public function render(): View
    {
        return view('livewire.admin.business-fields.create');
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:100'],
            'slug' => ['required', 'string', 'max:120', Rule::unique('business_fields', 'slug')],
            'icon' => ['nullable', 'image', 'max:2048'], // Max 2MB
            'short_description' => ['nullable', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'is_active' => ['boolean'],
            'display_order' => ['integer', 'min:0'],
        ];
    }

    public function save(): void
    {
        $validated = $this->validate();

        // Handle icon upload
        if ($this->icon) {
            $validated['icon'] = $this->icon->store('business-fields/icons', 'public');
        }

        BusinessField::create($validated);

        $this->dispatch('created');
        $this->reset();
        $this->success('Business field created successfully');
    }
}