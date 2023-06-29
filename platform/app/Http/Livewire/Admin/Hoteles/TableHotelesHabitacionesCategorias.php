<?php

namespace App\Http\Livewire\Admin\Hoteles;

use App\Models\Hotel\HotelHabitacionCategoria;
use Livewire\Component;

class TableHotelesHabitacionesCategorias extends Component
{
    public $buscar;

    protected $listeners = [
        'borrarHotelHabitacionCategoria' => 'borrar',
    ];

    public function render()
    {
        $categorias = HotelHabitacionCategoria::where('nombre', 'like', "%$this->buscar%")->get();
        return view('livewire.admin.hoteles.table-hoteles-habitaciones-categorias', compact('categorias'));
    }

    public function borrarAsk($hotelHabitacionCategoria)
    {
        $this->emit('borrarAsk', ['hotelHabitacionCategoria' => $hotelHabitacionCategoria]);
    }

    public function borrar($hotelHabitacionCategoria)
    {
        HotelHabitacionCategoria::destroy($hotelHabitacionCategoria);
    }
}
