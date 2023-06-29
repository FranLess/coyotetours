<div>
    <div>
        {{-- Do your work, then step back. --}}
        <div class="table-responsive m-3 bg-dark">
            <table
                class="table table-striped-columns
            table-hover	
            table-bordered
            table-dark
            align-middle">
                <div class="input-group flex-nowrap">
                    <span class="input-group-text" id="addon-wrapping">@</span>
                    <input wire:model='buscar' type="text" class="form-control" placeholder="Username" aria-label="Username"
                        aria-describedby="addon-wrapping">
                </div>
                <thead class="table-dark">
                    <caption>Tours</caption>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Disponibilidad</th>
                        <th>Precio</th>
                        <th>Imagen</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($servicios as $servicio)
                        <tr class="table-light">
                            <td scope="row">{{ $servicio->id }}</td>
                            <td>{{ $servicio->nombre }}</td>
                            <td>{{ $servicio->precio }}</td>
                            <td>{{ $servicio->disponibilidad }}</td>
                            <td> <img width="100" src="{{asset("img/servicios/$servicio->imagen")}}" class="img-fluid rounded" alt=""></td>
                            <td>
                                <div class="d-grid gap-2">
                                    <button type="button" class="btn btn-danger"
                                        wire:click='borrarAsk({{ $servicio->id }})'>Borrar</button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
    
                </tfoot>
            </table>
        </div>
        <script>
            window.addEventListener('load', () => {
                Livewire.on('borrarAsk', (servicio) => {
                    let ask = confirm('El registro no podra restaurase');
                    console.log(servicio);
                    if (ask) Livewire.emit('borrarServicio', servicio.servicio);
                });
    
            });
        </script>
    </div>
    
</div>
