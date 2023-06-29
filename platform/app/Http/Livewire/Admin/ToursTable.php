<?php

namespace App\Http\Livewire\Admin;

use App\Models\Tour;
use Livewire\Component;

class ToursTable extends Component
{
    public $buscar;

    protected $listeners = [
        'borrarTour' => 'borrar',
    ];

    public function render()
    {
        $tours = Tour::where('nombre_es', 'like', "%$this->buscar%")
            ->orWhere('nombre_en', 'like', "%$this->buscar%")->get();
        return view('livewire.admin.tours-table', compact('tours'));
    }

    public function borrarAsk($tour)
    {
        $this->emit('borrarAsk', ['tour' => $tour]);
    }

    public function borrar($tour)
    {
        $item = Tour::find($tour);
        Tour::find($tour)->delete();
        if (
            file_exists(public_path("img/tours/$item->img_portada"))
            || file_exists(public_path("img/banners/$item->img_banner"))
            || file_exists(public_path("pdf/$item->pdf"))
        ) {
            unlink(public_path("img/tours/$item->img_portada"));
            unlink(public_path("img/banners/$item->img_banner"));
            unlink(public_path("pdf/$item->pdf"));
        }
    }
}
