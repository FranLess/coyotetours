<div>
    <div class="container-fluid text-center">

        {{-- The Master doesn't talk, he acts. --}}
        {{-- <div class="container-fluid p-5">
            <h1>{{ $texto }}</h1>
            {{-- {{$users}} --}}

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">@</span>
                <input type="text" class="form-control" wire:model="buscar">
            </div>
            {{$buscar}}
            @if ($tours->count())
                
            
            <table class="table table-bordered border-primary">
                <thead>
                    <th class="cursor-pointer" wire:click='sort("id")'>id</th>
                    <th class="cursor-pointer" wire:click='sort("name")'>nombre</th>
                    <th class="cursor-pointer" wire:click='sort("precio")'>precio</th>
                    <th class="cursor-pointer" wire:click='sort("img")'>img</th>
                </thead>
                <tbody>
                    @foreach ($tours as $tour)
                    <tr>
                        <td>{{ $tour->id }}</td>
                        <td>{{ $tour->nombre_es }}</td>
                        <td>{{ $tour->precio_adulto }} MXN</td>
                        <td> <img height="100" src="{{ $tour->img }}" alt=""></td>
                    </tr>
                @endforeach
            </tbody>
            @else
            Sin registros
            @endif
        </table>



    </div>
    {{-- <div class="container-fluid mt-5">
        <div class="container flex text-center">
            {{ $tours->links() }}
        </div>
    </div>
    </div> --}}
    <!-- Full screen modal -->
            {{-- <div class="modal fade" id="colaModal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
                tabindex="-1">
                <div class="modal-dialog modal-fullscreen">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalToggleLabel">Modal 1</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-center bg-black">
                            <img class='img-fluid img-thumbnail' style="height: 100%"
                                src="https://lv2-cdn.azureedge.net/twice/c17bd21f7c0f4fd1bb3aff2adec6e54f-4_Fallen_%E1%84%89%E1%85%A1%E1%84%82%E1%85%A1.jpg"
                                alt="">
                        </div>
                        <div class="modal-footer">
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <script>
            window.addEventListener('load', () => {
                let modal = new bootstrap.Modal(document.getElementById('colaModal'));
                modal.show();


                const carousel = new bootstrap.Carousel(myCarouselElement, {
                    interval: 500,
                });
                console.log(bootstrap);
            });
        </script> --}}


</div>
