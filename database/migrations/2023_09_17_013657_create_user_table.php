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
        Schema::create('user', function (Blueprint $table) {
            $table->id('id');
            $table->string('usu_nombre');
            $table->string('usu_apellidop');
            $table->string('usu_apellidom');
            $table->integer('usu_documento');
            $table->string('usu_email')->unique();
            $table->string('usu_emailV')->nullable();
            $table->string('usu_password');
            $table->string('usu_targeta')->length(16);
            $table->unsignedBigInteger('rol_id');
            $table->string('usu_token')->nullable();
            $table->date('date_token')->nullable();
            $table->foreign('rol_id')->references('id')->on('rol');
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
    }
};
