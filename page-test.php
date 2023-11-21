<?php

get_header();

?>

	<section id="primary" class="content-area">
		<main class="page-post">
			<section class="page-post-header">
				<img src="https://clientes.thetland.com.ar/galtec/wp-content/uploads/2023/10/Vector-2.png">
			</section>
			<section class="list-post">
				<h1>
					Major Publications
				</h1>
				<?php
						$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
						$query = new WP_Query(
							array(
								'post_type' => 'post',
								'posts_per_page' => 5
							)
						);

						if ($query->have_posts()) :
							while ($query->have_posts()) :
								$query->the_post();
								?>
								<article class="article-post">
									<h3><?php the_title(); ?></h3>
									<?php
									the_content();
									?>
									<p> Fecha: <?php the_date(); ?> </p>
									<p> Autor: <?php the_author(); ?></p>
								</article>
									<?php
							endwhile;
				
						echo '<div class="pagination">';
						echo paginate_links(array('total' => $query->max_num_pages));
						echo '</div>';
						endif;
						// Restore original Post Data.
						wp_reset_postdata();
				?>
			</section>
		</main>
	</section><!-- #primary -->

<?php

get_footer();

