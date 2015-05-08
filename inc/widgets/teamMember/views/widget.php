<article class="team-member">
	<?= wp_get_attachment_image(tr_post_field("[photo]", $member), 'full');?>
	<h3><?= get_the_title($member); ?></h3>
	<p><?= tr_post_field("[position]", $member);?>
	<span><?= tr_post_field("[credentials]", $member);?></span></p>
	<p><?= tr_post_field("[about_bio]", $member);?></p>
	<p class="about-contacts"></p>
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
		padding: 5px 20px 0;
		margin: 0 0 -3px;
		position: relative;
		border-bottom: 2px solid red;
	}
</style>