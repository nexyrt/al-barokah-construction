<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\ProjectTag;
use Illuminate\Database\Seeder;

class ProjectTagRelationSeeder extends Seeder
{
    public function run(): void
    {
        $tagMapping = [
            'pembangunan-gedung-perkantoran-15-lantai' => ['High Rise', 'Green Building', 'Smart Building', 'Komersial', 'Swasta'],
            'konstruksi-jalan-tol-akses-bandara' => ['Infrastruktur', 'Jalan Tol', 'Pemerintah'],
            'pembangunan-mall-shopping-center' => ['Komersial', 'Mixed Use', 'Retail', 'Smart Building', 'Swasta'],
            'proyek-bendungan-irigasi' => ['Infrastruktur', 'Irigasi', 'Pemerintah'],
            'renovasi-hotel-bintang-5' => ['Hospitality', 'Komersial', 'Swasta'],
        ];

        foreach ($tagMapping as $projectSlug => $tagNames) {
            $project = Project::where('slug', $projectSlug)->first();
            if ($project) {
                $tagIds = ProjectTag::whereIn('name', $tagNames)->pluck('id');
                $project->tags()->attach($tagIds);
            }
        }
    }
}
