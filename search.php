<?php get_header(); 
	$search_term = $_GET['term'];
	
?>
<body>
	<?php get_template_part( 'nav/init' ); ?>
	<main>
		  <?php   
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        
    $args = array(
		's' => $s,
		'paged' 	 => $paged,
	);
    $allsearch = new WP_Query($args); 
    $count = $allsearch->post_count; 
    $startpost = 10*($paged - 1)+1;
	$endpost = (10*$paged < $wp_query->found_posts ? 10*$paged : $wp_query->found_posts);
    wp_reset_query(); ?>

<div id="Content">
	<div class="content_wrapper clearfix">

		<!-- .sections_group -->
		<div class="sections_group" style="width:100% !important;">
		
			<div class="section">
				<div class="section_wrapper clearfix">
				
					<div class="column one column_blog">	
						<div class="blog_wrapper isotope_wrapper classic">
						<h2 class="displayResult">Showing results <?php echo $startpost; ?> - <?php echo $endpost; ?> of <?php echo $wp_query->found_posts; ?></h2>
							<div class="posts_group">
								<?php
									while ( $allsearch->have_posts() )
									{
										$allsearch->the_post();
										?>
										<div id="post-<?php the_ID(); ?>" <?php post_class(array('column','one','no-img')); ?>>
											<div class="post-desc-wrapper">
												
												<div class="post-desc">
												
													<div class="post-title">
														<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
													</div>
													
													<div class="post-excerpt">
														<?php the_excerpt(); ?>
													</div>

													<div class="post-meta">
															<div class="author">by 
																<a href="<?= get_author_posts_url( get_the_author_meta( 'ID' ) ) ?>"><?= get_the_author_meta( 'display_name' ) ?></a></div>
															
														<div class="date"><?= get_the_date() ?></div>

														<hr class="hr_narrow hr_left" />
													</div>
	
													<div class="post-footer">
														<a href="<?php echo get_permalink() ?>" class="post-more">readmore</a>
													</div>
						
												</div>
												
											</div>
										</div>
										<?php
									}
								?>
							</div>
							<?php  echo paginate_links(); ?> 
							
						</div>
					</div>
					
				</div>
			</div>
			
		</div>

	</div>
</div>
	</main>

<?php get_footer(); ?>