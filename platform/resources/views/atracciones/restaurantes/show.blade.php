<x-coyote>


    <x-slot name='links'>
        <link rel="stylesheet" href="{{ asset('vendor/galeria/lightbox.css') }}">
    </x-slot>


    @livewire('atracciones.restaurantes.show', ['restaurante' => $restaurante])


    <x-slot name='scripts'>
        <script src="{{ asset('vendor/galeria/lightbox-plus-jquery.js') }}"></script>
    </x-slot>

    
</x-coyote>