jQuery(function($) {
  $(document).ready(function () {
    // Capturar el evento 'input' del input de texto
    $("#terminos-filtro").on("input", function () {
      var textoFiltro = $(this).val().toLowerCase(); // Obtener el valor del input y convertirlo a minúsculas
  
      // Filtrar los elementos div en base al texto introducido
      $("#resumen-convenios .col").each(function () {
        var textoElemento = $(this).text().toLowerCase(); // Obtener el texto del elemento y convertirlo a minúsculas
  
        // Mostrar u ocultar el elemento según el filtro
        if (textoElemento.indexOf(textoFiltro) !== -1) {
          $(this).fadeIn();
        } else {
          $(this).fadeOut();
        }
      });
    });

    $('#filtra-todos').on('click', function() {
      $(this).removeClass('opacity-50');
      
      if (! $('#filtra-inactivos').hasClass('opacity-50')) {
        $('#filtra-inactivos').addClass('opacity-50');
      }
      
      if (! $('#filtra-activos').hasClass('opacity-50')) {
        $('#filtra-activos').addClass('opacity-50');
      }

      $('.convenio').each(function(){
        var estado_display = $(this).css('display');

        if(estado_display == 'none') {
          $(this).fadeIn();
        }
      });
    });

    $('#filtra-activos').on('click', function() {
      $(this).removeClass('opacity-50');
      
      if (! $('#filtra-inactivos').hasClass('opacity-50')) {
        $('#filtra-inactivos').addClass('opacity-50');
      }

      if (! $('#filtra-todos').hasClass('opacity-50')) {
        $('#filtra-todos').addClass('opacity-50');
      }

      $('.activo').each(function(){
        var estado_display = $(this).css('display');

        if(estado_display == 'none') {
          $(this).fadeIn();
        }
      });

      $('.inactivo').each(function(){
        var estado_display = $(this).css('display');

        if(estado_display != 'none') {
          $(this).fadeOut();
        }
      });
    });
    
    $('#filtra-inactivos').on('click', function() {
      $(this).removeClass('opacity-50');
      
      if (! $('#filtra-activos').hasClass('opacity-50')) {
        $('#filtra-activos').addClass('opacity-50');
      }

      if (! $('#filtra-todos').hasClass('opacity-50')) {
        $('#filtra-todos').addClass('opacity-50');
      }

      $('.inactivo').each(function(){
        var estado_display = $(this).css('display');

        if(estado_display == 'none') {
          $(this).fadeIn();
        }
      });

      $('.activo').each(function(){
        var estado_display = $(this).css('display');

        if(estado_display != 'none') {
          $(this).fadeOut();
        }
      });
    });
  });
});