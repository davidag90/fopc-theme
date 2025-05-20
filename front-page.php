<?php

/**
 * Home page template
 */

get_header();
?>

<div id="content" class="site-content container">
  <div id="hero-wrapper" class="width-100">
    <div id="hero-carousel" class="owl-carousel">
      <?php $args = [
        'post_type' => 'slide',
        'posts_per_page' => 3
      ];

      $query = new WP_Query($args);

      if ($query->have_posts()):
        while ($query->have_posts()):
          $query->the_post();

          $slide_sm = get_field('slide_sm');
          $slide_xl = get_field('slide_xl');
      ?>
          <div class="item">
            <picture>
              <source srcset="<?php echo esc_url($slide_sm); ?>" media="(max-width: 576px)" />
              <img src="<?php echo esc_url($slide_xl); ?>" />
            </picture>
          </div>

        <?php endwhile; ?>
      <?php else: ?>
        <div class="item">
          <picture>
            <source srcset="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/front-page/cover-sm.jpg" media="(max-width: 576px)" />
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/front-page/cover-lg.jpg" alt="Bienvenidos a Federación Odontológica de la Provincia de Córdoba - Nos une trabajar para revalorizar nuestra profesión">
          </picture>
        </div>
      <?php endif; ?>
    </div>
  </div>

  <div id="primary" class="content-area">


    <main id="main" class="site-main">
      <div class="entry-content">
        <?php the_post(); ?>
        <?php the_content(); ?>
      </div>
    </main>
  </div>
</div>

<?php get_footer();
