<?php

namespace App\Http\Livewire\Admin\Cabanas;

use App\Models\Cabana\CabanaHabitacion;
use Livewire\Component;

class TableCabanasHabitaciones extends Component
{
    public $buscar;

    protected $listeners = [
        'borrarCabanaHabitacion' => 'borrar',
    ];

    public function render()
    {
        $habitaciones = CabanaHabitacion::where('nombre', 'like', "%$this->buscar%")->get();
        return view('livewire.admin.cabanas.table-cabanas-habitaciones', compact('habitaciones'));
    }

    public function borrarAsk($cabanaHabitacion)
    {
        $this->emit('borrarAsk', ['cabanaHabitacion' => $cabanaHabitacion]);
    }

    public function borrar($cabanaHabitacion)
    {
        $item = CabanaHabitacion::find($cabanaHabitacion);
        CabanaHabitacion::destroy($cabanaHabitacion);
        if (
            file_exists(public_path("img/cabanas/habitaciones/$item->imagen"))
        ) {
            unlink(public_path("img/cabanas/habitaciones/$item->imagen"));
        }
    }
}
