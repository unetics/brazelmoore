<?php get_header(); ?>
<body>
	<?php get_template_part( 'nav/init' ); ?>
	<main>
		<div class="container">
			<div class="post_content">
				<?php the_content();?>
			</div>
		</div>
	</main>
<?php get_footer(); ?>