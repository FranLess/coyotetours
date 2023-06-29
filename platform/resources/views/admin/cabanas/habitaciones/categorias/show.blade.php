<x-coyote class="bg-dark">
    <x-admin.form action="{{ route('admin.store.cabanas.habitaciones.categorias') }}">
        <x-admin.input name='id' type='number'>
            <x-slot name='title'>Id</x-slot>
        </x-admin.input>
        <x-admin.select name='cabana_id'>
            <x-slot name='title'>Id Hotel</x-slot>
            @foreach ($cabanas as $cabana)
                <option value="{{ $cabana   ->id }}">{{ $cabana    ->nombre }}</option>
            @endforeach
        </x-admin.select>
        <x-admin.input name='nombre'>
            <x-slot name='title'>Nombre</x-slot>
        </x-admin.input>
    </x-admin.form>
    @livewire('admin.cabanas.table-cabanas-habitaciones-categorias')

    <x-slot name='scripts'>
        <script src="{{ asset('js/imgShow.js') }}"></script>
    </x-slot>

</x-coyote>
