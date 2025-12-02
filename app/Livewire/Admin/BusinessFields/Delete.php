<?php

namespace App\Livewire\Admin\BusinessFields;

use App\Livewire\Traits\Alert;
use App\Models\BusinessField;
use Livewire\Attributes\Renderless;
use Livewire\Component;

class Delete extends Component
{
    use Alert;

    public BusinessField $businessField;

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
        $projectCount = $this->businessField->projects()->count();

        $message = $projectCount > 0
            ? "This business field has {$projectCount} associated projects. Deleting it will remove the business field from those projects."
            : "This action cannot be undone.";

        $this->question("Delete {$this->businessField->name}?", $message)
            ->confirm(method: 'delete')
            ->cancel()
            ->send();
    }

    // Step 2: Execute delete
    public function delete(): void
    {
        // Delete icon if exists
        if ($this->businessField->icon && \Storage::disk('public')->exists($this->businessField->icon)) {
            \Storage::disk('public')->delete($this->businessField->icon);
        }

        $this->businessField->delete();

        $this->dispatch('deleted');
        $this->success('Business field deleted successfully');
    }
}