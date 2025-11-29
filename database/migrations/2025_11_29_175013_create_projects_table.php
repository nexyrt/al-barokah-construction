<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title', 200);
            $table->string('slug', 220)->unique();
            $table->string('client_name', 150);
            $table->foreignId('business_field_id')->constrained('business_fields')->onDelete('cascade');
            $table->string('location', 200)->nullable();
            $table->text('description');
            $table->string('short_description', 300)->nullable();
            $table->decimal('project_value', 15, 2)->nullable();
            $table->string('area_size', 100)->nullable();
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->enum('status', ['planning', 'ongoing', 'completed', 'on_hold'])->default('ongoing');
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_published')->default(true);
            $table->string('thumbnail', 255)->nullable();
            $table->integer('views_count')->default(0);
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');
            $table->timestamps();

            $table->index('slug');
            $table->index('business_field_id');
            $table->index('status');
            $table->index('is_featured');
            $table->index('is_published');
            $table->index(['start_date', 'end_date']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
