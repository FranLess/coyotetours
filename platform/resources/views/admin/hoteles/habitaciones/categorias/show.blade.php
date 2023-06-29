<x-coyote class="bg-dark">
    <x-admin.form action="{{ route('admin.store.hoteles.habitaciones.categorias') }}">
        <x-admin.input name='id' type='number'>
            <x-slot name='title'>Id</x-slot>
        </x-admin.input>
        <x-admin.select name='hotel_id'>
            <x-slot name='title'>Id Hotel</x-slot>
            @foreach ($hoteles as $hotel)
                <option value="{{ $hotel->id }}">{{ $hotel->nombre }}</option>
            @endforeach
        </x-admin.select>
        <x-admin.input name='nombre'>
            <x-slot name='title'>Nombre</x-slot>
        </x-admin.input>
    </x-admin.form>
    @livewire('admin.hoteles.table-hoteles-habitaciones-categorias')

    <x-slot name='scripts'>
        <script src="{{ asset('js/imgShow.js') }}"></script>
    </x-slot>

</x-coyote>
