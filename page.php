<?php

get_header();

?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main page-layout">

			<?php

			while ( have_posts() ) :
				the_post(); ?>

				<?php
				// Check value exists.
				if( have_rows('modulos') ):


						// Loop through rows.
						while ( have_rows('modulos') ) : the_row();

								// Case: Paragraph layout.
								if( get_row_layout() == 'slider' ):

										?>

										<section class="slider-section">

											<?php

											if( have_rows('slide') ):
												while( have_rows('slide') ) : the_row();
													?>
													<div class="section-slide" style="background-image:url(<?php the_sub_field('imagen_de_fondo'); ?>);">
														<div clas="container">
															<?php the_sub_field('titular'); ?>
															<a href="<?php the_sub_field('link_boton'); ?>"><button><?php the_sub_field('texto_boton'); ?></button></a>
														</div>
													</div>

													<?php
												endwhile;
											endif;
											?>
										</section>
										<?php

								elseif( get_row_layout() == 'banner_con_numeros' ):

								endif;

						// End loop.
						endwhile;
				endif;
			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php

get_footer();

