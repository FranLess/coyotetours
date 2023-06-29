<x-coyote class="bg-dark">
    <x-admin.form action="{{ route('admin.store.hoteles') }}">
        <x-admin.input name='id' type='number'>
            <x-slot name='title'>Id</x-slot>
        </x-admin.input>
        <x-admin.input name='nombre'>
            <x-slot name='title'>Nombre</x-slot>
        </x-admin.input>
        <x-admin.input name='email'>
            <x-slot name='title'>Email</x-slot>
        </x-admin.input>
        <x-admin.input name='telefono' type='number'>
            <x-slot name='title'>Telefono</x-slot>
        </x-admin.input>
        <x-admin.input name='link_pagina'>
            <x-slot name='title'>Link Pagina</x-slot>
        </x-admin.input>
        <x-admin.input-img img_id='imagen' name='imagen' id="imagen_hotel">
            <x-slot name='title'>Imagen</x-slot>
        </x-admin.input-img>
    </x-admin.form>
    @livewire('admin.hoteles.hoteles-table')

    <x-slot name='scripts'>
        <script src="{{asset('js/imgShow.js')}}"></script>
        
   
    </x-slot>
</x-coyote>
