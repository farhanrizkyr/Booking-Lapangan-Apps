<?php

use App\Models\LapanganFutsal;
use App\Models\User;
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
        Schema::create('booking_lapangans', function (Blueprint $table) {
            $table->id();
            $table->date('jam_awal');
            $table->date('jam_akhir');
            $table->string('bayar')->default('0');
            $table->string('status')->default('0');
            $table->ForeignIdFor(LapanganFutsal::class);
            $table->ForeignIdFor(User::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_lapangans');
    }
};
