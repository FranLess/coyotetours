    {{-- @dump($toursCart)
    @dump($hotelesCart)
    @dump($cabanasCart) --}}
    <div class="container-fluid">
        @php
            $total = [];
        @endphp
        <x-slot name='links'>
            <link rel="stylesheet" href="{{ asset('lib/carrito/assets/css/main.css') }}">
        </x-slot>


        <div class="container-fluid">
            <main class="main">
                <div class="">
                    <div class="container-fluid p-1">
                        <i class="d-flex align-end bi bi-cart3 display-3  rounded-circle p-2"></i>
                    </div>
                </div>
                <section class="mt-50 mb-50">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">

                                @if (count($toursCart) > 0)
                                    <div class="container-fluid bg-dark text-white">
                                        <label for="tile" class="display-3">Tours</label>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table shopping-summery text-center clean">
                                            <thead>
                                                <tr class="main-heading">
                                                    <th scope="col"></th>
                                                    <th scope="col">Nombre</th>
                                                    <th scope="col">Fecha</th>
                                                    <th scope="col">Precio Adulto</th>
                                                    <th scope="col">Precio Menor</th>
                                                    <th scope="col">Adultos</th>
                                                    <th scope="col">Menores</th>
                                                    <th scope="col">Subtotal</th>
                                                    <th scope="col">Eliminar</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($toursCart as $item)
                                                    @if ($item->categoria == 'tours')
                                                    @endif
                                                    <tr>
                                                        <td class="img"><img class="img-thumbnail"
                                                                style="width: 10em"
                                                                src='{{ asset("img/tours/$item->img_portada") }}'
                                                                alt="#"></td>
                                                        <td class="product-des product-name">
                                                            <h5 class="product-name"><a
                                                                    href="{{ route('tours.show', $item->slug_es) }}">
                                                                    {{ $item->nombre_es }} </a></h5>
                                                            {{-- <p class="font-xs">Maboriosam in a tonto nesciung eget<br> distingy
                                                                magndapibus.
                                                            </p> --}}
                                                        </td>
                                                        <td class="product-des product-name">
                                                            <h5 class="product-name"> {{ $item->fecha_inicio }} </h5>
                                                            {{-- <p class="font-xs">Maboriosam in a tonto nesciung eget<br> distingy
                                                                magndapibus.
                                                            </p> --}}
                                                        </td>
                                                        <td class="price" data-title="Precio Adulto"><span>
                                                                {{ $item->precio_adulto }} MXN</span></td>
                                                        <td class="price" data-title="Precio Menor"><span>
                                                                {{ $item->precio_menor }} MXN</span></td>
                                                        <td class="text-center" data-title="Stock">
                                                            <div class="detail-qty border radius  m-auto">
                                                                {{-- <a href="#" class="qty-down"><i
                                                                        class="bi bi-dash-lg"></i></a> --}}
                                                                <span class="qty-val">{{ $item->adultos }}</span>
                                                                {{-- <a href="#" class="qty-up"><i
                                                                        class="bi bi-plus"></i></a> --}}
                                                            </div>
                                                        </td>
                                                        <td class="text-center" data-title="Stock">
                                                            <div class="detail-qty border radius  m-auto">
                                                                {{-- <a href="#" class="qty-down"><i
                                                                        class="bi bi-dash-lg"></i></a> --}}
                                                                <span class="qty-val">{{ $item->menores }}</span>
                                                                {{-- <a href="#" class="qty-up"><i
                                                                        class="bi bi-plus"></i></a> --}}
                                                            </div>
                                                        </td>
                                                        <td class="text-right" data-title="Cart">
                                                            <span>
                                                                {{ $total[] = $item->precio_total }}
                                                                MXN
                                                            </span>
                                                        </td>
                                                        <td class="action" data-title="Remove"><a class="text-muted"><i
                                                                    wire:click="eliminar({{ $item->id }})"
                                                                    class="bi bi-trash3-fill display-4 cursor-pointer"></i></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                @endif


                                {{-- HOTELES CART --}}
                                @if (count($hotelesCart) > 0)
                                    <div class="container-fluid bg-dark text-white">
                                        <label for="tile" class="display-3">Hoteles</label>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table shopping-summery text-center clean">
                                            <thead>
                                                <tr class="main-heading">
                                                    <th scope="col"></th>
                                                    <th scope="col">Nombre</th>
                                                    <th scope="col">Fecha</th>
                                                    <th scope="col">Precio Adulto</th>
                                                    <th scope="col">Precio Menor</th>
                                                    <th scope="col">Adultos</th>
                                                    <th scope="col">Menores</th>
                                                    <th scope="col">Subtotal</th>
                                                    <th scope="col">Eliminar</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($hotelesCart as $item)
                                                    @if ($item->categoria == 'tours')
                                                    @endif
                                                    <tr>
                                                        <td class="img"><img class="img-thumbnail"
                                                                style="width: 10em"
                                                                src='{{ asset("img/tours/$item->img_portada") }}'
                                                                alt="#"></td>
                                                        <td class="product-des product-name">
                                                            <h5 class="product-name"><a
                                                                    href="{{ route('tours.show', $item->slug_es) }}">
                                                                    {{ $item->nombre_es }} </a></h5>
                                                            {{-- <p class="font-xs">Maboriosam in a tonto nesciung eget<br> distingy
                                                                magndapibus.
                                                            </p> --}}
                                                        </td>
                                                        <td class="product-des product-name">
                                                            <h5 class="product-name"> {{ $item->fecha_inicio }} </h5>
                                                            {{-- <p class="font-xs">Maboriosam in a tonto nesciung eget<br> distingy
                                                                magndapibus.
                                                            </p> --}}
                                                        </td>
                                                        <td class="price" data-title="Precio Adulto"><span>
                                                                {{ $item->precio_adulto }} MXN</span></td>
                                                        <td class="price" data-title="Precio Menor"><span>
                                                                {{ $item->precio_menor }} MXN</span></td>
                                                        <td class="text-center" data-title="Stock">
                                                            <div class="detail-qty border radius  m-auto">
                                                                {{-- <a href="#" class="qty-down"><i
                                                                        class="bi bi-dash-lg"></i></a> --}}
                                                                <span class="qty-val">{{ $item->adultos }}</span>
                                                                {{-- <a href="#" class="qty-up"><i
                                                                        class="bi bi-plus"></i></a> --}}
                                                            </div>
                                                        </td>
                                                        <td class="text-center" data-title="Stock">
                                                            <div class="detail-qty border radius  m-auto">
                                                                {{-- <a href="#" class="qty-down"><i
                                                                        class="bi bi-dash-lg"></i></a> --}}
                                                                <span class="qty-val">{{ $item->menores }}</span>
                                                                {{-- <a href="#" class="qty-up"><i
                                                                        class="bi bi-plus"></i></a> --}}
                                                            </div>
                                                        </td>
                                                        <td class="text-right" data-title="Cart">
                                                            <span>
                                                                {{ $item->precio_menor * $item->menores + $item->precio_adulto * $item->adultos }}
                                                                MXN
                                                            </span>
                                                        </td>
                                                        <td class="action" data-title="Remove"><a class="text-muted"><i
                                                                    wire:click="eliminar({{ $item->id }})"
                                                                    class="bi bi-trash3-fill display-4"></i></a></td>
                                                    </tr>
                                                @endforeach
                                @endif



                                <tr>
                                    {{-- <td colspan="6" class="text-end">
                                        <a href="#" class=" btn btn-danger"> <i class="fi-rs-cross-small"></i>
                                            Clear Cart</a>
                                    </td> --}}
                                </tr>
                                </tbody>
                                </table>
                            </div>
                            {{-- HOTELES CART END --}}


                            {{-- CABANAS CART --}}
                            @if (count($cabanasCart) > 0)
                                <div class="container-fluid bg-dark text-white">
                                    <label for="tile" class="display-3">Cabañas</label>
                                </div>
                                <div class="table-responsive">
                                    <table class="table shopping-summery text-center clean">
                                        <thead>
                                            <tr class="main-heading">
                                                <th scope="col">Producto</th>
                                                <th scope="col">Nombre</th>
                                                <th scope="col">Fechas</th>
                                                <th scope="col">Personas</th>
                                                <th scope="col">Total</th>
                                                <th scope="col">Eliminar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($cabanasCart as $item)
                                                @if ($item->categoria == 'tours')
                                                @endif
                                                <tr>
                                                    <td class="img"><img class="img-thumbnail" style="width: 10em"
                                                            src='{{ asset("img/cabanas/habitaciones/$item->imagen") }}'
                                                            alt="#"></td>
                                                    <td class="product-des product-name">
                                                        <h5 class="product-name"><a
                                                                href="{{ route('cabanas.product', [$item->cabana_slug, $item->slug]) }}">
                                                                {{ $item->nombre }} </a></h5>
                                                        {{-- <p class="font-xs">Maboriosam in a tonto nesciung eget<br> distingy
                                                                magndapibus.
                                                            </p> --}}
                                                    </td>
                                                    <td class="product-des product-name">
                                                        <ul>
                                                            <li>
                                                                <h5 class="product-name"> {{ $item->fecha_inicio }}
                                                                </h5>
                                                            </li>
                                                            <li>
                                                                <h5 class="product-name"> {{ $item->fecha_fin }}</h5>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                    <td class="text-center" data-title="Stock">
                                                        <div class="detail-qty border radius  m-auto">
                                                            {{-- <a href="#" class="qty-down"><i
                                                                    class="bi bi-dash-lg"></i></a> --}}
                                                            <span class="qty-val">{{ $item->personas }}</span>
                                                            {{-- <a href="#" class="qty-up"><i
                                                                    class="bi bi-plus"></i></a> --}}
                                                        </div>
                                                    </td>

                                                    <td class="price" data-title="Precio Menor"><span>
                                                            {{ $total[] = $item->precio_total }} MXN</span></td>

                                                    {{-- <td class="text-center" data-title="Stock">
                                                            <div class="detail-qty border radius  m-auto">
                                                                <span class="qty-val">{{ $item->adultos }}</span>
                                                            </div>
                                                        </td>
                                                        <td class="text-center" data-title="Stock">
                                                            <div class="detail-qty border radius  m-auto">
                                                                <span class="qty-val">{{ $item->menores }}</span>
                                                            </div>
                                                        </td>
                                                        
                                                        <td class="text-right" data-title="Cart">
                                                            <span>
                                                                {{ $item->precio_menor * $item->menores + $item->precio_adulto * $item->adultos }}
                                                                MXN
                                                            </span>
                                                        </td> --}}
                                                    <td class="action" data-title="Remove"><a class="text-muted"><i
                                                                wire:click="eliminar({{ $item->id }})"
                                                                class="bi bi-trash3-fill display-4 cursor-pointer"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                            @endif



                            <tr>
                            </tr>
                            </tbody>
                            </table>
                        </div>
                        {{-- CABANAS CART END --}}

                        {{-- PAQUETES CART --}}
                        @if (count($paquetesCart) > 0)
                            <div class="container-fluid bg-dark text-white">
                                <label for="tile" class="display-3">paquetes</label>
                            </div>
                            <div class="table-responsive">
                                <table class="table shopping-summery text-center clean">
                                    <thead>
                                        <tr class="main-heading">
                                            <th scope="col">Producto</th>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Fecha</th>
                                            <th scope="col">Personas</th>
                                            <th scope="col">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($paquetesCart as $item)
                                            @if ($item->categoria == 'tours')
                                            @endif
                                            <tr>
                                                <td class="img"><img class="img-thumbnail" style="width: 10em"
                                                        src='{{ asset("img/paquetes/$item->imagen") }}'
                                                        alt="#"></td>

                                                <td class="product-des product-name">
                                                    <h5 class="product-name"><a
                                                            href="{{ route('paquetes.show', $item->slug) }}">
                                                            {{ $item->nombre }} </a></h5>
                                                    {{-- <p class="font-xs">Maboriosam in a tonto nesciung eget<br> distingy
                                                        magndapibus.
                                                    </p> --}}
                                                </td>

                                                <td class="product-des product-name">
                                                    <h5 class="product-name"> {{ $item->fecha_inicio }} </h5>
                                                </td>

                                                <td class="price" data-title="Precio Menor"><span>
                                                        {{ $item->personas }} </span></td>

                                                <td class="price" data-title="Precio Menor"><span>
                                                        {{ $total[] = $item->precio_total }} MXN</span></td>

                                                {{-- <td class="text-center" data-title="Stock">
                                                    <div class="detail-qty border radius  m-auto">
                                                        <span class="qty-val">{{ $item->adultos }}</span>
                                                    </div>
                                                </td>
                                                <td class="text-center" data-title="Stock">
                                                    <div class="detail-qty border radius  m-auto">
                                                        <span class="qty-val">{{ $item->menores }}</span>
                                                    </div>
                                                </td>
                                                
                                                <td class="text-right" data-title="Cart">
                                                    <span>
                                                        {{ $item->precio_menor * $item->menores + $item->precio_adulto * $item->adultos }}
                                                        MXN
                                                    </span>
                                                </td> --}}
                                                <td class="action" data-title="Remove"><a class="text-muted"><i
                                                            wire:click="eliminar({{ $item->cart_id }})"
                                                            class="bi bi-trash3-fill display-4 cursor-pointer"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                        @endif



                        <tr>
                        </tr>
                        </tbody>
                        </table>
                    </div>
                    {{-- PAQUETES CART END --}}

                    {{-- ATRACCIONES CART --}}
                    @if (count($atraccionesCart) > 0)
                        <div class="container-fluid bg-dark text-white">
                            <label for="tile" class="display-3">atracciones</label>
                        </div>
                        <div class="table-responsive">
                            <table class="table shopping-summery text-center clean">
                                <thead>
                                    <tr class="main-heading">
                                        <th scope="col">Producto</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Fecha</th>
                                        <th scope="col">Personas</th>
                                        <th scope="col">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($atraccionesCart as $item)
                                        @if ($item->categoria == 'tours')
                                        @endif
                                        <tr>
                                            <td class="img"><img class="img-thumbnail" style="width: 10em"
                                                    src='{{ asset("img/atracciones/$item->imagen") }}'
                                                    alt="#"></td>

                                            <td class="product-des product-name">
                                                <h5 class="product-name"><a
                                                        href="{{ route('atracciones.show', $item->slug) }}">
                                                        {{ $item->nombre }} </a></h5>
                                                {{-- <p class="font-xs">Maboriosam in a tonto nesciung eget<br> distingy
                                                magndapibus.
                                            </p> --}}
                                            </td>

                                            <td class="product-des product-name">
                                                <h5 class="product-name"> {{ $item->fecha_inicio }} </h5>
                                            </td>

                                            <td class="price" data-title="Precio Menor"><span>
                                                    {{ $item->personas }} </span></td>

                                            <td class="price" data-title="Precio Menor"><span>
                                                    {{ $total[] = $item->precio_total }} MXN</span></td>

                                            {{-- <td class="text-center" data-title="Stock">
                                            <div class="detail-qty border radius  m-auto">
                                                <span class="qty-val">{{ $item->adultos }}</span>
                                            </div>
                                        </td>
                                        <td class="text-center" data-title="Stock">
                                            <div class="detail-qty border radius  m-auto">
                                                <span class="qty-val">{{ $item->menores }}</span>
                                            </div>
                                        </td>
                                        
                                        <td class="text-right" data-title="Cart">
                                            <span>
                                                {{ $item->precio_menor * $item->menores + $item->precio_adulto * $item->adultos }}
                                                MXN
                                            </span>
                                        </td> --}}
                                            <td class="action" data-title="Remove"><a class="text-muted"><i
                                                        wire:click="eliminar({{ $item->cart_id }})"
                                                        class="bi bi-trash3-fill display-4 cursor-pointer"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                    @endif



                    <tr>
                    </tr>
                    </tbody>
                    </table>
        </div>
        {{-- ATRACCIONES CART END --}}

        {{-- servicios CART --}}
        @if (count($serviciosCart) > 0)
            <div class="container-fluid bg-dark text-white">
                <label for="tile" class="display-3">servicios</label>
            </div>
            <div class="table-responsive">
                <table class="table shopping-summery text-center clean">
                    <thead>
                        <tr class="main-heading">
                            <th scope="col">Producto</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Personas</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($serviciosCart as $item)
                            @if ($item->categoria == 'tours')
                            @endif
                            <tr>
                                <td class="img"><img class="img-thumbnail" style="width: 10em"
                                        src='{{ asset("img/servicios/$item->imagen") }}' alt="#"></td>

                                <td class="product-des product-name">
                                    <h5 class="product-name"><a href="{{ route('servicios.show', $item->slug) }}">
                                            {{ $item->nombre }} </a></h5>
                                    {{-- <p class="font-xs">Maboriosam in a tonto nesciung eget<br> distingy
                                 magndapibus.
                             </p> --}}
                                </td>

                                <td class="product-des product-name">
                                    <h5 class="product-name"> {{ $item->fecha_inicio }} </h5>
                                </td>

                                <td class="price" data-title="Precio Menor"><span>
                                        {{ $item->personas }} </span></td>

                                <td class="price" data-title="Precio Menor"><span>
                                        {{ $total[] = $item->precio_total }} MXN</span></td>

                                {{-- <td class="text-center" data-title="Stock">
                             <div class="detail-qty border radius  m-auto">
                                 <span class="qty-val">{{ $item->adultos }}</span>
                             </div>
                         </td>
                         <td class="text-center" data-title="Stock">
                             <div class="detail-qty border radius  m-auto">
                                 <span class="qty-val">{{ $item->menores }}</span>
                             </div>
                         </td>
                         
                         <td class="text-right" data-title="Cart">
                             <span>
                                 {{ $item->precio_menor * $item->menores + $item->precio_adulto * $item->adultos }}
                                 MXN
                             </span>
                         </td> --}}
                                <td class="action" data-title="Remove"><a class="text-muted"><i
                                            wire:click="eliminar({{ $item->cart_id }})"
                                            class="bi bi-trash3-fill display-4 cursor-pointer"></i></a>
                                </td>
                            </tr>
                        @endforeach
        @endif



        <tr>
        </tr>
        </tbody>
        </table>
    </div>
    {{-- servicios CART END --}}

    @if (array_sum($total) > 0)
        <div class="d-flex justify-content-end">
            <div class="d-flex bg-dark p-1 m-3 text-white"> TOTAL : {{ array_sum($total) }} MXN</div>
        </div>


        <div class="cart-action text-end">
            {{-- <button id="hacer_pago" class="btn btn-success"></i>Reservar ahora<i
                                class="bi bi-bag-check-fill mx-2"></i></button> --}}
            <div class="container">
                <div class="container">
                    <label for="tipo_pago">Pagar de contado</label>
                    <input type="radio" name="tipo_pago" value="contado" id="pagoContado">
                </div>
                <div class="container">
                    <label for="tipo_pago">Reservar con 20%</label>
                    <input type="radio" name="tipo_pago" value="20%" id="pago20">
                </div>

            </div>
        </div>
        @php
            $carrito_total = array_sum($total);
        @endphp
        <div id='paypal_container' style="display: none">
            <div>
                <!-- Replace "test" with your own sandbox Business account app client ID -->
                <script src="https://www.paypal.com/sdk/js?client-id={{ env('PAYPAL_SANDBOX_CLIENT_ID') }}&currency=MXN"></script>
                <!-- Set up a container element for the button -->
                <div class="container-fluid text-center p-5">
                    <h1 class="p-5">¡Realiza tu pago!</h1>
                    <div id="paypal-button-container"></div>
                </div>
            </div>
            <script>
                let paypalButtonsContainer = container = document.querySelector('#paypal-button-container');
                let total_pago, tipoPago, datos;
                document.querySelector('#pagoContado').addEventListener('click', crearOrden, false);
                document.querySelector('#pago20').addEventListener('click', crearOrden, false);


                function crearOrden(e) {
                    tipoPago = document.querySelector('input[name="tipo_pago"]:checked').value;
                    if (tipoPago == 'contado') {
                        total_pago = {{ $carrito_total }}

                    } else {
                        total_pago = {{ $carrito_total * 0.2 }}
                    }
                    paypalButtonsContainer.classList.add('active');
                    if (paypalButtonsContainer.getAttribute('class') == 'active') {
                        paypalButtonsContainer.innerHTML = "";
                    }
                    document.getElementById('paypal_container').style.display = 'grid';
                    paypal.Buttons({
                        style: {
                            layout: 'vertical',
                            color: 'blue',
                            shape: 'pill',
                            label: 'pay'
                        },

                        createOrder() {
                            return fetch("/create-paypal-order", {
                                    method: "POST",
                                    headers: {
                                        'X-CSRF-TOKEN': "{{ csrf_token() }}",
                                        "Content-Type": "application/json",
                                    },
                                    // use the "body" param to optionally pass additional order information
                                    // like product skus and quantities
                                    body: JSON.stringify({
                                        tipo_pago: tipoPago
                                    })

                                })
                                .then((response) => response.json())
                                .then((order) => order.id)
                                .catch((err) => {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'HUBO UN ERROR AL INTENTAR REALIZAR EL PAGO',
                                        showConfirmButton: false,
                                        timer: 1500
                                    })
                                });
                        },

                        // Finalize the transaction on the server after payer approval
                        onApprove(data) {
                            return fetch("/process-paypal-order", {
                                    method: "POST",
                                    headers: {
                                        'X-CSRF-TOKEN': "{{ csrf_token() }}",
                                        "Content-Type": "application/json",
                                    },
                                    body: JSON.stringify({
                                        data: data,
                                        orderID: data.orderID,
                                        tipo_pago: tipoPago
                                    })
                                })
                                .then((response) => response.json())
                                .then((orderData) => {
                                    // Successful capture! For dev/demo purposes:
                                    // console.log('Capture result', orderData, JSON.stringify(orderData, null,
                                    //     2));
                                    // const transaction = orderData.purchase_units[0].payments.captures[0];

                                    let orden_id = orderData.id;
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'PAGO REALIZADO\nSe ha enviado un email con los detalles a su correo',
                                        showConfirmButton: false,
                                    })
                                    setTimeout(function() {
                                        // console.log(response);
                                        window.location.href = "/compra/" + orden_id;
                                    }, 2500);
                                    // When ready to go live, remove the alert and show a success message within this page. For example:
                                    // const element = document.getElementById('paypal-button-container');
                                    // element.innerHTML = '<h3>Thank you for your payment!</h3>';
                                    // Or go to another URL:  window.location.href = 'thank_you.html';
                                }).catch(e => {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'HUBO UN ERROR AL REALIZAR EL PAGO',
                                        showConfirmButton: false,
                                        timer: 1500
                                    })
                                });
                        },

                        //If the transaction is canceled
                        onCancel(data) {
                            alert("PAGO CANCELADO");
                            console.log(data);
                        },


                    }).render('#paypal-button-container');
                }
            </script>
        </div>
    @else
        <div class="container text-center">
            <h1>No hay nada para pagar</h1>
        </div>
    @endif


    </div>
    </div>
    </div>
    </section>
    <div class="container d-flex justify-content-end mt-5 p-3">
        @if (!request()->routeIs('cart.show'))
            <a href="{{ route('cart.show') }}" type="button" class="btn btn-primary">Ver Carrito</a>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        @endif
    </div>
    </main>
    </div>

    <x-slot name='scripts'>

    </x-slot>
    </div>
