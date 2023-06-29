<?php

namespace App\Models\Atracciones;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atraccion extends Model
{
    use HasFactory;

    protected $table = 'atracciones';

    protected $fillable = [
        'id',
        'nombre',
        'slug',
        'precio_persona',
        'disponibilidad',
        'imagen',
    ];

    public function getRouteKeyName()
    {
       return 'slug';
    }
}
