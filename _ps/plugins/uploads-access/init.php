<?php

class tr_upload_access {

  public $role = array('subscriber', 'editor', 'contributor', 'author');
  public $user_only = false;
  public $r;
  public $u;

  function __construct() {
    $this->setup();

    // block access to photos that are not the current users under specific roles
    add_filter('pre_get_posts', array($this, 'pre_get_posts') );
    add_filter('ajax_query_attachments_args', array($this, 'user_only_media_ajax') );
    add_action('delete_attachment', array($this, 'delete_attachment'));
  }

  function setup() {
    $this->u = wp_get_current_user();
    $this->r = $this->u->roles[0];
  }

  function role_is_same() {
    if(is_array($this->role)) {
      foreach($this->role as $k => $v) {
        if(in_array($this->r, $this->role)) {
          return true;
        }
      }
    } else {
      if($this->role == $this->r) {
        return true;
      }
    }

    return false;
  }

  function pre_get_posts( $q ) {
    if (
      strpos( $_SERVER[ 'REQUEST_URI' ], '/wp-admin/upload.php' ) !== false ||
      strpos( $_SERVER[ 'REQUEST_URI' ], '/wp-admin/post.php' ) !== false ||
      strpos( $_SERVER[ 'REQUEST_URI' ], '/wp-admin/media-upload.php') !== false ) {

      if ( current_user_can( 'upload_files' ) &&  $this->role_is_same() ) {
        $q->set('author', $this->u->ID);
      }

    }
  }

  function ajax_query_attachments_args( $q ) {
    if($q['post_type'] == 'attachment') {

      if ( current_user_can( 'upload_files' ) && $this->role_is_same() ) {
        $q['author'] = $this->u->ID;
      }
    }
    return $q;
  }

  function delete_attachment($post_id) {
    if($this->role_is_same()) {
      $post = get_post($post_id);
      if($post->post_author != $this->u->id) {
        die('Good try, but no luck buddy. You can not delete that photo');
      }
    }
  }

}

new tr_upload_access();