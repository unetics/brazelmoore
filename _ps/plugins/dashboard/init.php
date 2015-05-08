<?php
add_action('admin_menu', 'admin_menu', 99999999 );

function admin_menu() {
global $menu, $submenu;

$name = 'dashboard';
$pos = 123001;

remove_submenu_page( 'index.php', 'index.php' );
add_menu_page( 'Dashboard', 'Home', 'read', $name, 'dashboard_page', null, $pos );

$item[0] = $menu[$pos];
unset($menu[$pos]);

$submenu['index.php'] = $item + $submenu['index.php'];
}

function dashboard_page() {
	require_once( ABSPATH . 'wp-load.php' );
	require_once( ABSPATH . 'wp-admin/admin.php' );
	require_once( ABSPATH . 'wp-admin/admin-header.php' );
	include_once( 'dashboard.php'  );
	include( ABSPATH . 'wp-admin/admin-footer.php' );
}
