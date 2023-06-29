@props(['title', 'name'])


<div class="row mb-3 mt-3">
    <h4 class="col-lg-3 text-white">{{ $title }}</h4>
    <input {{ $attributes->merge(['class' => 'col form-control d-inline', 'type' => 'text']) }}
        name='{{ $name }}' value="{{old($name)}}">
</div>

@error($name)
    <div class="alert alert-danger m-0 p-0" role="alert">
        <li> {{ $message }} </li>
    </div>
@enderror
