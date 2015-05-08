<?php
function load_custom_wp_admin_style() {
		wp_enqueue_style( 'adminCsss', get_template_directory_uri() . '/admin/assets/css/admin.css');
        wp_enqueue_script('chosen', get_template_directory_uri() . '/admin/assets/js/chosen.jquery.min.js', array('jquery'), '1.0.0' ); 			
/*         wp_enqueue_style('formcss', get_template_directory_uri() . '/assets/css/form.css'); */
        
        wp_enqueue_script('googlemapsapi', 'http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places', array( 'jquery' ), true);	
		wp_enqueue_script(
				'geocomplete', //Handle
				get_template_directory_uri() . '/admin/assets/js/jquery.geocomplete.js', //Src
				array('jquery'), //Dependencies
				'1.6.1' //Version						
			);
wp_enqueue_script('googlemapsapi');
		wp_enqueue_script(
				'gmaps', //Handle
				get_template_directory_uri() . '/admin/assets/js/jquery.gmap.js', //Src
				array('jquery'), //Dependencies
				'1.6.1' //Version						
			);			
}			
add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );