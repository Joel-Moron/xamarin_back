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
        Schema::create('detallevuelo', function (Blueprint $table) {
            $table->id();
            $table->integer('asiento');
            $table->unsignedBigInteger('promo_id')->nullable();;
            $table->unsignedBigInteger('entrada_id')->nullable();
            $table->unsignedBigInteger('paq_id')->nullable();
            $table->foreign('promo_id')->references('id')->on('promocion');
            $table->foreign('entrada_id')->references('id')->on('entrada');
            $table->foreign('paq_id')->references('id')->on('paquete');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detallevuelo');
    }
};
