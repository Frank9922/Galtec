<?php

get_header();

?>
	<section id="primary" class="content-area">
		<main class="page-post">
			<section class="page-post-header">
				<img class="img-background-header" src="https://galtec.ar/wp-content/uploads/2023/10/Vector-2.png">
				
				<p class="breadcrumbs">
					<span><a href=""> HOME</a></span><span class="separador"> | </span><span><a href="">PUBLICATIONS</a></span><span class="separador"> | </span><span>ALL </span>
				</p>
				
				
				<form method="GET" action="https://clientes.thetland.com.ar/galtec/en/results/">
					<div>
						<img src="https://galtec.ar/wp-content/uploads/2023/10/search.png">
						<input class="form-result" type="text" name="title" required>
					</div>
						<button type="submit">
								<div>Search</div>
							<img id="search-icon-mobile" src="https://galtec.ar/wp-content/uploads/2023/10/search.png">
						</button>
				</form>
			</section>
			<section class="list-post">
				<h1>
						<h2 id="our-team">
							<span>Major</span>
							Publications
					</h2> 
				</h1>
					<?php
						$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
						query_posts(
							array(
								'post_type'      => 'post',
								'posts_per_page' => 5,
								'category_name'	 =>'work-en',
								'orderby'		 =>'title',
								'order'			 =>'ASC',
								'paged'          => $paged  // Agregar esta línea para la paginación
							)
						);

						if (have_posts()) :
							while (have_posts()) :
								the_post();

								?>
								<article class="article-post">
									<h3> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
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
								previous_posts_link('< Prev');
							}
							else {
								echo '<span class="disabled">< Prev</span>';
							}
							if(get_next_posts_link())
							{
								next_posts_link('Next >');
							}
							else {
								echo '<span class="disabled">Next ></span>';
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

