<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bootscore
 *
 * @version 5.2.0.0
 */

?>

<footer>
  <div class="bootscore-footer bg-primary text-light pt-5 pb-3">
    <div class="container">
      <!-- Top Footer Widget -->
      <?php if (is_active_sidebar('top-footer')) : ?>
        <div>
          <?php dynamic_sidebar('top footer'); ?>
        </div>
      <?php endif; ?>

      <div class="row">
        <!-- Footer 1 Widget -->
        <div class="d-none d-md-block col-md-6 col-lg-3">
          <?php if (is_active_sidebar('footer-1')) : ?>
            <div>
              <?php dynamic_sidebar('footer-1'); ?>
            </div>
          <?php endif; ?>
        </div>

        <!-- Footer 2 Widget -->
        <div class="d-none d-md-block col-md-6 col-lg-3">
          <?php if (is_active_sidebar('footer-2')) : ?>
            <div>
              <?php dynamic_sidebar('footer-2'); ?>
            </div>
          <?php endif; ?>
        </div>

        <!-- Footer 3 Widget -->
        <div class="col-md-6 col-lg-3">
          <?php if (is_active_sidebar('footer-3')) : ?>
            <div>
              <?php dynamic_sidebar('footer-3'); ?>
            </div>
          <?php endif; ?>
        </div>

        <!-- Footer 4 Widget -->
        <div class="col-md-6 col-lg-3">
          <?php if (is_active_sidebar('footer-4')) : ?>
            <div>
              <?php dynamic_sidebar('footer-4'); ?>
            </div>
          <?php endif; ?>
        </div>
        <!-- Footer Widgets End -->
      </div>
    </div>
  </div>

  <div class="container-fluid">
    <div class="row bg-primary">
      <div class="col-6 offset-3">
        <div class="separador border-top border-light pt-4 mt-1"></div>
      </div>
    </div>
  </div>

  <section id="sponsors" class="bg-primary py-4">
    <div class="width-100">
      <?php
        $directorio = get_stylesheet_directory() . '/img/sponsors/'; // Reemplaza esto con la ruta a tu carpeta

        $archivos = glob($directorio . '*.*'); // Obtén todos los archivos en la carpeta')
      
        // $divHtml = '<div class="sponsors-carousel">';  Inicializacion para carousel
        $divHtml = '<div class="d-flex flex-row flex-wrap justify-content-center">'; // Inicializacion para flex
        
        foreach ($archivos as $archivo) {
          $nombreArchivo = get_stylesheet_directory_uri() . '/img/sponsors/' . basename($archivo);
          
          $imgHtml = '<img class="m-3" src="' . htmlspecialchars($nombreArchivo) . '">';
          $divHtml .= $imgHtml; // Agregar la imagen al contenido del <div>
        }
      
        $divHtml .= '</div>'; // Cerrar el elemento <div>
      
        echo $divHtml; // Imprimir el resultado final
      ?>
    </div>
  </section><!-- #sponsors -->

  <div class="bootscore-info bg-dark text-light border-top py-2 text-center">
    <div class="container">
      <small>&copy;&nbsp;<?php echo Date('Y'); ?> - <?php bloginfo('name'); ?></small>
    </div>
  </div>

</footer>

<!-- To top button -->
<a href="#" class="btn btn-dark shadow top-button position-fixed zi-1020"><i class="fa-solid fa-chevron-up"></i><span class="visually-hidden-focusable">To top</span></a>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>