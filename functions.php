<?php

// style and scripts
add_action('wp_enqueue_scripts', 'bootscore_child_enqueue_styles');
function bootscore_child_enqueue_styles()
{

  // Compiled main.css
  $modified_bootscoreChildCss = date('YmdHi', filemtime(get_stylesheet_directory() . '/css/main.css'));
  wp_enqueue_style('main', get_stylesheet_directory_uri() . '/assets/css/main.css', array('parent-style'), $modified_bootscoreChildCss);

  // style.css
  wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');

  // Slick Carousel CSS
  wp_enqueue_style('slick', get_stylesheet_directory_uri() . '/css/slick/slick.css', array());
  wp_enqueue_style('slick-theme', get_stylesheet_directory_uri() . '/css/slick/slick-theme.css', array('slick'));

  // Owl Carousel CSS
  wp_enqueue_style('owl-carousel', get_stylesheet_directory_uri() . '/css/owl-carousel/owl.carousel.min.css', array());
  wp_enqueue_style('owl-carousel-theme', get_stylesheet_directory_uri() . '/css/owl-carousel/owl.theme.default.min.css', array('owl-carousel'));

  // Font de iconos personalizados
  wp_enqueue_style('fopc-font', get_stylesheet_directory_uri() . '/assets/fonts/fopc-font/css/fopc-font.css', array());

  // Slick Carousel JS
  wp_enqueue_script('slick', get_stylesheet_directory_uri() . '/assets/js/slick.min.js', array('jquery'), '', true);

  // Owl Carousel JS
  wp_enqueue_script('owl-carousel', get_stylesheet_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), '', true);

  // custom.js
  // Get modification time. Enqueue file with modification date to prevent browser from loading cached scripts when file content changes. 
  $modificated_CustomJS = date('YmdHi', filemtime(get_stylesheet_directory() . '/assets/js/custom.js'));
  wp_enqueue_script('custom-js', get_stylesheet_directory_uri() . '/assets/js/custom.js', array('jquery'), $modificated_CustomJS, false, true);

  // Manipulación de Accesos Rápidos en Front-Page y Animaciones CSS
  if (is_front_page()):
    wp_enqueue_script('front-page-js', get_stylesheet_directory_uri() . '/assets/js/front-page.js', array(), '', true);
    wp_enqueue_style('front-page-js', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css', array());
  endif;

  // Filtro Beneficios
  if (is_page('beneficios')):
    wp_enqueue_script('beneficios', get_stylesheet_directory_uri() . '/assets/js/beneficios.js', array('jquery'), '', true);
  endif;

  if (is_page('estado-convenios')):
    wp_enqueue_script('searchbox-convenios', get_stylesheet_directory_uri() . '/assets/js/convenios.js', array('jquery'), '', true);
  endif;

  if (is_page(array('prestamos', 'subsidios', 'alta-baja-fopc', 'auditoria-apross'))):
    wp_enqueue_script('fopc-tabs', get_stylesheet_directory_uri() . '/assets/js/tabs.js', array('bootstrap'), '', true);
  endif;

  if (is_page('ultimo-mes-abonado')):
    wp_enqueue_script('ultimo-mes', get_stylesheet_directory_uri() . '/assets/js/ultimo-mes.js', array('jquery'), '', true);
  endif;
}

/**
 * Header container class
 */
function change_header_container($string, $location)
{
  return ($location == "header") ? "container-fluid" : $string;
}

add_filter('bootscore/class/container', 'change_header_container', 10, 2);

// Alert para páginas de imprenta
function cookie_alert_imprenta()
{
  if (is_woocommerce() && !isset($_COOKIE['alert_imprenta'])) {
    setcookie('alert_imprenta', 'true', time() + 604800, '/');
  }
}

add_action('wp', 'cookie_alert_imprenta');

// Custom Sidebars
if (!function_exists('custom_sidebars_init')) :
  function custom_sidebars_init()
  {
    register_sidebar(array(
      'name'          => esc_html__('Sidebar Novedades OS', 'bootscore'),
      'id'            => 'sidebar-nos',
      'description'   => 'Widgets de archivo Novedades Obras Sociales.',
      'before_widget' => '<section id="%1$s" class="widget %2$s card card-body mb-4 text-bg-primary border-0">',
      'after_widget'  => '</section>',
      'before_title'  => '<h2 class="h3 widget-title card-title py-2">',
      'after_title'   => '</h2>',
    ));

    register_sidebar(array(
      'name'          => esc_html__('Sidebar DIPE', 'bootscore'),
      'id'            => 'sidebar-dipe',
      'description'   => 'Widgets para páginas del DIPE',
      'before_widget' => '<section id="%1$s" class="widget %2$s card card-body mb-4 text-bg-primary border-0">',
      'after_widget'  => '</section>',
      'before_title'  => '<h2 class="h3 widget-title card-title py-2">',
      'after_title'   => '</h2>',
    ));

    register_sidebar(array(
      'name'          => esc_html__('Sidebar DASO', 'bootscore'),
      'id'            => 'sidebar-daso',
      'description'   => 'Widgets para páginas del DASO',
      'before_widget' => '<section id="%1$s" class="widget %2$s card card-body mb-4 text-bg-primary border-0">',
      'after_widget'  => '</section>',
      'before_title'  => '<h2 class="h3 widget-title card-title py-2">',
      'after_title'   => '</h2>',
    ));

    register_sidebar(array(
      'name'          => esc_html__('Sidebar FOPC', 'bootscore'),
      'id'            => 'sidebar-fopc',
      'description'   => 'Widgets para páginas base del FOPC',
      'before_widget' => '<section id="%1$s" class="widget %2$s card card-body mb-4 text-bg-primary border-0">',
      'after_widget'  => '</section>',
      'before_title'  => '<h2 class="h3 widget-title card-title py-2">',
      'after_title'   => '</h2>',
    ));

    register_sidebar(array(
      'name'          => esc_html__('Sidebar DES', 'bootscore'),
      'id'            => 'sidebar-des',
      'description'   => 'Widgets para páginas base del DES',
      'before_widget' => '<section id="%1$s" class="widget %2$s card card-body mb-4 text-bg-primary border-0">',
      'after_widget'  => '</section>',
      'before_title'  => '<h2 class="h3 widget-title card-title py-2">',
      'after_title'   => '</h2>',
    ));

    register_sidebar(array(
      'name'          => esc_html__('Sidebar Obras Sociales', 'bootscore'),
      'id'            => 'sidebar-obras-sociales',
      'description'   => 'Widgets para páginas base de Obras Sociales',
      'before_widget' => '<section id="%1$s" class="widget %2$s card card-body mb-4 text-bg-primary border-0">',
      'after_widget'  => '</section>',
      'before_title'  => '<h2 class="h3 widget-title card-title py-2">',
      'after_title'   => '</h2>',
    ));

    register_sidebar(array(
      'name'          => 'Barra lateral Custom',
      'id'            => 'sidebar-custom',
      'description'   => esc_html__('Add widgets here.', 'bootscore'),
      'before_widget' => '<section id="%1$s" class="widget %2$s card card-body mb-4 text-bg-primary border-0">',
      'after_widget'  => '</section>',
      'before_title'  => '<h2 class="widget-title card-title py-2">',
      'after_title'   => '</h2>',
    ));

    register_sidebar(array(
      'name'          => 'Pedidos de Imprenta',
      'id'            => 'sidebar-imprenta',
      'description'   => esc_html__('Add widgets here.', 'bootscore'),
      'before_widget' => '<section id="%1$s" class="widget %2$s card card-body mb-4 text-bg-primary border-0">',
      'after_widget'  => '</section>',
      'before_title'  => '<h2 class="widget-title card-title py-2">',
      'after_title'   => '</h2>',
    ));

    // Sidebar End
  }

endif;

add_action('widgets_init', 'custom_sidebars_init', 10, 3);

// Custom Widgets
if (!function_exists('custom_widgets_init')) :

  function custom_widgets_init()
  {
    // Top Nav
    register_sidebar(array(
      'name'          => esc_html__('Top Nav', 'bootscore'),
      'id'            => 'top-nav',
      'description'   => esc_html__('Add widgets here.', 'bootscore'),
      'before_widget' => '<div class="ms-1">',
      'after_widget'  => '</div>',
      'before_title'  => '<div class="widget-title d-none">',
      'after_title'   => '</div>'
    ));
    // Top Nav End
  }
endif;

add_action('widgets_init', 'custom_widgets_init', 11);

// Register and init custom menus
if (!function_exists('custom_menus_init')):
  function custom_menus_init()
  {
    register_nav_menus(array(
      'archivo-nos'            => 'Archivo Novedades OS',
      'sidebar-dipe'           => 'Sidebar DIPE',
      'sidebar-daso'           => 'Sidebar DASO',
      'sidebar-fopc'           => 'Sidebar FOPC',
      'sidebar-obras-sociales' => 'Sidebar Obras Sociales'
    ));
  }
endif;

add_action('after_setup_theme', 'custom_menus_init');

// ------------
// Agrega clase "list-group-item" a los tags <li> de los menues en sidebar para matchear clase "list-group" del tag <ul>
// ------------
function custom_menu_widget_class($classes, $item, $args)
{
  if (
    $args->theme_location === 'archivo-nos' ||
    $args->theme_location === 'sidebar-dipe' ||
    $args->theme_location === 'sidebar-daso' ||
    $args->theme_location === 'sidebar-fopc' ||
    $args->theme_location === 'sidebar-obras-sociales'
  ):
    $classes[] = 'list-group-item bg-transparent';
  endif;

  return $classes;
}

add_filter('nav_menu_css_class', 'custom_menu_widget_class', 10, 4);

// ------------
// Agrega clase "link-light" a los tags <a> dentro de los <li> de los menues sidebar para matchear la clase bg-dark del widget
// ------------
function custom_menu_widget_a_class($atts, $item, $args)
{

  // Revisa el punto de inserción de los menúes para verificar que sean sidebar
  if (
    $args->theme_location === 'archivo-nos' ||
    $args->theme_location === 'sidebar-dipe' ||
    $args->theme_location === 'sidebar-daso' ||
    $args->theme_location === 'sidebar-fopc' ||
    $args->theme_location === 'sidebar-obras-sociales'
  ):
    $atts['class'] = 'link-light';
  endif;

  return $atts;
}

add_filter('nav_menu_link_attributes', 'custom_menu_widget_a_class', 10, 3);

// ------------
// Shortcode para presentacion de custom-post-types
// ------------
function loop_custom_post_type($atts)
{
  ob_start();

  extract(shortcode_atts(array(
    'type' => 'post'
  ), $atts));

  $args = array(
    'post_type' => $type,
    'posts_per_page' => 5,
    'order' => 'DESC'
  );

  $query = new WP_Query($args);

  if ($query->have_posts()) {
    $counter = 1;

    $last_post = $query->post_count;

    echo '<div id="novedades-os-front" class="equalize pt-2">';

    while ($query->have_posts()) {
      $query->the_post();

      $terms = get_the_terms(get_the_ID(), 'obras-sociales');

      $obras_sociales = [];

      foreach ($terms as $term) {
        array_push($obras_sociales, $term->name);
      }

      $obra_social = join(', ', $obras_sociales);

      if ($counter != $last_post):
        echo '<div class="pb-3 mb-3 border-bottom border-secondary">';
      else:
        echo '<div>';
      endif;
      echo '<a href="' . get_permalink() . '" target="_blank" rel="noopener" class="text-decoration-none link-dark">';
      echo '<div class="novedad-title mb-0"><span class="opacity-75 d-block d-lg-inline-block mb-1 mb-lg-0 me-lg-2 fw-normal">' . get_the_date() . '</span><h3 class="d-lg-inline-block mb-1 mb-lg-0 h5">' . $obra_social . '</h3></div>';
      echo '<p class="mb-0">' . get_the_title() . '</p>';
      echo '</a>';
      echo '</div>'; // </col>

      $counter++;
    }

    echo '</div>'; // </novedades-os-front>
    wp_reset_postdata(); // Restablece los datos del post original
  } else {
    echo '<p>No se encontró contenido de esta sección.</p>';
  }

  $output = ob_get_clean();

  return $output;
}

add_shortcode('show-cpt-posts', 'loop_custom_post_type');


// ------------
// Shortcode para presentación de últimos 10 incrementos de aranceles
// ------------
function loop_incremento_aranceles($atts)
{
  ob_start();

  $atts = shortcode_atts(array(
    'anio'    => strval(date('Y')),
    'nromes'  => strval(date('m'))
  ), $atts);

  $args = array(
    'post_type'       => 'incrementos',
    'nopaging'        => true,
    'order'           => 'DESC',
    'meta_query'     => array(
      array(
        'key'     => 'fecha_vigencia',
        'value'   => $atts['anio'] . $atts['nromes'],
        'compare' => 'LIKE'
      )
    )
  );

  $query = new WP_Query($args);

  if ($query->have_posts()) {
    echo '<table class="table table-striped">';
    echo '<thead>';
    echo '<tr>';
    echo '<th scope="col">Obra Social</th>';
    echo '<th scope="col">Publicación</th>';
    echo '<th scope="col">Vigencia</th>';
    echo '</tr>';
    echo '<thead>';
    echo '<tbody class="table-group-divider">';

    while ($query->have_posts()) {
      $query->the_post();

      $terms = get_the_terms(get_the_ID(), 'obras-sociales');

      $obras_sociales = [];

      foreach ($terms as $term) {
        array_push($obras_sociales, $term->name);
      }

      $obra_social = join(', ', $obras_sociales);
      $fecha_publicacion = get_the_date('d/m/Y');
      $fecha_vigencia = get_field('fecha_vigencia');
      $detalle_os = get_field('detalle-os');

      echo '<tr>';
      echo '<td>' . $obra_social . '<small class="ms-1 opacity-75">' . $detalle_os . '</small></td>';
      echo '<td>' . $fecha_publicacion . '</td>';
      echo '<td>' . $fecha_vigencia . '</td>';
      echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';

    wp_reset_postdata(); // Restablece los datos del post original
  } else {
    echo '<p>No se encontró contenido de esta sección.</p>';
  }

  $output = ob_get_clean();

  return $output;
}

add_shortcode('incremento-aranceles', 'loop_incremento_aranceles');

// ============
// Shortcode para display de incrementos en front-page
// ============
function loop_incremento_aranceles_front()
{
  ob_start();

  // Argumentos para front-page
  $args = array(
    'post_type'       => 'incrementos',
    'posts_per_page'  => 10,
    'order'           => 'DESC',
  );

  $query = new WP_Query($args);

  if ($query->have_posts()) {
    echo '<div id="incremento-aranceles-front" class="equalize">';

    $counter = 0;

    while ($query->have_posts()) {
      $query->the_post();

      $terms = get_the_terms(get_the_ID(), 'obras-sociales');

      $obras_sociales = [];

      foreach ($terms as $term) {
        array_push($obras_sociales, $term->name);
      }

      $obra_social = join(', ', $obras_sociales);
      $fecha_publicacion = get_the_date('d/m/Y');
      $fecha_vigencia = get_field('fecha_vigencia');
      $detalle_os = get_field('detalle-os');

      if ($counter == 0) {
        echo '<div id="carousel-inc-aranc-front" class="carousel slide">';
        echo '<div class="carousel-inner">';
        echo '<div class="carousel-item active">';
      }

      if ($counter == 5) {
        echo '<div class="carousel-item">';
      }

      echo '<div class="d-flex flex-column flex-md-row align-items-center border border-light rounded mb-3 overflow-hidden text-center text-md-start bg-primary bg-gradient">';
      echo '<div class="col-12 col-md-5 px-3 py-2 h-100 bg-light bg-opacity-25 text-light">';
      echo '<div class="vigencia w-100"><strong>Vigencia</strong> ' . $fecha_vigencia . '</div>';
      echo '<div class="fecha-publicacion w-100"><strong>Publicado</strong> ' . $fecha_publicacion . '</div>';
      echo '</div>'; // </col-5>
      echo '<div class="col-12 col-md-7 px-3 py-2 h-100 text-light">';
      echo '<div class="obra-social w-100">';
      echo '<h3 class="h6 m-0">' . $obra_social . '</h3>';
      if (!empty($detalle_os)): // Dato no obligatorio, chequea que esté antes de escribir la <p> correspondiente
        echo '<p class="detalle-os m-0">
        ' . $detalle_os . '</p>';
      endif;
      echo '</div>'; // </obra-social>
      echo '</div>'; // </col-7>
      echo '</div>'; // </d-flex>

      if ($counter == 4) {
        echo '</div>'; // .carousel-item.active
      }

      if ($counter == 9) {
        echo '</div>'; // .carousel-item
        echo '</div>'; // .carousel-inner
        echo '</div>'; // .carousel-slide

        // Carousel controles
        echo '<button class="carousel-control-prev" type="button" data-bs-target="#carousel-inc-aranc-front" data-bs-slide="prev">';
        echo '<i class="fa-solid fa-circle-chevron-left fa-2x"></i>';
        echo '<span class="visually-hidden">Anterior</span>';
        echo '</button>';
        echo '<button class="carousel-control-next" type="button" data-bs-target="#carousel-inc-aranc-front" data-bs-slide="next">';
        echo '<i class="fa-solid fa-circle-chevron-right fa-2x"></i>';
        echo '<span class="visually-hidden">Siguiente</span>';
        echo '</button>';
        // /Carousel controles
      }

      $counter++;
    }

    echo '</div>'; // </#incremento-aranceles-front>

    wp_reset_postdata(); // Restablece los datos del post original
  } else {
    echo '<p>No se encontró contenido de esta sección.</p>';
  }

  $output = ob_get_clean();

  return $output;
}

add_shortcode('incremento-aranceles-front', 'loop_incremento_aranceles_front');

// ------------
// Shortcode para presentacion de Novedades OS en front-page
// ------------
function loop_novedades_os_front()
{
  ob_start();

  $args = array(
    'post_type' => 'novedades-os',
    'posts_per_page' => 10,
    'order' => 'DESC'
  );

  $query = new WP_Query($args);

  if ($query->have_posts()) {
    $counter = 0;

    $last_post = $query->post_count;

    $last_post = $last_post - 1;

    echo '<div id="novedades-os-front" class="equalize pt-2">';

    while ($query->have_posts()) {
      $query->the_post();

      $terms = wp_get_post_terms(get_the_ID(), 'obras-sociales');

      $obras_sociales = [];

      if (! empty($terms)) {
        foreach ($terms as $term) {
          array_push($obras_sociales, $term->name);
        }

        $obra_social = join(', ', $obras_sociales);
      } else {
        $obra_social = '';
      }

      if ($counter == 0) {
        echo '<div id="carousel-nov-os-front" class="carousel slide">';
        echo '<div class="carousel-inner">';
        echo '<div class="carousel-item active">';
      }

      if ($counter == 5) {
        echo '<div class="carousel-item">';
      }

      echo '<div class="pb-3 mb-3 border-bottom border-secondary">';
      echo '<a href="' . get_permalink() . '" target="_blank" rel="noopener" class="text-decoration-none link-dark">';
      echo '<div class="novedad-title mb-0"><span class="opacity-75 d-block d-lg-inline-block mb-1 mb-lg-0 me-lg-2 fw-normal">' . get_the_date() . '</span><h3 class="d-lg-inline-block mb-1 mb-lg-0 h5">' . $obra_social . '</h3></div>';
      echo '<p class="mb-0">' . get_the_title() . '</p>';
      echo '</a>';
      echo '</div>';

      if ($counter == 4) {
        echo '</div>'; // .carousel-item.active
      }

      if ($counter == 9) {
        echo '</div>'; // .carousel-item
        echo '</div>'; // .carousel-inner
        echo '</div>'; // .carousel-slide

        // Carousel controles
        echo '<button class="carousel-control-prev" type="button" data-bs-target="#carousel-nov-os-front" data-bs-slide="prev">';
        echo '<i class="fa-solid fa-circle-chevron-left fa-2x"></i>';
        echo '<span class="visually-hidden">Anterior</span>';
        echo '</button>';
        echo '<button class="carousel-control-next" type="button" data-bs-target="#carousel-nov-os-front" data-bs-slide="next">';
        echo '<i class="fa-solid fa-circle-chevron-right fa-2x"></i>';
        echo '<span class="visually-hidden">Siguiente</span>';
        echo '</button>';
        // /Carousel controles
      }

      $counter++;
    }

    echo '</div>'; // </novedades-os-front>
    wp_reset_postdata(); // Restablece los datos del post original
  } else {
    echo '<p>No se encontró contenido de esta sección.</p>';
  }

  $output = ob_get_clean();

  return $output;
}

add_shortcode('novedades-os-front', 'loop_novedades_os_front');

// ------------
// Shortcode para presentacion de Circulos Odontologicos
// ------------
function loop_circulos_odontologicos()
{
  ob_start();

  $args = array(
    'post_type' => 'circulos',
    'meta_key'  => 'id_circulo',
    'orderby'   => 'meta_value_num',
    'order'     => 'ASC',
    'nopaging'  => true
  );

  $query = new WP_Query($args);

  if ($query->have_posts()) {
    echo '<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4">';

    while ($query->have_posts()) {
      $query->the_post();

      $id_circulo = get_field('id_circulo');
      $nombre = get_the_title();
      $logo = get_field('logo');
      $website = get_field('website');
      $presidente = get_field('presidente');
      $direccion = get_field('direccion');
      $telefono = get_field('telefono');
      $whatsapp = get_field('whatsapp');
      $email = get_field('email');
      $jurisdiccion = get_field('jurisdiccion');

      echo '<div class="col mb-5">';
      echo '<div class="card h-100 border-0 mb-3">';

      if (! empty($website)): // Chequea que haya un website cargado y encierra el logo en un <a> apuntado al mismo
        echo '<a href="' . $website . '" target="_blank"><img class="card-img-top px-5 pb-3" src="' . $logo . '"></a>';
      else:
        echo '<img class="card-img-top px-5 pb-3" src="' . $logo . '">'; // Escribe solo el logo sin link
      endif;

      echo '<div class="card-body d-flex flex-column align-items-start">';
      echo '<h5 class="card-title">' . $id_circulo . ' - ' . $nombre . '</h5>';

      if (! empty($website)): // Chequea que haya un website cargado
        echo '<p class="card-text"><a href="' . $website . '">' . $website . '</a></p>';
      endif;

      echo '<p class="card-text"><strong>Presidente</strong> ' . $presidente . '</p>';
      echo '<p class="card-text"><i class="fas fa-home fa-fw"></i> ' . $direccion . '</p>';

      if (! empty($telefono)): // Chequea que haya un teléfono cargado
        echo '<p class="card-text"><i class="fas fa-phone-square fa-fw"></i> ' . $telefono . '</p>';
      endif;

      if (! empty($whatsapp)): // Chequea que haya un Whatsapp cargado
        echo '<p class="card-text"><i class="fab fa-whatsapp fa-fw"></i> <a href="https://wa.me/' . $whatsapp . '" target="_blank">' . $whatsapp . '</a></p>';
      endif;

      echo '<p class="card-text"><i class="fas fa-at fa-fw"></i> <a href="mailto:' . $email . '" target="_blank">' . $email . '</a></p>';
      echo '<p><button class="btn btn-outline-dark" type="button" data-bs-toggle="collapse" data-bs-target="#jurisdiccion-' . $id_circulo . '" aria-expanded="false" aria-controls="jurisdiccion-' . $id_circulo . '">Ver jurisdicción <i class="fas fa-caret-down"></i></button></p>';
      echo '<p class="card-text collapse" id="jurisdiccion-' . $id_circulo . '">' . $jurisdiccion . '</p>';
      echo '</div>'; // .card-body
      echo '</div>'; // .card.h100
      echo '</div>'; // .col.mb-4
    }

    echo '</div>'; // .row

    wp_reset_postdata(); // Restablece los datos del post original
  } else {
    echo '<p>No se encontró contenido de esta sección.</p>';
  }

  $output = ob_get_clean();

  return $output;
}

add_shortcode('circulos-odontologicos', 'loop_circulos_odontologicos');

// ----------
// Personalización de columnas en lista de Incrementos
// ----------
function incrementos_posts_columns($columns)
{
  // Retira las columnas por defecto de autor y título
  unset(
    $columns['author'],
    $columns['title'],
  );

  // Crea las nuevas columnas para agregar en la lista de posts cpt
  $new_columns = array(
    'cb'              => $columns['cb'],
    'obras_sociales'  => 'Obras Sociales',
    'date'            => $columns['date'],
    'fecha_vigencia'  => 'Entrada en Vigencia',
  );

  return array_merge($new_columns);
}

add_filter('manage_incrementos_posts_columns', 'incrementos_posts_columns');

// ----------
// Columnas personalizadas para custom-post-types en área administrativa
// ----------
function incrementos_posts_custom_column($column, $post_id)
{
  switch ($column) {
    case 'obras_sociales':
      $terms = get_the_terms($post_id, 'obras-sociales');

      $terms_proc = [];

      foreach ($terms as $term) {
        array_push($terms_proc, $term->name);
      }

      $obras_sociales = join(', ', $terms_proc);

      echo '<a class="row-title" href="' . get_permalink() . '">' . $obras_sociales . '</a>';
      break;

    case 'fecha_vigencia':
      echo get_field('fecha_vigencia', $post_id);
      break;
  }
}

add_action("manage_incrementos_posts_custom_column", 'incrementos_posts_custom_column', 10, 2);

// ----------
// Hacer las columnas personalizadas ordenables en la lista de posts de "incrementos"
// ----------
function incrementos_sortable_columns($columns)
{
  $columns['obras_sociales'] = 'obras_sociales';
  $columns['fecha_vigencia'] = 'fecha_vigencia';

  return $columns;
}

add_filter('manage_edit-incrementos_sortable_columns', 'incrementos_sortable_columns');

// ----------
// Agrega clase con slug de pagina a body-class
// ----------
function add_slug_body_class($classes)
{
  global $post;

  if (isset($post)) {
    $classes[] = $post->post_type . '-' . $post->post_name;
  }

  return $classes;
}

add_filter('body_class', 'add_slug_body_class');


/**
 * Shortcode para visualizacion de Cursos y Congresos
 */
function loop_cursos_congresos()
{
  ob_start();

  $args = array(
    'post_type' => 'curso'
  );

  $query = new WP_Query($args);

  if ($query->have_posts()) {
    echo '<div id="cursos-congresos">';

    while ($query->have_posts()) {
      $query->the_post();

      $fecha_evento = get_post_field('fecha_evento');
      $organizador = get_post_field('organizador');
      $mas_info = get_the_permalink();
      $contacto = get_post_field('contacto');
      $thumbnail = get_the_post_thumbnail_url();

      echo '<div class="curso">';
      echo '<a href="' . $thumbnail . '" class="d-block"><img src="' . $thumbnail . '" class="h-100"></a>';
      echo '<div class="desc-curso">';
      echo '<h2 class="h5">' . get_the_title() . '</h2>';
      echo '<p><strong>Inicia:</strong> ' . $fecha_evento . '</p>';
      echo '<p><strong>Organiza:</strong> ' . $organizador . '</p>';
      echo '<p><strong>Contacto:</strong> ' . $contacto . '</p>';
      if (!empty($mas_info)):
        echo '<div><a href="' . $mas_info . '" class="btn btn-primary">Más información</a></div>';
      endif;
      echo '</div>'; // .desc-curso
      echo '</div>'; // .curso
    }

    echo '</div>'; // #cursos-congresos

    wp_reset_postdata(); // Restablece los datos del post original
  } else {
    echo '<p>No se encontró contenido de esta sección.</p>';
  }

  $output = ob_get_clean();

  return $output;
}

add_shortcode('cursos-congresos', 'loop_cursos_congresos');

// ------------
// Shortcode para searchbox de Convenios
// ------------
function init_searchbox_convenios()
{
  ob_start();

  echo '<div id="searchbox-convenios" class="row g-3 align-items-center mb-4">';
  echo '<div class="col-auto">';
  echo '<label for="terminos-filtro" class="col-form-label">Filtrar convenios:</label>';
  echo '</div>'; // .col-auto
  echo '<div class="col-auto">';
  echo '<input type="text" class="form-control" id="terminos-filtro">';
  echo '</div>'; // .col-auto
  echo '<div class="col-auto">';
  echo '<button class="btn btn-primary me-2" id="filtra-todos">Todos</button>';
  echo '<button class="btn btn-info opacity-50" id="filtra-faconline">Factura Online</button>';
  echo '</div>'; // .col-auto
  echo '</div>'; // #searchbox-convenios.row

  $output = ob_get_clean();

  return $output;
}

add_shortcode('searchbox-convenios', 'init_searchbox_convenios');

// ------------
// Shortcode para searchbox de Último mes
// ------------
function init_searchbox_ultimo_mes()
{
  ob_start();

  echo '<div class="row pb-4"><div class="col-12 col-md-6">';
  echo '<div class="input-group" id="searchbox-ultimo-mes">';
  echo '<span class="input-group-text">Buscar:</span>';
  echo '<input type="text" class="form-control" id="terminos-filtro">';
  echo '</div>'; // .input-group
  echo '</div></div>'; // .col/.row

  $output = ob_get_clean();

  return $output;
}

add_shortcode('searchbox-ultimo-mes', 'init_searchbox_ultimo_mes');

// ------------
// Shortcode para presentacion de convenios vigentes
// ------------
function loop_convenios_vigentes()
{
  ob_start();

  $args = array(
    'post_type' => 'convenio',
    'nopaging'  => true,
    'order'     => 'ASC',
    'orderby'   => 'title',
    'meta_query' => array(
      array(
        'key'     => 'situacion',
        'value'   => 'activo',
        'compare' => '='
      )
    )
  );

  $query = new WP_Query($args);

  if ($query->have_posts()) {
    echo '<div id="resumen-convenios" class="row row-cols-1 row-cols-lg-2">';

    while ($query->have_posts()) {
      $query->the_post();

      $sigla = get_the_title();
      $logotipo = get_the_post_thumbnail_url();
      $desc = get_post_field('descripcion');
      $numero = get_post_field('numero');
      $situacion = get_post_field('situacion');
      $detalle = get_post_field('detalle_situacion');
      $factura_online = get_post_field('facturacion_online');

      echo ($situacion == "activo" && $factura_online == "activa") ? '<div class="col convenio activo fac-online">' : '<div class="col convenio activo">';

      echo '<div class="card mb-4 overflow-hidden">';
      echo '<div class="row g-0">';
      echo '<div class="col-4 bg-white">';
      echo '<img src="' . $logotipo . '" class="img-fluid rounded-start p-4">';
      echo '</div>'; // .col-sm-4
      echo '<div class="col-8 border-start bg-light">';
      echo '<div class="card-body">';
      echo '<h3 class="card-title h6">' . $sigla . '</h3>';
      echo '<p class="card-text">' . $desc . ' (' . $numero . ')</p>';
      if ($situacion == "activo"):
        echo '<p class="card-text text-success text-uppercase"><strong>ACTIVO</strong></p>';
      else:
        echo '<p class="card-text text-danger text-uppercase mb-0"><strong>INACTIVO</strong></p>';
        echo '<p class="card-text"><small>' . $detalle . '</small></p>';
      endif;
      if ($factura_online == "activa"):
        echo '<p class="card-text bg-info-subtle p-2 border border-info rounded text-dark"><i class="fas fa-check mr-1"></i> Facturación online habilitada</p>';
      endif;
      echo '</div>'; // .card-body
      echo '</div>'; // .col-sm-8
      echo '</div>'; // .row
      echo '</div>'; // .card
      echo '</div>'; // .col
    }

    wp_reset_postdata(); // Restablece los datos del post original

    echo '</div>'; // .row.row-cols-1.row-cols-md-2.row-cols-xl-3
  } else {
    echo '<p>No se encontró contenido de esta sección.</p>';
  }

  $output = ob_get_clean();

  return $output;
}

add_shortcode('convenios-vigentes', 'loop_convenios_vigentes');

// ------------
// Shortcode para listado de convenios vigentes
// ------------
function loop_listado_convenios()
{
  ob_start();

  $args = array(
    'post_type' => 'convenio',
    'nopaging'  => true,
    'order'     => 'ASC',
    'orderby'   => 'title'
  );

  $query = new WP_Query($args);

  if ($query->have_posts()) {
    echo '<table class="table">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>Obra Social</th>';
    echo '<th>Código</th>';
    echo '<th>Estado</th>';
    echo '<th>Fact Online</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    while ($query->have_posts()):
      $query->the_post();
      $sigla = get_the_title();
      $logotipo = get_the_post_thumbnail_url();
      $desc = get_post_field('descripcion');
      $numero = get_post_field('numero');
      $situacion = get_post_field('situacion');
      $factura_online = get_post_field('facturacion_online');

      echo '<tr>';
      echo '<td>' . $sigla . '<br><small>' . $desc . '</small></td>';
      echo '<td>' . $numero . '</td>';
      echo '<td>' . $situacion . '</td>';
      echo '<td>' . ($factura_online == 'activa' ? 'SI' : 'NO') . '</td>';
      echo '</tr>';
    endwhile;

    echo '</tbody>';
    echo '</table>'; // .table

    wp_reset_postdata(); // Restablece los datos del post original
  } else {
    echo '<p>No se encontró contenido de esta sección.</p>';
  }

  $output = ob_get_clean();

  return $output;
}

add_shortcode('listado-convenios', 'loop_listado_convenios');

//================//
// Shortcode de carousel logos obras sociales
//================//
function carousel_obras_sociales_init()
{
  ob_start();

  $directorio = get_stylesheet_directory() . '/assets/img/obras-sociales/'; // Reemplaza esto con la ruta a tu carpeta

  $archivos = glob($directorio . '*.*'); // Obtén todos los archivos en la carpeta')

  $divHtml = '<div class="logo-carousel">'; // Inicializar el elemento <div>

  foreach ($archivos as $archivo) {
    $nombreArchivo = get_stylesheet_directory_uri() . '/assets/img/obras-sociales/' . basename($archivo);

    $imgHtml = '<img src="' . htmlspecialchars($nombreArchivo) . '">';
    $divHtml .= $imgHtml; // Agregar la imagen al contenido del <div>
  }

  $divHtml .= '</div>'; // Cerrar el elemento <div>

  echo $divHtml; // Imprimir el resultado final

  $output = ob_get_clean();

  return $output;
}

add_shortcode('carousel-obras-sociales', 'carousel_obras_sociales_init');

//================//
// Shortcode de carousel logos circulos odontologicos
//================//
function carousel_circulos_odontologicos_init()
{
  ob_start();

  $directorio = get_stylesheet_directory() . '/assets/img/circulos/'; // Reemplaza esto con la ruta a tu carpeta

  $archivos = glob($directorio . '*.*'); // Obtén todos los archivos en la carpeta')

  $divHtml = '<div class="logo-carousel">'; // Inicializar el elemento <div>

  foreach ($archivos as $archivo) {
    $nombreArchivo = get_stylesheet_directory_uri() . '/assets/img/circulos/' . basename($archivo);

    $imgHtml = '<img src="' . htmlspecialchars($nombreArchivo) . '">';
    $divHtml .= $imgHtml; // Agregar la imagen al contenido del <div>
  }

  $divHtml .= '</div>'; // Cerrar el elemento <div>

  echo $divHtml; // Imprimir el resultado final

  $output = ob_get_clean();

  return $output;
}

add_shortcode('carousel-circulos-odontologicos', 'carousel_circulos_odontologicos_init');

// ========================================= //
// Shortcode para presentacion de Clasificados
// ========================================= //
function loop_fed_clasificados()
{
  ob_start();

  $args = array(
    'post_type' => 'clasificados',
    'posts_per_page' => 10,
    'order' => 'DESC'
  );

  $query = new WP_Query($args);

  if ($query->have_posts()) {
    echo '<div class="clasificados">';

    $counter = 1;

    $last_post = $query->post_count;

    while ($query->have_posts()) {
      $query->the_post();

      $thumbnail = get_the_post_thumbnail_url();
      $nombre_apellido = get_post_field('nombre_apellido');
      $correo_electronico = get_post_field('correo_electronico');
      $telefono = get_post_field('telefono');

      echo '<div class="card mb-4 overflow-hidden">';
      echo '<div class="row g-0">';
      echo '<div class="col-md-4">';
      echo '<div class="w-100 h-100" style="background-image: url(' . $thumbnail . '); background-position:center; background-size:cover; min-height:10rem"></div>';
      echo '</div>'; // </col-md-4>
      echo '<div class="col-md-8">';
      echo '<div class="card-body">';
      echo '<h5 class="card-title">' . get_the_title() . '</h5>';
      echo '<div class="mb-3">' . get_the_excerpt() . '</div>';
      echo '<h6>Contacto</h6>';
      echo '<ul>';
      echo '<li><strong>' . $nombre_apellido . '</strong></li>';
      echo '<li><strong>E-mail:</strong> <a href="mailto:' . $correo_electronico . '" target="_blank">' . $correo_electronico . '</a></li>';
      echo '<li><strong>Teléfono:</strong> ' . $telefono . '</li>';
      echo '</ul>';
      echo '<div class="text-end"><a href="' . get_the_permalink() . '" class="btn btn-primary" target="_blank" role="button">Ver más detalles</a></div>';
      echo '</div>'; // </card-body>
      echo '</div>'; // </col-md-8>
      echo '</div>'; // </row> 
      echo '</div>'; // </card>

      $counter++;
    }

    echo '</div>'; // </clasificados>

    wp_reset_postdata(); // Restablece los datos del post original
  } else {
    echo '<p>No se encontró contenido de esta sección.</p>';
  }

  $output = ob_get_clean();

  return $output;
}

add_shortcode('fed-clasificados', 'loop_fed_clasificados');

// ------------
// Shortcode filtro de Incrementos
// ------------
function init_searchbox_incrementos()
{
  ob_start();

  echo '<form method="get" class="row gy-2 gx-3 align-items-center mb-5" action="' . get_permalink() . '">';
  echo '<div class="col-auto">';
  echo '<label class="visually-hidden" for="anio">Año:</label>';
  echo '<select class="form-select" aria-label="Año" name="anio" id="anio">';
  echo '<option selected>Seleccionar año...</option>';

  $ano_limite = 2021;
  $ano_actual = intval(date("Y"));
  $i = $ano_actual;

  while ($i >= $ano_limite) {
    echo '<option value="' . strval($i) . '">' . strval($i) . '</option>';
    $i--;
  }
  echo '</select>'; // .form-select
  echo '</div>'; // .col-auto
  echo '<div class="col-auto">';
  echo '<label class="visually-hidden" for="mes">Mes</label>';
  echo '<select class="form-select" aria-label="Mes" name="mes" id="mes">';
  echo '<option selected>Seleccionar mes...</option>';
  echo '<option value="01">Enero</option>';
  echo '<option value="02">Febrero</option>';
  echo '<option value="03">Marzo</option>';
  echo '<option value="04">Abril</option>';
  echo '<option value="05">Mayo</option>';
  echo '<option value="06">Junio</option>';
  echo '<option value="07">Julio</option>';
  echo '<option value="08">Agosto</option>';
  echo '<option value="09">Septiembre</option>';
  echo '<option value="10">Octubre</option>';
  echo '<option value="11">Noviembre</option>';
  echo '<option value="12">Diciembre</option>';
  echo '</select>'; // .form-select
  echo '</div>'; // .col-auto
  echo '<div class="col-auto">';
  echo '<button type="submit" class="btn btn-primary">Buscar</button>';
  echo '</div>'; // .col-auto
  echo '</form>';

  $output = ob_get_clean();

  return $output;
}

add_shortcode('searchbox-incrementos', 'init_searchbox_incrementos');


// ------------
// Shortcode filtro de Novedades
// ------------
function init_searchbox_novedades()
{
  ob_start();
  echo '<form method="get" class="row gy-2 gx-3 align-items-center mb-5" action="' . get_permalink() . '">';
  echo '<div class="col-auto">';
  echo '<label class="visually-hidden" for="anio">Año:</label>';
  echo '<select class="form-select" aria-label="Año" name="anio" id="anio">';
  echo '<option selected>Seleccionar año...</option>';

  $ano_limite = 2021;
  $ano_actual = intval(date("Y"));
  $i = $ano_actual;

  while ($i >= $ano_limite) {
    echo '<option value="' . strval($i) . '">' . strval($i) . '</option>';
    $i--;
  }

  echo '</select>'; // .form-select
  echo '</div>'; // .col-auto
  echo '<div class="col-auto">';
  echo '<label class="visually-hidden" for="mes">Mes</label>';
  echo '<select class="form-select" aria-label="Mes" name="mes" id="mes">';
  echo '<option selected>Seleccionar mes...</option>';
  echo '<option value="01">Enero</option>';
  echo '<option value="02">Febrero</option>';
  echo '<option value="03">Marzo</option>';
  echo '<option value="04">Abril</option>';
  echo '<option value="05">Mayo</option>';
  echo '<option value="06">Junio</option>';
  echo '<option value="07">Julio</option>';
  echo '<option value="08">Agosto</option>';
  echo '<option value="09">Septiembre</option>';
  echo '<option value="10">Octubre</option>';
  echo '<option value="11">Noviembre</option>';
  echo '<option value="12">Diciembre</option>';
  echo '</select>'; // .form-select
  echo '</div>'; // .col-auto
  echo '<div class="col-auto">';
  echo '<button type="submit" class="btn btn-primary">Buscar</button>';
  echo '</div>'; // .col-auto
  echo '</form>';

  $output = ob_get_clean();

  return $output;
}

add_shortcode('searchbox-novedades', 'init_searchbox_novedades');

// ------------
// Shortcode para noticias en front-page
// ------------
function init_noticias_front($atts)
{
  ob_start();

  $sh_atts = shortcode_atts(array(
    "cantidad" => 3
  ), $atts, "noticias-front");

  $args = array(
    'category_name' => 'noticias',
    'posts_per_page' => $sh_atts['cantidad'],
    'order' => 'DESC'
  );

  $query = new WP_Query($args);

  if ($query->have_posts()) {
    echo '<div class="noticias-front">';
    echo '<div class="row row-cols-1 row-cols-md-' . $sh_atts['cantidad'] . ' g-5">';

    $post_count = 0;

    while ($query->have_posts()) {
      $query->the_post();

      echo '<div>';
      if ($post_count == 0):
        echo '<div class="noticia-front d-flex flex-column justify-content-start h-100">';
      else:
        echo '<div class="noticia-front d-flex flex-column justify-content-start h-100 pt-sm-5 pt-md-0">';
      endif;

      echo '<div class="noticia-front-thumbnail mb-3" style="background-image:url(' . esc_url(get_the_post_thumbnail_url()) . '); background-repeat:no-repeat; background-size:cover"></div>';
      echo '<p class="text-muted mb-0"><small>' . get_the_date() . '</small></p>';
      echo '<h3 class="h5 noticia-title"><a class="text-decoration-none" href="' . get_the_permalink() . '">' . get_the_title() . '</a></h3>';
      echo '<p class="text-end mt-auto"><a class="link-offset-2" href="' . get_the_permalink() . '" target="_blank" role="button"><i class="fa-regular fa-newspaper me-2"></i>Seguir leyendo</a></p>';
      echo '</div>'; // </noticia-front>
      echo '</div>'; // </col-md-4>

      $post_count++;
    }

    echo '</div>'; // <.noticias-front>

    wp_reset_postdata(); // Restablece los datos del post original
  } else {
    echo '<p>No se encontró contenido de esta sección.</p>';
  }

  echo '</div>'; // </row>

  $output = ob_get_clean();

  return $output;
}

add_shortcode('noticias-front', 'init_noticias_front');


// Campo personalizado de subida de archivos en Woocommerce
add_action('woocommerce_after_order_notes', 'custom_checkout_file_upload');

function custom_checkout_file_upload()
{
  echo '<h3>Personalización</h3>';
  echo '<p>Adjunte aquí archivos/fotos de sus diseños o logotipos propios</p>';
  echo '<p class="form-row form-row-wide"><label for="img_personalizada">Seleccionar archivos</label><span class="woocommerce-input-wrapper"><input type="file" id="img_personalizada" name="img_personalizada[]" accept=".jpg,.jpeg,.png,.pdf" multiple><input type="hidden" name="img_personalizada_field"></span></p>';

  wc_enqueue_js(
    "$('#img_personalizada').change( function() {
        if ( this.files.length ) {
          const formData = new FormData();
          $.each(this.files, function(i, file) {
            formData.append('img_personalizada[]', file);
          });
          $.ajax({
            url: wc_checkout_params.ajax_url + '?action=imgupload',
            type: 'POST',
            data: formData,
            contentType: false,
            enctype: 'multipart/form-data',
            processData: false,
            success: function ( response ) {
              $( 'input[name=\"img_personalizada_field\"]' ).val( response );
            },
            error: function(xhr, status, error) {
              console.log('Error al subir los archivos: ' + error);
            }
          });
        }
      });"
  );
}

add_action('wp_ajax_imgupload', 'custom_img_upload');
add_action('wp_ajax_nopriv_imgupload', 'custom_img_upload');

function custom_img_upload()
{
  $upload_dir = wp_upload_dir();
  $files = $_FILES['img_personalizada'];
  $uploaded_files = array();

  foreach ($files['name'] as $key => $value) {
    if ($files['error'][$key] === 0) {
      $file_name = sanitize_file_name($files['name'][$key]);
      $file_temp = $files['tmp_name'][$key];
      $file_dest = $upload_dir['path'] . '/' . $file_name;

      if (move_uploaded_file($file_temp, $file_dest)) {
        $uploaded_files[] = $upload_dir['url'] . '/' . $file_name;
      }
    }
  }

  echo json_encode($uploaded_files);
  wp_die();
}

add_action('woocommerce_checkout_update_order_meta', 'save_custom_img_field');

function save_custom_img_field($order_id)
{
  if (!$order_id) {
    return;
  }

  $order = wc_get_order($order_id);

  if (!empty($_POST['img_personalizada_field'])) {
    $files = json_decode(stripslashes($_POST['img_personalizada_field']), true);

    if (is_array($files)) {
      update_post_meta($order_id, '_img_personalizada_files', $files);
    }
  }
}

add_action('woocommerce_admin_order_data_after_billing_address', 'show_custom_img_field', 10, 1);

function show_custom_img_field($order)
{
  $files = get_post_meta($order->get_id(), '_img_personalizada_files', true);
  if (!empty($files)) {
    echo '<h3>Archivos personalizados</h3>';
    echo '<ul>';
    foreach ($files as $file) {
      echo '<li><a href="' . esc_url($file) . '" target="_blank">' . basename($file) . '</a></li>';
    }
    echo '</ul>';
  }
}

add_filter('woocommerce_email_attachments', 'attach_custom_img_files_admin_email', 10, 3);

function attach_custom_img_files_admin_email($attachments, $email_id, $order)
{
  if ($email_id === 'new_order') {
    // Obtén el ID de la orden
    $order_id = $order->get_id();

    // Obtén los archivos de la metadata de la orden
    $files = get_post_meta($order_id, '_img_personalizada_files', true);

    if (is_array($files) && !empty($files)) {
      foreach ($files as $file_url) {
        $file_path = str_replace(wp_upload_dir()['baseurl'], wp_upload_dir()['basedir'], $file_url);

        if (file_exists($file_path)) {
          $attachments[] = $file_path;
        }
      }
    }
  }

  return $attachments;
}


// Filtro para añadir una clase a los elementos <a> del widget "Categorías de producto"
function custom_product_cat_class($output, $args)
{
  if (is_active_widget(false, false, 'woocommerce_product_categories', true) && isset($args['taxonomy']) && $args['taxonomy'] === 'product_cat') {
    $output = str_replace('<a', '<a class="link-light"', $output);
  }
  return $output;
}

add_filter('wp_list_categories', 'custom_product_cat_class', 10, 2);

// WooCommerce END