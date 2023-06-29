<x-coyote>

    @livewire('tickets.ticket' , ['venta' => $venta])
    <div class="container p-5">
        <a type="button" class="btn btn-primary btn-lg float-end" href="{{ route('venta.ticket' , $venta) }}" target="_blank">
            PDF
          </a>
    </div>
</x-coyote>
