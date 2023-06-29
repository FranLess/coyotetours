<!-- About Start -->
<div class="container-fluid">
    <div class="container pt-5">
        <div class="row">
            <div class="col-lg-6 col-md-6 pt-5" style="min-height: 500px; background:none !important;">

                <img src="{{ asset('img/coyoteLogo.jpeg') }}" height="400">
            </div>
            <div class="col-lg-6 col-md-6 mb-4">
                <div class="about-text bg-white p-4 p-lg-5 my-lg-5">
                    <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">{{__('Nosotros')}}</h6>
                    <h1 class="mb-3">
                        {{ __('Tenemos los mejores tours, experiencias y paquetes turisticos en Durango') }}</h1>
                    <p>{{ __('Nuestra Tour Operadora se distingue por contar con los mejores productos en el mercado de viajes y con un insuperable servicio, observando siempre los mas altos estándares de calidad') }}.
                    </p>
                    <div class="row">
                        <a href="javascript:void(window.open('https://form.jotform.com/230478093612860','blank','scrollbars=yes,toolbar=no,width=700,height=500'))"
                        class="btn btn-primary btn-block d-grid gap-2 m-1">
                                {{__('Valora nuestro sitio y reseñanos')}}
                        </a>
                        <div class="col-6">
                            <img class="img-fluid" src="{{ asset('img/about-1.jpg') }}" alt="">
                        </div>
                        <div class="col-6">
                            <img class="img-fluid" src="{{ asset('img/about-2.jpg') }}" alt="">
                        </div>
                    </div>
                    <!-- <a href="" class="btn btn-primary mt-1">Book Now</a> -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->
