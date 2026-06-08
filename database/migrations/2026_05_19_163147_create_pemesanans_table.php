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
        Schema::create('pemesanans', function (Blueprint $table) {
            $table->id('id_pesanan');
            $table->unsignedBigInteger('id_pelanggan');
            $table->unsignedBigInteger('id_katalog');
            $table->date('tanggal');
            $table->time('waktu');
            $table->text('lokasi');
            $table->string('status_pesanan')->default('menunggu konfirmasi');
            $table->timestamps();

        // Foreign Keys
            $table->foreign('id_pelanggan')->references('id_pelanggan')->on('customers')->onDelete('cascade');
            $table->foreign('id_katalog')->references('id_katalog')->on('katalog_makeups')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemesanans');
    }
};
