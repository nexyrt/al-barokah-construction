<?php

namespace App\Livewire\Admin\Clients;

use App\Livewire\Traits\Alert;
use App\Models\Client;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Renderless;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination, Alert;

    // Filter & Sorting
    public ?int $quantity = 10;
    public ?string $search = null;
    public array $sort = ['column' => 'display_order', 'direction' => 'asc'];

    // Bulk Actions
    public array $selected = [];

    // Static Headers
    public array $headers = [
        ['index' => 'logo', 'label' => 'Logo', 'sortable' => false],
        ['index' => 'name', 'label' => 'Client Name'],
        ['index' => 'industry', 'label' => 'Industry'],
        ['index' => 'is_active', 'label' => 'Status'],
        ['index' => 'display_order', 'label' => 'Order'],
        ['index' => 'action', 'label' => 'Actions', 'sortable' => false],
    ];

    public function render(): View
    {
        return view('livewire.admin.clients.index');
    }

    // Data Loading
    #[Computed]
    public function rows(): LengthAwarePaginator
    {
        return Client::query()
            ->when(
                $this->search,
                fn(Builder $query) =>
                $query->whereAny(['name', 'industry'], 'like', '%' . trim($this->search) . '%')
            )
            ->orderBy($this->sort['column'], $this->sort['direction'])
            ->paginate($this->quantity)
            ->withQueryString();
    }

    // Toggle active status
    public function toggleActive(int $id): void
    {
        $client = Client::findOrFail($id);
        $client->is_active = !$client->is_active;
        $client->save();

        $status = $client->is_active ? 'activated' : 'deactivated';
        $this->success("Client {$status} successfully");
    }

    // Bulk Delete: Step 1 - Confirmation
    #[Renderless]
    public function confirmBulkDelete(): void
    {
        if (empty($this->selected))
            return;

        $count = count($this->selected);
        $this->question("Delete {$count} clients?", "This action cannot be undone.")
            ->confirm(method: 'bulkDelete')
            ->cancel()
            ->send();
    }

    // Bulk Delete: Step 2 - Execution
    public function bulkDelete(): void
    {
        if (empty($this->selected))
            return;

        // Get clients with logos
        $clients = Client::whereIn('id', $this->selected)->get();

        // Delete logos from storage
        foreach ($clients as $client) {
            if ($client->logo && \Storage::disk('public')->exists($client->logo)) {
                \Storage::disk('public')->delete($client->logo);
            }
        }

        // Delete clients
        $count = count($this->selected);
        Client::whereIn('id', $this->selected)->delete();

        $this->selected = [];
        $this->resetPage();
        $this->success("{$count} clients deleted successfully");
    }
}