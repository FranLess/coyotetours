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
        Schema::table('cabanas_habitaciones', function (Blueprint $table) {
            $table->float('precio_persona', 6, 2)->after('minimo_noches')->nullable();
            $table->float('precio_noche_base', 6, 2)->after('minimo_noches')->nullable();
            $table->integer('minimo_personas')->after('minimo_noches')->nullable();
            $table->integer('maximo_personas')->after('minimo_noches')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cabanas_habitaciones', function (Blueprint $table) {
            $table->dropColumn('precio_persona');
            $table->dropColumn('precio_base');
            $table->dropColumn('minimo_personas');
            $table->dropColumn('maximo_personas');
        });
    }
};
