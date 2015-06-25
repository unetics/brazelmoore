<?php get_header(); ?>
<body>
	<?php get_template_part( 'nav/init' ); ?>
	<main>
		<div class="container">
			<?php the_content();?>
			<br/><br/>
		</div>
	</main>
<?php get_footer(); ?>