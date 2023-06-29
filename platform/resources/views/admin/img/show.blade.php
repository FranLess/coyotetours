<x-coyote>
    <x-admin.form action="{{route('admin.store.images')}}">
        <x-admin.select name='id_tour'>
            <x-slot name='title'>Id Tour</x-slot>
            @foreach ($tours as $tour)
                <option value="{{ $tour->id }}">{{ $tour->nombre_es }}</option>
            @endforeach
        </x-admin.select>
        <x-admin.input name='nombre'>
            <x-slot name='title'>Nombre</x-slot>
        </x-admin.input>
        <x-admin.input-img name='img' img_id='img' id='img'>
            <x-slot name='title'>Imagen</x-slot>
        </x-admin.input-img>
    </x-admin.form>
    @livewire('admin.images-table')
    <x-slot name='scripts'>
        <script src="{{asset('js/imgShow.js')}}"></script>
        <script src="{{asset('js/forms/form.js')}}"></script>
    </x-slot>
</x-coyote>
