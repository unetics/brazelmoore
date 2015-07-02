<?php get_header(); ?>
<body>
	<?php get_template_part( 'nav/init' ); ?>
	<main>
		<div class="container">
			<div class="post_content">
				<?php the_title( '<h3>', '</h3>' ); ?>
				<?php the_content();?>
			</div>
		</div>
	</main>
<?php get_footer(); ?>