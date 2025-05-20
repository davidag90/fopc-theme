<?php

/**
 * Template Post Type: post
 */

get_header();
?>

<?php the_post(); ?>

<div id="content" class="site-content container">
  <div class="width-100">
    <header class="page-header d-flex align-items-center bg-primary text-light mb-5" style="background-image:url('<?php echo get_stylesheet_directory_uri(); ?>/img/header-noticias.jpg');">
      <p class="h1 page-title">Cursos y Congresos</p>
    </header>
  </div>

  <div id="primary" class="content-area pb-5">
    <!-- Hook to add something nice -->


    <div class="row">
      <div class="col-lg-8">
        <main id="main" class="site-main">
          <header class="entry-header">
            <h1 class="mb-3"><?php the_title(); ?></h1>
          </header>

          <?php $thumbnail_url = get_the_post_thumbnail_url(); ?>

          <div class="entry-content">
            <div class="row">
              <div class="col-5 col-lg-4">
                <a href="<?= $thumbnail_url; ?>" class="border border-dark-subtle"><img src="<?= $thumbnail_url; ?>" /></a>
              </div>
              <div class="col-7 col-lg-8">
                <?php the_content(); ?>

                <p><strong>Fecha:</strong> <?= get_field('fecha_evento'); ?></p>
                <p><strong>Lugar:</strong> <?= get_field('lugar'); ?></p>
                <p><strong>Organiza:</strong> <?= get_field('organizador'); ?></p>
                <p><strong>Método de inscripción:</strong> <?= get_field('metodo_inscripcion'); ?></p>
                <p>
                  <a href="<?= get_field('mas_info'); ?>" target="_blank" class="btn btn-primary btn-lg me-1">Más información</a>
                  <a href="<?= get_field('contacto'); ?>" target="_blank" class="btn btn-secondary btn-lg link-light">Contacto</a>
                </p>
              </div>
            </div>
          </div>
        </main>
      </div><!-- .col-lg-8 -->
      <?php get_sidebar('dipe'); ?>
    </div><!-- .row -->

  </div>
</div>

<?php
get_footer();
