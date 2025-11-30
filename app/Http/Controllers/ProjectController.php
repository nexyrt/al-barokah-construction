<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\JsonLd;

class ProjectController extends Controller
{
    public function show($slug)
    {
        // Load project dengan relations
        $project = Project::where('slug', $slug)
            ->where('is_published', true)
            ->with([
                'businessField',
                'galleries',
                'tags', // Many-to-many relationship
                'testimonials' => function ($query) {
                    $query->where('is_published', true)->orderBy('display_order');
                }
            ])
            ->firstOrFail();

        // Increment views count
        $project->increment('views_count');

        // Calculate duration in months
        if ($project->start_date && $project->end_date) {
            $start = \Carbon\Carbon::parse($project->start_date);
            $end = \Carbon\Carbon::parse($project->end_date);
            $project->duration_months = $start->diffInMonths($end);
        } else {
            $project->duration_months = null;
        }

        // Get related projects (same business field, exclude current)
        $relatedProjects = Project::where('business_field_id', $project->business_field_id)
            ->where('id', '!=', $project->id)
            ->where('is_published', true)
            ->with('businessField')
            ->inRandomOrder()
            ->take(3)
            ->get();

        // SEO Meta Tags
        SEOMeta::setTitle($project->title . ' - Detail Proyek');
        SEOMeta::setDescription($project->short_description ?? Str::limit($project->description, 155));
        SEOMeta::setCanonical(route('projects.show', $project->slug));
        SEOMeta::addKeyword([
            $project->title,
            $project->businessField->name,
            'proyek konstruksi',
            $project->location,
            $project->client_name,
        ]);

        // Open Graph
        OpenGraph::setTitle($project->title);
        OpenGraph::setDescription($project->short_description ?? Str::limit($project->description, 200));
        OpenGraph::setUrl(route('projects.show', $project->slug));
        OpenGraph::setType('article');

        if ($project->thumbnail) {
            if (filter_var($project->thumbnail, FILTER_VALIDATE_URL)) {
                OpenGraph::addImage($project->thumbnail);
            } else {
                OpenGraph::addImage(asset('storage/' . $project->thumbnail));
            }
        }

        // JSON-LD Schema
        JsonLd::setType('Project');
        JsonLd::setTitle($project->title);
        JsonLd::setDescription($project->description);
        JsonLd::addValue('url', route('projects.show', $project->slug));
        JsonLd::addValue('startDate', $project->start_date);
        if ($project->end_date) {
            JsonLd::addValue('endDate', $project->end_date);
        }

        return view('projects.show', compact('project', 'relatedProjects'));
    }
}