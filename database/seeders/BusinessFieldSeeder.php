<?php

namespace Database\Seeders;

use App\Models\BusinessField;
use Illuminate\Database\Seeder;

class BusinessFieldSeeder extends Seeder
{
    public function run(): void
    {
        $businessFields = [
            [
                'name' => 'Konstruksi Bangunan Gedung',
                'slug' => 'konstruksi-bangunan-gedung',
                'icon' => 'icons/building.svg',
                'description' => 'Jasa konstruksi untuk pembangunan gedung bertingkat, perkantoran, rumah sakit, hotel, apartemen, dan bangunan komersial lainnya dengan standar kualitas terbaik.',
                'short_description' => 'Pembangunan gedung bertingkat dan komersial',
                'is_active' => true,
                'display_order' => 1,
            ],
            [
                'name' => 'Konstruksi Jalan dan Jembatan',
                'slug' => 'konstruksi-jalan-dan-jembatan',
                'icon' => 'icons/road.svg',
                'description' => 'Layanan konstruksi jalan raya, jalan tol, jembatan, dan infrastruktur transportasi lainnya dengan teknologi modern dan material berkualitas tinggi.',
                'short_description' => 'Pembangunan infrastruktur jalan dan jembatan',
                'is_active' => true,
                'display_order' => 2,
            ],
            [
                'name' => 'Konstruksi Bangunan Sipil',
                'slug' => 'konstruksi-bangunan-sipil',
                'icon' => 'icons/civil.svg',
                'description' => 'Jasa konstruksi untuk proyek sipil seperti bendungan, saluran irigasi, drainase, dan infrastruktur air lainnya untuk mendukung pembangunan nasional.',
                'short_description' => 'Proyek infrastruktur sipil dan pengairan',
                'is_active' => true,
                'display_order' => 3,
            ],
            [
                'name' => 'Renovasi dan Maintenance',
                'slug' => 'renovasi-dan-maintenance',
                'icon' => 'icons/renovation.svg',
                'description' => 'Layanan renovasi, perbaikan, dan perawatan bangunan untuk mempertahankan kondisi optimal dan meningkatkan nilai properti Anda.',
                'short_description' => 'Renovasi dan perawatan bangunan',
                'is_active' => true,
                'display_order' => 4,
            ],
            [
                'name' => 'Mechanical & Electrical',
                'slug' => 'mechanical-electrical',
                'icon' => 'icons/mep.svg',
                'description' => 'Instalasi dan maintenance sistem mekanikal dan elektrikal gedung meliputi HVAC, plumbing, fire protection, electrical system, dan Building Management System (BMS).',
                'short_description' => 'Sistem mekanikal dan elektrikal gedung',
                'is_active' => true,
                'display_order' => 5,
            ],
        ];

        foreach ($businessFields as $field) {
            BusinessField::create($field);
        }
    }
}
