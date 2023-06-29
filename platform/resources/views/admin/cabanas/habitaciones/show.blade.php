<x-coyote class="bg-dark">
    <x-admin.form action="{{ route('admin.store.cabanas.habitaciones') }}">
        <x-admin.input name='id' type='number'>
            <x-slot name='title'>Id</x-slot>
        </x-admin.input>
        <x-admin.select name='cabana_id'>
            <x-slot name='title'>Id Cabana</x-slot>
            @foreach ($cabanas as $cabana)
                <option value="{{ $cabana->id }}">{{ $cabana->nombre }}</option>
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
        <div class="row mb-3 mt-3">
            <h3 class="col-lg-3 text-white">Especificaciones</h3>
            <textarea class='col form-control d-inline' type='text' id="especificaciones" name='especificaciones' rows='8' maxlength="1000" >{{old('especificaciones')}}</textarea>
            <div class="d-flex flex-row-reverse"><i id="count"></i></div>
        </div>
        @error('especificaciones')
            <div class="alert alert-danger m-0 p-0" role="alert">
                <li> {{ $message }} </li>
            </div>
        @enderror
        <x-admin.input name='precio_noche_base' type='number'>
            <x-slot name='title'>Precio Base</x-slot>
        </x-admin.input>
        <x-admin.input name='minimo_noches' type='number'>
            <x-slot name='title'>Minimo Noches</x-slot>
        </x-admin.input>
        <x-admin.input name='minimo_personas' type='number'>
            <x-slot name='title'>Minimo Personas</x-slot>
        </x-admin.input>
        <x-admin.input name='maximo_personas' type='number'>
            <x-slot name='title'>Maximo Personas</x-slot>
        </x-admin.input>
        <x-admin.input name='precio_persona' type='number'>
            <x-slot name='title'>Precio Persona</x-slot>
        </x-admin.input>
        <x-admin.input-img img_id='imagen' name='imagen' id="imagen_habitacion">
            <x-slot name='title'>Imagen</x-slot>
        </x-admin.input-img>
    </x-admin.form>
    @livewire('admin.cabanas.table-cabanas-habitaciones')

    <x-slot name='scripts'>
        <script src="{{ asset('js/imgShow.js') }}"></script>

        <script src="{{ asset('js/addEspecificaciones.js') }}"></script>

        <script>
            $(document).ready((e) => {
                $('#addEspecificacion').click(function(e) {

                    let inputEspecificacion = `<div class="row mb-3 mt-3">
                    <h4 class="col-lg-3 text-white"></h4>
                    <textarea class='col form-control d-inline' type='text' name='especificaciones[]' rows='1'></textarea>
                    </div>`;

                    $('#divEspecificaciones').append(inputEspecificacion);
                });
            });
        </script>
    </x-slot>

</x-coyote>
