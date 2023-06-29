<?php

namespace App\Http\Livewire\Admin\Hoteles;

use App\Models\HotelHabitacion;
use App\Models\Hotel\HotelHabitacionImagen;
use Livewire\Component;

class TableHotelesHabitacionesImagenes extends Component
{
    public $buscar;

    protected $listeners = [
        'borrarHotelHabitacionImagen' => 'borrar',
    ];

    public function render()
    {
        $imagenes = HotelHabitacionImagen::where('nombre', 'like', "%$this->buscar%")->get();
        return view('livewire.admin.hoteles.table-hoteles-habitaciones-imagenes', compact('imagenes'));
    }

    public function borrarAsk($hotelHabitacionImagen)
    {
       $this->emit('borrarAsk' , ['hotelHabitacionImagen' => $hotelHabitacionImagen]);
    }

    public function borrar($hotelHabitacionImagen)
    {
        $item = HotelHabitacionImagen::find($hotelHabitacionImagen);
        HotelHabitacionImagen::destroy($hotelHabitacionImagen);
        if (
            file_exists(public_path("img/hoteles/habitaciones/$item->imagen"))
        ) {
            unlink(public_path("img/hoteles/habitaciones/$item->imagen"));
        }
    }
}
