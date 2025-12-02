<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CompanyLegalData;

class CompanyLegalDataSeeder extends Seeder
{
    public function run(): void
    {
        CompanyLegalData::create([
            'nib' => '1234567890123456',
            'siujk' => '1-2345-6-12-3-4567890',
            'tdp' => '12.34.5.67.89012',
            'akta_pendirian' => 'documents/akta-pendirian.pdf',
            'sk_kemenkumham' => 'documents/sk-kemenkumham.pdf',
            'domisili_usaha' => 'documents/surat-domisili.pdf',

            'certifications' => [
                // ISO
                [
                    'type' => 'ISO',
                    'name' => 'ISO 9001:2015',
                    'number' => 'ISO-9001-2023-001234',
                    'issued_by' => 'TÜV SÜD',
                    'issued_date' => '2023-01-15',
                    'expired_date' => '2026-01-15',
                    'file_path' => 'certifications/iso-9001.pdf',
                ],
                [
                    'type' => 'ISO',
                    'name' => 'ISO 14001:2015',
                    'number' => 'ISO-14001-2023-001235',
                    'issued_by' => 'TÜV SÜD',
                    'issued_date' => '2023-02-20',
                    'expired_date' => '2026-02-20',
                    'file_path' => 'certifications/iso-14001.pdf',
                ],
                // K3
                [
                    'type' => 'K3',
                    'name' => 'SMK3 (Sistem Manajemen Keselamatan dan Kesehatan Kerja)',
                    'number' => 'KEP-001/K3/2023',
                    'issued_by' => 'Kementerian Ketenagakerjaan RI',
                    'issued_date' => '2023-03-10',
                    'expired_date' => '2026-03-10',
                    'file_path' => 'certifications/smk3.pdf',
                ],
                // SBU
                [
                    'type' => 'SBU',
                    'name' => 'Sertifikat Badan Usaha - Bangunan Gedung',
                    'number' => 'SBU-001-2023-KT',
                    'issued_by' => 'LPJK Kalimantan Timur',
                    'issued_date' => '2023-04-15',
                    'expired_date' => '2026-04-15',
                    'file_path' => 'certifications/sbu-gedung.pdf',
                ],
                [
                    'type' => 'SBU',
                    'name' => 'Sertifikat Badan Usaha - Jalan & Jembatan',
                    'number' => 'SBU-002-2023-KT',
                    'issued_by' => 'LPJK Kalimantan Timur',
                    'issued_date' => '2023-04-15',
                    'expired_date' => '2026-04-15',
                    'file_path' => 'certifications/sbu-jalan.pdf',
                ],
            ],

            'awards' => [
                [
                    'year' => 2023,
                    'title' => 'Best Construction Company Kalimantan Timur',
                    'issued_by' => 'Asosiasi Kontraktor Indonesia',
                    'description' => 'Penghargaan untuk perusahaan konstruksi terbaik di Kalimantan Timur',
                    'image_path' => 'awards/best-construction-2023.jpg',
                ],
                [
                    'year' => 2022,
                    'title' => 'Green Building Award',
                    'issued_by' => 'Indonesian Green Building Council',
                    'description' => 'Penghargaan untuk proyek bangunan ramah lingkungan',
                    'image_path' => 'awards/green-building-2022.jpg',
                ],
                [
                    'year' => 2021,
                    'title' => 'Safety Excellence Award',
                    'issued_by' => 'Kementerian PUPR',
                    'description' => 'Penghargaan keselamatan kerja konstruksi',
                    'image_path' => 'awards/safety-award-2021.jpg',
                ],
            ],

            'board_of_commissioners' => [
                [
                    'name' => 'H. Ahmad Fauzi, S.E., M.M.',
                    'position' => 'Komisaris Utama',
                    'photo' => 'team/komisaris-utama.jpg',
                ],
                [
                    'name' => 'Ir. Budi Santoso, M.T.',
                    'position' => 'Komisaris',
                    'photo' => 'team/komisaris.jpg',
                ],
            ],

            'board_of_directors' => [
                [
                    'name' => 'Ir. Soekarno, M.T.',
                    'position' => 'Direktur Utama',
                    'photo' => 'team/direktur-utama.jpg',
                ],
                [
                    'name' => 'Dra. Siti Nurhaliza, M.M.',
                    'position' => 'Direktur Keuangan',
                    'photo' => 'team/direktur-keuangan.jpg',
                ],
                [
                    'name' => 'Ir. Bambang Suryadi, M.Sc.',
                    'position' => 'Direktur Operasional',
                    'photo' => 'team/direktur-ops.jpg',
                ],
            ],

            'management_team' => [
                [
                    'name' => 'Ir. Hendra Wijaya, M.T.',
                    'position' => 'General Manager',
                    'photo' => 'team/gm.jpg',
                ],
                [
                    'name' => 'Drs. Agus Salim, M.M.',
                    'position' => 'Manager HRD & GA',
                    'photo' => 'team/manager-hrd.jpg',
                ],
                [
                    'name' => 'Ir. Dewi Lestari, M.T.',
                    'position' => 'Manager Engineering',
                    'photo' => 'team/manager-engineering.jpg',
                ],
                [
                    'name' => 'S.T. Eko Prasetyo',
                    'position' => 'Manager Project',
                    'photo' => 'team/manager-project.jpg',
                ],
            ],
        ]);
    }
}