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
        <main id="main" class="site-main pb-5">

          <header class="entry-header">
            <?php the_post(); ?>
            <h1 class="pt-5 pb-3"><?php the_title(); ?></h1>
          </header>

          <div class="alert alert-warning mb-4" role="alert">
            <p>Para poder acceder a este beneficio, deberá presentar en el local su <strong>Constancia de Federado Activo</strong> (descargar de <a rel="noreferrer noopener" href="https://fopc.org.ar/micuenta/login.php" target="_blank">Mi Cuenta</a>)</p>
          </div>

          <div class="entry-content">
            <?php the_content(); ?>
          </div>
        </main>

      </div>
    </div>

  </div>
</div>

<?php
get_footer();
