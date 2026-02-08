<?php

namespace App\Livewire\Admin\Messages;

use App\Livewire\Traits\Alert;
use App\Models\ContactMessage;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\On;
use Livewire\Component;

class Show extends Component
{
    use Alert;

    public bool $modal = false;

    // Individual properties untuk data pesan
    public ?int $messageId = null;
    public ?string $name = null;
    public ?string $email = null;
    public ?string $phone = null;
    public ?string $subject = null;
    public ?string $messageContent = null;
    public ?string $createdAt = null;
    public bool $isRead = false;

    public function render(): View
    {
        return view('livewire.admin.messages.show');
    }

    #[On('show::message')]
    public function load(ContactMessage $message): void
    {
        $this->messageId = $message->id;
        $this->name = $message->name;
        $this->email = $message->email;
        $this->phone = $message->phone;
        $this->subject = $message->subject;
        $this->messageContent = $message->message;
        $this->createdAt = $message->created_at->format('d M Y, H:i');
        $this->isRead = $message->is_read;

        // Mark as read jika belum dibaca
        if (!$message->is_read) {
            $message->update(['is_read' => true]);
            $this->dispatch('message-read');
        }

        $this->modal = true;
    }

    public function close(): void
    {
        $this->modal = false;
        $this->reset(['messageId', 'name', 'email', 'phone', 'subject', 'messageContent', 'createdAt', 'isRead']);
    }
}
