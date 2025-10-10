<?php

/**
 * Custom styles and scripts
 */

add_action('wp_enqueue_scripts', 'bootscore_child_enqueue_styles');
function bootscore_child_enqueue_styles()
{
  $theme_ver = wp_get_theme()->get('Version');
  $parent_theme_ver = wp_get_theme('bootscore')->get('Version');

  // Get modification time. Enqueue file with modification date to prevent browser from loading cached styles when file content changes. 
  $modified_child_css = date('YmdHi', filemtime(get_stylesheet_directory() . '/assets/css/main.css'));
  wp_enqueue_style('main', get_stylesheet_directory_uri() . '/assets/css/main.css', array('parent-style'), $modified_child_css);

  // style.css
  wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css', array(), $parent_theme_ver);

  // Slick Carousel CSS
  wp_enqueue_style('slick-css', get_stylesheet_directory_uri() . '/css/slick/slick.css', array());
  wp_enqueue_style('slick-theme', get_stylesheet_directory_uri() . '/css/slick/slick-theme.css', array('slick-css'));

  // Owl Carousel CSS
  wp_enqueue_style('owl-carousel-css', get_stylesheet_directory_uri() . '/css/owl-carousel/owl.carousel.min.css', array());
  wp_enqueue_style('owl-carousel-theme', get_stylesheet_directory_uri() . '/css/owl-carousel/owl.theme.default.min.css', array('owl-carousel-css'));

  // Custom icons
  wp_enqueue_style('fopc-font', get_stylesheet_directory_uri() . '/assets/fonts/fopc-font/css/fopc-font.css', array(), $theme_ver);

  // Slick Carousel JS
  wp_enqueue_script('slick-js', get_stylesheet_directory_uri() . '/assets/js/slick.min.js', array('jquery'), '', true);

  // Owl Carousel JS
  wp_enqueue_script('owl-carousel-js', get_stylesheet_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), '', true);

  // custom.js
  // Get modification time. Enqueue file with modification date to prevent browser from loading cached scripts when file content changes. 
  $modified_custom_js = date('YmdHi', filemtime(get_stylesheet_directory() . '/assets/js/custom.js'));
  wp_enqueue_script('custom-js', get_stylesheet_directory_uri() . '/assets/js/custom.js', array('jquery'), $modified_custom_js, true);

  // Manipulación de Accesos Rápidos en Front-Page y Animaciones CSS
  if (is_front_page()):
    wp_enqueue_script('front-page-js', get_stylesheet_directory_uri() . '/assets/js/front-page.js', array(), $theme_ver, true);
    wp_enqueue_style('animate-css', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css', array());
  endif;

  // Scripts específicos para ciertas páginas
  if (is_page('beneficios')):
    wp_enqueue_script('beneficios', get_stylesheet_directory_uri() . '/assets/js/beneficios.js', array('jquery'), $theme_ver, true);
  endif;

  if (is_page('estado-convenios')):
    wp_enqueue_script('searchbox-convenios', get_stylesheet_directory_uri() . '/assets/js/convenios.js', array('jquery'), $theme_ver, true);
  endif;

  if (is_page(array('prestamos', 'subsidios', 'alta-baja-fopc', 'auditoria-apross'))):
    wp_enqueue_script('fopc-tabs', get_stylesheet_directory_uri() . '/assets/js/tabs.js', array('bootstrap'), $theme_ver, true);
  endif;

  if (is_page('ultimo-mes-abonado')):
    wp_enqueue_script('ultimo-mes', get_stylesheet_directory_uri() . '/assets/js/ultimo-mes.js', array('jquery'), $theme_ver, true);
  endif;
}
