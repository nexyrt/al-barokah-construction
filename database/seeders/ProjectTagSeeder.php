<?php

namespace Database\Seeders;

use App\Models\ProjectTag;
use Illuminate\Database\Seeder;

class ProjectTagSeeder extends Seeder
{
    public function run(): void
    {
        $tags = [
            ['name' => 'High Rise', 'slug' => 'high-rise'],
            ['name' => 'Green Building', 'slug' => 'green-building'],
            ['name' => 'Infrastruktur', 'slug' => 'infrastruktur'],
            ['name' => 'Komersial', 'slug' => 'komersial'],
            ['name' => 'Pemerintah', 'slug' => 'pemerintah'],
            ['name' => 'Swasta', 'slug' => 'swasta'],
            ['name' => 'Smart Building', 'slug' => 'smart-building'],
            ['name' => 'Jalan Tol', 'slug' => 'jalan-tol'],
            ['name' => 'Irigasi', 'slug' => 'irigasi'],
            ['name' => 'Hospitality', 'slug' => 'hospitality'],
            ['name' => 'Mixed Use', 'slug' => 'mixed-use'],
            ['name' => 'Retail', 'slug' => 'retail'],
        ];

        foreach ($tags as $tag) {
            ProjectTag::create($tag);
        }
    }
}
