<?php

namespace App\Http\Livewire\Admin\Paquetes;

use App\Models\Paquetes\Paquete;
use Livewire\Component;

class TablePaquetes extends Component
{
    public $buscar;

    protected $listeners = [
        'borrarPaquete' => 'borrar',
    ];

    public function render()
    {
        $paquetes = Paquete::all();
        return view('livewire.admin.paquetes.table-paquetes' , compact('paquetes'));
    }

    public function borrarAsk($paquete)
    {
        $this->emit('borrarAsk', ['paquete' => $paquete]);
    }

    public function borrar($paquete)
    {
        $item = Paquete::find($paquete);
        Paquete::destroy($paquete);
        if (
            file_exists(public_path("img/paquetes/$item->imagen"))
        ) {
            unlink(public_path("img/paquetes/$item->imagen"));
        }
    }
}
