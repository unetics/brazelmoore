<nav class="rmm">
	<ul>
		<?Php if (null !== tr_option_field("[logo]")){?>
			<li class="logo"><a><?= wp_get_attachment_image(tr_option_field("[logo]"),"full");?></a></li>
		<?php }?>
	<?php
	$defaults = array(
		'menu'            => 'Menu',
		'container'       => false,
		'container_id'    => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'items_wrap'      => '%3$s',
		'depth'           => 0,
		'walker'          => ''
	);
	wp_nav_menu( $defaults );
	?>
	</ul>
</nav>