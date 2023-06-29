<x-coyote>


    <x-slot name='links'>
        <link rel="stylesheet" href="{{ asset('vendor/galeria/lightbox.css') }}">
    </x-slot>


    <div>
        {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
        <!-- Product Detail Start -->
        <div class="product-detail bg-white p-5">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-9">
                        <div class="row align-items-center product-detail-top">
                            <div class="col-md-6">
                                <div class="container-fluid text-center align-items-center justify-content-center display-4">
                                    <div class="container-fluid p-0">
                                        <!-- Example Code -->

                                        <div id="carouselExampleFade" class="carousel slide carousel">
                                            <div class="carousel-inner">
                                                @foreach ($images as $image)
                                                    <div class="carousel-item @if ($loop->first) active @endif}"
                                                        style="height: 5em; background:#000;">
                                                        <div
                                                            class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                                            <div class="gallery-container">
                                                                <div class="gallery">
                                                                    <a href='{{ asset("img/hoteles/habitaciones/$image->imagen") }}'
                                                                        data-lightbox="models">
                                                                        <img class="img-fluid" style="height: 100%;"
                                                                            src='{{ asset("img/hoteles/habitaciones/$image->imagen") }}'>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach

                                            </div>
                                            <button class="carousel-control-prev" type="button"
                                                data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button"
                                                data-bs-target="#carouselExampleFade" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </button>
                                        </div>

                                        <!-- End Example Code -->
                                    </div>
                                    <!-- Lightbox -->
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="product-content">
                                    <div class="title">
                                        <h2> {{ $product->nombre }} </h2>

                                    </div>
                                    <input type="hidden" value=" {{ $product->precio_noche }} " name="priceAdulto">



                                    <form action="{{ route('cart.store') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="quantity">
                                            <h4>Fecha de Inicio:</h4>
                                            <div class="qty">
                                                <input type="date" wire:model="fecha_inicio" name="fecha_inicio"
                                                    id="fecha_inicio">
                                                @error('fecha_inicio')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="quantity">
                                            <h4>Fecha Final:</h4>
                                            <div class="qty">
                                                <input type="date" wire:model="fecha_final" name="fecha_final"
                                                    id="fecha_final">
                                                @error('fecha_final')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="quantity">
                                            <h4>Noches:</h4>
                                            <div class="qty">
                                                <input type="number" name="noches" id="noches">
                                                @error('noches')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="quantity">
                                            <h4>Personas:</h4>
                                            <div class="qty">
                                                <input type="number" name="personas" id="personas">
                                                @error('personas')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                        <br>
                                        <input type="hidden" name="id" value="{{$product->id}}">
                                        <input type="hidden" name="categoria" value="hotel">
                                        <input type='submit' class="btn btn-primary btn-block"
                                            style="height: 47px; margin-top: -2px;" value="{{ __('messages.reserve') }}">
                                        </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 p-3">
                    <ul class="list-group">
                        <li class="list-group-item list-group-item-success">Precios</li>
                    @for ($i = $product->minimo_personas; $i <= $product->maximo_personas ; $i++)
                        <li class="list-group-item">
                        {{$i}} personas : {{$product->precio_noche_base+$product->precio_persona*($i-$product->minimo_personas)}} MXN
                    </li>
                    @endfor
                </ul>
            </div>
            <div class="col-md-6 p-3">
                <ul class="list-group">
                    @php
                        $a=1;
                    @endphp
                        @foreach (json_decode($product->especificaciones) as $especificacion)
                            @if (empty($especificacion))
                                </ul>
                                @php
                                    $a=1;
                                @endphp
                                </div>
                                <div class="col-md-6 p-3">
                                <ul class="list-group">
                            @else
                                <li class="list-group-item @if ($a==1)
                                list-group-item-dark
                                @endif">{{ $especificacion }}</li>
                            @php
                                $a=0;
                            @endphp
                            @endif

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- Product Detail End -->

    </div>



    <x-slot name='scripts'>
        <script src="{{ asset('js/compareDates.js') }}"></script>
        <script src="{{ asset('vendor/galeria/lightbox-plus-jquery.js') }}"></script>
    </x-slot>


</x-coyote>
