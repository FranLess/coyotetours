(function ($) {
    "use strict";


    // Dropdown on mouse hover
    $(document).ready(function () {
        let datosYoutube = JSON.parse(document.querySelector('.datos_youtube').textContent);


        $('.videos-frame').attr('src', `https://www.youtube.com/embed/${datosYoutube[0].clave}`);

        //back-to-top
        let mybutton = document.querySelector(".back-to-top");

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function () {
            scrollFunction();
        };

        function scrollFunction() {
            if (
                document.body.scrollTop > 20 ||
                document.documentElement.scrollTop > 20
            ) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }
        // When the user clicks on the button, scroll to the top of the document
        mybutton.addEventListener("click", backToTop);

        function backToTop() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }




        // Quantity
        $('.qty input').on('change', function (e) {
            if ($(this).val() < 0) $(this).val(0);
        });
        $('.qty input').on('click', function (e) {
            if ($(this).val() < 0) $(this).val(0);
        });


        // VideosYoutube
        console.log(datosYoutube);
        $('.videosYoutube button').on('click', function () {
            var $button = $(this);
            var oldValue = 0;
            if ($button.hasClass('btn-plus') && oldValue < datosYoutube.length) {
                var newVal = parseFloat(oldValue) + 1;
                console.log(newVal);
                $('.videos-frame').attr('src', `https://www.youtube.com/embed/${datosYoutube[newVal].clave}`);
            } else {
                if (oldValue > 0) {
                    var newVal = parseFloat(oldValue) - 1;
                    console.log(newVal);
                    $('.videos-frame').attr('src', `https://www.youtube.com/embed/${datosYoutube[newVal].clave}`);

                } else {
                    newVal = 0;
                    console.log(newVal);
                    $('.videos-frame').attr('src', `https://www.youtube.com/embed/${datosYoutube[newVal].clave}`);
                }
            }
            $button.parent().find('input').val(newVal);
        });

    });




})(jQuery);
