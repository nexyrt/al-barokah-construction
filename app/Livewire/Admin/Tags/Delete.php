<?php

namespace App\Livewire\Admin\Tags;

use App\Livewire\Traits\Alert;
use App\Models\ProjectTag;
use Livewire\Attributes\Renderless;
use Livewire\Component;

class Delete extends Component
{
    use Alert;

    public ProjectTag $tag;

    // Inline render - No blade file needed
    public function render(): string
    {
        return <<<'HTML'
        <div>
            <x-button.circle icon="trash" color="red" size="sm" wire:click="confirm" title="Delete" />
        </div>
        HTML;
    }

    // Step 1: Confirmation dialog
    #[Renderless]
    public function confirm(): void
    {
        $projectCount = $this->tag->projects()->count();

        $message = $projectCount > 0
            ? "This tag is used in {$projectCount} projects. Deleting it will remove the tag from those projects."
            : 'This action cannot be undone.';

        $this->question("Delete {$this->tag->name}?", $message)
            ->confirm(method: 'delete')
            ->cancel()
            ->send();
    }

    // Step 2: Execute delete
    public function delete(): void
    {
        $this->tag->delete();

        $this->dispatch('deleted');
        $this->success('Tag deleted successfully');
    }
}
