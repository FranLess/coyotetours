<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class Product extends Component
{
    public $tour;
    public $adulto=1;
    public $menor=1;
    public $images;

    public function mount($tour , $images){
        $this->tour = $tour;
        $this->images = $images;
    }

    public function storeAdulto($id,$nombre_es,$precio_adulto,$precio_menor){
        Cart::add($id,$nombre_es,1,0,['precio_adulto' => $precio_adulto , 'precio_menor' => $precio_menor,'adulto_num' => $this->adulto , 'menor_num' => $this->menor])->associate('\App\Models\Tour');
        session()->flash('succes_message' , 'Item added in cart');
    }

    public function storeMenor($id,$nombre_es,$precio){
        Cart::add($id,$nombre_es,$this->menor,$precio)->associate('\App\Models\Tour');
        session()->flash('succes_message' , 'Item added in cart');
        return redirect(route('carrito'));
    }

    public function render()
    {
        return view('livewire.product');
    }
}
