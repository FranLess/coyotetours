<x-coyote>
    {{-- <div class="container p-3">
        Ir al Editor de tours
        <a href='{{ route('admin.show.tours') }}'><button type="button"
                class="btn btn-outline-primary">-></button></a>
    </div> --}}
    <div class="container-fluid p-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">



            <div class="container-fluid text-center">

                <div class="container text-center">
                    <h1>Tours</h1>
                </div>

                <div class="d-grid gap-2 m-1">
                    <a href='{{ route('admin.show.tours') }}' class="btn btn-outline-primary">
                        <h3>Editor de Tours</h3>
                    </a>
                </div>
                <div class="d-grid gap-2 m-1">
                    <a href='{{ route('admin.show.images') }}' class="btn btn-outline-primary">
                        <h3>Editor de Imagenes de Tours</h3>
                    </a>
                </div>
                <div class="d-grid gap-2 m-1">
                    <a href='{{ route('admin.show.youtube_videos') }}' class="btn btn-outline-primary">
                        <h3>Editor de Videos de Youtube</h3>
                    </a>
                </div>
            </div>


            <hr>


            <div class="container-fluid text-center">
                <div class="container text-center">
                    <h1>Cabanas</h1>
                </div>
                <div class="d-grid gap-2 m-1">
                    <a href='{{ route('admin.show.cabanas') }}' class="btn btn-outline-secondary">
                        <h3>Editor de Cabañas</h3>
                    </a>
                </div>
                <div class="d-grid gap-2 m-1">
                    <a href='{{ route('admin.show.cabanas.habitaciones.categorias') }}' class="btn btn-outline-secondary">
                        <h3>Editor de Categorias de Habitaciones de Cabanas</h3>
                    </a>
                </div>
                <div class="d-grid gap-2 m-1">
                    <a href='{{ route('admin.show.cabanas.habitaciones') }}' class="btn btn-outline-secondary">
                        <h3>Editor de Habitaciones de Cabanas</h3>
                    </a>
                </div>
                <div class="d-grid gap-2 m-1">
                    <a href='{{ route('admin.show.cabanas.habitaciones.imagenes') }}' class="btn btn-outline-secondary">
                        <h3>Editor de Imagenes de Cabanas</h3>
                    </a>
                </div>
            </div><hr>

            
            <hr>


            <div class="container-fluid text-center">
                <div class="container text-center">
                    <h1>Hoteles</h1>
                </div>
                <div class="d-grid gap-2 m-1">
                    <a href='{{ route('admin.show.hoteles') }}' class="btn btn-outline-primary">
                        <h3>Editor de Hoteles</h3>
                    </a>
                </div>
                <div class="d-grid gap-2 m-1">
                    <a href='{{ route('admin.show.hoteles.habitaciones.categorias') }}' class="btn btn-outline-primary">
                        <h3>Editor Categorias de Habitaciones de Hoteles</h3>
                    </a>
                </div>
                <div class="d-grid gap-2 m-1">
                    <a href='{{ route('admin.show.hoteles.habitaciones') }}' class="btn btn-outline-primary">
                        <h3>Editor Habitaciones de Hoteles</h3>
                    </a>
                </div>
                <div class="d-grid gap-2 m-1">
                    <a href='{{ route('admin.show.hoteles.habitaciones.imagenes') }}' class="btn btn-outline-primary">
                        <h3>Editor de Imagenes de Hoteles</h3>
                    </a>
                </div>
            </div>


            <div class="container-fluid text-center">
                <div class="container text-center">
                    <h1>Atracciones</h1>
                </div>
                <div class="d-grid gap-2 m-1">
                    <a href='{{ route('admin.show.atracciones') }}' class="btn btn-outline-primary">
                        <h3>Editor de Atracciones</h3>
                    </a>
                </div>
                <div class="d-grid gap-2 m-1">
                    <a href='{{ route('admin.show.servicios') }}' class="btn btn-outline-primary">
                        <h3>Editor de Servicios</h3>
                    </a>
                </div>
                <div class="d-grid gap-2 m-1">
                    <a href='{{ route('admin.show.paquetes') }}' class="btn btn-outline-primary">
                        <h3>Editor de Paquetes</h3>
                    </a>
                </div>
            </div>


        </div>
    </div>
</x-coyote>
