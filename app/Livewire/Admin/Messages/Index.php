<?php

namespace App\Livewire\Admin\Messages;

use App\Livewire\Traits\Alert;
use App\Models\ContactMessage;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Renderless;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination, Alert;

    // Filter & Sorting
    public ?int $quantity = 10;
    public ?string $search = null;
    public ?string $filterStatus = null;
    public array $sort = ['column' => 'created_at', 'direction' => 'desc'];

    // Bulk Actions
    public array $selected = [];

    // Static Headers
    public array $headers = [
        ['index' => 'name', 'label' => 'Pengirim'],
        ['index' => 'subject', 'label' => 'Subjek'],
        ['index' => 'is_read', 'label' => 'Status'],
        ['index' => 'created_at', 'label' => 'Tanggal'],
        ['index' => 'action', 'label' => 'Aksi', 'sortable' => false],
    ];

    public function render(): View
    {
        return view('livewire.admin.messages.index');
    }

    #[Computed]
    public function rows(): LengthAwarePaginator
    {
        return ContactMessage::query()
            ->when(
                $this->search,
                fn(Builder $query) =>
                $query->whereAny(['name', 'email', 'subject', 'message'], 'like', '%' . trim($this->search) . '%')
            )
            ->when(
                $this->filterStatus === 'read',
                fn(Builder $query) => $query->where('is_read', true)
            )
            ->when(
                $this->filterStatus === 'unread',
                fn(Builder $query) => $query->where('is_read', false)
            )
            ->orderBy($this->sort['column'], $this->sort['direction'])
            ->paginate($this->quantity)
            ->withQueryString();
    }

    #[Computed]
    public function unreadCount(): int
    {
        return ContactMessage::where('is_read', false)->count();
    }

    public function toggleRead(int $id): void
    {
        $message = ContactMessage::findOrFail($id);
        $message->is_read = !$message->is_read;
        $message->save();

        $status = $message->is_read ? 'dibaca' : 'belum dibaca';
        $this->success("Pesan ditandai sebagai {$status}");
    }

    // Listener untuk refresh saat pesan dibaca dari Show component
    #[On('message-read')]
    public function onMessageRead(): void
    {
        unset($this->unreadCount);
    }

    #[Renderless]
    public function confirmBulkDelete(): void
    {
        if (empty($this->selected))
            return;

        $count = count($this->selected);
        $this->question("Hapus {$count} pesan?", "Tindakan ini tidak dapat dibatalkan.")
            ->confirm(method: 'bulkDelete')
            ->cancel()
            ->send();
    }

    public function bulkDelete(): void
    {
        if (empty($this->selected))
            return;

        $count = count($this->selected);
        ContactMessage::whereIn('id', $this->selected)->delete();

        $this->selected = [];
        $this->resetPage();
        $this->success("{$count} pesan berhasil dihapus");
    }

    public function bulkMarkAsRead(): void
    {
        if (empty($this->selected))
            return;

        ContactMessage::whereIn('id', $this->selected)->update(['is_read' => true]);

        $count = count($this->selected);
        $this->selected = [];
        $this->success("{$count} pesan ditandai sebagai dibaca");
    }
}
