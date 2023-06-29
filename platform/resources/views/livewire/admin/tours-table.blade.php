<div>
    {{-- Do your work, then step back. --}}
    <div class="table-responsive m-3 bg-dark">
        <table class="table table-striped-columns
        table-hover	
        table-bordered
        table-dark
        align-middle">
        <div class="input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping">@</span>
            <input wire:model='buscar' type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping">
          </div>
            <thead class="table-dark">
                <caption>Tours</caption>
                <tr>
                    <th>Id</th>
                    <th>Nombre_Es</th>
                    <th>Nombre_En</th>
                    <th>Precio_A</th>
                    <th>Precio_M</th>
                    <th>Img_P</th>
                    <th>Img_B</th>
                    <th>Pdf</th>
                </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($tours as $tour)
                    <tr class="table-light" >
                        <td scope="row">{{$tour->id}}</td>
                        <td>{{$tour->nombre_es}}</td>
                        <td>{{$tour->nombre_en}}</td>
                        <td>{{$tour->precio_adulto}}</td>
                        <td>{{$tour->precio_menor}}</td>
                        <td> <img width="100" src="{{asset("img/tours/$tour->img_portada")}}" class="img-fluid rounded" alt=""></td>
                        <td> <img width="100" src="{{asset("img/banners/$tour->img_banner")}}" class="img-fluid rounded" alt=""></td>
                        <td>{{$tour->pdf}}</td>
                        <td><div class="d-grid gap-2">
                          <button type="button" class="btn btn-danger" wire:click='borrarAsk({{$tour->id}})'>Borrar</button>
                        </div></td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    
                </tfoot>
        </table>
    </div>
    <script>
        window.addEventListener('load' , ()=>{
            Livewire.on('borrarAsk' , (tour)=>{
                let ask  = confirm('El registro no podra restaurase');
                if(ask) Livewire.emit('borrarTour' , tour.tour);
            });
        });
    </script>
</div>
