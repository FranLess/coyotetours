<div class="container-lg p-0 lg-3 shadow sticky-top" style="z-index: 9;">
    <!-- Navbar Start -->



    <nav class="navbar navbar-expand-lg bg-light navbar-light shadow-lg py-3 py-lg-0 pl-3 pl-lg-5">
        <div class="container">
            <!-- Logo -->
            <a class="navbar-brand me-4" href="{{ route('index') }}">
                <x-jet.application-mark width="36" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-between px-3" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto py-0">


                    <x-jet.nav-link href="{{ route('index') }}" :active="request()->routeIs('index')">
                        {{ __('Inicio') }}
                    </x-jet.nav-link>

                    <x-jet.nav-link href="{{ route('nosotros.index') }}" :active="request()->routeIs('nosotros.index')">
                        {{ __('Nosotros') }}
                    </x-jet.nav-link>

                    {{-- Drop in Drop Section START --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            data-bs-auto-close="outside" aria-expanded="false">
                            ARMA TU PAQUETE
                        </a>

                        <ul class="dropdown-menu">
                            <li class="dropend">
                                <a class="dropdown-item dropdown-toggle" href="#" data-bs-toggle="dropdown"
                                    data-bs-auto-close="outside" aria-expanded="false">TOURS</a>
                                <ul class="dropdown-menu">
                                    @foreach ($tours as $tour)
                                        <li><a class="dropdown-item"
                                                href=" {{ route('tours.show', $tour) }} ">{{ $tour->nombre_es }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>

                            <li class="dropend">
                                <a class="dropdown-item dropdown-toggle" href="#" data-bs-toggle="dropdown"
                                    data-bs-auto-close="outside" aria-expanded="false">PAQUETES</a>
                                <ul class="dropdown-menu">
                                    @foreach ($paquetes as $paquete)
                                        <li><a class="dropdown-item"
                                                href=" {{ route('paquetes.show', $paquete) }} ">{{ $paquete->nombre }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>

                            <li class="dropend">
                                <a class="dropdown-item dropdown-toggle" href="#" data-bs-toggle="dropdown"
                                    data-bs-auto-close="outside" aria-expanded="false">HOTELES</a>
                                <ul class="dropdown-menu">

                                    <li class="dropend">
                                        <a class="dropdown-item dropdown-toggle" href="#"
                                            data-bs-toggle="dropdown" data-bs-auto-close="outside"
                                            aria-expanded="false">HOTELES</a>
                                        <ul class="dropdown-menu">
                                            @foreach ($hoteles as $hotel)
                                                <li><a class="dropdown-item" href="{{ route('hoteles.show' , $hotel) }}"> {{ $hotel->nombre }} </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>

                                    <li class="dropend">
                                        <a class="dropdown-item dropdown-toggle" href="#"
                                            data-bs-toggle="dropdown" data-bs-auto-close="outside"
                                            aria-expanded="false">SIERRA</a>
                                        <ul class="dropdown-menu">
                                            @foreach ($cabanas as $cabana)
                                                <li><a class="dropdown-item" href="{{ route('cabanas.show' , $cabana) }}"> {{ $cabana->nombre }} </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>

                                </ul>
                            </li>

                            <li class="dropend">
                                <a class="dropdown-item dropdown-toggle" href="#" data-bs-toggle="dropdown"
                                    data-bs-auto-close="outside" aria-expanded="false">ATRACCIONES</a>
                                <ul class="dropdown-menu">
                                    @foreach ($atracciones as $atraccion)
                                        <li><a class="dropdown-item"
                                                href=" {{ route('atracciones.show', $atraccion) }} ">{{ $atraccion->nombre }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>

                            <li class="dropend">
                                <a class="dropdown-item dropdown-toggle" href="#" data-bs-toggle="dropdown"
                                    data-bs-auto-close="outside" aria-expanded="false">OTROS SERVICIOS</a>
                                <ul class="dropdown-menu">
                                    @foreach ($servicios as $servicio)
                                        <li><a class="dropdown-item"
                                                href=" {{ route('servicios.show', $servicio) }} ">{{ $servicio->nombre }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>

                        </ul>
                    </li>
                    {{-- Drop in Drop Section END --}}


                    <x-jet.nav-link href="{{ route('contacto.index') }}" :active="request()->routeIs('contacto.index')">
                        {{ strtoupper('contacto') }}
                    </x-jet.nav-link>

                    @if (isset(Auth::user()->admin) && Auth::user()->admin)
                        <x-jet.nav-link href="{{ route('admin.index') }}" :active="request()->routeIs('admin.index')">
                            {{ strtoupper('administrar') }}
                        </x-jet.nav-link>
                    @endif

                    @auth
                        <x-jet.nav-link class="cursor-pointer" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class="bi bi-cart3 display-6"></i>
                        </x-jet.nav-link>
                    @endauth
                </ul>
                <!-- Scrollable modal -->



                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav align-items-baseline">
                    {{-- Idioma selector Dropdown --}}
                    <x-jet.dropdown id="idiomaSelector">
                        <x-slot name="trigger">
                            {{-- {{ __('Idioma') }} --}}
                            <i class="bi bi-translate"></i>
                        </x-slot>
                        <x-slot name="content">
                            <x-jet.dropdown-link href="{{ route('idioma' , 'es') }}">
                                <span class="fi fi-mx mx-2"></span>{{ __('Español') }}
                            </x-jet.dropdown-link>
                            <x-jet.dropdown-link href="{{ route('idioma' , 'en') }}">
                                <span class="fi fi-us mx-2"></span>{{ __('Inglés') }}
                            </x-jet.dropdown-link>
                        </x-slot>
                    </x-jet.dropdown>

                    <!-- Teams Dropdown -->
                    @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                        <x-jet.dropdown id="teamManagementDropdown">
                            <x-slot name="trigger">
                                {{ Auth::user()->currentTeam->name }}

                                <svg class="ms-2" width="18" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </x-slot>

                            <x-slot name="content">
                                <!-- Team Management -->
                                <h6 class="dropdown-header">
                                    {{ __('Manage Team') }}
                                </h6>

                                <!-- Team Settings -->
                                <x-jet.dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                    {{ __('Team Settings') }}
                                </x-jet.dropdown-link>

                                @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                    <x-jet.dropdown-link href="{{ route('teams.create') }}">
                                        {{ __('Create New Team') }}
                                    </x-jet.dropdown-link>
                                @endcan

                                <hr class="dropdown-divider">

                                <!-- Team Switcher -->
                                <h6 class="dropdown-header">
                                    {{ __('Switch Teams') }}
                                </h6>

                                @foreach (Auth::user()->allTeams() as $team)
                                    <x-jet.switchable-team :team="$team" />
                                @endforeach
                            </x-slot>
                        </x-jet.dropdown>
                    @endif

                    <!-- Settings Dropdown -->
                    @auth
                        <x-jet.dropdown id="settingsDropdown">
                            <x-slot name="trigger">
                                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                    <img class="rounded-circle" width="32" height="32"
                                        src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                @else
                                    {{ Auth::user()->name }}

                                    <svg class="ms-2" width="18" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                @endif
                            </x-slot>

                            <x-slot name="content">
                                <!-- Account Management -->
                                <h6 class="dropdown-header small text-muted">
                                    {{ __('Manage Account') }}
                                </h6>

                                <x-jet.dropdown-link href="{{ route('profile.show') }}">
                                    {{ __('Perfil') }}
                                </x-jet.dropdown-link>

                                <x-jet.dropdown-link href="{{ route('compras') }}">
                                    {{ __('Compras') }}
                                </x-jet.dropdown-link>

                                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                    <x-jet.dropdown-link href="{{ route('api-tokens.index') }}">
                                        {{ __('API Tokens') }}
                                    </x-jet.dropdown-link>
                                @endif

                                <hr class="dropdown-divider">

                                <!-- Authentication -->
                                <x-jet.dropdown-link href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                    {{ __('Log out') }}
                                </x-jet.dropdown-link>
                                <form method="POST" id="logout-form" action="{{ route('logout') }}">
                                    @csrf
                                </form>
                            </x-slot>
                        </x-jet.dropdown>
                    @endauth
                    <div class="d-flex justify-content-end">
                        @if (Route::has('login'))
                            <div class="">
                                @auth
                                @else
                                    <a href="{{ route('login') }}" class="text-muted">Log in</a>
                                    |
                                    <a href="{{ route('register') }}" class="text-muted">Sign in</a>
                            @endif
                        </div>
                        @endif
                </div>
                </ul>
            </div>

    </div>
    </nav>
    <!-- Navbar End -->
    </div>
