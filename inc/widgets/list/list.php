<?php
/*
Plugin Name: lists Widget
Version: 1.2.2
Description: a lists
Author: Mitchell Bray
*/
class lists extends WP_Widget {
		public function __construct() {
			// Instantiate the parent object
			parent::__construct(
				'lists', // Base ID
				'Lists', // Name
				array('description' => 'Create a lists'), // Args
				array('width' => 600, 'height' => 550)
			);
				// Register styles
				add_action('admin_print_styles', array( $this, 'register_admin_styles'));
				// Register scripts
				add_action('admin_enqueue_scripts', array( $this, 'register_admin_scripts'));
		}

		public function widget($args, $instance) {
			echo $args['before_widget'];	
			include(__DIR__.'/views/widget.php');
			echo $args['after_widget'];
		}

		public function form($instance) {
			$instance = wp_parse_args((array)$instance, 
				array(
					'items' => '',
					'style' => '',
				));
			include(__DIR__.'/views/admin.php');
		}

		public function update($new_instance, $old_instance) {
		$instance = $old_instance;
        
        $instance['style'] = $new_instance['style'];
        $instance['items'] = array();

        if ( isset ( $new_instance['items'] ) )
        {
            foreach ( $new_instance['items'] as $value )
            {
                if ( '' !== trim( $value ) )
                    $instance['items'][] = $value;
            }
        }
		
		return $instance;
		
		}
		function register_admin_styles(){}
		function register_admin_scripts(){}	
	
	}
add_action('widgets_init', create_function('', 'register_widget("lists");'));
?>