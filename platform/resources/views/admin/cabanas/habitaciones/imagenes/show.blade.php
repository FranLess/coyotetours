<x-coyote class="bg-dark">
    <x-admin.form action="{{ route('admin.store.cabanas.habitaciones.imagenes') }}">
        <x-admin.input name='id' type='number'>
            <x-slot name='title'>Id</x-slot>
        </x-admin.input>
        <x-admin.select name='habitacion_id'>
            <x-slot name='title'>Habitacion Id</x-slot>
            @foreach ($habitaciones as $habitacion)
                <option value="{{ $habitacion->id }}">{{ $habitacion->nombre }}</option>
            @endforeach
        </x-admin.select>
        <x-admin.input name='nombre'>
            <x-slot name='title'>Nombre</x-slot>
        </x-admin.input>
        <x-admin.input-img img_id='imagen' name='imagen' id="imagen_habitacion">
            <x-slot name='title'>Imagen</x-slot>
        </x-admin.input-img>
    </x-admin.form>
    @livewire('admin.cabanas.table-cabanas-habitaciones-imagenes')

    <x-slot name='scripts'>
        <script src="{{asset('js/imgShow.js')}}"></script>
        
        <script src="{{ asset('js/forms/form.js') }}"></script>
    </x-slot>
</x-coyote>
