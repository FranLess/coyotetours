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
        Schema::table('hoteles_habitaciones', function (Blueprint $table) {
            $table->integer('maximo_personas');
            $table->integer('minimo_personas');
            $table->integer('minimo_noches');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hoteles_habitaciones', function (Blueprint $table) {
            $table->dropColumn('maximo_personas');
            $table->dropColumn('minimo_personas');
            $table->dropColumn('minimo_noches');
        });
    }
};
