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
            $table->unsignedBigInteger('categoria_id')->after('nombre')->nullable();
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
            $table->dropColumn('categoria_id')->after('nombre')->nullable();
            $table->foreign('categoria_id')
            ->references('id')
            ->on('cabanas_habitaciones_categorias')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }
};
