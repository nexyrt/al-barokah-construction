<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Project;
use App\Models\BusinessField;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;

class ProjectIndex extends Component
{
    public $searchTerm = '';
    public $selectedField = 'all';
    public $selectedStatus = 'all';
    public $sortBy = 'newest';

    public function render()
    {
        // SEO Meta Tags
        SEOMeta::setTitle('Portofolio Proyek - Galeri Karya Kami');
        SEOMeta::setDescription('Eksplorasi berbagai proyek konstruksi berkualitas yang telah kami kerjakan dengan dedikasi dan profesionalisme tinggi');
        SEOMeta::setCanonical(route('projects.index'));
        SEOMeta::addKeyword(['portofolio konstruksi', 'proyek konstruksi', 'galeri proyek', 'karya konstruksi']);

        OpenGraph::setTitle('Portofolio Proyek - Al Barokah Construction');
        OpenGraph::setDescription('Eksplorasi berbagai proyek konstruksi berkualitas yang telah kami kerjakan');
        OpenGraph::setUrl(route('projects.index'));

        // Get all business fields for filter
        $businessFields = BusinessField::where('is_active', true)
            ->orderBy('display_order')
            ->get();

        // Query builder
        $query = Project::where('is_published', true)
            ->with('businessField');

        // Apply search
        if (!empty($this->searchTerm)) {
            $query->where(function ($q) {
                $q->where('title', 'like', '%' . $this->searchTerm . '%')
                    ->orWhere('client_name', 'like', '%' . $this->searchTerm . '%')
                    ->orWhere('location', 'like', '%' . $this->searchTerm . '%');
            });
        }

        // Apply business field filter
        if ($this->selectedField !== 'all') {
            $query->where('business_field_id', $this->selectedField);
        }

        // Apply status filter
        if ($this->selectedStatus !== 'all') {
            $query->where('status', $this->selectedStatus);
        }

        // Apply sorting
        switch ($this->sortBy) {
            case 'newest':
                $query->orderBy('start_date', 'desc');
                break;
            case 'oldest':
                $query->orderBy('start_date', 'asc');
                break;
            case 'a-z':
                $query->orderBy('title', 'asc');
                break;
            case 'views':
                $query->orderBy('views_count', 'desc');
                break;
        }

        $projects = $query->get();
        $totalPublished = Project::where('is_published', true)->count();

        return view('livewire.project-index', [
            'projects' => $projects,
            'businessFields' => $businessFields,
            'totalPublished' => $totalPublished,
        ])->layout('components.layouts.public');
    }

    public function resetFilters()
    {
        $this->searchTerm = '';
        $this->selectedField = 'all';
        $this->selectedStatus = 'all';
        $this->sortBy = 'newest';
    }
}