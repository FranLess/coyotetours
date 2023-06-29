@php
    $currentRoute = URL::current();
@endphp
<style>
    .page-header {
        background: linear-gradient(rgba(255, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), no-repeat center center;
        background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset('img/carousel-2.jpg') }}'), no-repeat center center;
        background-size: cover;
    }
</style>
<!-- Header Start -->
<div class="container-fluid page-header">
    <div class="container">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
            <h3 class="display-4 text-white text-uppercase" id="routeText"></h3>
            <div class="d-inline-flex text-white">
                <p class="m-0 text-uppercase"><a class="text-white" href="{{ route('index') }}">Inicio</a></p>
                <i class="fa fa-angle-double-right pt-1 px-3"></i>
                <p class="m-0 text-uppercase" id="routeText2"></p>
            </div>
        </div>
    </div>
</div>
<!-- Header End -->
<script src="{{ asset('js/header/header.js') }}"></script>
