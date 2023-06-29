<?php

namespace App\Models\Hotel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelHabitacionCategoria extends Model
{
    use HasFactory;
    protected $table = 'hoteles_habitaciones_categorias';
    protected $fillable = [
        'id',
        'hotel_id',
        'nombre',
    ];
}
