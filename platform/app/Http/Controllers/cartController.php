<?php

namespace App\Http\Controllers;

use App\Models\Atracciones\Atraccion;
use App\Models\Atracciones\Restaurante;
use App\Models\Cabana\CabanaHabitacion;
use App\Models\Cart;
use App\Models\Paquetes\Paquete;
use App\Models\Servicios\Servicio;
use App\Models\Tour;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class cartController extends Controller
{
    public function index()
    {
        return view('cart.show');
    }

    public function store(Request $request)
    {
        # Se crea un campo en la tabla de carrito según la categoria.

        # se validan los campos y se valida que el producto recibido exista.

        /* se hace una consulta a las tablas correspondientes de las categorias
        y se calcula el total a pagar del producto elegido según el producto referenciado. */
        if ($request->categoria == 'tours') {
            $tour = Tour::find($request->id);
            if (empty($tour)) {
                return redirect()->back()->with('tourNull', 'El tour no existe');
            }
            $validated = $request->validate([
                'id' => 'required',
                'numAdulto' => 'numeric|required|min:0',
                'numMenor' => 'numeric|required|min:0',
                'fecha_inicio' => 'required|date',
            ]);


            $cart = Cart::create([
                'email' => Auth::user()->email,
                'id_prod' => $request->id,
                'nombre_prod' => $tour->nombre_es,
                'categoria' => $request->categoria,
                'adultos' => $request->numAdulto,
                'menores' => $request->numMenor,
                'fecha_inicio' => $request->fecha_inicio,
                'precio_total' => ($tour->precio_menor * $request->numMenor) + ($tour->precio_adulto * $request->numAdulto),
            ]);
        }


        if ($request->categoria == 'cabana') {
            $cabana_habitacion = CabanaHabitacion::find($request->id);
            if (empty($cabana_habitacion)) {
                return redirect()->back()->with('habitacionNull', 'La cabaña no existe');
            }
            
            $minimo_personas = $cabana_habitacion->minimo_personas;
            $maximo_personas = $cabana_habitacion->maximo_personas;
            $minimo_noches = $cabana_habitacion->minimo_noches;

            $fecha_inicio = Carbon::create($request->fecha_inicio);
            $fecha_final = Carbon::create($request->fecha_final);
    
            $diferencia_en_dias = $fecha_inicio->diffInDays($fecha_final);

            $hoy = Carbon::yesterday();
            $hoy = $hoy->toDateString();  
            // return $diferencia_en_dias;
            $validated = $request->validate([
                'fecha_inicio' => "required|after:$hoy",
                'fecha_final' => 'required',
                'noches' => "numeric|required|min:$minimo_noches|size:$diferencia_en_dias",
                'personas' => "numeric|required|min:$minimo_personas|max:$maximo_personas",
            ]);
            
            // return $validated;
           $precio_prod = $cabana_habitacion->precio_noche_base + (($request->personas-$cabana_habitacion->minimo_personas)*$cabana_habitacion->precio_persona);

            $cart = Cart::create([
                'email' => Auth::user()->email,
                'id_prod' => $request->id,
                'nombre_prod' => $cabana_habitacion->nombre,
                'categoria' => $request->categoria,
                'noches' => $request->noches,
                'personas' => $request->personas,
                'fecha_inicio' => $request->fecha_inicio,
                'fecha_fin' => $request->fecha_final,
                'precio_total' => $precio_prod,
            ]);
        }

        if ($request->categoria == 'paquete') {
            $paquete = Paquete::find($request->id);
            if (empty($paquete)) {
                return redirect()->back()->with('paqueteNull', 'El paquete no existe');
            }
            if($paquete->precio != $request->precio && $paquete->precio != $request->precio2) {
                return redirect()->back()->with('paqueteNull', 'El paquete no existe');
            }

            $validated = $request->validate([
                'id' => 'required',
                'precio' => 'numeric|required|min:0',
                'fecha_inicio' => "required|date",
                'categoria' => "required",
            ]);


            $cart = Cart::create([
                'email' => Auth::user()->email,
                'id_prod' => $request->id,
                'nombre_prod' => $paquete->nombre,
                'categoria' => $request->categoria,
                'fecha_inicio' => $request->fecha_inicio,
                'precio_total' => $request->precio,
            ]);
        }

        if ($request->categoria == 'atraccion') {
            $atraccion = Atraccion::find($request->id);
            if (empty($atraccion)) {
                return redirect()->back()->with('atraccionNull', 'El atraccion no existe');
            }
            $validated = $request->validate([
                'id' => 'required',
                'precio' => "numeric|required|min:0|size:$atraccion->precio_persona",
                'fecha_inicio' => 'required|date',
                'personas' => 'required|numeric|min:1',
            ]);


            $cart = Cart::create([
                'email' => Auth::user()->email,
                'id_prod' => $request->id,
                'nombre_prod' => $atraccion->nombre,
                'categoria' => $request->categoria,
                'fecha_inicio' => $request->fecha_inicio,
                'personas' => $request->personas,
                'precio_total' => $request->precio * $request->personas,
            ]);
        }

        if ($request->categoria == 'servicio') {
            $servicio = Servicio::find($request->id);
            if (empty($servicio)) {
                return redirect()->back()->with('servicioNull', 'El servicio no existe');
            }
            $validated = $request->validate([
                'id' => 'required',
                'precio' => "required",
                'fecha_inicio' => 'required|date',
            ]);


            $cart = Cart::create([
                'email' => Auth::user()->email,
                'id_prod' => $request->id,
                'nombre_prod' => $servicio->nombre,
                'categoria' => $request->categoria,
                'fecha_inicio' => $request->fecha_inicio,
                'personas' => $request->personas,
                'precio_total' => $request->precio,
            ]);
        }


        if ($request->categoria == 'hotel') {
            $request->validate([
                'fecha_inicio' => 'required',
                'fecha_final' => 'required',
                'noches' => 'required',
                'personas' => 'required',
            ]);
            $cart = Cart::create([
                'email' => Auth::user()->email,
                'id_prod' => $request->id,
                'nombre_prod' => $cabana_habitacion->nombre,
                'categoria' => $request->categoria,
                'noches' => $request->noches,
                'personas' => $request->personas,
                'fecha_inicio' => $request->fecha_inicio,
                'fecha_fin' => $request->fecha_fin,
            ]);
        }

        

        return redirect(route('cart.show'));
    }
}
