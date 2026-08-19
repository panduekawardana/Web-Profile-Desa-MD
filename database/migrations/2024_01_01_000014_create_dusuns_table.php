<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dusuns', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('kepala_dusun')->nullable();
            $table->unsignedInteger('jumlah_penduduk')->nullable();
            $table->decimal('luas_wilayah', 8, 2)->nullable();
            $table->string('potensi_utama')->nullable();
            $table->unsignedInteger('urutan')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dusuns');
    }
};
