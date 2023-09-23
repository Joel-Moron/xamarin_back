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
        Schema::create('destino_vuelo', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('des_id');
            $table->unsignedBigInteger('vue_id');
            $table->foreign('des_id')->references('id')->on('destino');
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
        Schema::dropIfExists('destino_vuelo');
    }
};
