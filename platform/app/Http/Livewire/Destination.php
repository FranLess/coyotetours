<?php

namespace App\Http\Livewire;

use App\Models\Tour;
use Livewire\Component;

class Destination extends Component
{
    

    public function mount(){
        
    }
    public function render()
    {
        $tours = Tour::all();
        return view('livewire.destination.destination' , compact('tours'));
    }
}
