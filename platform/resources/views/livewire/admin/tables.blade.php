<div>
    {{-- Do your work, then step back. --}}
    <div>
        {{-- Do your work, then step back. --}}
       
        @foreach ($tables as $table)
        <div class="container">
            <br><br>
            Ir al Editor de <br> 
            {{$table->Tables_in_coyote}}<a href='{{route("admin.show.$table->Tables_in_coyote")}}'><button type="button" class="btn btn-outline-primary">-></button></a>

        </div>
        @endforeach
    </div>
    <script>
       
    </script>
</div>
