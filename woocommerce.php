<?php

/**
 * The template for displaying all WooCommerce pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bootscore
 */

get_header();
?>

<div id="content" class="site-content container">
  <div class="width-100">
		<header class="page-header d-flex align-items-center bg-primary text-light mb-5" style="background-image: url('https://fopc.org.ar/wp-content/themes/fopc-theme/img/header-imprenta.jpg');">
			<h1 class="page-title"><?php woocommerce_page_title(); ?></h1>
		</header>
	</div>

  <div id="primary" class="content-area">
    <?php if(!isset($_COOKIE['alert_imprenta'])): ?>
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      
        <strong>Imprenta:</strong> servicio exclusivo para <strong>Profesionales Federados Activos</strong>
      </div>
    <?php endif; ?>

    <main id="main" class="site-main">
      <!-- Breadcrumb -->
      <?php // woocommerce_breadcrumb(); ?>
      <div class="row pb-5">
        <div class="col-12 col-lg-8 col-xl-9 order-2 order-lg-1">
          <?php woocommerce_content(); ?>
        </div>

        <div class="col-12 col-lg-4 col-xl-3 order-1 order-lg-2">
          <?php get_sidebar('imprenta'); ?>
        </div>  
      </div>
    </main><!-- #main -->
  </div><!-- #primary -->
</div><!-- #content -->
<?php
get_footer();
