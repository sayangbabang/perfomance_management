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
        Schema::create('laporan_performa', function (Blueprint $table) {
            $table->id('id_laporan');
            $table->integer('id_talent');
            $table->date('tanggal');
            $table->string('deskripsi')->nullable();
            $table->string('durasi')->nullable();
            $table->enum('jenis_kegiatan', ['hadir', 'izin', 'spj', 'lembur', 'cuti', 'weekly_report']);
            $table->enum('tipe', ['kerja', 'libur'])->nullable();
            $table->string('lokasi')->nullable();
            $table->string('justifikasi')->nullable();
            $table->string('status_persetejuan')->nullable();
            $table->string('catatan_koreksi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_performa');
    }
};
