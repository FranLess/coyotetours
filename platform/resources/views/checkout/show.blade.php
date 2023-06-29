<x-coyote>
    <x-slot name='links'>
        <link rel="stylesheet" href="{{ asset('lib/carrito/assets/css/main.css') }}">
    </x-slot>

    @livewire('pago.pago-productos')

    <x-slot name='scripts'>
        <!-- Vendor JS-->
        <script src="{{ asset('lib/carrito/assets/js/vendor/modernizr-3.6.0.min.js') }}"></script>
        <script src="{{ asset('lib/carrito/assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
        <script src="{{ asset('lib/carrito/assets/js/vendor/jquery-migrate-3.3.0.min.js') }}"></script>
        <script src="{{ asset('lib/carrito/assets/js/plugins/slick.js') }}"></script>
        <script src="{{ asset('lib/carrito/assets/js/plugins/jquery.syotimer.min.js') }}"></script>
        <script src="{{ asset('lib/carrito/assets/js/plugins/wow.js') }}"></script>
        <script src="{{ asset('lib/carrito/assets/js/plugins/jquery-ui.js') }}"></script>
        <script src="{{ asset('lib/carrito/assets/js/plugins/perfect-scrollbar.js') }}"></script>
        <script src="{{ asset('lib/carrito/assets/js/plugins/magnific-popup.js') }}"></script>
        <script src="{{ asset('lib/carrito/assets/js/plugins/select2.min.js') }}"></script>
        <script src="{{ asset('lib/carrito/assets/js/plugins/waypoints.js') }}"></script>
        <script src="{{ asset('lib/carrito/assets/js/plugins/counterup.js') }}"></script>
        <script src="{{ asset('lib/carrito/assets/js/plugins/jquery.countdown.min.js') }}"></script>
        <script src="{{ asset('lib/carrito/assets/js/plugins/images-loaded.js') }}"></script>
        <script src="{{ asset('lib/carrito/assets/js/plugins/isotope.js') }}"></script>
        <script src="{{ asset('lib/carrito/assets/js/plugins/scrollup.js') }}"></script>
        <script src="{{ asset('lib/carrito/assets/js/plugins/jquery.vticker-min.js') }}"></script>
        <script src="{{ asset('lib/carrito/assets/js/plugins/jquery.theia.sticky.js') }}"></script>
        <script src="{{ asset('lib/carrito/assets/js/plugins/jquery.elevatezoom.js') }}"></script>
        <!-- Template  JS -->
        <script src="{{ asset('lib/carrito/assets/js/main.js?v=3.3') }}"></script>
        <script src="{{ asset('lib/carrito/assets/js/shop.js?v=3.3') }}"></script>
    </x-slot>
</x-coyote>