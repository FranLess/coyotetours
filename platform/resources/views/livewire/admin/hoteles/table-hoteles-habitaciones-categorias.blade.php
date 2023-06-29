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
                    <th>Nombre</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($categorias as $categoria)
                    <tr class="table-light">
                        <td scope="row">{{ $categoria->id }}</td>
                        <td>{{ $categoria->hotel_id }}</td>
                        <td>{{ $categoria->nombre }}</td>
                        <td>
                            <div class="d-grid gap-2">
                                <button type="button" class="btn btn-danger"
                                    wire:click='borrarAsk({{ $categoria->id }})'>Borrar</button>
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
            Livewire.on('borrarAsk', (hotelHabitacionCategoria) => {
                let ask = confirm('El registro no podra restaurase');
                if (ask) Livewire.emit('borrarHotelHabitacionCategoria', hotelHabitacionCategoria.hotelHabitacionCategoria);
            });
        });
    </script>
</div>
