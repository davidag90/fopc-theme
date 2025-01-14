jQuery(function ($) {
    $(document).ready(function() {
        $('#accesos-rapidos > .col').each(function(){
            var href_acceso = $(this).find('p > a').attr('href');
            
            $(this).find('p > a').addClass('text-decoration-none link-primary');
            $(this).find('figure').wrap('<a href="' + href_acceso + '" target=_blank></a>');
        });

        // Add class link-light to footer menus
        $('.footer_widget > div > ul > li').addClass('mb-3');
        $('.footer_widget > div > ul > li > a').addClass('text-decoration-none').prepend('<i class="fas fa-angles-right fa-xs me-1"></i>');

        $('.card-img-top > img').unwrap().addClass('card-img-top');

        $('.card').each(function(){
            $(this).find('.card-body > .card-img-top').prependTo(this);
        });

        $('.widget_recent_entries > ul > li').addClass('mb-3');

        $('#open-modal-constancia').attr({
            'data-bs-toggle' : 'modal',
            'data-bs-target' : '#video-tutorial-constancia'
        });
    
        $('#open-modal-jubilados').attr({
            'data-bs-toggle' : 'modal',
            'data-bs-target' : '#form-constancia-jubilados'
        });

        $('#open-modal-agenda').attr({
            'data-bs-toggle' : 'modal',
            'data-bs-target' : '#modal-agenda'
        });
    
        // Anula styling de separadores por defecto WP
        $('.wp-block-separator.has-alpha-channel-opacity').removeClass(['wp-block-separator','has-alpha-channel-opacity']);
    
        // Complemento de styling para aplicar FontAwesome a listas
        $('.fa-ul > li').prepend('<span class="fa-li"><i class="fa-solid fa-check"></i></span>');
    
        // Limpia clase base de TablePress para evitar que formatee los encabezados de tabla
        $('.tablepress').removeClass('tablepress');
    
        $('.table > thead').addClass('table-primary');
    
        $('.bg-dark h2 > a').addClass('link-light text-decoration-none');

        $('form#saldo-negativo-libre-deuda select').prop('disabled', true);
        $('form#saldo-negativo-libre-deuda #form-file').prop('disabled', true);

        $('form#saldo-negativo-libre-deuda #check-libre-deuda input').change(function () {
            if( $(this).is(':checked')) {
                $('form#saldo-negativo-libre-deuda select').prop('disabled', false);
            }
            else {
                $('form#saldo-negativo-libre-deuda select').prop('disabled', true);
            }
        });

        $('form#saldo-negativo-libre-deuda #check-pago input').change(function () {
            if( $(this).is(':checked')) {
                $('form#saldo-negativo-libre-deuda #form-file').prop('disabled', false);
            }
            else {
                $('form#saldo-negativo-libre-deuda #form-file').prop('disabled', true);
            }
        });

        $('a[href^="#"]:not(.nav-link)').click(function(event) {
            event.preventDefault(); // Evitar el comportamiento predeterminado del enlace
            
            var destino = $($(this).attr('href')); // Obtener el destino del enlace usando el atributo href

            var navbar_height = $('.fixed-top').outerHeight();
            
            if (destino.length) { // Verificar si existe el destino en la página
                var posicion = destino.offset().top - (navbar_height + 48); // Obtener la posición del destino y compensar 60px hacia arriba
                $('html, body').animate({ scrollTop: posicion }, 500); // Realizar el desplazamiento suave
            }
        });

        $('.pres-fact > .row').wrap('<a class="link-dark text-decoration-none" href="https://fopc.org.ar/presentacion-facturacion/"></a>');

        $('[name="motivo-libre-deuda"]').change(function() {
            var select = $(this).val();
            
            if (select === "Reingreso FOPC") {
              $("#alert-reingreso").modal("show");
            }
        });
    });

    function equalizeHeights(selector) {
        var heights = new Array();

        // Loop to get all element heights
        $(selector).each(function() {

            // Need to let sizes be whatever they want so no overflow on resize
            $(this).css('min-height', '0');
            $(this).css('max-height', 'none');
            $(this).css('height', 'auto');

            // Then add size (no units) to array
                heights.push($(this).height());
        });

        // Find max height of all elements
        var max = Math.max.apply( Math, heights );

        // Set all heights to max height
        $(selector).each(function() {
            $(this).css('height', max + 'px');
        });	
    }

    $(document).ready(function() {
        if($(window).width() > 992) {
            // Fix heights on page load
            equalizeHeights($('.equalize'));
        }
        else {
            $('.equalize').css('height','initial');
        }

        // Fix heights on window resize
        var iv = null;
        
        $(window).resize(function() {

            if(iv !== null) {
                window.clearTimeout(iv);
            }

            // Needs to be a timeout function so it doesn't fire every ms of resize
            iv = setTimeout(function() {
                if($(window).width() > 992) {
                    equalizeHeights($('.equalize'));
                }
                else {
                    $('.equalize').css('height','initial');
                }
            }, 120);
        });
    });

    $(document).ready(function(){
        var carousel_inc_aranc_front = new bootstrap.Carousel(document.getElementById('carousel-inc-aranc-front'));
        var carousel_nov_os_front = new bootstrap.Carousel(document.getElementById('carousel-nov-os-front'));
    });

    // Slick Carousel para presentar logos de Círculos y Obras Sociales
    $(document).ready(function(){
        $('.logo-carousel').slick({
            autoplay: true,
            autoplaySpeed: 1500,
            arrows: false,
            slidesToShow: 8,
            swipeToSlide: true,
            waitForAnimate: false,
            responsive: [
            {
                breakpoint: 1400,
                settings: {
                    slidesToShow: 8,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 7,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 6
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 4
                }
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 3
                }
            }]
        });

        $('.cpt-carousel').slick({
            autoplay: false,
            // autoplaySpeed: 5000,
            arrows: true,
            nextArrow: '<a href="#" class="fs-3 position-absolute top-50 end-0 me-n4"><i class="fa-solid fa-circle-chevron-right"></i></a>',
            prevArrow: '<a href="#" class="fs-3 position-absolute top-50 start-0 ms-n4"><i class="fa-solid fa-circle-chevron-left"></i></a>',
            slidesToShow: 5,
            swipeToSlide: true,
            waitForAnimate: false,
            responsive: [{
                breakpoint: 1400,
                settings: {
                    slidesToShow: 5,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 3
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2
                }
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 1
                }
            }]
        });

        $('.sponsors-carousel').slick({
            centerMode: true,
            infinite: true,
            slidesToScroll: 3,
            slidesToShow: 10,
            swipeToSlide: true,
            variableWidth: true,
            responsive: [{
                breakpoint: 1400,
                settings: {
                    slidesToShow: 9
                }
            },
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 8,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 6
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 2
                }
            }]
        });
    });

    $(document).ready(function(){
        $(".owl-carousel#hero-carousel").owlCarousel({
            loop: true,
            nav: true,
            items: 1,
            navText: ['<i class="fa-solid fa-chevron-left"></i>','<i class="fa-solid fa-chevron-right"></i>'],
            dots: false
        });
    });
}); // jQuery End