<?php

namespace App\Http\Controllers;

use App\Models\CompanyInfo;
use App\Models\Project;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;

class CompanyController extends Controller
{
    public function index()
    {
        $company = CompanyInfo::first();

        // Statistics
        $stats = [
            'total_projects' => Project::where('status', 'completed')->count(),
            'ongoing_projects' => Project::where('status', 'ongoing')->count(),
            'total_clients' => Project::distinct('client_name')->count('client_name'),
            'years_experience' => $company ? (date('Y') - $company->established_year) : 25,
        ];

        // SEO
        SEOMeta::setTitle('Profil Perusahaan - Tentang Kami');
        SEOMeta::setDescription($company?->about_us ?? 'Perusahaan konstruksi terpercaya dengan pengalaman 25+ tahun di Indonesia.');
        SEOMeta::setCanonical(route('company.profile'));

        OpenGraph::setTitle('Profil Perusahaan - '.($company?->company_name ?? 'Al Barokah Construction'));
        OpenGraph::setDescription($company?->tagline ?? 'Membangun Masa Depan Bersama');

        // JSON-LD - FIXED
        JsonLd::setType('AboutPage');
        JsonLd::setTitle('Tentang '.($company?->company_name ?? 'Al Barokah Construction'));
        JsonLd::setDescription($company?->about_us ?? 'Profil perusahaan konstruksi');

        return view('company.profile', compact('company', 'stats'));
    }
}
