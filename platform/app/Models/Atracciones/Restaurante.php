<?php

namespace App\Models\Atracciones;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurante extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'slug',
        'precio',
        'imagen',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
