<?php

namespace Database\Seeders;

use App\Models\ContactMessage;
use Illuminate\Database\Seeder;

class ContactMessageSeeder extends Seeder
{
    public function run(): void
    {
        $messages = [
            [
                'name' => 'Andi Prasetyo',
                'email' => 'andi.prasetyo@email.com',
                'phone' => '081234567890',
                'subject' => 'Konsultasi Proyek Pembangunan Gedung',
                'message' => 'Selamat pagi, saya ingin berkonsultasi mengenai rencana pembangunan gedung kantor 10 lantai di area Jakarta Pusat. Mohon informasi lebih lanjut mengenai layanan yang tersedia.',
                'is_read' => false,
                'replied_at' => null,
                'created_at' => now()->subDays(2),
            ],
            [
                'name' => 'Siti Rahmawati',
                'email' => 'siti.rahmawati@company.com',
                'phone' => '082345678901',
                'subject' => 'Request Quotation Renovasi Hotel',
                'message' => 'Kami membutuhkan penawaran harga untuk renovasi hotel bintang 4 dengan 150 kamar. Mohon dapat menghubungi kami untuk survey lokasi.',
                'is_read' => true,
                'replied_at' => now()->subDays(1),
                'created_at' => now()->subDays(3),
            ],
            [
                'name' => 'Budi Santoso',
                'email' => 'budi.s@email.com',
                'phone' => '083456789012',
                'subject' => 'Informasi Proyek Infrastruktur Jalan',
                'message' => 'Mohon informasi mengenai pengalaman perusahaan dalam menangani proyek pembangunan jalan dan jembatan skala besar.',
                'is_read' => false,
                'replied_at' => null,
                'created_at' => now()->subHours(12),
            ],
        ];

        foreach ($messages as $message) {
            ContactMessage::create($message);
        }
    }
}
