<x-coyote>

    <x-wwr-pop-up />

    {{-- @livewire('users') --}}
    @livewire('carrousel')

    @livewire('booking')

    <x-about-coyote />

    <x-feature-coyote />

    <x-video-coyote-yt />

    @livewire('destination')

    @livewire('cabanas.product-list')

    <x-registration-coyote />

    <x-img-tripadvisor />

    <div class="datos_youtube" style="display: none">{{ json_encode($videos_youtube) }}</div>
    <!-- JavaScript Libraries -->

</x-coyote>
