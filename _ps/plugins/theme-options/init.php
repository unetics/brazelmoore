<?php
  class tr_theme_options {

    function make() {
      add_action('admin_menu', array($this, 'menu'));
      add_action( 'wp_before_admin_bar_render', array( $this, 'admin_bar_menu' ), 100 );
    }

    public function menu() {
      add_theme_page( 'Theme Options', 'Theme Options', 'manage_options', 'theme_options', array($this, 'page'));
    }

    function page() {
      include(__DIR__ . '/admin.php');
    }

    function add_sub_menu($name, $link, $root_menu, $id, $meta = false) {
      global $wp_admin_bar;
      if ( ! current_user_can('manage_options') || ! is_admin_bar_showing() )
        return;

      $wp_admin_bar->add_menu( array(
        'parent' => $root_menu,
        'id' => $id,
        'title' => $name,
        'href' => $link,
        'meta' => $meta
      ) );
    }

    function admin_bar_menu() {
      $this->add_sub_menu( "Theme Options", admin_url() . 'themes.php?page=theme_options', "site-name", "tr-theme-options" );
    }

}

$tr_pages = new tr_theme_options();
$tr_pages->make();
unset($tr_pages);