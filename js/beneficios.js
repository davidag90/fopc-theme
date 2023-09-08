jQuery(function ($) {
    $(document).ready(function(){
        // Filtro de convenios
        var slug_rubro;

        $('#resumen-rubros > .filtro-rubro').click(function() {
            $('#resumen-rubros > .filtro-rubro').removeClass('active');
            
            $(this).addClass('active');
            
            slug_rubro = $(this).attr('id');

            if (slug_rubro != 'todos') {
                $('#beneficios > div.row > div').not('.'+slug_rubro).fadeOut();

                $('.'+slug_rubro).fadeIn();
            }

            else {
                $('#beneficios > div.row > div').fadeIn();
            }
        });
    });
});