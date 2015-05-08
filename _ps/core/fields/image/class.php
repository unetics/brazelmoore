<?php
class tr_field_image extends tr_field {

  function __construct() {
    wp_enqueue_media();
    wp_enqueue_script( 'typerocket-media', tr::$paths['urls']['assets'] . '/js/media.js', array('jquery'), '1.0', true );
  }

  function render() {
    $name = $this->attr['name'];
    $value = esc_attr($this->get_value());


    if($value != "") {
      $image = wp_get_attachment_image_src($value, 'full');
    }
    else {
      $image = '';
    }

   
return <<<HTML
	<input type="hidden" name="$name" value="$value" id="tr_logo" class="image-picker">
	<div class="button-group">
		<input type="button" class="image-picker-button button" value="Insert Image">
		<input type="button" class="image-picker-clear button" value="Clear">
	</div>
	<div class="image-picker-placeholder">
		<img src="$image[0]">
	</div>
HTML;
  }

}