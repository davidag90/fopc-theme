<?php

/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bootscore
 *
 * @version 5.2.0.0-beta1
 */

if (!is_active_sidebar('sidebar-dipe')) {
  return;
}
?>

<div class="col-lg-4 order-first order-lg-last">
  <aside id="secondary" class="widget-area">

    <button class="btn btn-outline-primary w-100 mb-4 d-flex d-lg-none justify-content-between align-items-center" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar-dipe" aria-controls="sidebar-dipe">
      <?php esc_html_e('Open side menu', 'bootscore'); ?> <i class="fa-solid fa-ellipsis-vertical"></i>
    </button>

    <div class="offcanvas-lg offcanvas-end" tabindex="-1" id="sidebar-dipe" aria-labelledby="sidebarLabel">
      <div class="offcanvas-header bg-light">
        <span class="h5 offcanvas-title" id="sidebarLabel">Más info</span>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebar-dipe" aria-label="Close"></button>
      </div>
      
      <div class="offcanvas-body flex-column">
        <section id="menu-sidebar-dipe" class="widget card card-body mb-4 text-bg-primary border-0">
          <h2 class="h3 widget-title card-title">Más información</h2>
          <?php wp_nav_menu(array(
            'container'       => false,
            'theme_location'  => 'sidebar-dipe',
            'menu_class'      => 'list-group list-group-flush',
            'link_before'     => '<i class="fas fa-caret-right me-2"></i>',
            'depth'           => 0,
          )); ?>
        </section>
        
        <?php
          dynamic_sidebar('sidebar-dipe');
        
          if(is_page('cursos-congresos')): ?>
            <div class="text-bg-primary mb-0 p-4 rounded-top">
              <h2 class="h3">Para Círculos Odontológicos</h2>
              <p class="mb-0">Si Ud. quiere publicitar algún curso o congreso de su institución, por favor complete el siguiente formulario:</p>
            </div>
            
            <div class="text-bg-secondary bg-opacity-50 mt-0 p-3 rounded-bottom border border-dark-subtle">
              <?php echo do_shortcode('[contact-form-7 id="2170" title="Difusión Cursos y Congresos"]'); ?>
            </div>
          <?php endif; ?>
      </div>
    </div>

  </aside><!-- #secondary -->
</div>
