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
        Schema::create('hoteles_habitaciones_imagenes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('habitacion_id');
            $table->string('nombre');
            $table->string('imagen');

            $table->foreign('habitacion_id')
                ->references('id')
                ->on('hoteles_habitaciones')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hoteles_habitaciones_imagenes');
    }
};
