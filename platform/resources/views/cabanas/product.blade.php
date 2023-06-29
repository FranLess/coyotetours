<x-coyote>


    <x-slot name='links'>
        <link rel="stylesheet" href="{{ asset('vendor/galeria/lightbox.css') }}">
    </x-slot>


    @livewire('cabanas.product', ['product' => $product, 'images' => $images])


    <x-slot name='scripts'>
        <script src="{{ asset('js/compareDates.js') }}"></script>
        <script src="{{ asset('vendor/galeria/lightbox-plus-jquery.js') }}"></script>
    </x-slot>

    
</x-coyote>
