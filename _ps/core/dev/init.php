<?php
class tr_dev extends tr_base {

  function make() {
    add_filter('admin_footer_text', 'tr_remove_footer_admin');
    add_action('admin_menu', array($this, 'menu'));
  }

  public function menu() {
    add_menu_page( 'Dev', 'Dev', 'manage_options', 'dev', array($this, 'page'));
  }

  function page() {
      include(__DIR__ . '/page.php');
  }

}

$tr_dev_plugin = new tr_dev();
$tr_dev_plugin->make();
unset($tr_dev_plugin); 

 function tr_remove_footer_admin () {
    echo 'Developer mode is on!';
  }

/* flush_rewrite_rules(); */