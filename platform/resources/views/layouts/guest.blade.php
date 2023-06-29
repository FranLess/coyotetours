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
        <link rel="stylesheet" href="{{ asset('vendor/bootstrap-5.3.0-alpha1-dist/css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        @livewireStyles
        <!-- Scripts -->
        @vite(['resources/js/app.js'])
        <script src="https://code.jquery.com/jquery-1.12.4.min.js"
            integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" 
            crossorigin="anonymous">
        </script>
    
    
        @isset($links)
            {{ $links }}
        @endisset
    </head>
    <body>
        <x-not-available-lang />
        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>
    </body>
</html>
