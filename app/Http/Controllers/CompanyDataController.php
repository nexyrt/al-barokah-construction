<?php

namespace App\Http\Controllers;

use App\Models\CompanyInfo;
use App\Models\CompanyLegalData;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;

class CompanyDataController extends Controller
{
    public function index()
    {
        $company = CompanyInfo::first();
        $legalData = CompanyLegalData::first();

        // Jika belum ada data, buat default
        if (!$legalData) {
            $legalData = new CompanyLegalData();
            $legalData->certifications = [];
            $legalData->awards = [];
            $legalData->board_of_commissioners = [];
            $legalData->board_of_directors = [];
            $legalData->management_team = [];
        }

        // Group certifications by type
        $certificationsByType = $this->groupCertificationsByType($legalData->certifications ?? []);

        // Legal documents
        $legalDocuments = [
            [
                'type' => 'NIB',
                'name' => 'Nomor Induk Berusaha',
                'number' => $legalData->nib,
                'file' => $legalData->nib_file ?? null,
            ],
            [
                'type' => 'SIUJK',
                'name' => 'Surat Izin Usaha Jasa Konstruksi',
                'number' => $legalData->siujk,
                'file' => $legalData->siujk_file ?? null,
            ],
            [
                'type' => 'TDP',
                'name' => 'Tanda Daftar Perusahaan',
                'number' => $legalData->tdp,
                'file' => $legalData->tdp_file ?? null,
            ],
            [
                'type' => 'Akta Pendirian',
                'name' => 'Akta Pendirian Perusahaan',
                'number' => '-',
                'file' => $legalData->akta_pendirian,
            ],
            [
                'type' => 'SK Kemenkumham',
                'name' => 'Surat Keputusan Kementerian Hukum dan HAM',
                'number' => '-',
                'file' => $legalData->sk_kemenkumham,
            ],
            [
                'type' => 'Surat Domisili',
                'name' => 'Surat Keterangan Domisili Usaha',
                'number' => '-',
                'file' => $legalData->domisili_usaha,
            ],
        ];

        // SEO
        SEOMeta::setTitle('Data Perusahaan - Informasi Legal & Struktur Organisasi');
        SEOMeta::setDescription('Informasi legal, sertifikasi, dan struktur organisasi Al Barokah Construction. Lengkap dengan NIB, SIUJK, TDP, sertifikasi ISO, K3, SBU, dan data dewan komisaris, direksi, serta manajemen.');
        SEOMeta::setCanonical(route('company.data'));
        SEOMeta::addKeyword(['data perusahaan', 'legalitas', 'sertifikasi', 'struktur organisasi', 'NIB', 'SIUJK', 'ISO', 'K3', 'SBU']);

        OpenGraph::setTitle('Data Perusahaan - Al Barokah Construction');
        OpenGraph::setDescription('Informasi legal dan struktur organisasi perusahaan');
        OpenGraph::setUrl(route('company.data'));

        return view('company.data', compact(
            'company',
            'legalData',
            'legalDocuments',
            'certificationsByType'
        ));
    }

    private function groupCertificationsByType(array $certifications): array
    {
        $grouped = [
            'ISO' => [],
            'K3' => [],
            'SBU' => [],
            'Other' => [],
        ];

        foreach ($certifications as $cert) {
            $type = $cert['type'] ?? 'Other';
            if (isset($grouped[$type])) {
                $grouped[$type][] = $cert;
            } else {
                $grouped['Other'][] = $cert;
            }
        }

        return $grouped;
    }
}