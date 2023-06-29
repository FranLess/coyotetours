<?php

namespace App\Http\Livewire\Admin\Cabanas;

use App\Models\Cabana\CabanaHabitacionCategoria;
use Livewire\Component;

class TableCabanasHabitacionesCategorias extends Component
{
    public $buscar;

    protected $listeners = [
        'borrarCabanaHabitacionCategoria' => 'borrar',
    ];

    public function render()
    {
        $categorias = CabanaHabitacionCategoria::where('nombre', 'like', "%$this->buscar%")->get();
        return view('livewire.admin.cabanas.table-cabanas-habitaciones-categorias', compact('categorias'));
    }

    public function borrarAsk($cabanaHabitacionCategoria)
    {
        $this->emit('borrarAsk', ['cabanaHabitacionCategoria' => $cabanaHabitacionCategoria]);
    }

    public function borrar($cabanaHabitacionCategoria)
    {
        CabanaHabitacionCategoria::destroy($cabanaHabitacionCategoria);
    }
}
