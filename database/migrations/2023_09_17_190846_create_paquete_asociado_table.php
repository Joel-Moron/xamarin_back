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
        Schema::create('paquete_asociado', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('aso_tip_ser_id');
            $table->unsignedBigInteger('paq_id');
            $table->foreign('aso_tip_ser_id')->references('id')->on('asociado_tiposervicio');
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
        Schema::dropIfExists('paquete_asociado');
    }
};
