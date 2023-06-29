<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;
    protected $fillable = [
        'venta_id',
        'compra_id',
        'usuario_paypal_id',
        'usuario_email',
        'usuario_email_venta',
        'nombre_usuario',
        'apellido_usuario',
        'codigo_pais',
        'moneda',
        'pagado',
        'detalles_compra',
        'paypal_fee',
        'tipo_pago',
        'pago_pendiente',
    ];

    public function getRouteKeyName()
    {
        return 'venta_id';
    }
}
