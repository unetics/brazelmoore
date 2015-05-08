<?php
if ( current_user_can('administrator') ) {

   function prebuilt_page_layouts($layouts){
	$ptd = get_template_directory()."/inc/layouts/*.php";
		foreach (glob($ptd) as $filename) {
	    	$name = basename($filename, ".php");
	    	include $filename;   	
		}
	return $layouts;
	}
add_filter('siteorigin_panels_prebuilt_layouts', 'prebuilt_page_layouts');  

} else {
/* echo('not admin'); */
}

