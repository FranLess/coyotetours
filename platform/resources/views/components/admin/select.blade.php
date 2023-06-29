@props(['title'])
<hr>
<div class="row mb-3 mt-3">
    <h4 class="col-lg-3 text-white">{{ $title }}</h4>
    <select {{ $attributes->merge(['class' => 'col form-select d-inline']) }} ">
        {{ $slot }}
    </select>
</div>
<hr>
