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
            $table->unsignedBigInteger('paq_id');
            $table->unsignedBigInteger('usu_id');
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
