<?php

namespace Database\Seeders;

use App\Models\SocialMedia;
use Illuminate\Database\Seeder;

class SocialMediaSeeder extends Seeder
{
    public function run(): void
    {
        $socialMedia = [
            [
                'platform' => 'Facebook',
                'url' => 'https://facebook.com/konstruksibanguns',
                'icon' => 'fab fa-facebook',
                'is_active' => true,
                'display_order' => 1,
            ],
            [
                'platform' => 'Instagram',
                'url' => 'https://instagram.com/konstruksibanguns',
                'icon' => 'fab fa-instagram',
                'is_active' => true,
                'display_order' => 2,
            ],
            [
                'platform' => 'LinkedIn',
                'url' => 'https://linkedin.com/company/konstruksi-bangun-sejahtera',
                'icon' => 'fab fa-linkedin',
                'is_active' => true,
                'display_order' => 3,
            ],
            [
                'platform' => 'YouTube',
                'url' => 'https://youtube.com/@konstruksibanguns',
                'icon' => 'fab fa-youtube',
                'is_active' => true,
                'display_order' => 4,
            ],
            [
                'platform' => 'Twitter',
                'url' => 'https://twitter.com/konstruksibanguns',
                'icon' => 'fab fa-twitter',
                'is_active' => false,
                'display_order' => 5,
            ],
        ];

        foreach ($socialMedia as $social) {
            SocialMedia::create($social);
        }
    }
}
