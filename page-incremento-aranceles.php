<?php

/**
 * Template Name: Páginas Obras Sociales
 */

get_header(); ?>

<div id="content" class="site-content container pb-5">
	<div class="width-100">
		<header class="page-header d-flex align-items-center bg-primary text-light mb-5" style="background-image:url('<?php echo get_the_post_thumbnail_url(); ?>');">
			<h1 class="page-title"><?php the_title(); ?></h1>
		</header>
	</div>

	<div class="row">
		<div class="col">
			<div id="primary" class="content-area">
				<!-- Hook to add something nice -->


				<main id="main" class="site-main">
					<div class="page-content">
						<?php the_post(); ?>

						<?php the_content(); ?>

						<?php if (isset($_GET['anio']) && isset($_GET['mes'])) {
							$anio = $_GET['anio'];
							$mes = $_GET['mes'];
						} else {
							$anio = date('Y');
							$mes = date('m');
						}

						$args = array(
							'post_type'       => 'incrementos',
							'nopaging'        => true,
							'order'           => 'DESC',
							'meta_query'     => array(
								array(
									'key'     => 'fecha_vigencia',
									'value'   => $anio . $mes,
									'compare' => 'LIKE'
								)
							)
						);

						$query = new WP_Query($args);

						if ($query->have_posts()): ?>
							<h2><?php echo $anio . '/' . $mes; ?></h2>
							<table class="table table-striped">
								<thead>
									<tr>
										<th scope="col">Obra Social</th>
										<th scope="col">Publicación</th>
										<th scope="col">Vigencia</th>
									</tr>
								</thead>
								<tbody class="table-group-divider">
									<?php while ($query->have_posts()) {
										$query->the_post();

										$terms = get_the_terms(get_the_ID(), 'obras-sociales');

										$obras_sociales = [];

										foreach ($terms as $term) {
											array_push($obras_sociales, $term->name);
										}

										$obra_social = join(', ', $obras_sociales);

										$fecha_publicacion = get_the_date('d/m/Y');
										$fecha_vigencia = get_field('fecha_vigencia');
										$detalle_os = get_field('detalle-os');
									?>
										<tr>
											<td>
												<?php
												echo $obra_social;

												if (!empty($detalle_os)):
													echo '<small class="ms-1 opacity-75">' . $detalle_os . '</small>';
												endif;
												?>
											</td>
											<td><?php echo $fecha_publicacion; ?></td>
											<td><?php echo $fecha_vigencia; ?></td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
						<?php else:
							echo '<p>Lo sentimos, no existen registros en el período de tiempo seleccionado. Intente seleccionando otro Año y Mes.';
						endif; ?>
					</div>
				</main>
			</div>
		</div>

		<?php get_sidebar('obras-sociales'); ?>
	</div>
	<?php if (is_page('presentacion-facturacion')): ?>
		<div class="row">
			<div class="col">
				<div class="width-100 px-1 px-md-5">
					<?php echo do_shortcode('[carousel-obras-sociales]') ?>
				</div>
			</div>
		</div>
	<?php endif; ?>
</div>

<?php get_footer();
