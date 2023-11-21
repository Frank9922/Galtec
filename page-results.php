<?php
/*
Template Name: Página Results
*/
get_header();
?>

<div id="primary" class="content-area">
	<section class="result-body">
			<section class="page-post-header">
				<img id="result" src="https://galtec.ar/wp-content/uploads/2023/10/Vector-2.png">
								
								<p class="breadcrumbs">
					<span><a href="https://clientes.thetland.com.ar/galtec/en/home/"> HOME</a></span><span class="separador"> | </span><span><a href="https://clientes.thetland.com.ar/galtec/en/publications/">PUBLICATIONS</a></span><span class="separador"> | </span><span>SEARCH </span>
				</p>
				
				
				<form method="GET" action="https://clientes.thetland.com.ar/galtec/en/results/">
					<div>
						<img src="https://galtec.ar/wp-content/uploads/2023/10/search.png">
						<?php 
							if(isset($_GET['title']))
							{
								$placeholder = $_GET['title'];
							}
							else {
								$placeholder = "";
							}
						?>
						<input type="text" name="title" required value="<?php echo $placeholder; ?>">
					</div>
					<button type="submit">
						<span class="search">Search </span>
						<img id="search-icon-mobile" src="https://galtec.ar/wp-content/uploads/2023/10/search.png">
					</button>
				</form>	
				<div class="title-result">

				</div>
				
				
			</section>
		<section class="list-post">
			<?php
				if(isset($_GET['title']))
						{
							$title = $_GET['title'];
							$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
							$query = new WP_Query(
								array(
									'post_type' 		=> 'post',
									'posts_per_page'		=> 5,
									's'					=> $title,
									'category_name'		=> 'work-en',
									'orderby'			=> 'title',
									'order'				=> 'ASC',
									'paged'				=> $paged
								)
							);
							if ($query->have_posts()) {
								while ($query->have_posts()) :
									$query->the_post();
									?>
									<article class="article-post">
										<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
										<p>
										<?php
											$post_tags = wp_get_post_terms(get_the_ID(), 'post_tag', array('fields' => 'all'));
												if(!empty($post_tags)) 
												foreach($post_tags as $tag) {
													$tag_link = get_term_link($tag);
													if(is_wp_error($tag_link)){
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
								echo paginate_links(array('total' => $query->max_num_pages, 'format'  =>  '?paged=%#%'));
							echo '</div>';

							} else {
						?>
						<div class="error-match">
							<h3>
								<span>
									¡Oops!	
								</span>
								
								No results found for:
			
								<span class="key-word">
									<?php echo $title; ?>
								</span>
							</h3>
						</div>
					<?php
							}
							// Restore original Post Data.
							wp_reset_postdata();
					}
				else {
					?>
						<div class="error-match">
							<h3>
								<span>
									¡Oops!	
								</span>
								No search was performed
							</h3>
						</div>
			
				<?php
				}
			?>
		</section>
	</section>
</div>

<?php
get_footer(); 
?>