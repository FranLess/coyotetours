<?php

namespace App\Http\Livewire\Admin\Atracciones\Restaurantes;

use App\Models\Atracciones\Restaurante;
use Livewire\Component;

class TableRestaurantes extends Component
{
    public $buscar;

    protected $listeners = [
        'borrarRestaurante' => 'borrar',
    ];

    public function render()
    {
        $restaurantes = Restaurante::where('nombre', 'like', "%$this->buscar%")->get();
        return view('livewire.admin.atracciones.restaurantes.table-restaurantes', compact('restaurantes'));
    }

    public function borrarAsk($restaurante)
    {
        $this->emit('borrarAsk', ['restaurante' => $restaurante]);
    }

    public function borrar($restaurante)
    {
        $item = Restaurante::find($restaurante);
        Restaurante::destroy($restaurante);
        if (
            file_exists(public_path("img/atracciones/restaurantes/$item->imagen"))
        ) {
            unlink(public_path("img/atracciones/restaurantes/$item->imagen"));
        }
    }
}
