<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('username', 50)->unique()->after('id');
            $table->string('full_name', 100)->after('email');
            $table->enum('role', ['super_admin', 'admin', 'editor'])->default('editor')->after('password');
            $table->boolean('is_active')->default(true)->after('role');
            $table->dateTime('last_login')->nullable()->after('is_active');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['username', 'full_name', 'role', 'is_active', 'last_login']);
        });
    }
};
