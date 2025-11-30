<?php

namespace App\Http\Controllers;

use App\Models\CompanyInfo;
use App\Models\SocialMedia;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $company = CompanyInfo::first();
        $socialMedia = SocialMedia::where('is_active', true)
            ->orderBy('display_order')
            ->get();

        // Icon mapping untuk social media
        $iconMap = [
            'facebook' => 'fab fa-facebook-f',
            'instagram' => 'fab fa-instagram',
            'linkedin' => 'fab fa-linkedin-in',
            'twitter' => 'fab fa-twitter',
            'youtube' => 'fab fa-youtube',
            'whatsapp' => 'fab fa-whatsapp',
            'tiktok' => 'fab fa-tiktok',
        ];

        // SEO
        SEOMeta::setTitle('Kontak Kami - Hubungi Tim Kami');
        SEOMeta::setDescription('Hubungi kami untuk konsultasi proyek konstruksi Anda. Tim ahli kami siap membantu mewujudkan proyek impian Anda.');
        SEOMeta::setCanonical(route('contact.index'));
        SEOMeta::addKeyword(['kontak', 'hubungi kami', 'alamat kantor', 'konsultasi konstruksi']);

        OpenGraph::setTitle('Kontak Kami - Al Barokah Construction');
        OpenGraph::setDescription('Hubungi kami untuk konsultasi proyek konstruksi');
        OpenGraph::setUrl(route('contact.index'));

        return view('contact.index', compact('company', 'socialMedia', 'iconMap'));
    }

    public function submit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:2000',
        ]);

        // TODO: Simpan ke database atau kirim email
        // Untuk sekarang, hanya redirect dengan success message

        return back()->with('success', 'Terima kasih! Pesan Anda telah terkirim. Tim kami akan segera menghubungi Anda.');
    }
}
