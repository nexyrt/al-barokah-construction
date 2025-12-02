<?php

namespace App\Http\Controllers;

use App\Models\BusinessField;
use App\Models\Project;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;

class BusinessFieldController extends Controller
{
    public function index()
    {
        $businessFields = BusinessField::where('is_active', true)
            ->withCount([
                'projects' => function ($query) {
                    $query->where('is_published', true);
                }
            ])
            ->orderBy('display_order')
            ->get();

        // Calculate stats
        $stats = [
            'total_fields' => $businessFields->count(),
            'total_projects' => Project::where('is_published', true)
                ->where('status', 'completed')
                ->count(),
            'years_experience' => now()->year - 2000, // Misal perusahaan berdiri tahun 2000
            'total_clients' => Project::where('is_published', true)
                ->distinct('client_name')
                ->count('client_name'),
        ];

        // SEO
        SEOMeta::setTitle('Bidang Usaha - Layanan Konstruksi Terpadu');
        SEOMeta::setDescription('Layanan konstruksi lengkap meliputi bangunan gedung, jalan & jembatan, irigasi, dan infrastruktur lainnya dengan standar kualitas terbaik.');
        SEOMeta::setCanonical(route('business-fields.index'));

        OpenGraph::setTitle('Bidang Usaha - Al Barokah Construction');
        OpenGraph::setDescription('Layanan konstruksi terpadu dengan standar internasional');
        OpenGraph::setUrl(route('business-fields.index'));

        return view('business-fields.index', compact('businessFields', 'stats'));
    }

    public function show($slug)
    {
        $businessField = BusinessField::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        // Get related projects
        $projects = $businessField->publishedProjects()
            ->with(['businessField', 'galleries'])
            ->take(6)
            ->get();

        $totalProjects = $businessField->publishedProjects()->count();

        // Get other business fields
        $otherFields = BusinessField::where('is_active', true)
            ->where('id', '!=', $businessField->id)
            ->orderBy('display_order')
            ->take(3)
            ->get();

        // SEO
        SEOMeta::setTitle($businessField->name . ' - Bidang Usaha');
        SEOMeta::setDescription($businessField->description);
        SEOMeta::setCanonical(route('business-fields.show', $businessField->slug));
        SEOMeta::addKeyword(['konstruksi', $businessField->name, 'kontraktor', 'pembangunan']);

        OpenGraph::setTitle($businessField->name . ' - Al Barokah Construction');
        OpenGraph::setDescription($businessField->description);
        OpenGraph::setUrl(route('business-fields.show', $businessField->slug));

        if ($businessField->hero_image) {
            OpenGraph::addImage(asset('storage/' . $businessField->hero_image));
        }

        return view('business-fields.show', compact('businessField', 'projects', 'totalProjects', 'otherFields'));
    }
}