<?php

/**
 * Home page template
 */

get_header();

?>
<?php $query = new WP_Query(array(
  'category_name'   => 'destacados',
  'posts_per_page'  => 3
)); ?>

<div id="content" class="site-content container">
  <div id="hero-wrapper" class="width-100">
    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <?php
        if ( $query->have_posts() ) :
          $i = 0;
          // $tope = $query->post_count;
          
          while ( $query->have_posts() ): $query->the_post(); ?>
            <div class="carousel-item<?php if ($i === 0): ?> active<?php endif;?>" style="background-image: url(<?php echo get_the_post_thumbnail_url( get_the_ID(), 'full' ); ?>); background-size: cover;">
              <div class="carousel-overlay position-absolute opacity-25 top-0 end-0 bottom-0 start-0 bg-dark"></div>
              
              <div class="carousel-caption text-start mb-0 p-0">
                <h2><?php the_title(); ?></h2>
                <?php the_excerpt(); ?>
                <a class="btn btn-primary mb-0" href="<?php the_permalink(); ?>">Más información <i class="fa-solid fa-arrow-right"></i></a>
              </div>
            </div>
            <?php $i++;
          endwhile;
        endif;

        wp_reset_postdata();
        ?>
      </div>

      <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Anterior</span>
      </button>
      
      <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Siguiente</span>
      </button>
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