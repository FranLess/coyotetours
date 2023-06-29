<?php

namespace App\Models\Cabana;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CabanaHabitacion extends Model
{
    use HasFactory;
    protected $table = 'cabanas_habitaciones';
    protected $fillable = [
        'id',
        'cabana_id',
        'nombre',
        'categoria_id',
        'slug',
        'especificaciones',
        'minimo_noches',
        'precio_persona',
        'minimo_personas',
        'maximo_personas',
        'precio_noche_base',
        'imagen',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
