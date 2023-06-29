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
                    <th>Link</th>
                    <th>Clave</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($videos as $video)
                    <tr class="table-light">
                        <td scope="row">{{ $video->id }}</td>
                        <td>{{ $video->nombre }}</td>
                        <td>{{ $video->link }}</td>
                        <td>{{ $video->clave }}</td>
                        <td>
                            <div class="d-grid gap-2">
                                <button type="button" class="btn btn-danger"
                                    wire:click='borrarAsk({{ $video->id }})'>Borrar</button>
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
            Livewire.on('borrarAsk', (video) => {
                let ask = confirm('El registro no podra restaurase');
                if (ask) Livewire.emit('borrarVideo', video.video);
            });

            $("input[name='link']").change(function(e) {
                $("input[name='clave']").val(obtenerClaveYoutube(obtenerLink(e)));
            });

            function obtenerLink(e) {
                return e.target.value;
            }

            function obtenerClaveYoutube(link) {
                id = link.substring(link.indexOf('v') + 2, link.indexOf('v') + 14);
                return id;
            }
        });
    </script>
</div>
