<?php

namespace App\Livewire\Admin\BusinessFields;

use App\Livewire\Traits\Alert;
use App\Models\BusinessField;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use Alert, WithFileUploads;

    // Modal Control
    public bool $modal = false;

    // Business Field ID untuk tracking
    public ?int $businessFieldId = null;

    // Form Fields
    public ?string $name = null;
    public ?string $slug = null;
    public $icon = null; // New icon upload
    public ?string $existing_icon = null; // Existing icon path
    public ?string $short_description = null;
    public ?string $description = null;
    public bool $is_active = true;
    public ?int $display_order = 0;

    // Auto-generate slug when name changes (optional during edit)
    public function updatedName(): void
    {
        // Only auto-generate if slug is empty or matches old name pattern
        if (empty($this->slug) || $this->slug === Str::slug($this->name)) {
            $this->slug = Str::slug($this->name);
        }
    }

    public function render(): View
    {
        return view('livewire.admin.business-fields.edit');
    }

    // Event Listener - Dipanggil dari parent
    #[On('load::business-field')]
    public function load(BusinessField $businessField): void
    {
        $this->businessFieldId = $businessField->id;
        $this->name = $businessField->name;
        $this->slug = $businessField->slug;
        $this->existing_icon = $businessField->icon;
        $this->short_description = $businessField->short_description;
        $this->description = $businessField->description;
        $this->is_active = $businessField->is_active;
        $this->display_order = $businessField->display_order;

        $this->modal = true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:100'],
            'slug' => ['required', 'string', 'max:120', Rule::unique('business_fields', 'slug')->ignore($this->businessFieldId)],
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

        $businessField = BusinessField::findOrFail($this->businessFieldId);

        // Handle icon upload
        if ($this->icon) {
            // Delete old icon if exists
            if ($businessField->icon && \Storage::disk('public')->exists($businessField->icon)) {
                \Storage::disk('public')->delete($businessField->icon);
            }

            $validated['icon'] = $this->icon->store('business-fields/icons', 'public');
        }

        $businessField->update($validated);

        $this->dispatch('updated');
        $this->reset();
        $this->success('Business field updated successfully');
    }

    // Remove existing icon
    public function removeIcon(): void
    {
        if (!$this->businessFieldId)
            return;

        $businessField = BusinessField::findOrFail($this->businessFieldId);

        if ($businessField->icon && \Storage::disk('public')->exists($businessField->icon)) {
            \Storage::disk('public')->delete($businessField->icon);
        }

        $businessField->update(['icon' => null]);
        $this->existing_icon = null;

        $this->success('Icon removed successfully');
    }
}