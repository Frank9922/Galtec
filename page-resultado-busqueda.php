<?php
/*
Template Name: Página de Resultados de Búsqueda
*/
get_header();
?>

<div id="primary" class="content-area">
	<section class="result-body">
			<section class="page-post-header">
				<img id="result" src="https://galtec.ar/wp-content/uploads/2023/10/Vector-2.png">
								
				<p class="breadcrumbs">
					<span><a href="https://clientes.thetland.com.ar/galtec/"> INICIO</a></span><span class="separador"> | </span><span><a href="https://clientes.thetland.com.ar/galtec/publicaciones/">PUBLICACIONES</a></span><span class="separador"> | </span><span>BUSQUEDA </span>
				</p>
				
				<form method="GET" action="https://clientes.thetland.com.ar/galtec/resultado-busqueda/">
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
		<?php
			if(isset($_GET['title']))
						{?>
			<section class="list-post">
							<?php
							$title = $_GET['title'];
							$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
							$query = new WP_Query(
								array(
									'post_type' 		=> 'post',
									'posts_per_page' 	=> 5,
									's'					=> $title,
									'category_name'		=> 'work',
									'orderby'			=> 'title',
									'order'				=> 'ASC',
									'paged'				=> $paged
								)
							);
							if ($query->have_posts()) {
								while ($query->have_posts()) :
									$query->the_post();
									
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
							echo paginate_links(array('total' => $query->max_num_pages, 'format'  =>  '?paged=%#%'));
							echo '</div>';

							} else {
						?>
						<div class="error-match">
							<h3>
								<span>
									¡Oops!	
								</span>
								No se encontró ningún resultado para:
								
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
								No realizo ninguna busqueda
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