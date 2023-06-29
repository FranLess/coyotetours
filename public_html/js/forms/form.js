$(document).ready(function () {
    let urlname = window.location.pathname;
    let form = urlname.substring(urlname.lastIndexOf('/') + 1);
    if (form == 'img') {
        $("select[name='id_tour']").change(obtenerNombreIDTour);
        $("select[name='id_tour']").click(obtenerNombreIDTour);
    }
    if (form == 'cabanasHabitacionesImagenes') {
        
        $("select[name='habitacion_id']").change(obtenerNombreIDTour);
        $("select[name='habitacion_id']").click(obtenerNombreIDTour);
    }
    function obtenerNombreIDTour(e) {
        let index = e.currentTarget.options.selectedIndex
        let value = e.currentTarget[index].textContent;
        $("input[name='nombre']").val(value);
    }
});