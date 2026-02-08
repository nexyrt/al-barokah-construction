<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CompanyLegalData;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class CompanyLegalDataSeeder extends Seeder
{
    /**
     * Generate and save avatar image locally using PHP GD
     */
    private function generateAvatar(string $name, string $filename): string
    {
        // Create directory if not exists
        if (!Storage::disk('public')->exists('team')) {
            Storage::disk('public')->makeDirectory('team');
        }

        $path = 'team/' . $filename;
        $fullPath = storage_path('app/public/' . $path);

        // Skip if file already exists
        if (file_exists($fullPath)) {
            $this->command->info("✓ Avatar already exists: {$filename}");
            return $path;
        }

        $initials = $this->getInitials($name);

        // Generate random background color
        $colors = [
            [22, 163, 74],   // Green
            [37, 99, 235],   // Blue
            [234, 88, 12],   // Orange
            [168, 85, 247],  // Purple
            [236, 72, 153],  // Pink
            [14, 165, 233],  // Sky
            [234, 179, 8],   // Yellow
            [239, 68, 68],   // Red
        ];
        $bgColor = $colors[array_rand($colors)];

        try {
            // Create image with GD
            $width = 512;
            $height = 512;
            $image = imagecreatetruecolor($width, $height);

            // Allocate colors
            $backgroundColor = imagecolorallocate($image, $bgColor[0], $bgColor[1], $bgColor[2]);
            $textColor = imagecolorallocate($image, 255, 255, 255);

            // Fill background
            imagefill($image, 0, 0, $backgroundColor);

            // Add text (initials) - using built-in font
            $fontSize = 5; // GD built-in font size (1-5)
            $textWidth = imagefontwidth($fontSize) * strlen($initials);
            $textHeight = imagefontheight($fontSize);
            $x = ($width - $textWidth) / 2;
            $y = ($height - $textHeight) / 2;

            // Draw text multiple times for bold effect
            for ($i = 0; $i < 3; $i++) {
                imagestring($image, $fontSize, $x + $i, $y, $initials, $textColor);
                imagestring($image, $fontSize, $x, $y + $i, $initials, $textColor);
            }

            // Save as JPEG
            imagejpeg($image, $fullPath, 90);
            imagedestroy($image);

            $this->command->info("✓ Generated avatar: {$filename} ({$initials})");
        } catch (\Exception $e) {
            $this->command->warn("⚠ Error generating avatar: " . $e->getMessage());
        }

        return $path;
    }

    /**
     * Get initials from full name
     */
    private function getInitials(string $name): string
    {
        // Remove titles (H., Ir., Dra., S.E., M.M., M.T., etc.)
        $cleanName = preg_replace('/\b(H\.|Ir\.|Dra?\.|S\.[A-Z]+|M\.[A-Z]+|Prof\.|Dr\.)\s*/i', '', $name);

        $words = explode(' ', trim($cleanName));
        $initials = '';

        foreach ($words as $word) {
            if (!empty($word)) {
                $initials .= mb_substr($word, 0, 1);
            }
        }

        return mb_strtoupper(mb_substr($initials, 0, 2)); // Max 2 letters
    }

    public function run(): void
    {
        $this->command->info('Generating team avatars...');

        // Define team members with their photos
        $teamMembers = [
            ['name' => 'H. Ahmad Fauzi, S.E., M.M.', 'file' => 'komisaris-utama.jpg'],
            ['name' => 'Ir. Budi Santoso, M.T.', 'file' => 'komisaris.jpg'],
            ['name' => 'Ir. Soekarno, M.T.', 'file' => 'direktur-utama.jpg'],
            ['name' => 'Dra. Siti Nurhaliza, M.M.', 'file' => 'direktur-keuangan.jpg'],
            ['name' => 'Ir. Bambang Suryadi, M.Sc.', 'file' => 'direktur-ops.jpg'],
            ['name' => 'Ir. Hendra Wijaya, M.T.', 'file' => 'gm.jpg'],
            ['name' => 'Drs. Agus Salim, M.M.', 'file' => 'manager-hrd.jpg'],
            ['name' => 'Ir. Dewi Lestari, M.T.', 'file' => 'manager-engineering.jpg'],
            ['name' => 'S.T. Eko Prasetyo', 'file' => 'manager-project.jpg'],
        ];

        // Generate all avatars
        foreach ($teamMembers as $member) {
            $this->generateAvatar($member['name'], $member['file']);
        }
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