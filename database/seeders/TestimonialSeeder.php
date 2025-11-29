<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $project1 = Project::where('slug', 'pembangunan-gedung-perkantoran-15-lantai')->first();
        $project2 = Project::where('slug', 'konstruksi-jalan-tol-akses-bandara')->first();
        $project3 = Project::where('slug', 'pembangunan-mall-shopping-center')->first();

        $testimonials = [
            [
                'client_name' => 'Budi Santoso',
                'company' => 'PT Maju Bersama Indonesia',
                'position' => 'Direktur Utama',
                'photo' => 'testimonials/budi-santoso.jpg',
                'testimonial' => 'PT Konstruksi Bangun Sejahtera berhasil menyelesaikan proyek gedung perkantoran kami tepat waktu dengan kualitas yang luar biasa. Tim mereka sangat profesional dan komunikatif. Kami sangat puas dengan hasil akhir proyek ini.',
                'rating' => 5,
                'project_id' => $project1->id,
                'is_published' => true,
                'display_order' => 1,
            ],
            [
                'client_name' => 'Ir. Ahmad Fauzi',
                'company' => 'Kementerian PUPR',
                'position' => 'Kepala Proyek Infrastruktur',
                'photo' => 'testimonials/ahmad-fauzi.jpg',
                'testimonial' => 'Kerjasama yang sangat baik dalam proyek infrastruktur strategis nasional. Penanganan proyek yang sistematis dan sesuai standar keselamatan kerja yang tinggi. Rekomendasi untuk proyek-proyek pemerintah lainnya.',
                'rating' => 5,
                'project_id' => $project2->id,
                'is_published' => true,
                'display_order' => 2,
            ],
            [
                'client_name' => 'Siti Nurhaliza',
                'company' => 'PT Retail Nusantara',
                'position' => 'Project Manager',
                'photo' => 'testimonials/siti-nurhaliza.jpg',
                'testimonial' => 'Pengalaman bekerja sama dengan PT Konstruksi Bangun Sejahtera sangat memuaskan. Mereka mampu menangani kompleksitas proyek mixed-use development kami dengan baik. Progress reporting yang transparan membuat kami selalu update dengan perkembangan proyek.',
                'rating' => 5,
                'project_id' => $project3->id,
                'is_published' => true,
                'display_order' => 3,
            ],
            [
                'client_name' => 'Andi Wijaya',
                'company' => 'PT Properti Sejahtera',
                'position' => 'CEO',
                'photo' => 'testimonials/andi-wijaya.jpg',
                'testimonial' => 'Sudah berkali-kali menggunakan jasa mereka untuk berbagai proyek properti kami. Konsistensi kualitas dan komitmen terhadap deadline sangat kami apresiasi. Partner konstruksi yang dapat diandalkan.',
                'rating' => 5,
                'project_id' => null,
                'is_published' => true,
                'display_order' => 4,
            ],
            [
                'client_name' => 'Dr. Fitri Handayani',
                'company' => 'RS Sejahtera Medika',
                'position' => 'Direktur',
                'photo' => 'testimonials/fitri-handayani.jpg',
                'testimonial' => 'Pembangunan rumah sakit kami ditangani dengan sangat detail dan memperhatikan aspek medis yang kompleks. Tim teknis mereka memahami kebutuhan khusus fasilitas kesehatan. Hasil pembangunan melebihi ekspektasi kami.',
                'rating' => 5,
                'project_id' => null,
                'is_published' => true,
                'display_order' => 5,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::create($testimonial);
        }
    }
}
