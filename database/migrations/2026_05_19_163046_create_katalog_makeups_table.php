<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(){
        Schema::create('katalog_makeups', function (Blueprint $table) {
            $table->id('id_katalog');
            $table->string('nama_katalog');
            $table->text('deskripsi')->nullable();
            $table->integer('harga'); 
            $table->string('gambar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('katalog_makeups');
    }
};
