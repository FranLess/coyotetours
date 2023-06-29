<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-5.3.0-alpha1-dist/css/bootstrap.css') }}">
    <title>Detalles de Compra</title>
</head>
<body>
    <div class="container">
        <h1>{{ $venta->usuario_email }}</h1>
        <p>
            <span>
                ID: {{ $venta->venta_id }}
            </span>

            <span>
                Total Pagado: {{ $venta->pagado }}
            </span>

            <span>
                PRODUCTOS:
            </span>
            
            {{-- <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Producto</th>
                            <th scope="col">Fechas</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="">
                            <td scope="row">R1C1</td>
                            <td>R1C2</td>
                            <td>R1C3</td>
                        </tr>
                        <tr class="">
                            <td scope="row">Item</td>
                            <td>Item</td>
                            <td>Item</td>
                        </tr>
                    </tbody>
                </table>
            </div> --}}
            
        </p>
    </div>
</body>
</html>