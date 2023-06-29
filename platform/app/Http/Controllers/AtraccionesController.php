<?php

namespace App\Http\Controllers;

use App\Models\Atracciones\Atraccion;
use App\Models\Paquetes\Paquete;
use App\Models\Servicios\Servicio;
use Illuminate\Http\Request;

class AtraccionesController extends Controller
{
    public function showAtraccion(Atraccion $atraccion)
    {
         return view('atracciones.show' , compact('atraccion'));
    }

    public function showPaquete(Paquete $paquete)
    {
        return view('paquetes.show' , compact('paquete'));
    }

    public function showServicio(Servicio $servicio)
    {
        return view('servicios.show' , compact('servicio'));
    }
}
