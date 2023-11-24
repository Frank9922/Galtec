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
								'posts_per_page' => 3,
								'category_name'  => 'work',
								'orderby'		 =>'title',
								'order'			 =>'ASC',
								'paged'          => $paged  
							)
						);

						if (have_posts()) :
							while (have_posts()) :
								the_post();
								?>
								<article class="article-post">
									<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
									<p class="tag-post">
										<?php
										$post_tags = wp_get_post_terms(get_the_ID(), 'post_tag', array('fields' => 'all'));
										if (!empty($post_tags))
											foreach ($post_tags as $tag) {
												$tag_link = get_term_link($tag);
												if (is_wp_error($tag_link)) {
													continue;
												}
												?>
												<a class="tag-link" href="<?php echo esc_url($tag_link); ?>"><?php echo $tag->name;  ?>, </a>
											<?php
											}
										?>
									</p>
									<p class="date-post"><?php echo get_the_date(); ?> </p>
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

