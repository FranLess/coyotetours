<?php

namespace App\Http\Controllers;

use App\Http\Requests\Hoteles\HotelesRequest;
use App\Http\Requests\Cabanas\StoreCabanasHabitacionesCategoriasRequest;
use App\Http\Requests\Cabanas\StoreCabanasHabitacionesImagenesRequest;
use App\Http\Requests\Cabanas\StoreCabanasHabitacionesRequest;
use App\Http\Requests\Cabanas\StoreCabanasRequest;
use App\Http\Requests\Hoteles\StoreHotelesHabitacionesCategorias;
use App\Http\Requests\Hoteles\StoreHotelesHabitacionesImagenesRequest;
use App\Http\Requests\Hoteles\StoreHotelHabitacionRequest;
use App\Http\Requests\StoreImgRequest;
use App\Http\Requests\StoreTourRequest;
use App\Http\Requests\VideosYoutubeRequest;
use App\Models\Atracciones\Atraccion;
use App\Models\Cabana\Cabana;
use App\Models\Cabana\CabanaHabitacion;
use App\Models\Cabana\CabanaHabitacionCategoria;
use App\Models\Cabana\CabanaHabitacionImagen;
use App\Models\Hotel\Hotel;
use App\Models\Hotel\HotelHabitacion;
use App\Models\Hotel\HotelHabitacionCategoria;
use App\Models\Hotel\HotelHabitacionImagen;
use App\Models\Image;
use App\Models\Paquetes\Paquete;
use App\Models\Servicios\Servicio;
use App\Models\Tour;
use App\Models\YoutubeVideo;
use Illuminate\Http\FileHelpers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use App\Http\Traits\SaveFilesTrait;
class AdminController extends Controller
{
    use SaveFilesTrait;
    use FileHelpers;

    public function index()
    {
        return view('admin.index');
    }

    public function tours()
    {
        return view('admin.tours.show');
    }

    public function storeTours(StoreTourRequest $tour)
    {
        $files = $this->saveTourImg($tour);
        $tour = Tour::create([
            'id' => $tour->id,
            'nombre_es' => $tour->nombre_es,
            'nombre_en' => $tour->nombre_en,
            'slug_es' => Str::slug($tour->nombre_es),
            'slug_en' => Str::slug($tour->nombre_en),
            'precio_adulto' => $tour->precio_adulto,
            'precio_menor' => $tour->precio_menor,
            'img_portada' => $files['img_portada'],
            'img_banner' => $files['img_banner'],
            'pdf' => $files['pdf'],
        ]);
        return redirect(route('admin.show.tours'));
    }

    public function img()
    {
        $tours = Tour::all();
        return view('admin.img.show', compact('tours'));
    }

    public function storeImages(StoreImgRequest $image)
    {
        $files = $this->saveImage($image);
        $img = Image::create([
            'id_tour' => $image->id_tour,
            'nombre' => $image->nombre,
            'img' => $files['img'],
        ]);
        return redirect(route('admin.show.images'));
    }

    public function videos_youtube()
    {
        return view('admin.videos_youtube.show');
    }

    public function storeVideosYoutube(VideosYoutubeRequest $video)
    {
        YoutubeVideo::create([
            'nombre' => $video->nombre,
            'link' => $video->link,
            'clave' => $video->clave,
        ]);
        return redirect(route('admin.show.youtube_videos'));
    }

    //Funciones de Hoteles
    public function hoteles()
    {
        return view('admin.hoteles.show');
    }

    public function storeHoteles(HotelesRequest $hotel)
    {
        $files = $this->saveImageHotel($hotel);
        $store = Hotel::create([
            'id' => $hotel->id,
            'nombre' => $hotel->nombre,
            'slug' => Str::slug($hotel->nombre),
            'imagen' => $files['imagen'],
            'telefono' => $hotel->telefono,
            'email' => $hotel->email,
            'link_pagina' => $hotel->link_pagina,
        ]);
        return redirect(route('admin.show.hoteles'));
    }

    public function hotelesHabitacionesCategorias()
    {
        $hoteles = Hotel::all();
        return view('admin.hoteles.habitaciones.categorias.show', compact('hoteles'));
    }

    public function storeHotelesHabitacionesCategorias(StoreHotelesHabitacionesCategorias $categoria)
    {
        $item = HotelHabitacionCategoria::create([
            'id' => $categoria->id,
            'hotel_id' => $categoria->hotel_id,
            'nombre' => $categoria->nombre,
        ]);
        return redirect(route('admin.show.hoteles.habitaciones.categorias'));
    }

    public function hotelesHabitaciones()
    {
        $hoteles = Hotel::all();
        $categorias = HotelHabitacionCategoria::all();
        return view('admin.hoteles.habitaciones.show', compact('hoteles', 'categorias'));
    }

    public function storeHotelesHabitaciones(StoreHotelHabitacionRequest $habitacion)
    {
        $especificaciones = $separado_por_salto = explode("\r\n", $habitacion->especificaciones);
        $especificaciones = json_encode($especificaciones);
        $files = $this->saveHotelHabitacionImage($habitacion);
        HotelHabitacion::create([
            'id' => $habitacion->id,
            'hotel_id' => $habitacion->hotel_id,
            'nombre' => $habitacion->nombre,
            'categoria_id' => $habitacion->categoria_id,
            'slug' => Str::slug($habitacion->nombre),
            'especificaciones' => $especificaciones,
            'precio_noche' => $habitacion->precio_noche,
            'minimo_noches' => $habitacion->minimo_noches,
            'minimo_personas' => $habitacion->minimo_personas,
            'maximo_personas' => $habitacion->maximo_personas,
            'imagen' => $files['imagen'],
        ]);
        return redirect(route('admin.show.hoteles.habitaciones'));
    }

    public function hotelesHabitacionesImagenes()
    {
        $habitaciones = HotelHabitacion::all();
        return view('admin.hoteles.habitaciones.imagenes.show', compact('habitaciones'));
    }

    public function storeHotelesHabitacionesImagenes(StoreHotelesHabitacionesImagenesRequest $imagen)
    {
        $files = $this->saveHotelHabitacionImage($imagen);
        HotelHabitacionImagen::create([
            'id' => $imagen->id,
            'habitacion_id' => $imagen->habitacion_id,
            'nombre' => $imagen->nombre,
            'imagen' => $files['imagen'],
        ]);
        return redirect(route('admin.show.hoteles.habitaciones.imagenes'));
    }


    //Funciones de Cabanas
    public function cabanas()
    {
        return view('admin.cabanas.show');
    }

    public function storeCabanas(StoreCabanasRequest $cabana)
    {
        $files = $this->saveImageCabana($cabana);
        $store = Cabana::create([
            'id' => $cabana->id,
            'nombre' => $cabana->nombre,
            'slug' => Str::slug($cabana->nombre),
            'imagen' => $files['imagen'],
            'telefono' => $cabana->telefono,
            'email' => $cabana->email,
            'link_pagina' => $cabana->link_pagina,
        ]);
        return redirect(route('admin.show.cabanas'));
    }

    public function cabanasHabitacionesCategorias()
    {
        $cabanas = Cabana::all();
        return view('admin.cabanas.habitaciones.categorias.show', compact('cabanas'));
    }

    public function storeCabanasHabitacionesCategorias(StoreCabanasHabitacionesCategoriasRequest $categoria)
    {
        $item = CabanaHabitacionCategoria::create([
            'id' => $categoria->id,
            'cabana_id' => $categoria->cabana_id,
            'nombre' => $categoria->nombre,
        ]);

        return redirect(route('admin.show.cabanas.habitaciones.categorias'));
    }

    public function cabanasHabitaciones()
    {
        $cabanas = Cabana::all();
        $categorias = CabanaHabitacionCategoria::all();
        return view('admin.cabanas.habitaciones.show', compact('cabanas', 'categorias'));
    }

    public function storecabanasHabitaciones(StoreCabanasHabitacionesRequest $habitacion)
    {
        $especificaciones = $separado_por_salto = explode("\r\n", $habitacion->especificaciones);
        $especificaciones = json_encode($especificaciones);
        $files = $this->saveCabanaHabitacionPortadaImage($habitacion);
        CabanaHabitacion::create([
            'id' => $habitacion->id,
            'cabana_id' => $habitacion->cabana_id,
            'nombre' => $habitacion->nombre,
            'categoria_id' => $habitacion->categoria_id,
            'slug' => Str::slug($habitacion->nombre),
            'especificaciones' => $especificaciones,
            'minimo_noches' => $habitacion->minimo_noches,
            'maximo_personas' => $habitacion->maximo_personas,
            'minimo_personas' => $habitacion->minimo_personas,
            'precio_noche_base' => $habitacion->precio_noche_base,
            'precio_persona' => $habitacion->precio_persona,
            'imagen' => $files['imagen'],
        ]);
        return redirect(route('admin.show.cabanas.habitaciones'));
    }

    public function cabanasHabitacionesImagenes()
    {
        $habitaciones = CabanaHabitacion::all();
        return view('admin.cabanas.habitaciones.imagenes.show', compact('habitaciones'));
    }

    public function storeCabanasHabitacionesImagenes(StoreCabanasHabitacionesImagenesRequest $imagen)
    {
        $files = $this->saveCabanaHabitacionImage($imagen);
        CabanaHabitacionImagen::create([
            'id' => $imagen->id,
            'habitacion_id' => $imagen->habitacion_id,
            'nombre' => $imagen->nombre,
            'imagen' => $files['imagen'],
        ]);
        return redirect(route('admin.show.cabanas.habitaciones.imagenes'));
    }

    public function atracciones()
    {
        return view('admin.atracciones.show');
    }

    public function storeAtracciones(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'disponibilidad' => 'required',
            'precio_persona' => 'required',
            'imagen' => 'required',
        ]);

        $files = $this->saveAtraccionImage($request);

        Atraccion::create([
            'nombre' => $request->nombre,
            'slug' => Str::slug($request->nombre),
            'disponibilidad' => $request->disponibilidad,
            'precio_persona' => $request->precio_persona,
            'imagen' => $files['imagen'],
        ]);


        return redirect()->back()->with('saved' , 'Registro Guardado');
    }

    public function servicios()
    {
        return view('admin.servicios.show');
    }

    public function storeServicios(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'disponibilidad' => 'required',
            'imagen' => 'required',
            'precio' => 'required',
        ]);

        $files = $this->saveServicioImage($request);

        Servicio::create([
            'nombre' => $request->nombre,
            'slug' => Str::slug($request->nombre),
            'disponibilidad' => $request->disponibilidad,
            'imagen' => $files['imagen'],
            'precio' => $request->precio,
        ]);
        return redirect(route('admin.show.servicios'));
    }

    public function paquetes()
    {
        return view('admin.paquetes.show');
    }

    public function storePaquetes(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'disponibilidad' => 'required',
            'imagen' => 'required',
            'precio' => 'required',
            'precio2' => 'required',
        ]);

        $files = $this->savePaqueteImage($request);

        Paquete::create([
            'nombre' => $request->nombre,
            'slug' => Str::slug($request->nombre),
            'disponibilidad' => $request->disponibilidad,
            'imagen' => $files['imagen'],
            'precio' => $request->precio,
            'precio2' => $request->precio2,
        ]);
        return redirect(route('admin.show.paquetes'));
    }


}
