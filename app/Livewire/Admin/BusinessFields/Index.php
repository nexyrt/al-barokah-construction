<?php

namespace App\Livewire\Admin\BusinessFields;

use App\Livewire\Traits\Alert;
use App\Models\BusinessField;
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
    public ?string $statusFilter = null;
    public array $sort = ['column' => 'display_order', 'direction' => 'asc'];

    // Bulk Actions
    public array $selected = [];

    // Static Headers
    public array $headers = [
        ['index' => 'name', 'label' => 'Business Field'],
        ['index' => 'short_description', 'label' => 'Description'],
        ['index' => 'projects_count', 'label' => 'Projects', 'sortable' => false],
        ['index' => 'is_active', 'label' => 'Status'],
        ['index' => 'display_order', 'label' => 'Order'],
        ['index' => 'action', 'label' => 'Actions', 'sortable' => false],
    ];

    public function render(): View
    {
        return view('livewire.admin.business-fields.index');
    }

    // Data Loading dengan Computed
    #[Computed]
    public function rows(): LengthAwarePaginator
    {
        return BusinessField::query()
            ->withCount('projects')
            ->when(
                $this->search,
                fn(Builder $query) =>
                $query->whereAny(['name', 'slug', 'short_description', 'description'], 'like', '%' . trim($this->search) . '%')
            )
            ->when(
                $this->statusFilter !== null,
                fn(Builder $query) =>
                $query->where('is_active', $this->statusFilter === 'active')
            )
            ->orderBy($this->sort['column'], $this->sort['direction'])
            ->paginate($this->quantity)
            ->withQueryString();
    }

    // Toggle Active Status
    public function toggleActive(int $id): void
    {
        $field = BusinessField::findOrFail($id);
        $field->update(['is_active' => !$field->is_active]);

        // Clear computed cache
        unset($this->rows);

        $this->success($field->is_active ? 'Business field activated' : 'Business field deactivated');
    }

    // Clear Filters
    public function clearFilters(): void
    {
        $this->reset(['search', 'statusFilter']);
    }

    // Bulk Delete: Step 1 - Confirmation
    #[Renderless]
    public function confirmBulkDelete(): void
    {
        if (empty($this->selected))
            return;

        $count = count($this->selected);
        $this->question("Delete {$count} business fields?", "This action cannot be undone. All related projects will lose their business field association.")
            ->confirm(method: 'bulkDelete')
            ->cancel()
            ->send();
    }

    // Bulk Delete: Step 2 - Execution
    public function bulkDelete(): void
    {
        if (empty($this->selected))
            return;

        $count = count($this->selected);

        // Delete icons if exist
        $fields = BusinessField::whereIn('id', $this->selected)->get();
        foreach ($fields as $field) {
            if ($field->icon && \Storage::disk('public')->exists($field->icon)) {
                \Storage::disk('public')->delete($field->icon);
            }
        }

        BusinessField::whereIn('id', $this->selected)->delete();

        $this->selected = [];
        $this->resetPage();
        $this->success("{$count} business fields deleted successfully");
    }
}