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
        Schema::create('acompanante', function (Blueprint $table) {
            $table->id('id');
            $table->string('aco_nombre');
            $table->string('aco_apellidop');
            $table->string('aco_apellidom');
            $table->bigInteger('aco_documento');
            $table->unsignedBigInteger('det_id');
            $table->foreign('det_id')->references('id')->on('detallevuelo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('acompanante');
    }
};
