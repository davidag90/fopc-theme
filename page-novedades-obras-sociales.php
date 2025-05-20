<?php

/**
 * Template Name: Novedades Obras Sociales
 */

get_header(); ?>

<div id="content" class="site-content container">
	<div class="width-100">
		<header class="page-header d-flex align-items-center bg-primary text-light mb-5" style="background-image:url('<?php echo get_the_post_thumbnail_url(); ?>');">
			<h1 class="page-title"><?php the_title(); ?></h1>
		</header>
	</div>

	<div id="primary" class="content-area">
		<!-- Hook to add something nice -->


		<div class="row">
			<div class="col">
				<main id="main" class="site-main pb-5">
					<div class="page-content">
						<?php the_post();

						the_content();

						if (isset($_GET['anio']) || isset($_GET['mes'])):
							$anio = intval($_GET['anio']);
							$mes = intval($_GET['mes']);
						else:
							$anio = intval(date('Y'));
							$mes = intval(date('m'));
						endif;

						$args = array(
							'post_type' 		=> 'novedades-os',
							'nopaging'			=> true,
							'date_query'		=> array(
								'year' => $anio,
								'month' => $mes
							),
						);

						$query = new WP_Query($args);

						if ($query->have_posts()) :
							while ($query->have_posts()): $query->the_post();
								$terms = get_the_terms(get_the_ID(), 'obras-sociales');

								$obras_sociales = [];

								foreach ($terms as $term) {
									array_push($obras_sociales, $term->name);
								}

								$obra_social = join(', ', $obras_sociales); ?>

								<div class="novedad-os">
									<!-- Date -->
									<small class="d-block mb-2 text-muted"><i class="fa-solid fa-calendar-days"></i> <?php echo get_the_date(); ?></small>

									<!-- Title -->
									<h2 class="h3"><?php echo $obra_social . ' - '  . get_the_title(); ?></h2>

									<!-- Content -->
									<div class="novedad-content"><?php echo get_the_content(); ?></div>
								</div>

							<?php endwhile; ?>
							<?php wp_reset_postdata(); ?>

						<?php else: ?>
							<p>Lo sentimos, esta sección no tiene ningún contenido disponible.</p>
							<p>Intente nuevamente seleccionando otro Año y Mes.</p>
						<?php endif; ?>

					</div><!-- .page-content -->
				</main><!-- #main -->
			</div><!-- col -->

			<?php get_sidebar('obras-sociales'); ?>
		</div><!-- row -->
	</div><!-- #primary -->
</div><!-- #content -->
<?php get_footer();
