@props(['tours'])
@php
    if (count($tours) > 0) {
        foreach ($tours as $key => $tour) {
            $names[] = $tour->nombre_es;
            $links[] = route('tours.show', $tour);
        }
    } else {
        $names[] = '';
        $links[] = '';
    }
    $nav_links = [
        ['name' => 'inicio',
        'link' => route('index'),
        'active' => request()->routeIs('index'), 
        'type' => 'link']
        , 
        ['name' => 'nosotros', 
        'link' => route('nosotros.index'), 
        'active' => request()->routeIs('nosotros.index'), 
        'type' => 'link']
        , 
        ['name' => 'tours', 
        'link' => null, 'active' => null, 
        'type' => 'drop', 
        'names' => [...$names], 
        'links' => [...$links]]
        , 
        ['name' => 'paquetes', 
        'link' => null, 
        'active' => null, 
        'type' => 'drop', 
        'names' => [...$names], 
        'links' => [...$links]]
        , 
        ['name' => 'contacto', 
        'link' => route('contacto.index'), 
        'active' => request()->routeIs('contacto.index'), 
        'type' => 'link']
    ];
    
    if (isset(Auth::user()->admin) && Auth::user()->admin) {
        $nav_links[] = ['name' => 'Administrar', 'link' => route('admin.index'), 'active' => request()->routeIs('admin.index'), 'type' => 'link'];
    }
@endphp
@foreach ($nav_links as $nav_link)

@if ($nav_link['type'] == 'link')
    <x-jet.nav-link href="{{ $nav_link['link'] }}" :active="$nav_link['active']">
        {{ strtoupper($nav_link['name']) }}
    </x-jet.nav-link>

@else
    <x-jet.dropdown id="tours" :active="$nav_link['active']" class="row">
        <x-slot name='trigger'>
            {{ strtoupper($nav_link['name']) }}
        </x-slot>
        <x-slot name='content'>
            @foreach ($nav_link['names'] as $name)
                <x-jet.dropdown-link href="{{ $nav_link['links'][$loop->iteration - 1] }}">
                    {{ $name }}

                </x-jet.dropdown-link>
            @endforeach

        </x-slot>
    </x-jet.dropdown>
@endif

@endforeach