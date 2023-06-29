window.addEventListener('load', () => {
    let fecha_final = $('#fecha_final');
    let fecha_inicio = $('#fecha_incio');

    $('#fecha_inicio').change(function (e) {
        fecha_inicio = getDate(e);
        setNights();
    });
    $('#fecha_final').change(function (e) {
        fecha_final = getDate(e);
        setNights();
    });

    function setNights() {
        let noches = (fecha_final - fecha_inicio) / 86400000;
        if (!isNaN(noches)) {
            $('#noches').val(noches);
        }
    }
    function getDate(date) {
        return new Date(date.target.value);
    }
}, false);