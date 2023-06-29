<?php

namespace App\Models\Hotel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelHabitacionImagen extends Model
{
    use HasFactory;
    protected $table = 'hoteles_habitaciones_imagenes';
    protected $fillable = [
        'id',
        'habitacion_id',
        'nombre',
        'imagen',
    ];
}
