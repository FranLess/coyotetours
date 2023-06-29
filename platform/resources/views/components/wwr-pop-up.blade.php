<!-- WWR POP UP BANNER START -->

<link rel="stylesheet" href="{{ asset('vendor/WWR/styles.min.css') }}">
<div class="pop" id="pop-up" style="display:grid;">
    <div class="container-fluid p-0">
        <div class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="container pb-5">
                    <a href="#" id="btn-cerrar-popup" class="btn-cerrar-popup"><i class="bi bi-x-lg"></i></a>
                    <div class="carousel-item active">
                        <img class="w-100" src="{{ asset('img/banners/Cabalgando_el_Viejo_Oeste.jpg') }}">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <h4 class="text-white text-uppercase mb-md-3"></h4>
                            <h1 class="display-3 text-white mb-md-4">Wild West Riding</h1>
                            <a href="{{ route('tours.show' , 'cabalgando-el-viejo-oeste') }}" class="btn btn-primary py-md-3 px-md-5 mt-2">Reserva ya!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('vendor/WWR/Expiry-min.js') }}"></script>
<script>
    window.addEventListener('load', () => {
        let popup = getWithExpiry('popup');
        if (!popup) {
            document.getElementById("pop-up").style.display = "grid";
        }


    });
    document.getElementById("btn-cerrar-popup").addEventListener("click", cerrar);

    function cerrar() {
        setWithExpiry('popup', true, 864000 * 30);
        document.getElementById("pop-up").style.display = "none";
    }
    setTimeout(cerrar, 5 * 1000);
</script>
<!-- WWR POP UP BANNER END -->
