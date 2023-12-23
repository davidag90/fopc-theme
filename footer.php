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

<?php
  $time_hoy = strtotime(date('Y-m-d'));
  $time_inicio = strtotime(date('2024-01-02'));
  $time_fin = strtotime(date('2024-01-31'));

  $time_check = $time_hoy >= $time_inicio && $time_hoy <= $time_fin;

  if( ( is_shop() || is_checkout_pay_page() ) && $time_check): 
  ?>

  <div class="modal" id="aviso-licencia" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Aviso importante</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p><strong>Estimado Profesional:</strong></p>
          <p>Informamos que la imprenta se encuentra de <span class="fw-bold text-uppercase">licencia por vacaciones</span>.</p>
          <p>Los pedidos podrán ser entregados dentro de los primeros 15 días de Febrero.</p>
          <p class="text-end">Muchas gracias,<br>
          <em>Departamento de Información, Educación y Publicación</em></p>
        </div>
      </div>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const modalLicencia = new bootstrap.Modal('#aviso-licencia');
      
      modalLicencia.show();
    });
  </script>
  <?php endif; ?>

<footer>
  <div class="bootscore-footer bg-primary bg-opacity-25 pt-4 pb-2">
    <div class="container">
      <!-- Top Footer Widget -->
      <?php if (is_active_sidebar('top-footer')) : ?>
        <div>
          <?php dynamic_sidebar('top footer'); ?>
        </div>
      <?php endif; ?>

      <div class="row">
        <div class="d-none d-lg-block col-lg-4">
          <div class="h-100 d-flex flex-column justify-content-end">
            <div class="social-media mb-2">
              <a class="d-inline-block me-1" href="#" alt="FOPC en Instagram" target="_blank">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/social-media/instagram.png">
              </a>
              <a class="d-inline-block" href="#" alt="FOPC en Facebook" target="_blank">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/social-media/facebook.png">
              </a>
            </div>
            
            <p class="h6 text-primary">Federación Odontológica<br> de la Provincia de Córdoba</p>
            <p><a href="#" target="_blank" class="link-primary text-decoration-none">#LAFEDERACIONSOMOSTODOS</a></p>
          </div>
        </div>

        <!-- Footer 2 Widget -->
        <div class="col-md-6 col-lg-4">
          <?php if (is_active_sidebar('footer-2')) : ?>
            <div>
              <?php dynamic_sidebar('footer-2'); ?>
            </div>
          <?php endif; ?>
        </div>

        <div class="col-md-6 col-lg-4">
          <div class="text-primary">
            <p class="mb-3"><i class="fa-solid fa-location-dot me-2"></i>9 de Julio 1109 - Alberdi - <em>Córdoba</em></p>
            <p class="mb-3"><i class="fa-regular fa-clock me-2"></i>7:15 a 15 hs.</p>
            <p class="mb-3"><i class="fa-solid fa-envelope me-2"></i><a class="link-primary text-decoration-none" href="mailto:info@fopc.org.ar" target="_blank" rel="noopener">info@fopc.org.ar</a></p>
            <p class="mb-3"><i class="fa-solid fa-phone me-2"></i>0351 - 4216051 / 4262333 / 4241216</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <section id="sponsors" class="bg-primary">
    <?php wp_reset_postdata();
    
    $query = new WP_Query(array(
      'post_type' => 'sponsor',
      'nopaging'  => 'true'
    )); 
  
    if ( $query->have_posts() ) : ?>
      <div class="sponsors-carousel">
        <?php while ( $query->have_posts() ):
        $query->the_post();
          
        $flyer = get_field('flyer_promo'); ?>
        <div class="sponsor">
          <?php if(!empty($flyer)): ?>
          <a href="<?php echo $flyer['url']; ?>">
            <img src="<?php echo get_the_post_thumbnail_url(); ?>">
          </a>
          <?php else: ?>
            <img src="<?php echo get_the_post_thumbnail_url(); ?>">
          <?php endif; ?>
        </div><!-- /.sponsor -->
      <?php endwhile; ?>
      </div><!-- /.sponsors-carousel -->
    <?php endif; ?>
  </section><!-- #sponsors -->

  <div class="bootscore-info text-bg-primary border-top border-opacity-50 py-2 text-center">
    <div class="container">
      <small>&copy;&nbsp;<?php echo Date('Y'); ?> - <?php bloginfo('name'); ?></small>
    </div>
  </div>

</footer>

<!-- To top button -->
<a href="#" class="btn btn-dark shadow top-button position-fixed zi-1020"><i class="fa-solid fa-chevron-up"></i><span class="visually-hidden-focusable">To top</span></a>
<a href="https://wa.me/5493512159990/" class="whatsapp-button shadow position-fixed zi-1020" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/whatsapp.png"></a>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>