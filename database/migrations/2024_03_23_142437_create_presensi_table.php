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
        Schema::create('presensi', function (Blueprint $table) {
            $table->id();
            $table->string('nik');
            $table->date('tanggal_presensi');
            $table->time('jam_masuk');
            $table->time('jam_keluar')->nullable();
            $table->string('foto_masuk');
            $table->string('foto_keluar')->nullable();
            $table->string('lokasi_masuk');
            $table->string('lokasi_keluar')->nullable();
            $table->foreign('nik')->references('nik')->on('karyawan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presensi');
    }
};
