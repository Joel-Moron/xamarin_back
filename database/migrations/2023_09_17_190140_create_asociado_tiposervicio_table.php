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
        Schema::create('asociado_tiposervicio', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tip_ser_id');
            $table->unsignedBigInteger('aso_id');
            $table->foreign('aso_id')->references('id')->on('asociado');
            $table->foreign('tip_ser_id')->references('id')->on('tiposervicio');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asociado_tiposervicio');
    }
};
