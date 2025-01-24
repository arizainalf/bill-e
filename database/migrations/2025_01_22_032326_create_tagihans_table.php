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
        Schema::create('tagihans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pelanggan_id');
            $table->unsignedTinyInteger('bulan');  // Menggunakan TinyInteger untuk bulan (1-12)
            $table->unsignedSmallInteger('tahun'); // Menggunakan SmallInteger untuk tahun (contoh: 2025)
            $table->bigInteger('pemakaian');
            $table->bigInteger('tagihan');
            $table->timestamps();

            $table->foreign('pelanggan_id')
                ->references('id')
                ->on('pelanggans')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tagihans');
    }
};
