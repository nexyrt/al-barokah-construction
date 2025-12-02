<?php

namespace App\Livewire\Admin\BusinessFields;

use App\Livewire\Traits\Alert;
use App\Models\BusinessField;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;

class Edit extends Component
{
    use Alert;

    // Modal Control
    public bool $modal = false;

    // Business Field ID untuk tracking
    public ?int $businessFieldId = null;

    // Form Fields
    public ?string $name = null;

    public ?string $slug = null;

    public ?string $icon = null; // Heroicon name

    public ?string $short_description = null;

    public ?string $description = null;

    public bool $is_active = true;

    public ?int $display_order = 0;

    // Icon search
    public string $iconSearch = '';

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
        $this->icon = $businessField->icon;
        $this->short_description = $businessField->short_description;
        $this->description = $businessField->description;
        $this->is_active = $businessField->is_active;
        $this->display_order = $businessField->display_order;

        $this->modal = true;
    }

    // Available Heroicons for Business Fields
    #[Computed]
    public function availableIcons(): array
    {
        $icons = [
            'briefcase' => 'Briefcase',
            'building-office' => 'Building Office',
            'building-office-2' => 'Building Office 2',
            'building-library' => 'Building Library',
            'building-storefront' => 'Building Storefront',
            'home' => 'Home',
            'home-modern' => 'Home Modern',
            'wrench-screwdriver' => 'Wrench Screwdriver',
            'wrench' => 'Wrench',
            'cube' => 'Cube',
            'squares-2x2' => 'Squares',
            'squares-plus' => 'Squares Plus',
            'truck' => 'Truck',
            'cog' => 'Cog',
            'cog-6-tooth' => 'Cog 6 Tooth',
            'bolt' => 'Bolt',
            'fire' => 'Fire',
            'light-bulb' => 'Light Bulb',
            'paint-brush' => 'Paint Brush',
            'pencil' => 'Pencil',
            'beaker' => 'Beaker',
            'shield-check' => 'Shield Check',
            'chart-bar' => 'Chart Bar',
            'chart-bar-square' => 'Chart Bar Square',
            'cpu-chip' => 'CPU Chip',
            'folder' => 'Folder',
            'folder-open' => 'Folder Open',
            'document-text' => 'Document',
            'clipboard-document-list' => 'Clipboard List',
            'map' => 'Map',
            'map-pin' => 'Map Pin',
            'globe-alt' => 'Globe',
            'globe-americas' => 'Globe Americas',
            'currency-dollar' => 'Currency Dollar',
            'banknotes' => 'Banknotes',
            'calculator' => 'Calculator',
            'scale' => 'Scale',
            'presentation-chart-line' => 'Presentation Chart',
            'academic-cap' => 'Academic Cap',
            'rocket-launch' => 'Rocket Launch',
            'sparkles' => 'Sparkles',
            'star' => 'Star',
            'sun' => 'Sun',
            'moon' => 'Moon',
            'cloud' => 'Cloud',
            'scissors' => 'Scissors',
            'shopping-bag' => 'Shopping Bag',
            'shopping-cart' => 'Shopping Cart',
        ];

        if (empty($this->iconSearch)) {
            return $icons;
        }

        return collect($icons)
            ->filter(fn ($label, $name) => str_contains(strtolower($label), strtolower($this->iconSearch)) ||
                str_contains(strtolower($name), strtolower($this->iconSearch))
            )
            ->toArray();
    }

    public function selectIcon(string $iconName): void
    {
        $this->icon = $iconName;
    }

    public function removeIcon(): void
    {
        $this->icon = null;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:100'],
            'slug' => ['required', 'string', 'max:120', Rule::unique('business_fields', 'slug')->ignore($this->businessFieldId)],
            'icon' => ['nullable', 'string', 'max:100'],
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
        $businessField->update($validated);

        $this->dispatch('updated');
        $this->reset();
        $this->success('Business field updated successfully');
    }
}
