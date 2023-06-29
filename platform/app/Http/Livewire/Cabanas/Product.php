<?php

namespace App\Http\Livewire\Cabanas;

use Livewire\Component;

class Product extends Component
{
    public $product;
    public $images;
    public $fecha_inicio;
    public $fecha_final;

    public function mount($product, $images)
    {
        $this->product = $product;
        $this->images = $images;
    }

    public function render()
    {
        return view('livewire.cabanas.product');
    }
}
