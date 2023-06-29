    <div class="container pt-10 mt-10 p-5 bg-dark" style="color: white !important">
        <form {{ $attributes->merge([ 'enctype' => "multipart/form-data" , 'method' => 'post' , 'class' => 'text-white']) }}>
            @csrf
            @method('post')
            {{ $slot }}
            <div class="d-grid gap-2">
                <input type="submit" name="resgistrar" id="resgistrar" class="btn btn-success" value="Registrar"></button>
            </div>
        </form>
    </div>
    

