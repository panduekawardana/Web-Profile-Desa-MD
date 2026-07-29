<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('anggaran_bidangs', function (Blueprint $table) {
            $table->id();
            $table->string('bidang');
            $table->unsignedTinyInteger('persen')->default(0);
            $table->integer('tahun')->default(date('Y'));
            $table->integer('urutan')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('anggaran_bidangs');
    }
};
