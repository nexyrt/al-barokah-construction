<?php

namespace App\Livewire\Admin\Tags;

use App\Livewire\Traits\Alert;
use App\Models\ProjectTag;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Create extends Component
{
    use Alert;

    // Modal Control
    public bool $modal = false;

    // Form Fields
    public ?string $name = null;

    public ?string $slug = null;

    // Auto-generate slug when name changes
    public function updatedName(): void
    {
        $this->slug = Str::slug($this->name);
    }

    public function render(): View
    {
        return view('livewire.admin.tags.create');
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:50'],
            'slug' => ['required', 'string', 'max:70', Rule::unique('project_tags', 'slug')],
        ];
    }

    public function save(): void
    {
        $validated = $this->validate();

        ProjectTag::create($validated);

        $this->dispatch('created');
        $this->reset();
        $this->success('Tag created successfully');
    }
}
