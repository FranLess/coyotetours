<?php

namespace App\Http\Livewire\Cabanas;

use App\Models\Cabana\Cabana;
use Livewire\Component;

class ProductList extends Component
{
    public function render()
    {
        $cabanas = Cabana::all();
        return view('livewire.cabanas.product-list' , compact('cabanas'));
    }
}
