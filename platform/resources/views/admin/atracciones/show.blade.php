<x-coyote>
    @livewire('admin.atracciones.form-atracciones')
    @livewire('admin.atracciones.table-atracciones')

    <x-slot name='scripts'>
        <script src="{{asset('js/imgShow.js')}}"></script>
    </x-slot>
</x-coyote>