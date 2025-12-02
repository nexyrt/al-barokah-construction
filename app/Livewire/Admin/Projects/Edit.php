<?php

namespace App\Livewire\Admin\Projects;

use App\Models\Project;
use App\Models\BusinessField;
use App\Models\ProjectTag;
use Livewire\Component;
use Livewire\WithFileUploads;
use TallStackUi\Traits\Interactions;
use Illuminate\Support\Str;
use Illuminate\Contracts\View\View;

class Edit extends Component
{
    use WithFileUploads, Interactions;

    public Project $project;

    // Basic Info
    public $title;
    public $client_name;
    public $location;
    public $business_field_id;

    // Details
    public $short_description;
    public $description;
    public $project_value;
    public $area_size;

    // Timeline
    public $start_date;
    public $end_date;
    public $status;

    // Media
    public $thumbnail;
    public $new_thumbnail;
    public $gallery_images = [];
    public $existing_galleries = [];

    // Additional
    public $selected_tags = [];
    public $is_featured;
    public $is_published;

    public function mount(Project $project)
    {
        $this->project = $project;

        // Populate fields
        $this->title = $project->title;
        $this->client_name = $project->client_name;
        $this->location = $project->location;
        $this->business_field_id = $project->business_field_id;
        $this->short_description = $project->short_description;
        $this->description = $project->description;
        $this->project_value = $project->project_value;
        $this->area_size = $project->area_size;
        $this->start_date = $project->start_date?->format('Y-m-d');
        $this->end_date = $project->end_date?->format('Y-m-d');
        $this->status = $project->status;
        $this->thumbnail = $project->thumbnail;
        $this->is_featured = $project->is_featured;
        $this->is_published = $project->is_published;

        // Tags
        $this->selected_tags = $project->tags->pluck('id')->toArray();

        // Existing galleries
        $this->existing_galleries = $project->galleries->sortBy('display_order')->toArray();
    }

    protected function rules()
    {
        return [
            'title' => 'required|string|max:200',
            'client_name' => 'required|string|max:150',
            'location' => 'nullable|string|max:200',
            'business_field_id' => 'required|exists:business_fields,id',
            'short_description' => 'nullable|string|max:300',
            'description' => 'required|string',
            'project_value' => 'nullable|numeric|min:0',
            'area_size' => 'nullable|string|max:100',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'status' => 'required|in:planning,ongoing,completed,on_hold',
            'new_thumbnail' => 'nullable|image|max:5048',
            'gallery_images.*' => 'nullable|image|max:5048',
            'selected_tags' => 'nullable|array',
            'selected_tags.*' => 'exists:project_tags,id',
            'is_featured' => 'boolean',
            'is_published' => 'boolean',
        ];
    }

    public function render(): View
    {
        return view('livewire.admin.projects.edit', [
            'businessFields' => BusinessField::where('is_active', true)->orderBy('name')->get(),
            'tags' => ProjectTag::orderBy('name')->get(),
        ]);
    }

    public function deleteGalleryImage($galleryId)
    {
        $gallery = $this->project->galleries()->find($galleryId);

        if ($gallery) {
            // Delete file from storage
            if (\Storage::disk('public')->exists($gallery->image_path)) {
                \Storage::disk('public')->delete($gallery->image_path);
            }

            $gallery->delete();

            // Refresh existing galleries
            $this->existing_galleries = $this->project->galleries()->orderBy('display_order')->get()->toArray();

            $this->toast()->success('Gallery image deleted')->send();
        }
    }

    public function save()
    {
        $validated = $this->validate();

        // Update slug if title changed
        if ($this->title !== $this->project->title) {
            $validated['slug'] = Str::slug($validated['title']);
            $originalSlug = $validated['slug'];
            $count = 1;
            while (Project::where('slug', $validated['slug'])->where('id', '!=', $this->project->id)->exists()) {
                $validated['slug'] = $originalSlug . '-' . $count;
                $count++;
            }
        }

        // Handle new thumbnail upload
        if ($this->new_thumbnail) {
            // Delete old thumbnail
            if ($this->project->thumbnail && \Storage::disk('public')->exists($this->project->thumbnail)) {
                \Storage::disk('public')->delete($this->project->thumbnail);
            }

            $validated['thumbnail'] = $this->new_thumbnail->store('projects/thumbnails', 'public');
        }

        // Update project
        $this->project->update($validated);

        // Sync tags
        $this->project->tags()->sync($this->selected_tags ?? []);

        // Handle new gallery images
        if (!empty($this->gallery_images)) {
            $lastOrder = $this->project->galleries()->max('display_order') ?? 0;

            foreach ($this->gallery_images as $index => $image) {
                $path = $image->store('projects/galleries', 'public');
                $this->project->galleries()->create([
                    'image_path' => $path,
                    'display_order' => $lastOrder + $index + 1,
                ]);
            }
        }

        $this->toast()->success('Project updated successfully')->send();

        return $this->redirect(route('admin.projects.index'), navigate: true);
    }
}