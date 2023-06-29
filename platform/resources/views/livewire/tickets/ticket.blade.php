<div>
    <style>
        @page {
            margin-left: 0;
            margin-right: 0;
        }

        #title {
            position: relative;
            display: inline;
            font-size: 20px;
        }

        #logo {
            position: relative;
            display: inline;
            margin-left: 80%
        }

        table {
            padding: 0;
            margin: 0;
            border-collapse: collapse;
            border: none;
        }

        td,
        th {
            padding: 0;
            margin: 0;
            border: black 1px solid;
        }

        hr {
            background: #000;
            background: #000;
            margin: 1px;
        }
    </style>

    <div class="container p-5" style="font-family: Arial, Helvetica, sans-serif">
        <img id="logo" src="{{ asset('img/coyoteLogo.png') }}" height="35" width="35">
        <p id="title">Recibo</p>
        <hr>
        <p>Usuario: {{ $venta->usuario_email }}</p>
        <hr>
        <p>ID de Compra: {{ $venta->venta_id }}</p>
        <hr>
        <p>Productos</p>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Producto</th>
                        <th scope="col">Pagado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (json_decode($venta->detalles_compra) as $item)
                        @if ($item->categoria == 'tours')
                            <tr class="">
                                <td scope="row">{{ $item->nombre_prod }}| Pax:{{ $item->adultos }}| Menores:
                                    {{ $item->menores }}|Fecha: {{ $item->fecha_inicio }}</td>
                                <td>{{ $item->precio_total }} MXN</td>
                            </tr>
                        @endif
                        @if ($item->categoria == 'cabana')
                            <tr class="">
                                <td scope="row">{{ $item->nombre_prod }}|Personas: {{ $item->personas }}|Noches:
                                    {{ $item->noches }}|Fechas {{ $item->fecha_inicio . '-' . $item->fecha_fin }}</td>
                                <td>{{ $item->precio_total }} MXN</td>
                            </tr>
                        @endif
                        @if ($item->categoria == 'restaurante')
                            <tr class="">
                                <td scope="row">{{ $item->nombre_prod }}|Personas: {{ $item->personas }}|Fecha
                                    {{ $item->fecha_inicio }}</td>
                                <td>{{ $item->precio_total }} MXN</td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
            <div class="container" style="text-align: center;">
                <hr>
                <p>Tipo de pago: {{ $venta->tipo_pago }}</p>
                <p>Total pagado: {{ $venta->pagado }} MXN</p>
                <p>Pago pendiente: {{ $venta->pago_pendiente }} MXN</p>
                <hr>
                <p>Fecha: {{ $venta->created_at }}</p>
                <hr>
                <p>Contacto: +52 618 168 9923 | ventas@coyotetoursvip.com</p>
            </div>

        </div>
    </div>
</div>
