<?php

namespace App\Http\Livewire;

use App\Models\Tour;
use Livewire\Component;

class NavBar extends Component
{
    public $tours;
    public function mount(){
        $this->tours = Tour::all();
    }
    public function render()
    {
        return view('livewire.nav-bar');
    }
}
