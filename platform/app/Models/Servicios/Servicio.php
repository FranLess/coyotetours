<?php

namespace App\Models\Servicios;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;

    protected $table = 'servicios';

    protected $fillable = [
        'id',
        'nombre',
        'slug',
        'precio',
        'disponibilidad',
        'imagen',
    ];

    public function getRouteKeyName()
    {
       return 'slug';
    }
}
