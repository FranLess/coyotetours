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
                                            @foreach ($restaurante as $image)
                                                <div class="carousel-item @if ($loop->first) active @endif}"
                                                    style="height: 5em; background:#000;">
                                                    <div
                                                        class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                                        <div class="gallery-container">
                                                            <div class="gallery">
                                                                <a href='{{ asset("img/atracciones/restaurantes/$restaurante->imagen") }}'
                                                                    data-lightbox="models">
                                                                    <img class="img-fluid" style="height: 100%;"
                                                                        src='{{ asset("img/atracciones/restaurantes/$restaurante->imagen") }}'>
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
                                    <h2> {{ $restaurante->nombre }} </h2>
                                    
                                </div>
                                <input type="hidden" value=" {{ $restaurante->precio }} " name="priceAdulto">
                                

                                
                                <form action="{{ route('cart.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="quantity">
                                        <h4>Fecha:</h4>
                                        <div class="qty">
                                            <input type="date" name="fecha_inicio"
                                                id="fecha_inicio">
                                            @error('fecha_inicio')
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
                                    <input type="hidden" name="id" value="{{$restaurante->id}}">
                                    <input type="hidden" name="categoria" value="restaurante">
                                    <input type='submit' class="btn btn-primary btn-block"
                                        style="height: 47px; margin-top: -2px;" value="Añadir al carrito">
                                    </form>
                                    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Product Detail End -->

</div>
