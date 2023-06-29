<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AtraccionesController;
use App\Http\Controllers\CabanasController;
use App\Http\Controllers\cartController;
use App\Http\Controllers\HotelesController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RestaurantesController;
use App\Http\Controllers\ToursController;
use App\Http\Controllers\VentasController;
use App\Http\Livewire\Carrito;
use App\Http\Livewire\Users;
use App\Models\Tour;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect(route('index'));
});

Route::get('locale/{locale}' , function($locale){
    if($locale!='es' && $locale!='en') return redirect()->back()->with(['lang' => $locale]);
        return redirect()->back()->withCookie('locale', $locale);
})->name('idioma');


// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
//     ])->group(function () {
//         Route::get('/dashboard', function () {
//             $tours = Tour::all();
//         return redirect(route('index'));
//     })->name('dashboard');
// });


//Rutas de Admin
Route::middleware(['admin'])
->controller(AdminController::class)->group(function(){
    Route::get('admin' , 'index')->name('admin.index');

    //--------------------- Rutas Admin de Tours -------------------------//
    Route::get('admin/tours' , 'tours')->name('admin.show.tours');
    Route::post('admin/tours' , 'storeTours')->name('admin.store.tours');

    Route::get('admin/img' , 'img')->name('admin.show.images');
    Route::post('admin/img' , 'storeImages')->name('admin.store.images');

    Route::get('admin/youtube_videos' , 'videos_youtube')->name('admin.show.youtube_videos');
    Route::post('admin/youtube_videos' , 'storeVideosYoutube')->name('admin.store.youtube_videos');

    //----------------------- Rutas Admin de Hoteles --------------------//
    Route::get('admin/hoteles' , 'hoteles')->name('admin.show.hoteles');
    Route::post('admin/hoteles' , 'storeHoteles')->name('admin.store.hoteles');

    Route::get('admin/hotelesHabitaciones' , 'hotelesHabitaciones')->name('admin.show.hoteles.habitaciones');
    Route::post('admin/hotelesHabitaciones' , 'storeHotelesHabitaciones')->name('admin.store.hoteles.habitaciones');

    Route::get('admin/hotelesHabitacionesImagenes' , 'hotelesHabitacionesImagenes')->name('admin.show.hoteles.habitaciones.imagenes');
    Route::post('admin/hotelesHabitacionesImagenes' , 'storeHotelesHabitacionesImagenes')->name('admin.store.hoteles.habitaciones.imagenes');

    Route::get('admin/hotelesHabitacionesCategorias' , 'hotelesHabitacionesCategorias')->name('admin.show.hoteles.habitaciones.categorias');
    Route::post('admin/hotelesHabitacionesCategorias' , 'storeHotelesHabitacionesCategorias')->name('admin.store.hoteles.habitaciones.categorias');

    //---------------------- Rutas Admin de Cabanas ---------------------//
    Route::get('admin/cabanas' , 'cabanas')->name('admin.show.cabanas');
    Route::post('admin/cabanas' , 'storeCabanas')->name('admin.store.cabanas');

    Route::get('admin/cabanasHabitaciones' , 'cabanasHabitaciones')->name('admin.show.cabanas.habitaciones');
    Route::post('admin/cabanasHabitaciones' , 'storeCabanasHabitaciones')->name('admin.store.cabanas.habitaciones');

    Route::get('admin/cabanasHabitacionesImagenes' , 'cabanasHabitacionesImagenes')->name('admin.show.cabanas.habitaciones.imagenes');
    Route::post('admin/cabanasHabitacionesImagenes' , 'storeCabanasHabitacionesImagenes')->name('admin.store.cabanas.habitaciones.imagenes');

    Route::get('admin/cabanasHabitacionesCategorias' , 'cabanasHabitacionesCategorias')->name('admin.show.cabanas.habitaciones.categorias');
    Route::post('admin/cabanasHabitacionesCategorias' , 'storeCabanasHabitacionesCategorias')->name('admin.store.cabanas.habitaciones.categorias');

    //Rutas de atracciones
    Route::get('admin/atracciones' , 'atracciones')->name('admin.show.atracciones');
    Route::post('admin/atracciones' , 'storeAtracciones')->name('admin.store.atracciones');

    //Rutas de servicios
    Route::get('admin/servicios' , 'servicios')->name('admin.show.servicios');
    Route::post('admin/servicios' , 'storeServicios')->name('admin.store.servicios');

    //Rutas de paquetes
    Route::get('admin/paquetes' , 'paquetes')->name('admin.show.paquetes');
    Route::post('admin/paquetes' , 'storePaquetes')->name('admin.store.paquetes');
});


//Rutas Tours
Route::controller(ToursController::class)->group(function(){
    Route::get('/' , 'index')->name('index');

    Route::get('tours/{tour}' , 'show')->name('tours.show');

    Route::get('nosotros' , 'nosotros')->name('nosotros.index');

    Route::get('contacto' , 'contacto')->name('contacto.index');

    Route::post('peticion-reserva' , 'peticionReserva')->name('peticion_reserva');
});

//Rutas Restaurantes
Route::controller(RestaurantesController::class)->group(function(){
    Route::get('restaurantes/{restaurante}' , 'show')->name('restaurantes.show');
});

//Rutas Cabanas
Route::controller(CabanasController::class)->group(function(){
    Route::get('cabanas/{cabana}' , 'show')->name('cabanas.show');

    Route::get('cabanas/{cabana}/{product}' , 'product')->name('cabanas.product');
});

//Rutas Hoteles
Route::controller(HotelesController::class)->group(function(){
    Route::get('hoteles/{hotel}','show')->name('hoteles.show');

    Route::get('hoteles/{hotel}/{product}', 'product')->name('hoteles.product');
});

//Rutas Atracciones
Route::controller(AtraccionesController::class)->group(function(){
    Route::get('atracciones/{atraccion}' , 'showAtraccion')->name('atracciones.show');

    Route::get('paquetes/{paquete}' , 'showPaquete')->name('paquetes.show');

    Route::get('servicios/{servicio}' , 'showServicio')->name('servicios.show');
});

//Rutas Carrito
Route::middleware(['auth:sanctum' , config('jetstream.auth_session') , 'verified'])->controller(cartController::class)->group(function(){
    Route::get('cart' , 'index')->name('cart.show');

    Route::post('storeCart' , 'store')->name('cart.store');

    Route::delete('deleteCart' , 'destroy')->name('cart.destroy');

});

//Ruta de Generacion de ticket
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->controller(VentasController::class)->group(function(){
    Route::get('ventas/{id}', 'showVenta')->name('venta.ticket');
    Route::get('compra/{id}', 'showCompra')->name('compra.ticket');
    Route::get('compras' , 'compras')->name('compras');
});



Route::get('payment' , function(){
    return view('payment.show');
})->middleware(['auth:sanctum' , config('jetstream.auth_session') , 'verified'])->name('payment.show');

//Paypal Routes
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->controller(PaymentController::class)->group(function(){
    //Rutas de PayPal
    Route::post('create-paypal-order' , 'createOrder')->name('paypal.create');
    Route::post('process-paypal-order' , 'processOrder')->name('paypal.process');
});
