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
                    <th>Id Tour</th>
                    <th>Nombre</th>
                    <th>Img</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($images as $image)
                    <tr class="table-light">
                        <td scope="row">{{ $image->id }}</td>
                        <td>{{ $image->id_tour }}</td>
                        <td>{{ $image->nombre }}</td>
                        <td> <img width="100" src="{{ asset("img/images/$image->img") }}" class="img-fluid rounded"
                                alt=""></td>
                        <td>
                            <div class="d-grid gap-2">
                                <button type="button" class="btn btn-danger"
                                    wire:click='borrarAsk({{ $image->id }})'>Borrar</button>
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
            Livewire.on('borrarAsk', (image) => {
                let ask = confirm('El registro no podra restaurase');
                if (ask){
                    alert(image.image)
                    Livewire.emit('borrarImg', image.image);
                } 
            });
        });
    </script>
</div>
