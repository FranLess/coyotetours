<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use App\Models\Tour;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Carrito extends Component
{
    public function eliminar($id){
        Cart::destroy($id);
    }

    public function render()
    {
        if(Auth::user()){
            $toursCart = DB::table('cart')
            ->select('cart.*' , 'tours.slug_es' , 'tours.nombre_es' , 'tours.precio_adulto' ,
              'tours.precio_menor' , 'tours.img_portada')
            ->join('tours' , 'tours.id' , '=' , 'cart.id_prod')
            ->where(['cart.categoria' => 'tours' , 'cart.email' => Auth::user()->email])
            ->get();
    
            $hotelesCart = DB::table('cart')
            ->select('cart.adultos' , 'cart.menores' , 'hoteles_habitaciones.nombre')
            ->join('hoteles_habitaciones' , 'hoteles_habitaciones.id' , '=' , 'cart.id_prod')
            ->where(['cart.categoria' => 'hoteles' , 'cart.email' => Auth::user()->email])
            ->get();
    
            $cabanasCart = DB::table('cart')
            ->select('cart.*' , 'cabanas_habitaciones.nombre' ,
            'cabanas_habitaciones.imagen' , 'cabanas_habitaciones.slug' , 'cabanas_habitaciones.precio_noche_base' ,
            'cabanas_habitaciones.minimo_personas' , 'cabanas_habitaciones.maximo_personas' , 'cabanas_habitaciones.cabana_id' ,
            'cabanas.slug as cabana_slug')
            ->join('cabanas_habitaciones' , 'cabanas_habitaciones.id' , '=' , 'cart.id_prod')
            ->join('cabanas' , 'cabanas.id' , '=' , 'cabanas_habitaciones.cabana_id')
            ->where(['cart.categoria' => 'cabana' , 'cart.email' => Auth::user()->email])
            ->get();

            $paquetesCart = DB::table('cart')
            ->select('cart.*' , 'cart.id as cart_id' , 'paquetes.*')
            ->join('paquetes' , 'paquetes.id' , '=' , 'cart.id_prod')
            ->where(['cart.categoria' => 'paquete' , 'cart.email' => Auth::user()->email])
            ->get();

            $atraccionesCart = DB::table('cart')
            ->select('cart.*' , 'cart.id as cart_id' , 'atracciones.*')
            ->join('atracciones' , 'atracciones.id' , '=' , 'cart.id_prod')
            ->where(['cart.categoria' => 'atraccion' , 'cart.email' => Auth::user()->email])
            ->get();

            $serviciosCart = DB::table('cart')
            ->select('cart.*' , 'cart.id as cart_id' , 'servicios.*')
            ->join('servicios' , 'servicios.id' , '=' , 'cart.id_prod')
            ->where(['cart.categoria' => 'servicio' , 'cart.email' => Auth::user()->email])
            ->get();

            return view('livewire.carrito' , compact('toursCart' , 'hotelesCart' , 'cabanasCart' , 'paquetesCart' , 'atraccionesCart' , 'serviciosCart'));
        }
        $toursCart=array();
        $hotelesCart=array();
        $cabanasCart=array();
        $paquetesCart=array();
        $atraccionesCart=array();
        $serviciosCart=array();
        return view('livewire.carrito' , compact('toursCart' , 'hotelesCart' , 'cabanasCart' , 'paquetesCart' , 'atraccionesCart' , 'serviciosCart'));
    }
}
