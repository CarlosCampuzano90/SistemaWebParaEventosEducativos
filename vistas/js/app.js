'use strict';

/*
 * A Design by GraphBerry
 * Author: GraphBerry
 * Author URL: http://graphberry.com
 * License: http://graphberry.com/pages/license
 */

 // Open offsite navigation.
 $('#nav-expander').on('click', function(e) {
    e.preventDefault();
    $('nav').toggleClass('nav-expanded');
});

// Close offsite navigation.
 $('.menu .close').on('click', function(e) {
    e.preventDefault();
    $('nav').toggleClass('nav-expanded');
});




//Calculate full with of jumbotron.
 function homeFullScreen() {

    var homeSection = $('.home');
    var windowHeight = $(window).outerHeight();

    if (homeSection.hasClass('home-fullscreen')) {

        $('.home-fullscreen').css('height', windowHeight);
    }
}

 //Load details of single project from portfolio.
 function openProject() {

    var portfolioItem = $('.portfolio-item  a');
    var singleProject = $('#single-project');
    
    portfolioItem.click(function () {

        var link = $(this).attr('href');
        $('html, body').animate({
            scrollTop: singleProject.offset().top - 30
        }, 500);

        singleProject.empty();

        setTimeout(function () {
            singleProject.load(link, function (response, status) {
                if (status === "error") {
                    alert("An error");
                } else {
                    singleProject.slideDown(500);

                    var closeProject = $('#close-project');
                    closeProject.on('click', function () {
                        singleProject.slideUp(500);
                        setTimeout(function () {

                            singleProject.empty();
                        }, 500);
                    });
                }
            });
        }, 500);
        return false;
    });
}


//What happen on window resize
$(window).resize(function () {
    homeFullScreen();
});



const imagenes=document.querySelectorAll("#imagenes img");
imagenes.forEach((imagen) => {
    imagen.addEventListener("click",rotar);
});
 
function rotar() {
 
    // añadimos la propiedad rotación a cada elemento
    this.rotacion=(this.rotacion+180) || 180;
 
    // rotamos la imagen con estilos
    this.style.transform="rotate("+this.rotacion+"deg)";
}


function generarCodigoQREncriptado($texto){ //Función para generar el codigo QR
	var contenedorQR = document.getElementById('contenedorQR');
	var QR = new QRCode(contenedorQR);
	QR.makeCode($texto);
}
