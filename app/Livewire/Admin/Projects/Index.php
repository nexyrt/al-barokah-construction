<?php

namespace App\Livewire\Admin\Projects;

use App\Models\Project;
use App\Models\BusinessField;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Renderless;
use TallStackUi\Traits\Interactions;

class Index extends Component
{
    use WithPagination, Interactions;

    public ?int $quantity = 10;
    public ?string $search = null;
    public ?string $status = null;
    public ?string $businessField = null;
    public array $selected = [];
    public array $sort = ['column' => 'created_at', 'direction' => 'desc'];

    public array $headers = [
        ['index' => 'title', 'label' => 'Project'],
        ['index' => 'client_name', 'label' => 'Client'],
        ['index' => 'business_field', 'label' => 'Business Field', 'sortable' => false],
        ['index' => 'location', 'label' => 'Location'],
        ['index' => 'status', 'label' => 'Status'],
        ['index' => 'dates', 'label' => 'Timeline', 'sortable' => false],
        ['index' => 'is_featured', 'label' => 'Featured', 'sortable' => false],
        ['index' => 'is_published', 'label' => 'Published', 'sortable' => false],
        ['index' => 'action', 'label' => 'Actions', 'sortable' => false],
    ];

    public function render(): View
    {
        return view('livewire.admin.projects.index');
    }

    public function rows(): LengthAwarePaginator
    {
        return Project::query()
            ->with(['businessField', 'tags'])
            ->when(
                $this->search,
                fn(Builder $q) =>
                $q->where(
                    fn($query) =>
                    $query->where('title', 'like', "%{$this->search}%")
                        ->orWhere('client_name', 'like', "%{$this->search}%")
                        ->orWhere('location', 'like', "%{$this->search}%")
                )
            )
            ->when(
                $this->status,
                fn(Builder $q) =>
                $q->where('status', $this->status)
            )
            ->when(
                $this->businessField,
                fn(Builder $q) =>
                $q->where('business_field_id', $this->businessField)
            )
            ->orderBy($this->sort['column'], $this->sort['direction'])
            ->paginate($this->quantity)
            ->withQueryString();
    }

    #[Computed]
    public function businessFields(): array
    {
        return BusinessField::where('is_active', true)
            ->orderBy('name')
            ->get()
            ->map(fn($field) => ['label' => $field->name, 'value' => (string) $field->id])
            ->toArray();
    }

    #[Computed]
    public function statuses(): array
    {
        return [
            ['label' => 'Planning', 'value' => 'planning'],
            ['label' => 'Ongoing', 'value' => 'ongoing'],
            ['label' => 'Completed', 'value' => 'completed'],
            ['label' => 'On Hold', 'value' => 'on_hold'],
        ];
    }

    public function toggleFeatured($projectId): void
    {
        $project = Project::findOrFail($projectId);
        $project->update(['is_featured' => !$project->is_featured]);

        // ✅ Clear computed property cache to force refresh
        unset($this->rows);

        $this->toast()->success(
            $project->is_featured ? 'Marked as featured' : 'Removed from featured'
        )->send();
    }

    public function togglePublished($projectId): void
    {
        $project = Project::findOrFail($projectId);
        $project->update(['is_published' => !$project->is_published]);

        // ✅ Clear computed property cache to force refresh
        unset($this->rows);

        $this->toast()->success(
            $project->is_published ? 'Published' : 'Unpublished'
        )->send();
    }

    #[On('project-deleted')]
    public function refreshList(): void
    {
        $this->resetPage();
    }

    public function clearFilters(): void
    {
        $this->reset(['search', 'status', 'businessField']);
    }

    #[Renderless]
    public function confirmBulkDelete(): void
    {
        if (empty($this->selected)) {
            return;
        }

        $count = count($this->selected);

        $this->dialog()
            ->question('Delete Projects?', "Are you sure you want to delete {$count} projects? This action cannot be undone.")
            ->confirm('Delete', 'bulkDelete', 'Projects deleted successfully')
            ->cancel('Cancel')
            ->send();
    }

    public function bulkDelete(): void
    {
        if (empty($this->selected)) {
            return;
        }

        $count = count($this->selected);

        $projects = Project::whereIn('id', $this->selected)->get();

        foreach ($projects as $project) {
            if ($project->thumbnail && \Storage::disk('public')->exists($project->thumbnail)) {
                \Storage::disk('public')->delete($project->thumbnail);
            }

            foreach ($project->galleries as $gallery) {
                if (\Storage::disk('public')->exists($gallery->image_path)) {
                    \Storage::disk('public')->delete($gallery->image_path);
                }
            }

            $project->delete();
        }

        $this->selected = [];
        $this->resetPage();

        $this->toast()->success("{$count} projects deleted successfully")->send();
    }
}