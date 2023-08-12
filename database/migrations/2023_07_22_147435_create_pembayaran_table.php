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
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->increments('id_pembayaran');
            $table->unsignedInteger('id_tagihan');
            $table->unsignedInteger('id_pelanggan');
            $table->date('tanggal_pembayaran');
            $table->date('bulam_bayar');
            $table->float('biaya_admin');
            $table->float('total_bayar');
            $table->string('bukti');
            $table->unsignedInteger('id_user');

            $table->foreign('id_pelanggan')->references('id_pelanggan')->on('pelanggan')->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('id_tagihan')->references('id_tagihan')->on('tagihan')->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('id_user')->references('id_user')->on('user')->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaran');
    }
};
