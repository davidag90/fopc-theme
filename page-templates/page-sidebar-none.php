<?php

/**
 * Template Name: No Sidebar
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bootscore
 */

get_header();
?>

<div id="content" class="site-content container">
  <div id="primary" class="content-area">

    <!-- Hook to add something nice -->


    <main id="main" class="site-main">

      <header class="entry-header">
        <?php the_post(); ?>
        <h1 class="pt-5 pb-3"><?php the_title(); ?></h1>
        <?php bootscore_post_thumbnail(); ?>
      </header>

      <div class="entry-content">
        <?php the_content(); ?>
      </div>

      <footer class="entry-footer">
        <?php comments_template(); ?>
      </footer>

    </main>

  </div>
</div>

<?php
get_footer();
