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

if (!is_active_sidebar('sidebar-des')) {
  return;
}
?>

<div class="col-lg-4 order-first order-lg-last">
  <aside id="secondary" class="widget-area">

    <button class="btn btn-outline-primary w-100 mb-4 d-flex d-lg-none justify-content-between align-items-center"
    type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar-des" aria-controls="sidebar-des">
      <?php esc_html_e('Open side menu', 'bootscore'); ?> <i class="fa-solid fa-ellipsis-vertical"></i>
    </button>

    <div class="offcanvas-lg offcanvas-end" tabindex="-1" id="sidebar-des" aria-labelledby="sidebarLabel">
      <div class="offcanvas-header bg-light">
        <span class="h5 offcanvas-title" id="sidebarLabel">Más info</span>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebar-des" aria-label="Close"></button>
      </div>
      
      <div class="offcanvas-body flex-column">
        <?php dynamic_sidebar('sidebar-des'); ?>
      </div>
    </div>

  </aside><!-- #secondary -->
</div>
