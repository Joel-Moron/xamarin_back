<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paquete', function (Blueprint $table) {
            $table->id();
            $table->integer('descuento')->length(3);
            $table->unsignedBigInteger('hot_id')->nullable();
            $table->unsignedBigInteger('tra_id')->nullable();
            $table->unsignedBigInteger('res_id')->nullable();
            $table->unsignedBigInteger('vue_id');
            $table->foreign('hot_id')->references('id')->on('hotel');
            $table->foreign('tra_id')->references('id')->on('transporte');
            $table->foreign('res_id')->references('id')->on('restaurante');
            $table->foreign('vue_id')->references('id')->on('vuelo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paquete');
    }
};
