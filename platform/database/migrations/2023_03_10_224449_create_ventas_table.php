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
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->string('venta_id')->nullable();
            $table->string('compra_id')->nullable();
            $table->string('usuario_paypal_id')->nullable();
            $table->string('usuario_email')->nullable();
            $table->string('usuario_email_venta')->nullable();
            $table->string('nombre_usuario')->nullable();
            $table->string('apellido_usuario')->nullable();
            $table->string('codigo_pais')->nullable();
            $table->string('moneda')->nullable();
            $table->float('pagado')->nullable();
            $table->json('detalles_compra')->nullable();
            $table->float('paypal_fee')->nullable();
            $table->string('tipo_pago')->nullable();
            $table->float('pago_pendiente')->nullable();
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
        Schema::dropIfExists('ventas');
    }
};
