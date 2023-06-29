<x-coyote class="bg-dark">
    <x-admin.form action="{{ route('admin.store.tours') }}">
        <x-admin.input name='id' type='number'>
            <x-slot name='title'>Id</x-slot>
        </x-admin.input>
        <x-admin.input name='nombre_es'>
            <x-slot name='title'>Nombre Español</x-slot>
        </x-admin.input>
        <x-admin.input name='nombre_en'>
            <x-slot name='title'>Nombre Inglés</x-slot>
        </x-admin.input>
        <x-admin.input name='precio_adulto' type='number'>
            <x-slot name='title'>Precio Adulto</x-slot>
        </x-admin.input>
        <x-admin.input name='precio_menor' type='number'>
            <x-slot name='title'>Precio Menor</x-slot>
        </x-admin.input>
        <x-admin.input-img img_id='portada' name='img_portada' id="img_portada">
            <x-slot name='title'>Imagen Portada</x-slot>
        </x-admin.input-img>
        <x-admin.input-img img_id='banner' name='img_banner' id="img_banner">
            <x-slot name='title'>Imagen Banner</x-slot>
        </x-admin.input-img>
        <x-admin.input name='pdf' type='file'>
            <x-slot name='title'>Pdf</x-slot>
        </x-admin.input>
    </x-admin.form>
    @livewire('admin.tours-table')

    <x-slot name='scripts'>
        <script src="{{asset('js/imgShow.js')}}"></script>
    </x-slot>
</x-coyote>
