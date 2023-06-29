<?php

namespace App\Http\Livewire;

use App\Models\Atracciones\Atraccion;
use App\Models\Atracciones\Restaurante;
use App\Models\Cabana\Cabana;
use App\Models\Cabana\CabanaHabitacion;
use App\Models\Hotel\Hotel;
use App\Models\Hotel\HotelHabitacion;
use App\Models\Paquetes\Paquete;
use App\Models\Servicios\Servicio;
use App\Models\Tour;
use Livewire\Component;

class NavMenu extends Component
{
    public function render()
    {
        $atracciones = Atraccion::all();
        $paquetes = Paquete::all();
        $servicios = Servicio::all();
        $tours = Tour::all();
        $hoteles = Hotel::all();
        $hotelesHabitaciones = HotelHabitacion::all();
        $cabanas = Cabana::all();
        $cabanasHabitaciones = CabanaHabitacion::all();
        $restaurantes = Restaurante::all();
        return view(
            'livewire.nav-menu',
            compact(
                'tours',
                'hoteles',
                'hotelesHabitaciones',
                'cabanas',
                'cabanasHabitaciones',
                'restaurantes',
                'atracciones',
                'paquetes',
                'servicios'
            )
        );
    }
}
