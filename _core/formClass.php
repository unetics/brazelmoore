 <?php
 /**
 * Widget Form
 */
 
 class widget_form {
	 
	 public function __construct() {
	 }
 
	 public function text($name, $attr = array(), $settings = array(), $label = true) {
		 
	 	$output = '<input id="<?=$this->get_field_id($name)?>" type="text" value="" placeholder="i am a text field">';
	 	
	 	/*
$field = new tr_field_text();
	 	$field->connect($this);
	 	$this->setup_field($field, $name, $settings);
	 	$field->attr += $attr;
	 	$this->add_field($field, $settings, $label);
*/

	return $output;
  	}
} 
