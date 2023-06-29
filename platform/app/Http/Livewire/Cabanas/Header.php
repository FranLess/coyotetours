<?php

namespace App\Http\Livewire\Cabanas;

use Livewire\Component;

class Header extends Component
{
    public $cabana;

    public function mount($cabana)
    {
        $this->cabana = $cabana;
    }
    public function render()
    {
        return view('livewire.cabanas.header');
    }
}
