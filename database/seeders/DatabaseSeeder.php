<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            BusinessFieldSeeder::class,
            ProjectTagSeeder::class,
            ProjectSeeder::class,
            ProjectGallerySeeder::class,
            ProjectTagRelationSeeder::class,
            CompanyInfoSeeder::class,
            SocialMediaSeeder::class,
            ContactMessageSeeder::class,
            TestimonialSeeder::class,
        ]);

        $this->command->info('✅ Database seeding completed successfully!');
        $this->command->info('');
        $this->command->info('📝 Default Admin Credentials:');
        $this->command->info('   Super Admin:');
        $this->command->info('   - Username: superadmin');
        $this->command->info('   - Email: superadmin@company.com');
        $this->command->info('   - Password: password123');
        $this->command->info('');
        $this->command->info('   Admin:');
        $this->command->info('   - Username: admin');
        $this->command->info('   - Email: admin@company.com');
        $this->command->info('   - Password: password123');
        $this->command->info('');
        $this->command->info('   Editor:');
        $this->command->info('   - Username: editor');
        $this->command->info('   - Email: editor@company.com');
        $this->command->info('   - Password: password123');
    }
}
