<x-coyote>
    <link rel="stylesheet" href="{{ asset('vendor/galeria/lightbox.css') }}">

    <x-header />

    @livewire('product', ['tour' => $tour , 'images' => $images], key($tour->id))


    {{-- {{$tour}} --}}

    

    {{-- <iframe src="{{ asset("pdf/$tour->pdf") }}" width="100%" height="1000"></iframe> --}}

    <object data="{{ asset("pdf/$tour->pdf") }}" type="application/pdf" width="100%" height="1000">
        <p>Si estas en movil ve el pdf aquí <a href="{{ asset("pdf/$tour->pdf") }}">{{ $tour->nombre_es }}!</a></p>
      </object>

    <x-slot name='scripts'>
        <script src="{{ asset('vendor/galeria/lightbox-plus-jquery.js') }}"></script>
    </x-slot>

</x-coyote>
