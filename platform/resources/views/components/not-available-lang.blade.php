@if (session('lang'))
        <div class="alert alert-success">
            {{ __('El idioma no esta disponible')."  (".session('lang').")" }}
        </div>
    @endif