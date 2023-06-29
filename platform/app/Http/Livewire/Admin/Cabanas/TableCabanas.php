<?php

namespace App\Http\Livewire\Admin\Cabanas;

use App\Models\Cabana\Cabana;
use Livewire\Component;

class TableCabanas extends Component
{
    public $buscar;

    protected $listeners = [
        'borrarCabana' => 'borrar',
    ];

    public function render()
    {
        $cabanas = Cabana::where('nombre', 'like', "%$this->buscar%")->get();
        return view('livewire.admin.cabanas.table-cabanas', compact('cabanas'));
    }

    public function borrarAsk($cabana)
    {
        $this->emit('borrarAsk', ['cabana' => $cabana]);
    }

    public function borrar($cabana)
    {
        $item = Cabana::find($cabana);
        Cabana::destroy($cabana);
        if (
            file_exists(public_path("img/cabanas/$item->imagen"))
        ) {
            unlink(public_path("img/cabanas/$item->imagen"));
        }
    }
}
