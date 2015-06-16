<nav class="rmm">
	<ul>
		<?php if ( tr_option_field("[logo]") ) { ?>
		<li class="logo">
			<a href="/"><?php echo wp_get_attachment_image( tr_option_field("[logo]"), 'full' ); ?></a>
		</li>
		<?php } 
				
$defaults = array(
	'menu'            => 'Menu',
	'container'       => false,
	'container_class' => 'rmm',
	'container_id'    => '',
	'echo'            => true,
	'fallback_cb'     => 'wp_page_menu',
	'before'          => '',
	'after'           => '',
	'link_before'     => '',
	'link_after'      => '',
	'items_wrap'      => '%3$s',
	'depth'           => 0,
	'walker'          => ''
);
wp_nav_menu( $defaults );
?>
<li class="searchTrigger">
<a href="#"><?= do_shortcode('[icon]'); ?></a>
</li>
	</ul>
	<form method="get" id="searchform" class="hidden" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="text" name="s" id="searchbar" placeholder="Search" /><a href="#" id="searchClose">X</a>
	<input type="submit" id="searchSubmit" class="submit" value="Search" />
</form>
</nav>

<style type="text/css" media="screen">
.searchTrigger a{
	padding: 0px;
	padding-right: 20px;
}
#searchform.hidden{
	transform: rotateX(-90deg);
	}
	
#searchform{
	position: absolute;
	width: 100%; 
  transition: transform .2s linear;
  transform-origin: center top 0px;
  transform: translate(0px, 0px) rotateX(0deg) perspective(400px);
  transform-style: preserve-3D;
  background: #eee;
  border: 1px solid gray;
}
#searchform > * {
	background: none;
	border: none;
	
	}
	#searchbar:focus{
		color: none;
    outline: 0;
	}
#searchbar{
	width: 90%;
	padding: 10px;
	font-size: 16px;
}
#searchClose{
	padding: 8px;
	font-size: 16px;
	font-weight: bold;
}

#searchSubmit{
	display: none;
}
</style>
<script>
	jQuery('.searchTrigger').click(function() {
		if(jQuery("#searchform").hasClass( "hidden" )){
			openSearch();
		}else{
			closeSearch();
		}
	});
	jQuery('#searchClose').click(function() {
		closeSearch();
	});
	
	jQuery(document).keyup(function(e) {	
		if (e.keyCode == 27 && !jQuery("#searchform").hasClass( "hidden" )) { 
			closeSearch();
		}   // escape key maps to keycode `27`
	});
	
	function closeSearch() {
		jQuery("#searchform").addClass('hidden');
		jQuery("#searchbar").val('');
		jQuery("#searchbar").blur();
	}
	function openSearch() {
		jQuery("#searchform").removeClass('hidden');
		jQuery("#searchbar").focus();
	}
</script>