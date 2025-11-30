<?php

namespace App\Http\Controllers;

use App\Models\CompanyInfo;
use App\Models\Project;
use App\Models\BusinessField;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\JsonLd;

class CompanyController extends Controller
{
    public function index()
    {
        $company = CompanyInfo::first();

        // Calculate statistics
        $currentYear = date('Y');
        $yearsExperience = $company ? ($currentYear - $company->established_year) : 25;

        $stats = [
            'completed_projects' => Project::where('status', 'completed')->count(),
            'total_clients' => Project::distinct('client_name')->count('client_name'),
            'years_experience' => $yearsExperience,
            'business_fields' => BusinessField::where('is_active', true)->count(),
        ];

        // Decode mission jika JSON
        if ($company && $company->mission) {
            if (is_string($company->mission)) {
                $company->mission = json_decode($company->mission, true) ?? [];
            }
        }

        // SEO
        SEOMeta::setTitle('Profil Perusahaan - Tentang Kami');
        SEOMeta::setDescription($company?->about_us ?? 'Perusahaan konstruksi terpercaya dengan pengalaman 25+ tahun di Indonesia.');
        SEOMeta::setCanonical(route('company.profile'));
        SEOMeta::addKeyword(['profil perusahaan', 'tentang kami', 'visi misi', 'perusahaan konstruksi']);

        OpenGraph::setTitle('Profil Perusahaan - ' . ($company?->company_name ?? 'Al Barokah Construction'));
        OpenGraph::setDescription($company?->tagline ?? 'Membangun Masa Depan Bersama');
        OpenGraph::setUrl(route('company.profile'));

        // JSON-LD
        JsonLd::setType('AboutPage');
        JsonLd::setTitle('Tentang ' . ($company?->company_name ?? 'Al Barokah Construction'));
        JsonLd::setDescription($company?->about_us ?? 'Profil perusahaan konstruksi');

        return view('company.profile', compact('company', 'stats'));
    }
}