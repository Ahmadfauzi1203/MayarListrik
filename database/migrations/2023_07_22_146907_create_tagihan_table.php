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
        Schema::create('tagihan', function (Blueprint $table) {
            $table->increments('id_tagihan');
            $table->unsignedInteger('id_penggunaan');
            $table->unsignedInteger('id_pelanggan');
            $table->string('bulan');
            $table->integer('tahun');
            $table->integer('jumlah_meter');
            $table->enum('status', ['Lunas', 'Menunggu Pembayaran', 'Menunggu Konfirmasi']);

            $table->foreign('id_penggunaan')->references('id_penggunaan')->on('penggunaan')->onUpdate('cascade');
            $table->foreign('id_pelanggan')->references('id_pelanggan')->on('pelanggan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tagihan');
    }
};
