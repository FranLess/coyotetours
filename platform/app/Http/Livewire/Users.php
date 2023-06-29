<?php

namespace App\Http\Livewire;

use App\Models\Tour;
use App\Models\User;
use Livewire\Component;

class Users extends Component
{
    public $buscar;
    public $sort = 'id';
    public $direction = 'asc';

    public function render()
    {
        
        $tours = Tour::where('nombre_es' , 'like' , "%$this->buscar%")
                        ->orWhere('precio_adulto' , 'like' , "%$this->buscar%")
                        ->orderBy($this->sort , $this->direction)
                        ->get();
        session()->flash('flash.banner', 'Yay for free components!');
        session()->flash('flash.bannerStyle', 'success');
        return view('livewire.users' , compact('tours'));
    }

    public function sort($sort){
        ($this->sort == $sort)?
        (
            ($this->direction == 'asc')? 
            $this->direction = 'desc' : 
            $this->direction = 'asc'
        ): $this->sort = $sort;
    }
}
