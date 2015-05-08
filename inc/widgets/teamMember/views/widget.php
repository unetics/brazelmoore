<?php
	$position = tr_post_field("[position]", $member);
	$credentials = tr_post_field("[credentials]", $member);
	$about_bio = tr_post_field("[about_bio]", $member);
	?>
<article class="team-member">
	<?= wp_get_attachment_image(tr_post_field("[photo]", $member), 'full');?>
	<h3><?= get_the_title($member); ?></h3>
	<?= isset($position) ? '<p>'.$position.'</p>': ''; ?>
	<?= isset($credentials) ? '<span>'.$credentials.'</span>': ''; ?>
	<?= isset($about_bio) ? '<p>'.$about_bio.'</p>': ''; ?>
</article>
<style type="text/css" media="screen">
	.team-member{
		width: 80%;
		max-width: 400px;
		margin: 20px auto;
		box-shadow: 0px 0px 2px 0px #6d6d6d;
		background: #eee;
		
	}
	.team-member h3{
		font-size: 25px;
		padding: 7px 20px ;
		margin: 0 20% ;
		position: relative;
		border-bottom: 2px solid red;
	}
</style>

