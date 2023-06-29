<?php

namespace App\Http\Livewire\Admin\Hoteles;

use App\Models\Hotel\HotelHabitacion;
use Livewire\Component;

class TableHotelesHabitaciones extends Component
{
    public $buscar;

    protected $listeners = [
        'borrarHotelHabitacion' => 'borrar',
    ];

    public function render()
    {
        $habitaciones = HotelHabitacion::where('nombre', 'like', "%$this->buscar%")->get();
        return view('livewire.admin.hoteles.table-hoteles-habitaciones', compact('habitaciones'));
    }

    public function borrarAsk($hotelHabitacion)
    {
        $this->emit('borrarAsk', ['hotelHabitacion' => $hotelHabitacion]);
    }

    public function borrar($hotelHabitacion)
    {
        HotelHabitacion::destroy($hotelHabitacion);
    }
}
