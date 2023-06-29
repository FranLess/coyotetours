<x-coyote class="bg-dark">
    <x-admin.form action="{{ route('admin.store.hoteles.habitaciones') }}">
        <x-admin.input name='id' type='number'>
            <x-slot name='title'>Id</x-slot>
        </x-admin.input>
        <x-admin.select name='hotel_id'>
            <x-slot name='title'>Id Hotel</x-slot>
            @foreach ($hoteles as $hotel)
                <option value="{{ $hotel->id }}">{{ $hotel->nombre }}</option>
            @endforeach
        </x-admin.select>
        <x-admin.select name='categoria_id'>
            <x-slot name='title'>Id Categoria</x-slot>
            @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
            @endforeach
        </x-admin.select>

        <x-admin.input name='nombre'>
            <x-slot name='title'>Nombre</x-slot>
        </x-admin.input>

        <x-admin.input name='minimo_personas' type='number'>
            <x-slot name='title'>Minimo Personas</x-slot>
        </x-admin.input>

        <x-admin.input name='maximo_personas' type='number'>
            <x-slot name='title'>Maximo Personas</x-slot>
        </x-admin.input>

        <x-admin.input name='minimo_noches' type='number'>
            <x-slot name='title'>Minimo Noches</x-slot>
        </x-admin.input>

        <div class="row mb-3 mt-3">
            <h3 class="col-lg-3 text-white">Especificaciones</h3>
            <textarea class='col form-control d-inline' type='text' id="especificaciones" name='especificaciones' rows='8' maxlength="500" >{{old('especificaciones')}}</textarea>
            <div class="d-flex flex-row-reverse"><i id="count"></i></div>
        </div>
        @error('especificaciones')
            <div class="alert alert-danger m-0 p-0" role="alert">
                <li> {{ $message }} </li>
            </div>
        @enderror
        <div class="row mb-3 mt-3" id="divEspecificaciones">
        </div>


        <x-admin.input name='precio_noche' type='number'>
            <x-slot name='title'>Precio/Noche</x-slot>
        </x-admin.input>
        <x-admin.input-img img_id='imagen' name='imagen' id="imagen_hotel">
            <x-slot name='title'>Imagen</x-slot>
        </x-admin.input-img>
    </x-admin.form>
    @livewire('admin.hoteles.table-hoteles-habitaciones')

    <x-slot name='scripts'>
        <script src="{{ asset('js/imgShow.js') }}"></script>
        <script src="{{ asset('js/addEspecificaciones.js') }}"></script>
    </x-slot>

</x-coyote>
