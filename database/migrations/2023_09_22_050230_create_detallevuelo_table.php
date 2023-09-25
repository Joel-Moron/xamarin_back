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
            //$table->date('det_fecha');
            //$table->float('det_precio',8,2);
            $table->unsignedBigInteger('paq_id')->nullable();
            $table->unsignedBigInteger('usu_id')->nullable();
            $table->unsignedBigInteger('vue_id')->nullable();
            $table->unsignedBigInteger('clas_id')->nullable();
            $table->foreign('clas_id')->references('id')->on('clase');
            $table->foreign('vue_id')->references('id')->on('vuelo');
            $table->foreign('paq_id')->references('id')->on('paquete');
            $table->foreign('usu_id')->references('id')->on('user');
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
