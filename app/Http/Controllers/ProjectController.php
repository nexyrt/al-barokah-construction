<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;

class ProjectController extends Controller
{
    public function show($slug)
    {
        $project = Project::where('slug', $slug)
            ->where('is_published', true)
            ->with(['businessField', 'galleries', 'tags', 'testimonials', 'creator'])
            ->firstOrFail();

        // Increment views
        $project->increment('views_count');

        // Get related projects (same business field)
        $relatedProjects = Project::where('business_field_id', $project->business_field_id)
            ->where('id', '!=', $project->id)
            ->where('is_published', true)
            ->latest()
            ->take(3)
            ->get();

        // SEO
        SEOMeta::setTitle($project->title);
        SEOMeta::setDescription($project->short_description ?? strip_tags(substr($project->description, 0, 160)));
        SEOMeta::setCanonical(route('projects.show', $slug));
        SEOMeta::addKeyword([$project->businessField->name, 'proyek konstruksi', $project->client_name]);

        OpenGraph::setTitle($project->title);
        OpenGraph::setDescription($project->short_description);
        OpenGraph::setUrl(route('projects.show', $slug));
        OpenGraph::setType('article');
        if ($project->thumbnail) {
            OpenGraph::addImage(asset('storage/'.$project->thumbnail));
        }

        JsonLd::setType('Project');
        JsonLd::setTitle($project->title);
        JsonLd::setDescription($project->description);

        return view('projects.show', compact('project', 'relatedProjects'));
    }
}
