<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Testimonial;
use App\Models\Project;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        // Get projects by slug untuk mapping
        $project1 = Project::where('slug', 'pembangunan-gedung-perkantoran-pt-wijaya-kusuma')->first();
        $project2 = Project::where('slug', 'konstruksi-jembatan-mahakam-iii')->first();
        $project3 = Project::where('slug', 'pembangunan-bendungan-panji-sukarame')->first();
        $project4 = Project::where('slug', 'pembangunan-apartemen-green-bay-residence')->first();
        $project5 = Project::where('slug', 'pembangunan-dermaga-batubara-pt-energi-nusantara')->first();
        $project6 = Project::where('slug', 'pembangunan-plta-kayan-cascade')->first();

        $testimonials = [
            [
                'client_name' => 'Budi Santoso',
                'company' => 'PT Wijaya Kusuma',
                'position' => 'Direktur Utama',
                'photo' => null,
                'testimonial' => 'Al Barokah Construction berhasil menyelesaikan proyek gedung perkantoran kami tepat waktu dengan kualitas yang luar biasa. Tim mereka sangat profesional dan komunikatif. Kami sangat puas dengan hasil akhir proyek ini.',
                'rating' => 5,
                'project_id' => $project1?->id,
                'is_published' => true,
                'display_order' => 1,
            ],
            [
                'client_name' => 'Ir. Siti Nurhaliza, M.T.',
                'company' => 'Dinas PUPR Provinsi Kalimantan Timur',
                'position' => 'Kepala Dinas',
                'photo' => null,
                'testimonial' => 'Pembangunan Jembatan Mahakam III merupakan proyek strategis yang sangat penting bagi Kalimantan Timur. Al Barokah Construction menunjukkan dedikasi dan keahlian tinggi dalam menyelesaikan proyek infrastruktur ini dengan standar internasional.',
                'rating' => 5,
                'project_id' => $project2?->id,
                'is_published' => true,
                'display_order' => 2,
            ],
            [
                'client_name' => 'Dr. Ahmad Dahlan',
                'company' => 'Kementerian PUPR',
                'position' => 'Direktur Sumber Daya Air',
                'photo' => null,
                'testimonial' => 'Proyek Bendungan Panji Sukarame adalah proyek berskala besar yang membutuhkan expertise tinggi. Tim Al Barokah Construction menunjukkan kemampuan luar biasa dalam menangani kompleksitas teknis konstruksi bendungan. Sangat recommended!',
                'rating' => 5,
                'project_id' => $project3?->id,
                'is_published' => true,
                'display_order' => 3,
            ],
            [
                'client_name' => 'Michael Tan',
                'company' => 'PT Green Property Indonesia',
                'position' => 'CEO',
                'photo' => null,
                'testimonial' => 'Kami mempercayakan pembangunan Green Bay Residence kepada Al Barokah Construction dan hasilnya melebihi ekspektasi. Kualitas bangunan sangat baik, manajemen proyek solid, dan komunikasi lancar. Akan bekerja sama lagi di proyek selanjutnya.',
                'rating' => 5,
                'project_id' => $project4?->id,
                'is_published' => true,
                'display_order' => 4,
            ],
            [
                'client_name' => 'Andi Wijaya, S.T.',
                'company' => 'PT Energi Nusantara',
                'position' => 'Project Manager',
                'photo' => null,
                'testimonial' => 'Pembangunan dermaga batubara memerlukan keahlian khusus di bidang konstruksi maritim. Al Barokah Construction membuktikan kemampuan mereka dengan menyelesaikan proyek ini sesuai spesifikasi dan tepat waktu. Safety record yang baik sepanjang proyek.',
                'rating' => 5,
                'project_id' => $project5?->id,
                'is_published' => true,
                'display_order' => 5,
            ],
            [
                'client_name' => 'Ir. Gunawan Setiawan, M.Sc.',
                'company' => 'PT PLN (Persero)',
                'position' => 'General Manager Pembangkitan',
                'photo' => null,
                'testimonial' => 'PLTA Kayan Cascade adalah proyek pembangkit listrik yang kompleks dengan teknologi tinggi. Al Barokah Construction menunjukkan profesionalisme tinggi dalam koordinasi dengan berbagai stakeholder dan vendor internasional. Progress proyek berjalan sesuai jadwal.',
                'rating' => 5,
                'project_id' => $project6?->id,
                'is_published' => true,
                'display_order' => 6,
            ],
            [
                'client_name' => 'Hendra Kusuma',
                'company' => 'PT Maju Sejahtera',
                'position' => 'Owner',
                'photo' => null,
                'testimonial' => 'Pelayanan yang sangat memuaskan dari awal konsultasi hingga serah terima proyek. Tim teknis sangat membantu dalam memberikan solusi terbaik sesuai budget. Hasil pekerjaan rapi dan berkualitas.',
                'rating' => 5,
                'project_id' => null, // Testimonial umum tanpa project spesifik
                'is_published' => true,
                'display_order' => 7,
            ],
            [
                'client_name' => 'Dewi Lestari',
                'company' => 'CV Berkah Jaya',
                'position' => 'Direktur',
                'photo' => null,
                'testimonial' => 'Sangat puas dengan hasil renovasi gedung kami. Proses pengerjaan cepat, bersih, dan hasilnya sesuai dengan desain yang diinginkan. Harga juga kompetitif. Terima kasih Al Barokah Construction!',
                'rating' => 5,
                'project_id' => null, // Testimonial umum
                'is_published' => true,
                'display_order' => 8,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::create($testimonial);
        }

        $this->command->info('✅ Testimonials seeded successfully! Total: ' . count($testimonials));
    }
}