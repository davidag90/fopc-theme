<?php

/**
 * Header container class
 */
function change_header_container($string, $location)
{
  return ($location == "header") ? "container-fluid" : $string;
}

add_filter('bootscore/class/container', 'change_header_container', 10, 2);

/**
 * Custom Sidebars
 */
if (!function_exists('custom_sidebars_init')) {
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
  }
}

add_action('widgets_init', 'custom_sidebars_init', 10, 3);

/**
 * Custom Widgets
 */

if (!function_exists('custom_widgets_init')) {
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
}

add_action('widgets_init', 'custom_widgets_init', 11);

/**
 * Custom menus
 */

if (!function_exists('custom_menus_init')) {
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
}

add_action('after_setup_theme', 'custom_menus_init');

/**
 * Custom classes for menu widgets (Bootstrap adaptation)
 */
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

/**
 * Custom classes for <a> in menu widgets (Bootstrap adaptation)
 */
function custom_menu_widget_a_class($atts, $item, $args)
{
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
