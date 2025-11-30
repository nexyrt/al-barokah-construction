<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('project_galleries', function (Blueprint $table) {
            $table->string('caption')->nullable()->after('image_path');
        });
    }

    public function down(): void
    {
        Schema::table('project_galleries', function (Blueprint $table) {
            $table->dropColumn('caption');
        });
    }
};