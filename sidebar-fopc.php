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

if (!is_active_sidebar('sidebar-fopc')) {
  return;
}
?>

<div class="col-lg-4 order-first order-lg-last">
  <aside id="secondary" class="widget-area">

    <button class="btn btn-outline-primary w-100 mb-4 d-flex d-lg-none justify-content-between align-items-center" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar-fopc" aria-controls="sidebar-fopc">
      <?php esc_html_e('Open side menu', 'bootscore'); ?> <i class="fa-solid fa-ellipsis-vertical"></i>
    </button>

    <div class="offcanvas-lg offcanvas-end" tabindex="-1" id="sidebar-fopc" aria-labelledby="sidebarLabel">
      <div class="offcanvas-header bg-light">
        <span class="h5 offcanvas-title" id="sidebarLabel">Más info</span>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebar-fopc" aria-label="Close"></button>
      </div>
      
      <div class="offcanvas-body flex-column">
        <?php if(is_page('alta-baja-fopc')): ?>
        <div id="widget-beneficio-egresados" class="mb-4">
          <div class="pb-0 mb-0 d-none d-lg-block">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/alta-baja/egresados.png">
          </div>

          <div class="text-bg-primary border-0 rounded p-4">
            <h3 class="h4 text-center">Beneficio para Recién Matriculados</h3>

            <p>Si vas a federarte <strong>dentro de los 180 días </strong>posteriores a matricularte en el <strong>Colegio Odontológico de Córdoba</strong>, te eximimos por un lapso de 6 (seis) meses del pago de:</p>

            <ul class="fa-ul">
              <li>Cuota de <strong>Gasto Administrativo Mínimo</strong></li>
              <li>Cuota de <strong>DASO</strong></li>
              <li>Cuota de <strong>Prorrateo </strong>y <strong>Servicios</strong></li>
              <li>Cuota del <strong>Seguro de Mala Praxis</strong></li>
            </ul>

            <p>Para más información, no dudes en contactarnos.</p>
          </div>
        </div>
        <?php endif; ?>
        
        <section id="menu-sidebar-fopc" class="widget card card-body mb-4 text-bg-primary border-0">
          <h2 class="h3 widget-title card-title">Más información</h2>
          <?php wp_nav_menu(array(
            'container'       => false,
            'theme_location'  => 'sidebar-fopc',
            'menu_class'      => 'list-group list-group-flush',
            'link_before'     => '<i class="fas fa-caret-right me-2"></i>',
            'depth'           => 0,
          )); ?>
        </section>
        
        <?php dynamic_sidebar('sidebar-fopc'); ?>
      </div>
    </div>

  </aside><!-- #secondary -->
</div>
