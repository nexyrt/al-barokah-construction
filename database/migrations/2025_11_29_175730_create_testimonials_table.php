<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('client_name', 100);
            $table->string('company', 150)->nullable();
            $table->string('position', 100)->nullable();
            $table->string('photo', 255)->nullable();
            $table->text('testimonial');
            $table->tinyInteger('rating')->default(5);
            $table->foreignId('project_id')->nullable()->constrained('projects')->onDelete('set null');
            $table->boolean('is_published')->default(true);
            $table->integer('display_order')->default(0);
            $table->timestamps();

            $table->index('is_published');
            $table->index('display_order');
            $table->index('project_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('testimonials');
    }
};
