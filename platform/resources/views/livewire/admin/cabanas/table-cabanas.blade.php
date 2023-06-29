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
                    <th>Imagen</th>
                    <th>Telefono</th>
                    <th>Email</th>
                    <th>Link Pagina</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($cabanas as $hotel)
                    <tr class="table-light">
                        <td scope="row">{{ $hotel->id }}</td>
                        <td>{{ $hotel->nombre }}</td>
                        <td> <img width="100" src="{{ asset("img/cabanas/$hotel->imagen") }}"
                                class="img-fluid rounded" alt=""></td>
                        <td>{{ $hotel->telefono }}</td>
                        <td>{{ $hotel->email }}</td>
                        <td>{{ $hotel->link_pagina }}</td>
                        <td>
                            <div class="d-grid gap-2">
                                <button type="button" class="btn btn-danger"
                                    wire:click='borrarAsk({{ $hotel->id }})'>Borrar</button>
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
            Livewire.on('borrarAsk', (cabana) => {
                let ask = confirm('El registro no podra restaurase');
                console.log(cabana);
                if (ask) Livewire.emit('borrarCabana', cabana.cabana);
            });

        });
    </script>
</div>
