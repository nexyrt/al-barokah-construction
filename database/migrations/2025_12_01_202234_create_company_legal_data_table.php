<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('company_legal_data', function (Blueprint $table) {
            $table->id();

            // Legal Documents
            $table->string('nib', 100)->nullable()->comment('Nomor Induk Berusaha');
            $table->string('siujk', 100)->nullable()->comment('Surat Izin Usaha Jasa Konstruksi');
            $table->string('tdp', 100)->nullable()->comment('Tanda Daftar Perusahaan');
            $table->string('akta_pendirian', 255)->nullable()->comment('Path to PDF file');
            $table->string('sk_kemenkumham', 255)->nullable()->comment('Path to PDF file');
            $table->string('domisili_usaha', 255)->nullable()->comment('Path to PDF file');

            // Certifications (JSON: [{name, number, issued_by, issued_date, expired_date, file_path}])
            $table->json('certifications')->nullable()->comment('ISO, K3, SBU certifications');

            // Awards & Recognition (JSON: [{year, title, issued_by, description, image_path}])
            $table->json('awards')->nullable()->comment('Company awards and recognitions');

            // Organization Structure
            $table->json('board_of_commissioners')->nullable()->comment('Dewan Komisaris: [{name, position, photo}]');
            $table->json('board_of_directors')->nullable()->comment('Direksi: [{name, position, photo}]');
            $table->json('management_team')->nullable()->comment('Management: [{name, position, photo}]');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('company_legal_data');
    }
};