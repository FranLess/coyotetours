<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <!-- Destination Start -->
    <div class="container-fluid">
        <div class="container pt-5 pb-3">
            <a name="tour">
                <div class="text-center mb-3 pb-3">
                    <a href="https://www.zonaturistica.com/actividad/tours.html" target="_blank">
                        <img src="img/logo_zt_retro.png" alt="Image" class="img-fluid"></a>
                    <!--<h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Tours</h6>-->
                    <h1>Explora Los Mejores Tours</h1>
                </div>
            </a>

            <div class="row bg-dark p-2 text-dark bg-opacity-25 p-5" style="border-radius: 10px;">

                @foreach ($tours as $tour)
                    <div class="col-lg-4 col-md-6 mb-4 text-center">
                        <div class="text-center destination-item position-relative overflow-hidden mb-2 border border-dark"
                            style="border-radius: 10px;">
                            <img class="img-fluid" src="{{ asset("img/tours/$tour->img_portada") }}" alt="">
                            <a class="destination-overlay text-white text-decoration-none"
                                href="{{ route('tours.show', $tour) }}" style="border-radius: 10px;">
                                <span class="text-white h4">Precio por Pax:</span>
                                <h5 class="text-white display-6">{{ $tour->precio_adulto }} MXN</h5>
                                <span class="text-white h5">Menores de 5 a 12 años:</span>
                                <h5 class="text-white display-6">{{ $tour->precio_menor }} MXN</h5>
                            </a>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </div>


    <!-- Destination Start -->
</div>
