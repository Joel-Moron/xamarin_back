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
        Schema::create('promocion', function (Blueprint $table) {
            $table->id();
            $table->integer('promo_descuento');
            $table->unsignedBigInteger('paq_asoc_id')->nullable();
            $table->unsignedBigInteger('entrada_id')->nullable();
            $table->foreign('entrada_id')->references('id')->on('entrada');
            $table->foreign('paq_asoc_id')->references('id')->on('paquete_asociado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('promocion');
    }
};
