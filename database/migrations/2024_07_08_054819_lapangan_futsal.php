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
        Schema::create('lapangan_futsals', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lapangan');
            $table->integer('harga');
            $table->string('gambar');
            $table->string('jenis_rumput');
            $table->longText('desc');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lapangan_futsals');
    }
};
