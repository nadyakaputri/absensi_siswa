<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        Schema::table('absens', function (Blueprint $table) {
            $table->foreign('siswa_id')->references('id')->on('siswas')->onDelete('cascade');
            $table->foreign('guru_id')->references('id')->on('gurus')->onDelete('cascade');
        });

        Schema::table('lokals', function (Blueprint $table) {
            $table->foreign('jurusan_id')->references('id')->on('jurusans')->onDelete('cascade');
            $table->foreign('guru_id')->references('id')->on('gurus')->onDelete('cascade');
        });

        Schema::table('siswas', function (Blueprint $table) {
            $table->foreign('lokal_id')->references('id')->on('lokals')->onDelete('cascade');
        });

        Schema::table('gurus', function (Blueprint $table) {
            $table->foreign('lokal_id')->references('id')->on('lokals')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
