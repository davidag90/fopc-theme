<?php

/**
 * Template Name: Encuentro Deportivo
 * 
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bootscore
 */

get_header();
?>

<div id="content" class="site-content">
  <div id="primary" class="content-area">

    <main id="main" class="site-main">

      <?php $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full'); ?>
      <header class="entry-header mb-3">
        <img src="<?php echo $thumb['0']; ?>" class="w-100">

        <div class="d-none">
          <h1 class="entry-title"><?php the_title(); ?></h1>
        </div>
      </header>

      <div class="container pb-5">
        <!-- Hook to add something nice -->


        <div class="entry-content">
          <?php the_content(); ?>
        </div>
      </div>

    </main>

  </div>
</div>

<?php
get_footer();
