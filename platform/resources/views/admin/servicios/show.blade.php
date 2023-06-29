<x-coyote>
    @livewire('admin.servicios.form-servicios')
    @livewire('admin.servicios.table-servicios')

    <x-slot name='scripts'>
        <script src="{{asset('js/imgShow.js')}}"></script>
    </x-slot>
</x-coyote>