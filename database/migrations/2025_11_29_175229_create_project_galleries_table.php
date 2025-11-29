<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('project_galleries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained('projects')->onDelete('cascade');
            $table->string('image_path', 255);
            $table->string('title', 150)->nullable();
            $table->text('description')->nullable();
            $table->integer('display_order')->default(0);
            $table->timestamp('uploaded_at')->useCurrent();

            $table->index('project_id');
            $table->index('display_order');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('project_galleries');
    }
};
