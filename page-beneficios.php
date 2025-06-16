<?php

/**
 * Plantilla de página "Beneficios"
 *
 * @package FOPC
 */

get_header();
?>

<div id="content" class="site-content container">
	<div class="width-100">
		<header class="page-header d-flex align-items-center bg-primary text-light mb-5" style="background-image:url('<?php echo get_the_post_thumbnail_url(); ?>');">
			<h1 class="page-title"><?php the_title(); ?></h1>
		</header>
	</div>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="row mb-5">
				<div class="col">
					<?php the_post(); ?>

					<div class="page-content">
						<?php the_content(); ?>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-4 col-xxl-3">
					<div id="resumen-rubros" class="list-group mb-5">
						<button id="todos" class="list-group-item list-group-item-primary list-group-item-action active filtro-rubro">Todos</button>
						<?php

						$terms = get_terms(array(
							'taxonomy' => 'rubros',
						));

						foreach ($terms as $term) {
							echo '<button id="' . $term->slug . '" class="list-group-item list-group-item-primary list-group-item-action filtro-rubro">' . $term->name . ' (' . $term->count . ')</a>';
						}
						?>
					</div>
				</div>

				<div id="beneficios" class="col-md-8 col-xxl-9">
					<div class="row row-cols-2 row-cols-lg-3">
						<?php $query = new WP_Query(array(
							'post_type' => 'beneficios',
							'nopaging' => true,
						));

						if ($query->have_posts()):
							$i = 1;

							while ($query->have_posts()): $query->the_post();
								$raw_terms = get_the_terms($post, 'rubros');

								$post_terms = array();
								$post_terms_names = array();

								foreach ($raw_terms as $raw_term) {
									$post_terms[] = $raw_term->slug;
									$post_terms_names[] = $raw_term->name;
								} ?>

								<div class="col mb-3 <?php echo implode(" ", $post_terms); ?>">
									<div class="card h-100">
										<div class="card-body d-flex flex-column">
											<img src="<?php echo get_the_post_thumbnail_url(); ?>" class="card-img-top border-bottom border-light-subtle" alt="<?php the_title(); ?> logo">

											<h5 class="card-title"><a href="<?php the_permalink(); ?>" target="_blank"><?php the_title(); ?></a></h5>
											<p class="card-text"><?php echo get_the_excerpt(); ?></p>
											<div class="mt-auto ms-auto pt-2">
												<a href="<?php the_permalink(); ?>" class="btn btn-primary mt-auto" target="_blank">Ver más <i class="fa-solid fa-arrow-right-long"></i></a>
											</div>
										</div>

										<div class="card-footer">
											<?php echo implode(' - ', $post_terms_names); ?>
										</div>
									</div>
								</div>
						<?php $i++;
							endwhile;
						endif;
						?>
					</div>
				</div>
			</div>
		</main>
	</div>
</div>

<?php get_footer();
