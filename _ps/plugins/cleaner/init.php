<?php
/**
 * Clean up wp_head()
 *
 * Remove unnecessary <link>'s
 * Remove inline CSS used by Recent Comments widget
 * Remove inline CSS used by posts with galleries
 * Remove self-closing tag and change ''s to "'s on rel_canonical()
 */
function head_cleanup() {
  remove_action('wp_head', 'feed_links', 2);
  remove_action('wp_head', 'feed_links_extra', 3);
  remove_action('wp_head', 'rsd_link');
  remove_action('wp_head', 'wlwmanifest_link');
  remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
  remove_action('wp_head', 'wp_generator');
  remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
  global $wp_widget_factory;
  remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));

}
add_action('admin_init', 'head_cleanup');

/* remove_filter('the_content', 'wpautop'); */
/* Remove navbar when in site preview */
add_filter('show_admin_bar', '__return_false');
/* Remove the WordPress version from RSS feeds  */
add_filter('the_generator', '__return_false');

/* Remove unnecessary dashboard widgets */
function remove_dashboard_widgets() {
  remove_meta_box('dashboard_incoming_links', 'dashboard', 'normal');
  remove_meta_box('dashboard_plugins', 'dashboard', 'normal');
  remove_meta_box('dashboard_primary', 'dashboard', 'normal');
  remove_meta_box('dashboard_secondary', 'dashboard', 'normal');
}
add_action('admin_init', 'remove_dashboard_widgets');

/* Fix for empty search queries redirecting to home page */
function roots_request_filter($query_vars) {
  if (isset($_GET['s']) && empty($_GET['s']) && !is_admin()) {
    $query_vars['s'] = ' ';
  }
  return $query_vars;
}
add_filter('request', 'roots_request_filter');

function wp_nav_menu_attributes_filter($var) {
	return is_array($var) ? array_intersect($var, array('current-menu-item')) : '';
}
add_filter('nav_menu_css_class', 'wp_nav_menu_attributes_filter', 100, 1);
add_filter('nav_menu_item_id', 'wp_nav_menu_attributes_filter', 100, 1);
add_filter('page_css_class', 'wp_nav_menu_attributes_filter', 100, 1);

add_action('admin_menu','my_footer_shh');
function my_footer_shh() {
    remove_filter( 'update_footer', 'core_update_footer' ); 
}

add_action('admin_bar_menu', 'remove_wp_logo', 999);
function remove_wp_logo( $wp_admin_bar ) {
$wp_admin_bar->remove_node('wp-logo');
}

// Add/ hide a custom logo to the WP Login Page
function custom_login_logo() {
    echo '<style type="text/css">
    h1 a { background-image: none !important; }
    </style>';
}
add_action('login_head', 'custom_login_logo');

// changing the Login Page Logo URL
   function custom_login_logo_url(){
     return home_url(); // put any URL in place of the WordPress one or use the home URL
   }
   add_filter('login_headerurl', 'custom_login_logo_url');
   
   function custom_login_logo_title(){
    return get_option('blogname');  // changing the title from "Powered by WordPress" to your website name.     
    }
    add_filter('login_headertitle', 'custom_login_logo_title');
    
add_filter( 'edit_post_link', '__return_null' );

function remove_menus(){
  
/*   remove_menu_page( 'index.php' );                  //Dashboard */
  remove_menu_page( 'edit.php' );                   //Posts
  remove_menu_page( 'upload.php' );                 //Media
/*   remove_menu_page( 'edit.php?post_type=page' );    //Pages */
  remove_menu_page( 'edit-comments.php' );          //Comments
  remove_menu_page( 'themes.php' );                 //Appearance
  remove_menu_page( 'plugins.php' );                //Plugins
  remove_menu_page( 'users.php' );                  //Users
  remove_menu_page( 'tools.php' );                  //Tools
  remove_menu_page( 'options-general.php' );        //Settings
  
}

if (! current_user_can( 'manage_options' )) {
add_action( 'admin_menu', 'remove_menus' );
 }