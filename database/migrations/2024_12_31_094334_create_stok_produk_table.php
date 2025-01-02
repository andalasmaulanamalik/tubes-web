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
        Schema::create('stok_produk', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cabang_id');
            $table->unsignedBigInteger('produk_id');
            $table->integer('stok_awal');
            $table->integer('stok_keluar')->default(0);
            $table->integer('sisa_stok');
            $table->timestamps();

            $table->foreign('cabang_id')->references('id')->on('cabang_toko');
            $table->foreign('produk_id')->references('id')->on('produk');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stok_produk');
    }
};
