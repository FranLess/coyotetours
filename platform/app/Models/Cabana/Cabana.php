<?php

namespace App\Models\Cabana;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cabana extends Model
{
    use HasFactory;
    protected $table = 'cabanas';
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
