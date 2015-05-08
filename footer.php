<footer>
<div class="inner">
		<p id="copyright"><?= do_shortcode(tr_option_field("[copyright]")); ?></p>
</div>
	<?php wp_footer(); ?>
</footer>

<script>
    //make divs even height
    jQuery('.even').each(function() { jQuery(this).find('.panel-grid-cell').matchHeight(); });
    
    
    //disable added padding on small screens
	jQuery(document).ready(function () {
    	updateContainer();
	    jQuery(window).resize(function() {
	        updateContainer();
	    });
	});

	function updateContainer() {
	    var $width = jQuery(window).width();
	    if ($width <= 620) {
	        jQuery('*').css('padding-top', '').css('padding-bottom', '')
	    }
	}; 
	jQuery('.fit').find('h1, h2, h3, h4').slabText();
    
</script>
</body>
</html>