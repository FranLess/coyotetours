<x-coyote class="bg-dark">
    <x-admin.form action="{{ route('admin.store.restaurantes') }}">
        <x-admin.input name='nombre'>
            <x-slot name='title'>Nombre</x-slot>
        </x-admin.input>
        <x-admin.input name='precio'>
            <x-slot name='title'>Precio</x-slot>
        </x-admin.input>
        <x-admin.input-img img_id='imagen' name='imagen' id="imagen_hotel">
            <x-slot name='title'>Imagen</x-slot>
        </x-admin.input-img>
    </x-admin.form>
@livewire('admin.atracciones.restaurantes.table-restaurantes')
    <x-slot name='scripts'>
        <script src="{{asset('js/imgShow.js')}}"></script>
        
   
    </x-slot>
</x-coyote>
