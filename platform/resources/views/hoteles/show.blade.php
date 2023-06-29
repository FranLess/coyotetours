<x-coyote>
    <div class="container-fluid">
        <div class="container pt-5 pb-3">
            <div class="row bg-dark p-2 text-dark bg-opacity-25 p-5" style="border-radius: 10px;">
                <div class="text-center mb-3 pb-3">
                    <h1>{{ $hotel->nombre }}</h1>
                </div>

                @foreach ($products as $product)
                    <div class="col-lg-4 col-md-6 mb-4 text-center">
                        <div class="text-center destination-item position-relative overflow-hidden mb-2 border border-dark"
                            style="border-radius: 10px;">
                            <img class="img-fluid" src="{{ asset("img/hoteles/habitaciones/$product->imagen") }}" alt="">
                            <a class="destination-overlay text-white text-decoration-none" href="{{ route('hoteles.product', [$hotel , $product]) }}"
                                style="border-radius: 10px;">
                                <span class="text-white h4">{{ $product->nombre }}</span>
                            </a>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </div>
</x-coyote>
