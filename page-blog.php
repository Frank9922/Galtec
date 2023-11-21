<?php

get_header();

?>

	<section id="primary" class="content-area">
		<section class="header-blog">
			<img class="header-img-background" src="https://galtec.ar/wp-content/uploads/2023/10/Rectangle-23.png">
			
			
			<article>
			<?php 
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
						$query = new WP_Query(
							array(
								'post_type' 				=>'post',
								'posts_per_page' 			=> 5,
								'category_name'				=>'blog'
							)
						);

						if ($query->have_posts()) {
							while ($query->have_posts()) :
								$query->the_post();
								?>
								<article class="article-post">
									<h3><?php the_title(); ?></h3>
									<p>
										<?php
										$post_tags = wp_get_post_terms(get_the_ID(), 'post_tag', array('fields' => 'all'));
											if(!empty($post_tags)) 
											foreach($post_tags as $tag) {
												?>
													<?php echo $tag->name.', '; ?>
											<?php
											}
										?>
									</p>
									<p class="date-post"><?php the_date(); ?> </p>
									<p class="info-post">
										<i class="fa-solid fa-plus"></i>
										Info
									</p>
								</article>
									<?php
							endwhile;
				
						echo '<div class="pagination">';
						echo paginate_links(array('total' => $query->max_num_pages));
						echo '</div>';
						}
						else {
							echo "No se encontro informacion ...";
						}
						// Restore original Post Data.
						wp_reset_postdata();
				?>
				
			</article>
		</section>
</section>

<?php 
get_footer();

