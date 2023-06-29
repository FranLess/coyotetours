<?php

namespace App\Models\Cabana;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CabanaHabitacionCategoria extends Model
{
    use HasFactory;
    protected $table = 'cabanas_habitaciones_categorias';
    protected $fillable = [
        'id',
        'cabana_id',
        'nombre',
    ];
}
