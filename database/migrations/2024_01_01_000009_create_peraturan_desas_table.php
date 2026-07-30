<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('peraturan_desas', function (Blueprint $table) {
            $table->id();
            $table->string('nomor');
            $table->string('tentang');
            $table->string('kategori')->default('Umum');
            $table->date('tanggal_ditetapkan');
            $table->string('file')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('peraturan_desas');
    }
};
