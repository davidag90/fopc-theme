jQuery(function($) {
  $(document).ready(function () {
    // Capturar el evento 'input' del input de texto
    $("#terminos-filtro").on("input", function () {
      var textoFiltro = $(this).val().toLowerCase(); // Obtener el valor del input y convertirlo a minúsculas
  
      // Filtrar los elementos div en base al texto introducido
      $('#tablepress-5 > tbody > tr').each(function () {
        var textoElemento = $(this).text().toLowerCase(); // Obtener el texto del elemento y convertirlo a minúsculas
  
        // Mostrar u ocultar el elemento según el filtro
        if (textoElemento.indexOf(textoFiltro) !== -1) {
          $(this).fadeIn();
        } else {
          $(this).fadeOut();
        }
      });
    });
  });
});