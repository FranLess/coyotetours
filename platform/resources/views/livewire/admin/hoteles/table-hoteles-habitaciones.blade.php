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
                    <th>Hotel Id</th>
                    <th>Categoria Id</th>
                    <th>Nombre</th>
                    <th>Especificaciones</th>
                    <th>Precio/Noche</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($habitaciones as $habitacion)
                    <tr class="table-light">
                        <td scope="row">{{ $habitacion->id }}</td>
                        <td>{{ $habitacion->hotel_id }}</td>
                        <td>{{ $habitacion->categoria_id }}</td>
                        <td>{{ $habitacion->nombre }}</td>
                        <td>@foreach (json_decode($habitacion->especificaciones) as $especificacion)
                            <li>
                                {{$especificacion}}
                            </li>
                            @endforeach</td>
                        <td>{{ $habitacion->precio_noche }}</td>
                        <td>
                            <div class="d-grid gap-2">
                                <button type="button" class="btn btn-danger"
                                    wire:click='borrarAsk({{ $habitacion->id }})'>Borrar</button>
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
            Livewire.on('borrarAsk', (hotelHabitacion) => {
                let ask = confirm('El registro no podra restaurase');
                if (ask) Livewire.emit('borrarHotelHabitacion', hotelHabitacion.hotelHabitacion);
            });
        });
    </script>
</div>
