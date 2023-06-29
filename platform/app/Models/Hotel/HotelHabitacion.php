<?php

namespace App\Models\Hotel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelHabitacion extends Model
{
    use HasFactory;
    protected $table = 'hoteles_habitaciones';
    protected $fillable = [
        'id',
        'hotel_id',
        'nombre',
        'categoria_id',
        'slug',
        'especificaciones',
        'precio_noche',
        'minimo_noches',
        'minimo_personas',
        'maximo_personas',
        'imagen',
    ];

    public function getRouteKeyName()
    {
     return 'slug';
    }
}
