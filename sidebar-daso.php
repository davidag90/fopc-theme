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

if (!is_active_sidebar('sidebar-daso')) {
  return;
}
?>

<div class="col-lg-4 order-first order-lg-last">
  <aside id="secondary" class="widget-area">

    <button class="btn btn-outline-primary w-100 mb-4 d-flex d-lg-none justify-content-between align-items-center" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar-daso" aria-controls="sidebar-daso">
      <?php esc_html_e('Open side menu', 'bootscore'); ?> <i class="fa-solid fa-ellipsis-vertical"></i>
    </button>

    <div class="offcanvas-lg offcanvas-end" tabindex="-1" id="sidebar-daso" aria-labelledby="sidebarLabel">
      <div class="offcanvas-header bg-light">
        <span class="h5 offcanvas-title" id="sidebarLabel">Más info</span>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebar-daso" aria-label="Close"></button>
      </div>
      
      <div class="offcanvas-body flex-column">
        <?php if (is_page('beneficios')): ?>
        <div class="mb-5">
          <a class="btn btn-dark btn-block" href="#head-beneficios">Ver Beneficios para Federados</a>
        </div>
        <?php endif; ?>
        
        <section id="manu-sidebar-daso" class="widget card card-body mb-4 text-bg-primary border-0">
          <h2 class="h3 widget-title card-title">Más información</h2>
          <?php wp_nav_menu(array(
            'container'       => false,
            'theme_location'  => 'sidebar-daso',
            'menu_class'      => 'list-group list-group-flush',
            'link_before'     => '<i class="fas fa-caret-right me-2"></i>',
            'depth'           => 0,
          )); ?>
        </section>
        
        <?php if (!is_page('beneficios')):
          dynamic_sidebar('sidebar-daso');
        endif; ?>
      </div>
    </div>

  </aside><!-- #secondary -->
</div>
