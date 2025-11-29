<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\ProjectGallery;
use Illuminate\Database\Seeder;

class ProjectGallerySeeder extends Seeder
{
    public function run(): void
    {
        $projects = Project::all();

        foreach ($projects as $project) {
            // Create 5 gallery images for each project
            for ($i = 1; $i <= 5; $i++) {
                ProjectGallery::create([
                    'project_id' => $project->id,
                    'image_path' => "projects/{$project->slug}/gallery-{$i}.jpg",
                    'title' => "Progress {$i} - {$project->title}",
                    'description' => "Dokumentasi progres pembangunan tahap {$i} dari proyek {$project->title}",
                    'display_order' => $i,
                ]);
            }
        }
    }
}
