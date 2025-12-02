<?php

namespace App\Livewire\Admin\Tags;

use App\Livewire\Traits\Alert;
use App\Models\ProjectTag;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\Attributes\On;
use Livewire\Component;

class Edit extends Component
{
    use Alert;

    // Modal Control
    public bool $modal = false;

    // Tag ID untuk tracking
    public ?int $tagId = null;

    // Form Fields
    public ?string $name = null;

    public ?string $slug = null;

    // Auto-generate slug when name changes (optional during edit)
    public function updatedName(): void
    {
        if (empty($this->slug) || $this->slug === Str::slug($this->name)) {
            $this->slug = Str::slug($this->name);
        }
    }

    public function render(): View
    {
        return view('livewire.admin.tags.edit');
    }

    // Event Listener - Dipanggil dari parent
    #[On('load::tag')]
    public function load(ProjectTag $tag): void
    {
        $this->tagId = $tag->id;
        $this->name = $tag->name;
        $this->slug = $tag->slug;

        $this->modal = true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:50'],
            'slug' => ['required', 'string', 'max:70', Rule::unique('project_tags', 'slug')->ignore($this->tagId)],
        ];
    }

    public function save(): void
    {
        $validated = $this->validate();

        $tag = ProjectTag::findOrFail($this->tagId);
        $tag->update($validated);

        $this->dispatch('updated');
        $this->reset();
        $this->success('Tag updated successfully');
    }
}
