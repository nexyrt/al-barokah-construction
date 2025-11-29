<?php

namespace Database\Seeders;

use App\Models\BusinessField;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $businessFieldGedung = BusinessField::where('slug', 'konstruksi-bangunan-gedung')->first();
        $businessFieldJalan = BusinessField::where('slug', 'konstruksi-jalan-dan-jembatan')->first();
        $businessFieldSipil = BusinessField::where('slug', 'konstruksi-bangunan-sipil')->first();
        $user = User::first();

        $projects = [
            [
                'title' => 'Pembangunan Gedung Perkantoran 15 Lantai',
                'slug' => 'pembangunan-gedung-perkantoran-15-lantai',
                'client_name' => 'PT Maju Bersama Indonesia',
                'business_field_id' => $businessFieldGedung->id,
                'location' => 'Jakarta Selatan, DKI Jakarta',
                'description' => 'Proyek pembangunan gedung perkantoran modern berlantai 15 dengan total luas bangunan 25.000 m². Dilengkapi dengan fasilitas lengkap termasuk basement parking, sky garden, dan smart building system. Menggunakan teknologi green building dan sertifikasi LEED Gold.',
                'short_description' => 'Gedung perkantoran modern 15 lantai dengan konsep green building',
                'project_value' => 250000000000,
                'area_size' => '25.000 m²',
                'start_date' => '2023-01-15',
                'end_date' => '2024-12-20',
                'status' => 'completed',
                'is_featured' => true,
                'is_published' => true,
                'thumbnail' => 'projects/gedung-perkantoran-thumb.jpg',
                'views_count' => 245,
                'created_by' => $user->id,
            ],
            [
                'title' => 'Konstruksi Jalan Tol Akses Bandara',
                'slug' => 'konstruksi-jalan-tol-akses-bandara',
                'client_name' => 'Kementerian PUPR',
                'business_field_id' => $businessFieldJalan->id,
                'location' => 'Tangerang, Banten',
                'description' => 'Pembangunan jalan tol akses bandara sepanjang 12 km dengan 2 interchange, 3 jembatan layang, dan sistem drainase modern. Proyek infrastruktur strategis untuk meningkatkan konektivitas akses menuju bandara internasional.',
                'short_description' => 'Jalan tol akses bandara 12 km dengan 2 interchange',
                'project_value' => 850000000000,
                'area_size' => '12 km',
                'start_date' => '2022-06-01',
                'end_date' => '2024-08-30',
                'status' => 'completed',
                'is_featured' => true,
                'is_published' => true,
                'thumbnail' => 'projects/jalan-tol-thumb.jpg',
                'views_count' => 189,
                'created_by' => $user->id,
            ],
            [
                'title' => 'Pembangunan Mall & Shopping Center',
                'slug' => 'pembangunan-mall-shopping-center',
                'client_name' => 'PT Retail Nusantara',
                'business_field_id' => $businessFieldGedung->id,
                'location' => 'Surabaya, Jawa Timur',
                'description' => 'Proyek pembangunan pusat perbelanjaan modern 5 lantai dengan konsep mixed-use development. Menggabungkan area retail, food court, cinema, dan entertainment center dengan total luas 45.000 m². Dilengkapi dengan sistem parkir otomatis dan smart mall technology.',
                'short_description' => 'Pusat perbelanjaan modern 5 lantai dengan konsep mixed-use',
                'project_value' => 380000000000,
                'area_size' => '45.000 m²',
                'start_date' => '2023-03-10',
                'end_date' => null,
                'status' => 'ongoing',
                'is_featured' => true,
                'is_published' => true,
                'thumbnail' => 'projects/mall-thumb.jpg',
                'views_count' => 156,
                'created_by' => $user->id,
            ],
            [
                'title' => 'Proyek Bendungan Irigasi',
                'slug' => 'proyek-bendungan-irigasi',
                'client_name' => 'Dinas PU Kabupaten Bogor',
                'business_field_id' => $businessFieldSipil->id,
                'location' => 'Bogor, Jawa Barat',
                'description' => 'Pembangunan bendungan irigasi dengan kapasitas 5 juta m³ untuk mengairi lahan pertanian seluas 2.500 hektar. Proyek meliputi konstruksi dam, saluran irigasi primer dan sekunder, serta sistem monitoring otomatis.',
                'short_description' => 'Bendungan irigasi kapasitas 5 juta m³',
                'project_value' => 125000000000,
                'area_size' => '2.500 ha',
                'start_date' => '2023-08-01',
                'end_date' => '2025-06-30',
                'status' => 'ongoing',
                'is_featured' => false,
                'is_published' => true,
                'thumbnail' => 'projects/bendungan-thumb.jpg',
                'views_count' => 98,
                'created_by' => $user->id,
            ],
            [
                'title' => 'Renovasi Hotel Bintang 5',
                'slug' => 'renovasi-hotel-bintang-5',
                'client_name' => 'PT Hospitality Indonesia',
                'business_field_id' => $businessFieldGedung->id,
                'location' => 'Bali',
                'description' => 'Proyek renovasi total hotel bintang 5 dengan 200 kamar. Meliputi pembaruan interior, upgrade sistem MEP, renovasi lobby dan restaurant, serta penambahan spa & wellness center. Tetap beroperasi selama proses renovasi dengan metode phasing.',
                'short_description' => 'Renovasi hotel bintang 5 dengan 200 kamar',
                'project_value' => 95000000000,
                'area_size' => '15.000 m²',
                'start_date' => '2024-02-01',
                'end_date' => '2024-11-30',
                'status' => 'ongoing',
                'is_featured' => false,
                'is_published' => true,
                'thumbnail' => 'projects/hotel-thumb.jpg',
                'views_count' => 67,
                'created_by' => $user->id,
            ],
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }
    }
}
