<?php

namespace App\Http\Controllers;

use App\Models\BusinessField;
use App\Models\Project;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;

class BusinessFieldController extends Controller
{
    public function index()
    {
        $businessFields = BusinessField::where('is_active', true)
            ->withCount(['projects' => function ($query) {
                $query->where('is_published', true);
            }])
            ->orderBy('display_order')
            ->get();

        // Statistics
        $stats = [
            'total_fields' => $businessFields->count(),
            'total_projects' => Project::where('is_published', true)->count(),
            'completed_projects' => Project::where('status', 'completed')->count(),
        ];

        // Icon mapping
        $iconMap = [
            'building-2' => 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4',
            'home' => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6',
            'route' => 'M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7',
            'factory' => 'M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z',
            'wrench' => 'M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z M15 12a3 3 0 11-6 0 3 3 0 016 0z',
            'landmark' => 'M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z',
        ];

        // SEO
        SEOMeta::setTitle('Bidang Usaha - Layanan Konstruksi Terpadu');
        SEOMeta::setDescription('Al-Barokah menyediakan layanan konstruksi terpadu dengan spesialisasi di berbagai bidang untuk memenuhi kebutuhan pembangunan Anda');
        SEOMeta::setCanonical(route('business-fields.index'));
        SEOMeta::addKeyword(['bidang usaha', 'layanan konstruksi', 'jasa konstruksi', 'spesialisasi konstruksi']);

        OpenGraph::setTitle('Bidang Usaha - Al Barokah Construction');
        OpenGraph::setDescription('Layanan konstruksi terpadu untuk berbagai kebutuhan pembangunan');
        OpenGraph::setUrl(route('business-fields.index'));

        return view('business-fields.index', compact('businessFields', 'stats', 'iconMap'));
    }
}
