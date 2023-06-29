<?php

namespace App\Models\Paquetes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paquete extends Model
{
    use HasFactory;

    protected $table = 'paquetes';

    protected $fillable = [
        'id',
        'nombre',
        'slug',
        'precio',
        'precio2',
        'disponibilidad',
        'imagen',
    ];

    public function getRouteKeyName()
    {
       return 'slug';
    }
}
