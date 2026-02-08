<?php

namespace App\Http\Controllers;

use App\Models\BusinessField;
use App\Models\Client;
use App\Models\CompanyInfo;
use App\Models\Project;
use App\Models\Testimonial;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\TwitterCard;

class HomeController extends Controller
{
    public function index()
    {
        // Get company info
        $company = CompanyInfo::first();

        // Get featured projects (max 6)
        $featuredProjects = Project::where('is_featured', true)
            ->where('is_published', true)
            ->with('businessField')
            ->latest()
            ->take(6)
            ->get();

        // Get all business fields
        $businessFields = BusinessField::where('is_active', true)
            ->orderBy('display_order')
            ->withCount([
                'projects' => function ($query) {
                    $query->where('is_published', true);
                }
            ])
            ->get();

        // Get published testimonials
        $testimonials = Testimonial::where('is_published', true)
            ->with('project')
            ->orderBy('display_order')
            ->take(5)
            ->get();

        // Calculate statistics
        $stats = [
            'total_projects' => Project::where('status', 'completed')->count(),
            'total_clients' => Project::distinct('client_name')->count('client_name'),
            'years_experience' => $company ? (date('Y') - $company->established_year) : 25,
            'business_fields' => $businessFields->count(),
        ];

        // SEO Meta Tags
        SEOMeta::setTitle('Beranda - Perusahaan Konstruksi Terpercaya');
        SEOMeta::setDescription($company?->about_us ?? 'PT Konstruksi Bangun Sejahtera adalah perusahaan konstruksi terpercaya dengan pengalaman 25+ tahun. Spesialis pembangunan gedung, jalan, jembatan, dan infrastruktur sipil.');
        SEOMeta::setCanonical(url('/'));
        SEOMeta::addKeyword(['konstruksi indonesia', 'kontraktor terpercaya', 'pembangunan gedung', 'infrastruktur', 'jalan tol', 'al barokah construction']);

        // Open Graph
        OpenGraph::setTitle($company?->company_name ?? 'Al Barokah Construction');
        OpenGraph::setDescription($company?->tagline ?? 'Membangun Masa Depan Bersama');
        OpenGraph::setUrl(url('/'));
        OpenGraph::setType('website');
        // OpenGraph::addImage(asset('images/og-home.jpg')); // Nanti tambahkan image

        // Twitter Card
        TwitterCard::setType('summary_large_image');
        TwitterCard::setTitle($company?->company_name ?? 'Al Barokah Construction');
        TwitterCard::setDescription($company?->tagline ?? 'Membangun Masa Depan Bersama');

        // JSON-LD Schema
        JsonLd::setType('Organization');
        JsonLd::setTitle($company?->company_name ?? 'PT Konstruksi Bangun Sejahtera');
        JsonLd::setDescription($company?->about_us ?? 'Perusahaan konstruksi terpercaya');
        JsonLd::addValue('url', url('/'));

        JsonLd::addValue('logo', asset('icon.png'));

        if ($company?->address) {
            JsonLd::addValue('address', [
                '@type' => 'PostalAddress',
                'streetAddress' => $company->address,
                'addressCountry' => 'ID',
            ]);
        }

        if ($company?->phone) {
            JsonLd::addValue('telephone', $company->phone);
        }

        if ($company?->email) {
            JsonLd::addValue('email', $company->email);
        }

        // Get active clients from database (ordered by display_order)
        $clients = Client::active()->ordered()->get();

        return view('home', compact(
            'company',           // ✅ FIXED: Added $company
            'featuredProjects',
            'businessFields',
            'stats',
            'testimonials',
            'clients'
        ));
    }
}