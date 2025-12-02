<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('business_fields', function (Blueprint $table) {
            // Detail content
            $table->text('long_description')->nullable()->after('description');

            // Services offered (JSON: [{title, description, icon}])
            $table->json('services')->nullable()->after('long_description');

            // Process steps (JSON: [{step, title, description, icon}])
            $table->json('process_steps')->nullable()->after('services');

            // Why choose us points (JSON: [{title, description, icon}])
            $table->json('advantages')->nullable()->after('process_steps');

            // FAQ (JSON: [{question, answer}])
            $table->json('faq')->nullable()->after('advantages');

            // Hero image for detail page
            $table->string('hero_image', 255)->nullable()->after('icon');
        });
    }

    public function down(): void
    {
        Schema::table('business_fields', function (Blueprint $table) {
            $table->dropColumn([
                'long_description',
                'services',
                'process_steps',
                'advantages',
                'faq',
                'hero_image',
            ]);
        });
    }
};