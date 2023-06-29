$('#especificaciones').keydown(function (e) {
    let maxLength = $('#especificaciones').attr('maxlength');
    $("#count").text("Characters left: " + (maxLength - $(this).val().length));
});