<?php

/**
 * Template Post Type: post
 */

get_header();
?>

<div id="content" class="site-content container">
  <div id="primary" class="content-area pt-5">

    <!-- Hook to add something nice -->


    <div class="row">
      <div class="col-md-8">
        <main id="main" class="site-main">
          <?php

          the_post();

          $terms = wp_get_post_terms(get_the_ID(), 'obras-sociales');

          $obras_sociales = [];

          if (! empty($terms)) {
            foreach ($terms as $term) {
              array_push($obras_sociales, $term->name);
            }

            $obra_social = join(', ', $obras_sociales);
          } else {
            $obra_social = '';
          }

          ?>

          <header class="entry-header">
            <p class="entry-meta"><small class="text-muted"><?php echo get_the_date(); ?></small></p>
            <h1><?php the_title(); ?></h1>
            <p class="fs-5"><?php echo $obra_social ?></p>
          </header>

          <div class="entry-content">
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

      <?php get_sidebar('obras-sociales'); ?>
    </div>
  </div>
</div>

<?php get_footer();
