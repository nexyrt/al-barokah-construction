<?php

namespace App\Http\Controllers;

use App\Models\BusinessField;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;

class BusinessFieldController extends Controller
{
    public function index()
    {
        $businessFields = BusinessField::where('is_active', true)
            ->orderBy('display_order')
            ->withCount(['projects' => function($query) {
                $query->where('is_published', true);
            }])
            ->get();
        
        // SEO
        SEOMeta::setTitle('Bidang Usaha - Layanan Konstruksi Profesional');
        SEOMeta::setDescription('Kami melayani berbagai bidang konstruksi: Pembangunan Gedung, Jalan & Jembatan, Infrastruktur Sipil, Renovasi, dan Sistem MEP dengan standar kualitas terbaik.');
        SEOMeta::setCanonical(route('business-fields.index'));
        
        OpenGraph::setTitle('Bidang Usaha - Al Barokah Construction');
        OpenGraph::setDescription('Layanan konstruksi profesional untuk berbagai jenis proyek');
        
        return view('business-fields.index', compact('businessFields'));
    }
}