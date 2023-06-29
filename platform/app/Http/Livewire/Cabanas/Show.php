<?php

namespace App\Http\Livewire\Cabanas;

use Livewire\Component;

class Show extends Component
{
    public $cabana;
    public $products;

    public function mount($cabana , $products)
    {
        $this->cabana = $cabana;
        $this->products = $products;
    }
    public function render()
    {
        return view('livewire.cabanas.show');
    }
}
