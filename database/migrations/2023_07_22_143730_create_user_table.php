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
        Schema::create('user', function (Blueprint $table) {
            $table->increments('id_user');
            $table->string('nama', 50);
            $table->string('username', 50);
            $table->string('password');
            $table->unsignedInteger('id_level');


            $table->foreign('id_level')->references('id_level')->on('level')->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**('register')
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user');
    }
};
