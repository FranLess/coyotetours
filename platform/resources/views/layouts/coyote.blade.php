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

    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-icons-1.10.3/bootstrap-icons.css') }}">
    @livewireStyles
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"
        integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" 
        crossorigin="anonymous">
    </script>


    @isset($links)
        {{ $links }}
    @endisset
</head>

<body {{ $attributes->merge(['class']) }}>

    <x-topbar-coyote></x-topbar-coyote>

    @livewire('nav-menu')

    {{ $slot }}

    <x-footer-coyote />

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top">
        <i class="bi bi-chevron-double-up"></i>
    </a>

    @stack('modals')

    @livewireScripts
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script>
        const myCarouselElement = document.querySelector('#carouselExampleFade')
    </script>

    @isset($scripts)
        {{ $scripts }}
    @endisset
</body>

</html>
