<?php

namespace App\Http\Livewire\Admin\Hoteles;

use App\Models\Hotel\Hotel;
use Livewire\Component;

class HotelesTable extends Component
{
    public $buscar;

    protected $listeners = [
        'borrarHotel' => 'borrar',
    ];

    public function render()
    {
        $hoteles = Hotel::where('nombre', 'like', "%$this->buscar%")->get();
        return view('livewire.admin.hoteles.hoteles-table', compact('hoteles'));
    }

    public function borrarAsk($hotel)
    {
        $this->emit('borrarAsk', ['hotel' => $hotel]);
    }

    public function borrar($hotel)
    {
        $item = Hotel::find($hotel);
        Hotel::destroy($hotel);
        if (
            file_exists(public_path("img/hoteles/$item->imagen"))
        ) {
            unlink(public_path("img/hoteles/$item->imagen"));
        }
    }
}
