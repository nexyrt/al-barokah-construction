<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
                // User harus pertama (untuk foreign key created_by di projects)
            UserSeeder::class,

                // Business Fields sebelum Projects (untuk foreign key business_field_id)
            BusinessFieldSeeder::class,

                // Project Tags sebelum Projects (untuk pivot table)
            ProjectTagSeeder::class,

                // Projects
            ProjectSeeder::class,

                // Project Galleries setelah Projects
            ProjectGallerySeeder::class,

                // Company Data (independent, no dependencies)
            CompanyInfoSeeder::class,
            CompanyLegalDataSeeder::class,
            SocialMediaSeeder::class,

                // Testimonials (optional foreign key ke projects)
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
