	<?php

	get_header();

	?>

		<section id="primary" class="content-area">
			<main class="page-post">
				<section class="page-post-header">
					<img class="img-background-header" src="https://galtec.ar/wp-content/uploads/2023/10/Vector-2.png">	
					
					<p class="breadcrumbs">
						<span><a href="https://clientes.thetland.com.ar/galtec/"> INICIO</a></span><span class="separador"> | </span><span><a href="https://clientes.thetland.com.ar/galtec/publicaciones/">PUBLICACIONES</a></span><span class="separador"> | </span><span>TODAS </span>
					</p>
					
					<form method="GET" action="https://clientes.thetland.com.ar/galtec/resultado-busqueda/">
						<div>
							<img src="https://galtec.ar/wp-content/uploads/2023/10/search.png">
							<input class="form-result" type="text" name="title" required>
						</div>
							<button type="submit">
									Buscar
						</button>
					</form>
				</section>
				<section class="list-post">
					<h1>
							<h2 id="our-team">
						<span>Publicaciones </span>
						destacadas
						</h2> 
					</h1>
					<?php
							$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
							query_posts(
								array(
									'post_type'      => 'post',
									'posts_per_page' => 4,
									'category_name'  => 'work',
									'orderby'		 =>'title',
									'order'			 =>'ASC',
									'paged'          => $paged  
								)
							);

							if (have_posts()) :
								while (have_posts()) :
									the_post();

									$post_content = get_the_content();


									preg_match('/<p>(.*?)<\/p>/', $post_content, $matches_paragraph);
									$first_paragraph = !empty($matches_paragraph) ? $matches_paragraph[1] : '';

									preg_match('/<a(.*?)<\/a>/', $post_content, $matches_link);
									$first_link = !empty($matches_link) ? $matches_link[0]: '';

									$first_link_with_target_blank = str_replace('<a ', '<a target="_blank" ', $first_link);
									?>
									<article class="article-post">
										<h3> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
										<p class="tag-post">
										<?php echo $first_paragraph ?>
										</p>
										<p class="date-post"><?php echo $first_link_with_target_blank ?></p>
										<a href="<?php the_permalink(); ?>" class="link-info-post">
											<i class="fa-solid fa-plus"></i>
											<p> Info</p>
										</a>
									</article>
									<?php
								endwhile;

								echo '<div class="pagination">';
								if(get_previous_posts_link()){
									previous_posts_link('< Anterior');
								}
								else {
									echo '<span class="disabled">< Anterior</span>';
								}
								if(get_next_posts_link())
								{
									next_posts_link('Siguiente >');
								}
								else {
									echo '<span class="disabled">Siguiente ></span>';
								}
								echo '</div>';
							endif;
							wp_reset_query();
							?>
				</section>
			</main>
		</section><!-- #primary -->

	<?php

	get_footer();

