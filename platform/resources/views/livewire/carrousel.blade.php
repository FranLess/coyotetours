<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="container-fluid p-0">
        <!-- Example Code -->

        <div id="carouselExampleFade" class="carousel slide carousel" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($tours as $tour)
                    <div class="carousel-item @if ($loop->first) active @endif">
                        <img class="w-100" src="{{ asset("img/banners/$tour->img_banner") }}" alt="Image">
                        <div
                            class="carousel-caption d-flex flex-column align-items-center justify-content-center text-center">
                            <h4 class="text-white text-uppercase mb-md-3">{{ $tour->nombre_en }}</h4>
                            <h1 class="display-3 text-white mb-md-4">{{ $tour->nombre_es }}</h1>
                            <a href="{{ route('tours.show', $tour) }}"
                                class="btn btn-primary py-md-3 px-md-5 mt-2">TOUR</a>
                        </div>
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <!-- End Example Code -->
    </div>

    <x-slot name='scripts'>
        <script>
            $(document).ready(() => {
                const carousel = document.querySelector('#carouselExampleFade');
                const carouselConfig = new bootstrap.Carousel(carousel, {
                    cycle: true,
                    interval: 1000,
                    touch: false
                })
            })
        </script>
    </x-slot>

</div>
