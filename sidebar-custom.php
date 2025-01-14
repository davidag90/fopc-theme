<?php

if (!is_active_sidebar('sidebar-custom')) {
  return;
}
?>
<div class="col-lg-4 order-first order-lg-last">
  <aside id="secondary" class="widget-area">

    <button class="btn btn-outline-secondary w-100 mb-4 d-flex d-xl-none justify-content-between align-items-center" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar-custom" aria-controls="sidebar-custom">
      <?php esc_html_e('Open side menu', 'bootscore'); ?> <i class="fa-solid fa-ellipsis-vertical"></i>
    </button>

    <div class="offcanvas-lg offcanvas-end" tabindex="-1" id="sidebar-custom" aria-labelledby="sidebarLabel">
      <div class="offcanvas-header bg-light">
        <span class="h5 offcanvas-title" id="sidebarLabel"><?php esc_html_e('Sidebar', 'bootscore'); ?></span>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebar-custom" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body flex-column">
        <?php dynamic_sidebar('sidebar-custom'); ?>
      </div>
    </div>

  </aside><!-- #secondary -->
</div>
