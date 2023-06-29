<x-coyote>
    <x-admin.form action="{{route('admin.store.youtube_videos')}}">
        <x-admin.input name='nombre'>
            <x-slot name='title'>Nombre</x-slot>
        </x-admin.input>
        <x-admin.input name='link'>
            <x-slot name='title'>Link</x-slot>
        </x-admin.input>
        <x-admin.input name='clave'>
            <x-slot name='title'>Clave</x-slot>
        </x-admin.input>
    </x-admin.form>

    @livewire('admin.videos-youtube')
</x-coyote>