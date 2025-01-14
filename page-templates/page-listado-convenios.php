<?php

/**
 * Template Name: Listado de Convenios
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bootscore
 */

get_header();
?>

<div id="content" class="container-fluid">
  <div id="primary" class="content-area">
      <main id="main" class="site-main">
        <?php the_post(); ?>
        <header class="entry-header d-print-none">
          <h1 class="pt-5 pb-3"><?php the_title(); ?></h1>
        </header>

        <div class="entry-content">
            <?php the_content(); ?>
        </div>
      </main>
  </div>
</div>

<script>
  window.onload = function() {
    window.print();
  }
</script>

<?php
get_footer();