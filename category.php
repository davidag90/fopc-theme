<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bootscore
 */

get_header();
?>

<div id="content" class="site-content container">
  <div id="primary" class="content-area pb-5">

    <!-- Hook to add something nice -->


    <div class="width-100">
      <header class="page-header d-flex align-items-center bg-primary text-light mb-5" style="background-image:url('<?php echo get_stylesheet_directory_uri(); ?>/img/header-noticias.jpg');">
        <h1 class="page-title"><?php echo single_cat_title(); ?></h1>
      </header>
    </div>

    <div class="row">
      <div class="col">
        <main id="main" class="site-main">
          <!-- Grid Layout -->
          <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
              <div class="card horizontal mb-4">
                <div class="row">
                  <!-- Featured Image-->
                  <?php if (has_post_thumbnail())
                    echo '<div class="card-img-left-md col-lg-4">' . get_the_post_thumbnail(null, 'medium') . '</div>';
                  ?>
                  <div class="col">
                    <div class="card-body ps-lg-0">
                      <!-- Title -->
                      <h2 class="h4">
                        <a class="text-decoration-none" href="<?php the_permalink(); ?>">
                          <?php the_title(); ?>
                        </a>
                      </h2>
                      <!-- Meta -->
                      <?php if ('post' === get_post_type()) : ?>
                        <small class="text-muted mb-3"><?php get_the_date(); ?></small>
                      <?php endif; ?>

                      <!-- Excerpt & Read more -->
                      <div class="card-text pb-5">
                        <?php the_excerpt(); ?>
                      </div>

                      <div class="d-flex flex-row justify-content-end">
                        <a class="btn btn-primary" href="<?php the_permalink(); ?>"><?php _e('Read more »', 'bootscore'); ?></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php endwhile; ?>
          <?php endif; ?>

          <!-- Pagination -->
          <div>
            <?php bootscore_pagination(); ?>
          </div>

        </main><!-- #main -->

      </div><!-- col -->

      <?php get_sidebar('fopc'); ?>
    </div><!-- row -->

  </div><!-- #primary -->
</div><!-- #content -->

<?php
get_footer();
