<?php

namespace App\Livewire\Admin\Projects;

use App\Models\Project;
use Livewire\Component;
use Livewire\Attributes\Renderless;
use TallStackUi\Traits\Interactions;

class Delete extends Component
{
    use Interactions;

    public Project $project;

    public function render(): string
    {
        return <<<'HTML'
        <div>
            <x-button.circle icon="trash" color="red" size="sm" wire:click="confirm" />
        </div>
        HTML;
    }

    #[Renderless]
    public function confirm(): void
    {
        $this->question("Delete project?", "This action cannot be undone.")
            ->confirm(method: 'delete')
            ->cancel()
            ->send();
    }

    public function delete(): void
    {
        // Delete thumbnail
        if ($this->project->thumbnail && \Storage::disk('public')->exists($this->project->thumbnail)) {
            \Storage::disk('public')->delete($this->project->thumbnail);
        }

        // Delete galleries
        foreach ($this->project->galleries as $gallery) {
            if (\Storage::disk('public')->exists($gallery->image_path)) {
                \Storage::disk('public')->delete($gallery->image_path);
            }
        }

        $this->project->delete();

        $this->dispatch('project-deleted');
        $this->toast()->success('Project deleted successfully')->send();
    }
}