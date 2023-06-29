<?php

namespace App\Models\Hotel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;
    protected $table = 'hoteles';
    protected $fillable = [
        'id',
        'nombre',
        'slug',
        'imagen',
        'telefono',
        'email',
        'link_pagina',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
