<?php

namespace App\Models\Cabana;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CabanaHabitacionImagen extends Model
{
    use HasFactory;
    protected $table = 'cabanas_habitaciones_imagenes';
    protected $fillable = [
        'id',
        'habitacion_id',
        'nombre',
        'imagen',
    ];
}
