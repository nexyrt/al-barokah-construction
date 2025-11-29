<?php

namespace Database\Seeders;

use App\Models\CompanyInfo;
use Illuminate\Database\Seeder;

class CompanyInfoSeeder extends Seeder
{
    public function run(): void
    {
        CompanyInfo::create([
            'company_name' => 'PT Konstruksi Bangun Sejahtera',
            'tagline' => 'Membangun Masa Depan Bersama',
            'about_us' => 'PT Konstruksi Bangun Sejahtera adalah perusahaan konstruksi terkemuka di Indonesia yang telah berpengalaman lebih dari 25 tahun dalam menangani berbagai proyek konstruksi skala nasional. Kami berkomitmen untuk memberikan layanan konstruksi berkualitas tinggi dengan mengutamakan keselamatan kerja, efisiensi waktu, dan kepuasan klien.

Dengan tim profesional yang berpengalaman dan peralatan modern, kami telah menyelesaikan ratusan proyek mulai dari gedung bertingkat, infrastruktur jalan dan jembatan, hingga proyek-proyek sipil lainnya. Kepercayaan klien adalah aset terbesar kami, dan kami terus berinovasi untuk memberikan solusi konstruksi terbaik.',
            'vision' => 'Menjadi perusahaan konstruksi terdepan di Indonesia yang dikenal dengan integritas, kualitas, dan inovasi dalam setiap proyeknya.',
            'mission' => '1. Memberikan layanan konstruksi berkualitas tinggi yang memenuhi standar internasional
2. Mengutamakan keselamatan kerja dan kelestarian lingkungan dalam setiap proyek
3. Mengembangkan SDM yang kompeten dan profesional melalui pelatihan berkelanjutan
4. Menerapkan teknologi dan metode konstruksi modern untuk efisiensi maksimal
5. Membangun kemitraan jangka panjang dengan klien berdasarkan kepercayaan dan kepuasan',
            'address' => 'Jl. Pembangunan Raya No. 123, Kelapa Gading, Jakarta Utara 14240',
            'phone' => '021-45678900',
            'email' => 'info@konstruksibanguns.co.id',
            'whatsapp' => '6281234567890',
            'website' => 'www.konstruksibanguns.co.id',
            'logo' => 'company/logo.png',
            'established_year' => 1998,
        ]);
    }
}
