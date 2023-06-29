@props(['title', 'img_id', 'name'])

<div class="row mb-3 mt-3">
    <h4  class="col-lg-3 text-white">{{ $title }}</h4>
    <img id='{{ $img_id }}' {{ $attributes->merge(['class' => 'col-lg-6 img-fluid img-thumbnail']) }}>
    <input type="file" {{ $attributes->merge(['class' => 'col form-control d-inline']) }} name={{ $name }}>
    {{ $slot }}
</div>
<br>
@error($name)
    <div class="alert alert-danger m-0 p-0" role="alert">
        <li>{{ $message }}</li>
    </div>
@enderror
