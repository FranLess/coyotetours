<x-coyote>
    <div class="container p-5">
        @if (count($ventas)>0)
        @foreach ($ventas as $venta)
        <div class="container bg-success p-2 text-dark bg-opacity-25 m-3">
            <b>Compra id: {{ $venta->venta_id }}| Fecha {{$venta->created_at }} </b>
            <a class="btn btn-primary float-end" href="{{ route('compra.ticket' , $venta) }}">Ver compra</a><br>
        </div>
        @endforeach
        @else
        <div class="container p-5 text-center">
            <h1>No Hay Compras</h1>
        </div>
        @endif
    </div>
</x-coyote>
