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
      <p class="h1 page-title">Noticias</p> <!-- Ojo, atento si más adelante se usa la plantilla de post-default para otras categorias que no sean solo Noticias, requiere adaptación -->
    </header>
  </div>

  <div id="primary" class="content-area py-5">

    <!-- Hook to add something nice -->


    <div class="row">
      <div class="col-md-8">
        <main id="main" class="site-main">
          <header class="entry-header">
            <h1><?php the_title(); ?></h1>
            <p class="entry-meta"><small class="text-muted"><?php echo get_the_date(); ?></small></p>
          </header>

          <div class="entry-content">
            <?php the_post_thumbnail('full', ['class' => 'mb-4 shadow rounded']); ?>

            <?php the_content(); ?>
          </div>

          <footer class="entry-footer clear-both">
            <nav aria-label="bS page navigation">
              <ul class="pagination justify-content-center">
                <li class="page-item">
                  <?php previous_post_link('%link'); ?>
                </li>
                <li class="page-item">
                  <?php next_post_link('%link'); ?>
                </li>
              </ul>
            </nav>
          </footer>
        </main>
      </div>

      <?php get_sidebar('fopc'); ?>
    </div>
  </div>
</div>

<?php get_footer();
