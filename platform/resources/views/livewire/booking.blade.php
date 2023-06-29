<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <!-- Booking Start -->
    <div class="container-fluid booking mt-5">
        <div class="container pb-5">
            <div class="shadow bg-white p-4 text-dark">

                <form action="{{ route('peticion_reserva') }}" method="post">
                    @csrf
                    <div class="row align-items-center" style="min-height: 60px;">
                        <div class="col-md-10">
                            <div class="row align-items-center">
                                <div class="col-md-3">
                                    <div class="mb-3 mb-md-0">
                                        <input type="text" class="form-control" placeholder="Escribe tu nombre..."
                                            name="nombre" />

                                        @error('nombre')
                                            <div class="alert alert-danger m-0 p-0" role="alert">
                                                <li> {{ $message }} </li>
                                            </div>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3 mb-md-0">
                                        <input type="number" class="form-control" placeholder="Número de personas"
                                            name="numero_personas" />

                                        @error('numero_personas')
                                            <div class="alert alert-danger m-0 p-0" role="alert">
                                                <li> {{ $message }} </li>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3 mb-md-0">
                                        <div class="date" id="date1" data-target-input="nearest">
                                            <input type="date" class="form-control datetimepicker-input"
                                                placeholder="Fecha de Viaje" data-target="#date1"
                                                data-toggle="datetimepicker" name="fecha" />

                                            @error('fecha')
                                                <div class="alert alert-danger m-0 p-0" role="alert">
                                                    <li> {{ $message }} </li>
                                                </div>
                                            @enderror

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3 mb-md-0">
                                        <input type="email" class="form-control" placeholder="Tu EMail..."
                                            name="email" />

                                        @error('email')
                                            <div class="alert alert-danger m-0 p-0" role="alert">
                                                <li> {{ $message }} </li>
                                            </div>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3 mb-md-0">
                                        <select class="form-select" name="tour">
                                            @foreach ($tours as $tour)
                                                <option value="{{ $tour->id }}" selected>{{ $tour->nombre_es }}
                                                </option>
                                            @endforeach
                                        </select>

                                        @error('tour')
                                            <div class="alert alert-danger m-0 p-0" role="alert">
                                                <li> {{ $message }} </li>
                                            </div>
                                        @enderror

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="mb-3 mb-md-0">
                                <button class="btn btn-primary" type="submit">Hacer reserva</button>
                            </div>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
    <!-- Booking End -->
</div>
