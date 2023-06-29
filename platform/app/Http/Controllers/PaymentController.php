<?php

namespace App\Http\Controllers;

use App\Mail\CompraProducto;
use App\Models\Cart;
use App\Models\Venta;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Srmklive\PayPal\Facades\PayPal;



class PaymentController extends Controller
{
    private $provider;
    private $accessToken;

    public function __construct()
    {
        $this->provider = PayPal::setProvider();
        $this->accessToken = $this->provider->getAccessToken();
    }

    public function createOrder(Request $request)
    {
        $tipo_pago = $request->get('tipo_pago');
        if ($tipo_pago != "20%" && $tipo_pago != "contado") return abort(404);

        $total_compra = $this->getTotalCartPrice();
        if ($tipo_pago == "20%") $total_compra = $total_compra * 0.2;

        $data = json_decode('{
            "intent": "CAPTURE",
            "purchase_units": [
              {
                "amount": {
                  "currency_code": "MXN",
                  "value": "' . $total_compra . '"
                }
              }
            ],
            "application_context":
            {
                "shipping_preference": "NO_SHIPPING"
            }
        }', true);
        $order = $this->provider->createOrder($data);
        return $order;
    }

    public function processOrder(Request $request)
    {
        $tipo_pago = $request->get('tipo_pago');
        if ($tipo_pago != "20%" && $tipo_pago != "contado") return abort(404);

        $data = $request->get('data');

        $order_id = $data['orderID'];
        $order = $this->provider->showOrderDetails($order_id);
        $order = $this->provider->authorizePaymentOrder($order_id);
        $order = $this->provider->capturePaymentOrder($order_id);
        //en la funcion de store venta, se llevan a cabo el envio del mail y el borrado del carrito
        // return $order;
        $this->storeVenta($order, $tipo_pago);


        return $order;
    }
    protected function storeVenta($response, $tipo_pago)
    {
        $user_email = Auth::user()->email;
        if ($response['status'] == "COMPLETED") {
            $carrito = Cart::where('email', $user_email)->get();
            $total_compra = $this->getTotalCartPrice();
            $order_id = $response['id'];

            $venta = Venta::create([
                'venta_id' => $response['id'],
                'compra_id' =>  $response['purchase_units'][0]['payments']['captures'][0]['id'],
                'usuario_paypal_id' => $response['payer']['payer_id'],
                'usuario_email' =>  $user_email,
                'usuario_email_venta' => $response['payer']['email_address'],
                'nombre_usuario' => $response['payer']['name']['given_name'],
                'apellido_usuario' => $response['payer']['name']['surname'],
                'codigo_pais' => $response['payer']['address']['country_code'],
                'moneda' => $response['purchase_units'][0]['payments']['captures'][0]['amount']['currency_code'],
                'pagado' => $response['purchase_units'][0]['payments']['captures'][0]['amount']['value'],
                'detalles_compra' => $carrito,
                'paypal_fee' => $response ['purchase_units'][0]['payments']['captures'][0]['seller_receivable_breakdown']['paypal_fee']['value'],
                'tipo_pago' => $tipo_pago,
                'pago_pendiente' => ($total_compra) - ($response['purchase_units'][0]['payments']['captures'][0]['amount']['value']),
            ]);
        
            $mail_response = $this->enviarMailVenta($order_id , $user_email);
        }
    }

    protected function destroyCart($user_email)
    {
        Cart::where('email', $user_email)->delete();
    }

    protected function enviarMailVenta($venta_id, $user_email)
    {
        $response = Mail::to($user_email)->send(new CompraProducto($venta_id));
        return $response;
    }
    public function show()
    {
        $user = Auth::user();
        return view('payment.show', compact('user'));
    }

    private function getTotalCartPrice()
    {
        $user_email = Auth::user()->email;
        $carrito = Cart::where('email', $user_email)->get();
        $array_total_compra = $carrito->map->precio_total;
        $array_total_compra = $array_total_compra->all();
        $total_compra = array_sum($array_total_compra);
        return $total_compra;
    }
}
