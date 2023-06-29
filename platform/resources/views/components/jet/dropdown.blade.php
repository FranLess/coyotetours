@props(['id'])

<li class="nav-item dropdown">
    <a id="{{ $id }}" {!! $attributes->merge(['class' => 'nav-link']) !!} role="button" data-bs-toggle="dropdown" data-bs-auto-close='outside' aria-expanded="false">
        {{ $trigger }}
        <i class="bi bi-caret-down-fill"></i>
    </a>

    <div class="dropdown-menu dropdown-menu-end animate slideIn dropdown-menu-lg-start" aria-labelledby="{{ $id }}">
        {{ $content }}
    </div>
</li>