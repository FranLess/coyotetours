<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'cart';
    protected $fillable = [
        'email',
        'id_prod',
        'nombre_prod',
        'categoria',
        'noches',
        'personas',
        'adultos',
        'menores',
        'fecha_inicio',
        'fecha_fin',
        'precio_total',

    ];
    use HasFactory;
}
