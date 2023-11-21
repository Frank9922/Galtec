<?php
get_header();
?>

	<section id="primary" class="content-area">
    <main id="main" class="site-main">
			<section class="header-post-blog">
			</section>
			<?php

			/* Start the Loop */
			while ( have_posts() ) :

				the_post();

				?>
				<section class="blog-post-content">
					<div class="container">
						<div class="blog-superior">
							By <span><?php the_author(); ?></span> | <?php the_date();  ?>
						</div>
						<h1><?php the_title(); ?></h1>

						<?php the_content(); ?>

					</div>
				</section>
				<?php

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
