<?php

namespace App\Http\Controllers;

use App\Models\Atracciones\Restaurante;
use Illuminate\Http\Request;

class RestaurantesController extends Controller
{
    public function show(Restaurante $restaurante)
    {
        return view('atracciones.restaurantes.show' , compact('restaurante'));
    }
}
