<?php

/**
 * Template Post Type: post
 */

get_header();
?>

<div id="content" class="site-content container">
  <div id="primary" class="content-area">

    <!-- Hook to add something nice -->


    <div class="row">
      <div class="col">
        <main id="main" class="site-main">
          <div class="width-100">
            <header class="page-header d-flex align-items-center bg-primary text-light mb-5" style="background-image:url('https://fopc.org.ar/wp-content/themes/fopc-theme/img/header-clasificados.jpg');">
              <h1 class="page-title">FedClasificados</h1>
            </header>
          </div>

          <header class="entry-header">
            <?php the_post(); ?>
            <h1 class="pb-3"><?php the_title(); ?></h1>
          </header>

          <div class="entry-content pb-5">
            <?php the_content(); ?>
          </div>
        </main>

      </div>
    </div>

  </div>
</div>

<?php
get_footer();
