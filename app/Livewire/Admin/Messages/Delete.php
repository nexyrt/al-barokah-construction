<?php

namespace App\Livewire\Admin\Messages;

use App\Livewire\Traits\Alert;
use App\Models\ContactMessage;
use Livewire\Attributes\Renderless;
use Livewire\Component;

class Delete extends Component
{
    use Alert;

    public ContactMessage $message;

    public function render(): string
    {
        return <<<'HTML'
        <div>
            <x-button.circle icon="trash" color="red" size="sm" wire:click="confirm" title="Hapus" />
        </div>
        HTML;
    }

    #[Renderless]
    public function confirm(): void
    {
        $this->question("Hapus pesan dari {$this->message->name}?", "Tindakan ini tidak dapat dibatalkan.")
            ->confirm(method: 'delete')
            ->cancel()
            ->send();
    }

    public function delete(): void
    {
        $this->message->delete();

        $this->dispatch('deleted');
        $this->success('Pesan berhasil dihapus');
    }
}
