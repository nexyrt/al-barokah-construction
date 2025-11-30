<?php

namespace Database\Seeders;

use App\Models\ProjectGallery;
use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectGallerySeeder extends Seeder
{
    public function run(): void
    {
        $projects = Project::all();

        // Unsplash construction images collection
        $constructionImages = [
            'https://images.unsplash.com/photo-1541888946425-d81bb19240f5?w=1200&h=800&fit=crop', // Office building
            'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?w=1200&h=800&fit=crop', // Modern glass building
            'https://images.unsplash.com/photo-1503387762-592deb58ef4e?w=1200&h=800&fit=crop', // Construction site
            'https://images.unsplash.com/photo-1590496793907-03a6b4e0b35f?w=1200&h=800&fit=crop', // Building construction
            'https://images.unsplash.com/photo-1584464491033-06628f3a6b7b?w=1200&h=800&fit=crop', // Highway/road
            'https://images.unsplash.com/photo-1581094271901-8022df4466f9?w=1200&h=800&fit=crop', // Bridge construction
            'https://images.unsplash.com/photo-1555529902-5261145633bf?w=1200&h=800&fit=crop', // Shopping mall interior
            'https://images.unsplash.com/photo-1563241527-3004b7be0ffd?w=1200&h=800&fit=crop', // Residential building
            'https://images.unsplash.com/photo-1547481887-a26e2caa7260?w=1200&h=800&fit=crop', // Dam/infrastructure
            'https://images.unsplash.com/photo-1566073771259-6a8506099945?w=1200&h=800&fit=crop', // Hotel exterior
            'https://images.unsplash.com/photo-1582268611958-ebfd161ef9cf?w=1200&h=800&fit=crop', // Construction workers
            'https://images.unsplash.com/photo-1597045566677-8cf032d6b3d5?w=1200&h=800&fit=crop', // Modern architecture
        ];

        foreach ($projects as $project) {
            // Ambil 5-8 gambar random untuk setiap project
            $galleryCount = rand(5, 8);

            for ($i = 0; $i < $galleryCount; $i++) {
                ProjectGallery::create([
                    'project_id' => $project->id,
                    'image_path' => $constructionImages[array_rand($constructionImages)],
                    'caption' => $this->generateCaption($project, $i),
                    'display_order' => $i + 1,
                ]);
            }
        }
    }

    private function generateCaption($project, $index): string
    {
        $captions = [
            'Tampak depan bangunan',
            'Area konstruksi dari sudut berbeda',
            'Detail finishing eksterior',
            'Interior ruang utama',
            'Proses pengerjaan struktur',
            'Dokumentasi progress pekerjaan',
            'Area parkir dan landscape',
            'Tampak samping bangunan',
            'Detail arsitektur',
            'Suasana malam hari',
        ];

        return $captions[$index % count($captions)] . ' - ' . $project->title;
    }
}