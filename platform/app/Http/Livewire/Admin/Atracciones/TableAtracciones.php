<?php

namespace App\Http\Livewire\Admin\Atracciones;

use App\Models\Atracciones\Atraccion;
use Livewire\Component;

class TableAtracciones extends Component
{
    
    public $buscar;

    protected $listeners = [
        'borrarAtraccion' => 'borrar',
    ];

    public function render()
    {
        $atracciones = Atraccion::all();
        return view('livewire.admin.atracciones.table-atracciones' , compact('atracciones'));
    }

    public function borrarAsk($atraccion)
    {
        $this->emit('borrarAsk', ['atraccion' => $atraccion]);
    }

    public function borrar($atraccion)
    {
        $item = Atraccion::find($atraccion);
        Atraccion::destroy($atraccion);
        if (
            file_exists(public_path("img/atracciones/$item->imagen"))
        ) {
            unlink(public_path("img/atracciones/$item->imagen"));
        }
    }
}
