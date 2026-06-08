<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up() {
        Schema::create('ulasans', function (Blueprint $table) {
            $table->id('id_ulasan');
            $table->unsignedBigInteger('id_pelanggan');
            $table->unsignedBigInteger('id_pesanan');
            $table->text('deskripsi');
            $table->timestamps();
        // Foreign Keys
            $table->foreign('id_pelanggan')->references('id_pelanggan')->on('customers')->onDelete('cascade');
            $table->foreign('id_pesanan')->references('id_pesanan')->on('pemesanans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ulasans');
    }
};
