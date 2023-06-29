<x-coyote>


    <!-- Start WOWSlider.com HEAD section -->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/datawow/nosotros/engine1/style.css') }}" />
    <script type="text/javascript" src="{{ asset('vendor/datawow/nosotros/engine1/jquery.js') }}"></script>
    <!-- End WOWSlider.com HEAD section -->

  
    {{-- header --}}
    <x-header/>
    {{-- header end --}}




    <!-- About Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5">
            <div class="site-section">
                <div class="container">
                    <div class="row mb-3 align-items-stretch">
                        <div class="h-entry">

                            <x-nosotros.wow-slider />

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    
    

</x-coyote>
