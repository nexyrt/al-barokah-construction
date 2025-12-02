<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\BusinessField;
use App\Models\User;
use App\Models\ProjectTag;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        // Pastikan ada user untuk created_by
        $user = User::first();
        if (!$user) {
            $this->command->error('❌ No users found. Please run UserSeeder first.');
            return;
        }

        // Pastikan ada business fields
        $businessFields = BusinessField::all();
        if ($businessFields->isEmpty()) {
            $this->command->error('❌ No business fields found. Please run BusinessFieldSeeder first.');
            return;
        }

        // Get business fields by slug
        $businessFieldGedung = BusinessField::where('slug', 'bangunan-gedung')->first();
        $businessFieldJalan = BusinessField::where('slug', 'jalan-jembatan')->first();
        $businessFieldIrigasi = BusinessField::where('slug', 'irigasi-bendungan')->first();
        $businessFieldPelabuhan = BusinessField::where('slug', 'pelabuhan-dermaga')->first();
        $businessFieldPembangkit = BusinessField::where('slug', 'pembangkit-listrik')->first();

        // Fallback ke business field pertama jika slug tidak ada
        $defaultField = $businessFields->first();

        $projects = [
            [
                'title' => 'Pembangunan Gedung Perkantoran PT Wijaya Kusuma',
                'slug' => 'pembangunan-gedung-perkantoran-pt-wijaya-kusuma',
                'client_name' => 'PT Wijaya Kusuma',
                'business_field_id' => $businessFieldGedung?->id ?? $defaultField->id,
                'location' => 'Samarinda, Kalimantan Timur',
                'description' => 'Pembangunan gedung perkantoran 8 lantai dengan total luas bangunan 5.000 m2. Menggunakan struktur beton bertulang dengan sistem MEP terintegrasi.',
                'short_description' => 'Gedung perkantoran modern 8 lantai di pusat kota Samarinda',
                'project_value' => 25000000000,
                'area_size' => '5.000 m2',
                'start_date' => '2023-01-15',
                'end_date' => '2024-06-30',
                'status' => 'completed',
                'is_featured' => true,
                'is_published' => true,
                'thumbnail' => null,
                'views_count' => 245,
                'created_by' => $user->id,
            ],
            [
                'title' => 'Konstruksi Jembatan Mahakam III',
                'slug' => 'konstruksi-jembatan-mahakam-iii',
                'client_name' => 'Dinas PUPR Provinsi Kalimantan Timur',
                'business_field_id' => $businessFieldJalan?->id ?? $defaultField->id,
                'location' => 'Samarinda, Kalimantan Timur',
                'description' => 'Pembangunan jembatan beton dengan panjang 450 meter dan lebar 12 meter untuk menghubungkan dua sisi sungai Mahakam.',
                'short_description' => 'Jembatan beton sepanjang 450 meter di Sungai Mahakam',
                'project_value' => 150000000000,
                'area_size' => '5.400 m2',
                'start_date' => '2022-03-10',
                'end_date' => '2024-09-20',
                'status' => 'completed',
                'is_featured' => true,
                'is_published' => true,
                'thumbnail' => null,
                'views_count' => 532,
                'created_by' => $user->id,
            ],
            [
                'title' => 'Pembangunan Bendungan Panji Sukarame',
                'slug' => 'pembangunan-bendungan-panji-sukarame',
                'client_name' => 'Kementerian PUPR',
                'business_field_id' => $businessFieldIrigasi?->id ?? $defaultField->id,
                'location' => 'Kutai Kartanegara, Kalimantan Timur',
                'description' => 'Konstruksi bendungan tipe urugan dengan tinggi 35 meter untuk irigasi dan pembangkit listrik tenaga air.',
                'short_description' => 'Bendungan urugan setinggi 35 meter untuk PLTA dan irigasi',
                'project_value' => 500000000000,
                'area_size' => '125 ha',
                'start_date' => '2020-05-20',
                'end_date' => '2024-12-15',
                'status' => 'ongoing',
                'is_featured' => true,
                'is_published' => true,
                'thumbnail' => null,
                'views_count' => 678,
                'created_by' => $user->id,
            ],
            [
                'title' => 'Pembangunan Apartemen Green Bay Residence',
                'slug' => 'pembangunan-apartemen-green-bay-residence',
                'client_name' => 'PT Green Property Indonesia',
                'business_field_id' => $businessFieldGedung?->id ?? $defaultField->id,
                'location' => 'Balikpapan, Kalimantan Timur',
                'description' => 'Pembangunan apartemen 15 lantai dengan 200 unit dan fasilitas lengkap termasuk kolam renang, gym, dan area komersial.',
                'short_description' => 'Apartemen mewah 15 lantai dengan 200 unit',
                'project_value' => 80000000000,
                'area_size' => '12.000 m2',
                'start_date' => '2023-08-01',
                'end_date' => '2025-12-31',
                'status' => 'ongoing',
                'is_featured' => false,
                'is_published' => true,
                'thumbnail' => null,
                'views_count' => 189,
                'created_by' => $user->id,
            ],
            [
                'title' => 'Perbaikan Jalan Provinsi Km 10 - Km 25',
                'slug' => 'perbaikan-jalan-provinsi-km-10-km-25',
                'client_name' => 'Dinas Bina Marga Kaltim',
                'business_field_id' => $businessFieldJalan?->id ?? $defaultField->id,
                'location' => 'Samarinda - Bontang, Kalimantan Timur',
                'description' => 'Overlay dan perbaikan jalan provinsi sepanjang 15 km dengan aspal hotmix tebal 8 cm.',
                'short_description' => 'Perbaikan jalan provinsi sepanjang 15 km',
                'project_value' => 35000000000,
                'area_size' => '105.000 m2',
                'start_date' => '2023-11-01',
                'end_date' => '2024-04-30',
                'status' => 'completed',
                'is_featured' => false,
                'is_published' => true,
                'thumbnail' => null,
                'views_count' => 156,
                'created_by' => $user->id,
            ],
            [
                'title' => 'Pembangunan Jaringan Irigasi Desa Separi',
                'slug' => 'pembangunan-jaringan-irigasi-desa-separi',
                'client_name' => 'Dinas Pertanian Kutai Kartanegara',
                'business_field_id' => $businessFieldIrigasi?->id ?? $defaultField->id,
                'location' => 'Kutai Kartanegara, Kalimantan Timur',
                'description' => 'Konstruksi jaringan irigasi teknis untuk 500 ha sawah dengan bangunan intake, saluran primer dan sekunder.',
                'short_description' => 'Jaringan irigasi teknis untuk 500 ha sawah',
                'project_value' => 45000000000,
                'area_size' => '500 ha',
                'start_date' => '2023-02-15',
                'end_date' => '2024-08-31',
                'status' => 'completed',
                'is_featured' => false,
                'is_published' => true,
                'thumbnail' => null,
                'views_count' => 123,
                'created_by' => $user->id,
            ],
            [
                'title' => 'Pembangunan Dermaga Batubara PT Energi Nusantara',
                'slug' => 'pembangunan-dermaga-batubara-pt-energi-nusantara',
                'client_name' => 'PT Energi Nusantara',
                'business_field_id' => $businessFieldPelabuhan?->id ?? $defaultField->id,
                'location' => 'Balikpapan, Kalimantan Timur',
                'description' => 'Konstruksi dermaga batubara dengan kapasitas loading 3.000 ton/jam, termasuk jetty, conveyor system, dan stockpile.',
                'short_description' => 'Dermaga batubara kapasitas 3.000 ton/jam',
                'project_value' => 120000000000,
                'area_size' => '8 ha',
                'start_date' => '2022-07-10',
                'end_date' => '2024-03-15',
                'status' => 'completed',
                'is_featured' => true,
                'is_published' => true,
                'thumbnail' => null,
                'views_count' => 423,
                'created_by' => $user->id,
            ],
            [
                'title' => 'Pembangunan PLTA Kayan Cascade',
                'slug' => 'pembangunan-plta-kayan-cascade',
                'client_name' => 'PT PLN (Persero)',
                'business_field_id' => $businessFieldPembangkit?->id ?? $defaultField->id,
                'location' => 'Bulungan, Kalimantan Utara',
                'description' => 'Konstruksi Pembangkit Listrik Tenaga Air dengan kapasitas 30 MW, termasuk bendungan, terowongan, power house, dan switchyard.',
                'short_description' => 'PLTA kapasitas 30 MW untuk elektrifikasi daerah',
                'project_value' => 450000000000,
                'area_size' => '200 ha',
                'start_date' => '2021-09-01',
                'end_date' => '2025-08-31',
                'status' => 'ongoing',
                'is_featured' => true,
                'is_published' => true,
                'thumbnail' => null,
                'views_count' => 892,
                'created_by' => $user->id,
            ],
        ];

        foreach ($projects as $projectData) {
            $project = Project::create($projectData);

            // Attach random tags (2-4 tags per project)
            $tags = ProjectTag::inRandomOrder()->take(rand(2, 4))->pluck('id');
            if ($tags->isNotEmpty()) {
                $project->tags()->attach($tags);
            }
        }

        $this->command->info('✅ Projects seeded successfully! Total: ' . count($projects));
    }
}