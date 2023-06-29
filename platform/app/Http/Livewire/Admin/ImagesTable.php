<?php

namespace App\Http\Livewire\Admin;

use App\Models\Image;
use Livewire\Component;

class ImagesTable extends Component
{
    public $buscar;

    protected $listeners = [
        'borrarImg' => 'borrar',
    ];

    public function render()
    {
        $images = Image::where('nombre' , 'like' , "%$this->buscar%")->get();
        return view('livewire.admin.images-table' , compact('images'));
    }

    public function borrarAsk($image)
    {
        $this->emit('borrarAsk', ['image' => $image]);
    }

    public function borrar($image)
    {
        $item = Image::find($image);
        Image::find($image)->delete();
        if (
            file_exists(public_path("img/images/$item->img"))
        ) {
            unlink(public_path("img/images/$item->img"));
        }
    }
}
