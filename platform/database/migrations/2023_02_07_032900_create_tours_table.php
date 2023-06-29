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
        Schema::create('tours', function (Blueprint $table) {
            $table->id()->unique('id_tour');
            $table->string('nombre_es')->nullable();
            $table->string('nombre_en')->nullable();
            $table->string('slug_es')->nullable();
            $table->string('slug_en')->nullable();
            $table->float('precio_adulto', 6, 2)->nullable();
            $table->float('precio_menor', 6, 2)->nullable();
            $table->string('img_portada')->nullable();
            $table->string('img_banner')->nullable();
            $table->string('pdf')->nullable();
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
        Schema::dropIfExists('tours');
    }
};
