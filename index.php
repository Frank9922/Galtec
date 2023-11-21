<?php
get_header();
?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main page-layout">

			<section class="articulos-section">
				<div class="container">
					<h1><?php the_title(); ?></h1>
					<?php

					if ( have_posts() ) : ?>
						<div class="articulos-holder">
							<?php while ( have_posts() ) : the_post(); ?>
								<div <?php post_class('articulo-item'); ?>>
									<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('large'); ?></a>
									<div class="articulo-info">
										<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
									</div>
								</div>
							<?php endwhile; ?>
						</div>
					<?php endif; ?>
				</div>
			</section>
				

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
