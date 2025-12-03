<?php

namespace App\Livewire\Admin\Clients;

use App\Livewire\Traits\Alert;
use App\Models\Client;
use Livewire\Attributes\Renderless;
use Livewire\Component;

class Delete extends Component
{
    use Alert;

    public Client $client;

    public function render(): string
    {
        return <<<'HTML'
        <div>
            <x-button.circle icon="trash" color="red" size="sm" wire:click="confirm" title="Delete" />
        </div>
        HTML;
    }

    #[Renderless]
    public function confirm(): void
    {
        $this->question("Delete {$this->client->name}?", "This action cannot be undone.")
            ->confirm(method: 'delete')
            ->cancel()
            ->send();
    }

    public function delete(): void
    {
        // Delete logo from storage
        if ($this->client->logo && \Storage::disk('public')->exists($this->client->logo)) {
            \Storage::disk('public')->delete($this->client->logo);
        }

        // Delete client
        $this->client->delete();

        $this->dispatch('deleted');
        $this->success('Client deleted successfully');
    }
}