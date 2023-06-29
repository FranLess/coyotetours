<?php

namespace App\Http\Livewire\Admin\Cabanas;

use App\Models\Cabana\CabanaHabitacionImagen;
use Livewire\Component;

class TableCabanasHabitacionesImagenes extends Component
{
    public $buscar;

    protected $listeners = [
        'borrarCabanaHabitacionImagen' => 'borrar',
    ];

    public function render()
    {
        $imagenes = CabanaHabitacionImagen::where('nombre', 'like', "%$this->buscar%")->get();
        return view('livewire.admin.cabanas.table-cabanas-habitaciones-imagenes', compact('imagenes'));
    }

    public function borrarAsk($cabanaHabitacionImagen)
    {
       $this->emit('borrarAsk' , ['cabanaHabitacionImagen' => $cabanaHabitacionImagen]);
    }

    public function borrar($cabanaHabitacionImagen)
    {
        $item = CabanaHabitacionImagen::find($cabanaHabitacionImagen);
        CabanaHabitacionImagen::destroy($cabanaHabitacionImagen);
        if (
            file_exists(public_path("img/cabanas/habitaciones/$item->imagen"))
        ) {
            unlink(public_path("img/cabanas/habitaciones/$item->imagen"));
        }
    }
}
