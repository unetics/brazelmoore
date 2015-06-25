<?php

function register_main_menus() {
	register_nav_menus( array( 
						'primary-menu' 		=> 'Primary Menu',
						'footer-menu' 		=> 'footer-menu',
	 ) );
}
if (function_exists('register_nav_menus')) add_action( 'init', 'register_main_menus' );

/* include pressed sites framework (stolen from typerocket)  */
require('_ps/init.php'); 

add_theme_support( 'post-thumbnails' );

if (is_admin()) {
     require('admin/functions.php');    
}
require('pageBuilder/init.php');

// set permalink
function set_permalink(){
    global $wp_rewrite;
    $wp_rewrite->set_permalink_structure('/%postname%/');
}
add_action('init', 'set_permalink');

function add_googleanalytics() { 
	get_template_part('partials/analitics');
}
add_action('wp_footer', 'add_googleanalytics');	

function scripts() {
wp_enqueue_script('jquery'); 
wp_enqueue_script( 'site', get_stylesheet_directory_uri() . '/assets/js/min/site-min.js');
}
add_action('wp_enqueue_scripts', 'scripts', 100);
add_filter('wp_nav_menu_items', 'do_shortcode');

function ps_add_extra_styles($styles) { 
	$extra_styles = array(
		get_stylesheet_directory().'/assets/less/site.less'
	);
 
	// combine the two arrays
	$styles = array_merge($extra_styles, $styles);
 	return $styles;
}
add_filter('ps_add_styles', 'ps_add_extra_styles');

function add_theme_widgets_collection($folders){
    $folders[] = get_stylesheet_directory( __FILE__ )."/widgets/";
    return $folders;
}
add_filter('siteorigin_widgets_widget_folders', 'add_theme_widgets_collection');
