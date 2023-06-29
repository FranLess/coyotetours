<?php

namespace App\Http\Livewire\Admin\Servicios;

use App\Models\Servicios\Servicio;
use Livewire\Component;

class TableServicios extends Component
{
    public $buscar;

    protected $listeners = [
        'borrarServicio' => 'borrar',
    ];

    public function render()
    {
        $servicios = Servicio::all();
        return view('livewire.admin.servicios.table-servicios' , compact('servicios'));
    }

    public function borrarAsk($servicio)
    {
        $this->emit('borrarAsk', ['servicio' => $servicio]);
    }

    public function borrar($servicio)
    {
        $item = Servicio::find($servicio);
        Servicio::destroy($servicio);
        if (
            file_exists(public_path("img/servicios/$item->imagen"))
        ) {
            unlink(public_path("img/servicios/$item->imagen"));
        }
    }
}
