@props(['scripts'])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Favicon -->
    <link href="{{ asset('img/favico.svg') }}" rel="icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">

    <!-- Styles -->

    @livewireStyles
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-icons-1.10.3/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-5.3.0-alpha1-dist/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/sweetalert2-11.7.3/package/dist/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pointer.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/flag-icons-main/css/flag-icons.min.css') }}">

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}

    @vite(['resources/js/app.js'])
    @livewireScripts
    {{-- <script src="{{ asset('vendor/turbolinks/livewire-turbolinks.js') }}" data-turbolinks-eval="true" data-turbo-eval="true"></script> --}}


    @isset($links)
        {{ $links }}
    @endisset

</head>

<body {{ $attributes->merge(['class']) }}>


    <x-not-available-lang />

    <x-topbar-coyote></x-topbar-coyote>

    @livewire('nav-menu')

    {{ $slot }}
    <x-cart.modal></x-cart.modal>

    <x-footer-coyote />

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top">
        <i class="bi bi-chevron-double-up"></i>
    </a>


    @stack('modals')

    <script src="{{ asset('vendor/bootstrap-5.3.0-alpha1-dist/js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('vendor/sweetalert2-11.7.3/package/dist/sweetalert2.all.js') }}"></script>
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    {{-- @if (session('pago_realizado')) --}}
    <script></script>
    {{-- @endif --}}
    @isset($scripts)
        {{ $scripts }}
    @endisset

    <script src="https://form.jotform.com/static/feedback2.js"></script>
    <script src="{{ asset('vendor/jotform/jotform.js') }}"></script>

    <!-- Bot -->
    <script src="//code.tidio.co/dbtcza0cu1iuxrxloj7usbkswfr6ys1t.js" async></script>
    <!--End Bot -->
</body>

</html>
