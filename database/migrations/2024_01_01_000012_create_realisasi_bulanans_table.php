<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('realisasi_bulanans', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('bulan'); // 1-12
            $table->unsignedSmallInteger('tahun');
            $table->string('total_pendapatan')->default('Rp 0');
            $table->string('realisasi_anggaran')->default('Rp 0');
            $table->string('sisa_anggaran')->default('Rp 0');
            $table->string('serapan_belanja')->default('0%');
            $table->timestamps();

            $table->unique(['bulan', 'tahun']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('realisasi_bulanans');
    }
};
