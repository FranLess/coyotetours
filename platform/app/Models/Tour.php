<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'nombre_es',
        'nombre_en',
        'slug_es',
        'slug_en',
        'precio_adulto',
        'precio_menor',
        'img_portada',
        'img_banner',
        'pdf',
    ];
    public function getRouteKeyName()
    {
        return 'slug_es';
    }
    public function nombreEs(): Attribute
    {
        return new Attribute(
            set: fn ($nombreEs) => strtolower($nombreEs),
            get: fn ($nombreEs) => ucwords($nombreEs),
        );
    }
}
