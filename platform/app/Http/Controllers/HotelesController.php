<?php

namespace App\Http\Controllers;

use App\Models\Hotel\Hotel;
use App\Models\Hotel\HotelHabitacion;
use App\Models\Hotel\HotelHabitacionImagen;
use Illuminate\Http\Request;

class HotelesController extends Controller
{
    public function show(Hotel $hotel)
    {
        $products = HotelHabitacion::where('hotel_id', $hotel->id)->get();
        return view('hoteles.show' , compact('hotel' , 'products'));
    }

    public function product(Hotel $hotel , HotelHabitacion $product)
    {
        $images = HotelHabitacionImagen::where('habitacion_id', $product->id)->get();
        return view('hoteles.product', compact('hotel', 'product' , 'images'));
    }
}
