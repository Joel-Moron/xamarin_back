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
        Schema::create('asociado', function (Blueprint $table) {
            $table->id();
            $table->integer('aso_ruc')->length(13);
            $table->integer('aso_telefono')->length(9);
            $table->string('aso_rsocial',100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asociado');
    }
};
