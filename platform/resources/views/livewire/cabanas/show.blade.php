<div>
    @livewire('cabanas.header' , ['cabana' => $cabana])
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <!-- Destination Start -->
    <div class="container-fluid">
        <div class="container pt-5 pb-3">
            <div class="row bg-dark p-2 text-dark bg-opacity-25 p-5" style="border-radius: 10px;">
                <div class="text-center mb-3 pb-3">
                    <h1>{{ $cabana->nombre }}</h1>
                </div>

                @foreach ($products as $product)
                    <div class="col-lg-4 col-md-6 mb-4 text-center">
                        <div class="text-center destination-item position-relative overflow-hidden mb-2 border border-dark"
                            style="border-radius: 10px;">
                            <img class="img-fluid" src="{{ asset("img/cabanas/habitaciones/$product->imagen") }}" alt="">
                            <a class="destination-overlay text-white text-decoration-none" href="{{ route('cabanas.product', [$cabana , $product]) }}"
                                style="border-radius: 10px;">
                                <span class="text-white h4">{{ $product->nombre }}</span>
                            </a>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </div>


    <!-- Destination Start -->
</div>
