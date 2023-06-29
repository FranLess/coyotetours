<x-coyote>
    @livewire('admin.paquetes.form-paquetes')
    @livewire('admin.paquetes.table-paquetes')

    <x-slot name='scripts'>
        <script src="{{asset('js/imgShow.js')}}"></script>
    </x-slot>
</x-coyote>