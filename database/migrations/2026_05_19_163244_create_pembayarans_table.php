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
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id('id_pembayaran');
            $table->unsignedBigInteger('id_pesanan');
            $table->string('metode_pembayaran');
            $table->string('bukti_bayar')->nullable(); 
            $table->integer('jumlah_bayar');
            $table->string('status')->default('menunggu'); 
            $table->timestamps();
            $table->foreign('id_pesanan')->references('id_pesanan')->on('pemesanans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};
