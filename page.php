<?php

/**
 * Default page; No sidebars; No featured image
 */

get_header(); ?>

<div id="content" class="site-content container pb-5">
  <div class="width-100">
    <header class="page-header d-flex align-items-center bg-primary text-light mb-5" style="background-image:url('<?php echo get_the_post_thumbnail_url(); ?>');">
      <h1 class="page-title"><?php the_title(); ?></h1>
    </header>
  </div>

  <div id="primary" class="content-area">

    <!-- Hook to add something nice -->


    <main id="main" class="site-main">
      <div class="entry-content">
        <?php the_post(); ?>
        <?php the_content(); ?>
      </div>

    </main>

  </div>
</div>

<?php get_footer();
