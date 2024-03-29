<?php
/**
 * Home page template
 */

get_header();
?>

<div id="content" class="site-content container">
  <div id="hero-wrapper" class="width-100">
    <div id="hero-carousel" class="owl-carousel">
      <div class="item">
        <picture>
          <source srcset="<?php echo get_stylesheet_directory_uri(); ?>/img/front-page/cover-sm.jpg" media="(max-width: 576px)" />
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/front-page/cover-lg.jpg" alt="Bienvenidos a Federación Odontológica de la Provincia de Córdoba - Nos une trabajar para revalorizar nuestra profesión">
        </picture>
      </div>
    </div>
  </div>
 
  <div id="primary" class="content-area">
    <?php bs_after_primary(); ?>

    <main id="main" class="site-main">
      <div class="entry-content">
        <?php the_post(); ?>
        <?php the_content(); ?>
      </div>
    </main>
  </div>
</div>

<?php get_footer();