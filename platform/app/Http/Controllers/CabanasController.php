<?php

namespace App\Http\Controllers;

use App\Models\Cabana\Cabana;
use App\Models\Cabana\CabanaHabitacion;
use App\Models\Cabana\CabanaHabitacionImagen;
use Illuminate\Http\Request;

class CabanasController extends Controller
{
    public function show(Cabana $cabana)
    {
        $products = CabanaHabitacion::where('cabana_id' , $cabana->id)->get();
        return view('cabanas.show' , compact('cabana' , 'products'));
    }

    public function product($cabana , $product)
    {
        $product = CabanaHabitacion::where('slug', $product)->first();
        $images = CabanaHabitacionImagen::where('id' , $product->id)->get();
        return view('cabanas.product' , compact('product' , 'images'));
    }
}
