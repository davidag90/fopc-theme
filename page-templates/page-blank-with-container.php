<?php

/**
 * Template Name: Blank with container
 */

get_header(); ?>

<div id="content" class="site-content container pb-5">
  <div id="primary" class="content-area">

    <!-- Hook to add something nice -->


    <main id="main" class="site-main">
      <header>
        <h1 class="pt-5 pb-3"><?php the_title(); ?></h1>
      </header>
      <div class="page-content">
        <?php the_post(); ?>
        <?php the_content(); ?>
      </div>

    </main>

  </div>
</div>

<?php get_footer();
