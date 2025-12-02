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

class Create extends Component
{
    use WithFileUploads, Interactions;

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
    public $status = 'ongoing';

    // Media
    public $thumbnail;
    public $gallery_images = [];
    public $temp_galleries = []; // For preview

    // Additional
    public $selected_tags = [];
    public $is_featured = false;
    public $is_published = true;

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
            'thumbnail' => 'nullable|image|max:5048',
            'gallery_images.*' => 'nullable|image|max:5048',
            'selected_tags' => 'nullable|array',
            'selected_tags.*' => 'exists:project_tags,id',
            'is_featured' => 'boolean',
            'is_published' => 'boolean',
        ];
    }

    public function render(): View
    {
        return view('livewire.admin.projects.create', [
            'businessFields' => BusinessField::where('is_active', true)->orderBy('name')->get(),
            'tags' => ProjectTag::orderBy('name')->get(),
        ]);
    }

    public function updatedGalleryImages()
    {
        $this->temp_galleries = $this->gallery_images;
    }

    public function save()
    {
        $validated = $this->validate();

        // Generate unique slug
        $validated['slug'] = Str::slug($validated['title']);
        $originalSlug = $validated['slug'];
        $count = 1;
        while (Project::where('slug', $validated['slug'])->exists()) {
            $validated['slug'] = $originalSlug . '-' . $count;
            $count++;
        }

        // Set created_by
        $validated['created_by'] = auth()->id();

        // Handle thumbnail upload
        if ($this->thumbnail) {
            $validated['thumbnail'] = $this->thumbnail->store('projects/thumbnails', 'public');
        }

        // Create project
        $project = Project::create($validated);

        // Attach tags
        if (!empty($this->selected_tags)) {
            $project->tags()->attach($this->selected_tags);
        }

        // Handle gallery images
        if (!empty($this->gallery_images)) {
            foreach ($this->gallery_images as $index => $image) {
                $path = $image->store('projects/galleries', 'public');
                $project->galleries()->create([
                    'image_path' => $path,
                    'display_order' => $index,
                ]);
            }
        }

        $this->toast()->success('Project created successfully')->send();

        return $this->redirect(route('admin.projects.index'), navigate: true);
    }
}