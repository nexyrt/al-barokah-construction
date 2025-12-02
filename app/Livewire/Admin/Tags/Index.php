<?php

namespace App\Livewire\Admin\Tags;

use App\Livewire\Traits\Alert;
use App\Models\ProjectTag;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Renderless;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use Alert, WithPagination;

    // Filter & Sorting
    public ?int $quantity = 10;

    public ?string $search = null;

    public array $sort = ['column' => 'name', 'direction' => 'asc'];

    // Bulk Actions
    public array $selected = [];

    // Static Headers
    public array $headers = [
        ['index' => 'name', 'label' => 'Tag Name'],
        ['index' => 'slug', 'label' => 'Slug'],
        ['index' => 'projects_count', 'label' => 'Projects', 'sortable' => false],
        ['index' => 'created_at', 'label' => 'Created'],
        ['index' => 'action', 'label' => 'Actions', 'sortable' => false],
    ];

    public function render(): View
    {
        return view('livewire.admin.tags.index');
    }

    // Data Loading dengan Computed
    #[Computed]
    public function rows(): LengthAwarePaginator
    {
        return ProjectTag::query()
            ->withCount('projects')
            ->when($this->search, fn (Builder $query) => $query->whereAny(['name', 'slug'], 'like', '%'.trim($this->search).'%')
            )
            ->orderBy($this->sort['column'], $this->sort['direction'])
            ->paginate($this->quantity)
            ->withQueryString();
    }

    // Clear Filters
    public function clearFilters(): void
    {
        $this->reset(['search']);
    }

    // Bulk Delete: Step 1 - Confirmation
    #[Renderless]
    public function confirmBulkDelete(): void
    {
        if (empty($this->selected)) {
            return;
        }

        $count = count($this->selected);
        $this->question("Delete {$count} tags?", 'This action cannot be undone. Tags will be removed from all associated projects.')
            ->confirm(method: 'bulkDelete')
            ->cancel()
            ->send();
    }

    // Bulk Delete: Step 2 - Execution
    public function bulkDelete(): void
    {
        if (empty($this->selected)) {
            return;
        }

        $count = count($this->selected);

        ProjectTag::whereIn('id', $this->selected)->delete();

        $this->selected = [];
        $this->resetPage();
        $this->success("{$count} tags deleted successfully");
    }
}
