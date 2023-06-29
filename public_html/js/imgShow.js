//mostrar imagen en inputs file con imagen
window.addEventListener('load', function(){
    $(":file").change(function(e){
        let img = $(this).parent().find('img');
        img.attr('src', '');
        let reader = new FileReader();
        reader.onload = function(e) {
            img.attr('src', e.currentTarget.result);
        };
        reader.readAsDataURL(e.currentTarget.files[0]);
    });
});