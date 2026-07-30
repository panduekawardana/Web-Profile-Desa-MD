<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('laporan_pertanggungjawabans', function (Blueprint $table) {
            $table->id();
            $table->string('tahun');
            $table->string('status')->default('Disetujui BPD');
            $table->date('tanggal_disampaikan')->nullable();
            $table->text('catatan')->nullable();
            $table->string('file')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('laporan_pertanggungjawabans');
    }
};
