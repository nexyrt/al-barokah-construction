<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('social_media', function (Blueprint $table) {
            $table->id();
            $table->string('platform', 50);
            $table->string('url', 255);
            $table->string('icon', 100)->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('display_order')->default(0);

            $table->index('is_active');
            $table->index('display_order');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('social_media');
    }
};
