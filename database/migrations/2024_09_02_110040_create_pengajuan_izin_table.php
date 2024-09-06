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
        Schema::create('pengajuan_presensi', function (Blueprint $table) {
            $table->id();
            $table->string('nik');
            $table->date('tanggal_pengajuan');
            $table->char('status', 1);
            $table->text('keterangan')->nullable();
            $table->char('status_approved', 1)->default(1);
            $table->foreign('nik')->references('nik')->on('karyawan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan_presensi');
    }
};
