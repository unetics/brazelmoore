<?php
/*
Plugin Name: teamMember Widget
Version: 1.2.2
Description: teamMember
Author: Mitchell Bray
*/
class teamMember extends WP_Widget {
		public function __construct() {
			// Instantiate the parent object
			parent::__construct(
				'teammember', // Base ID
				'Team Member', // Name
				array('description' => 'Add a single team member') // Args
			);
		}

		public function widget($args, $instance) {
			echo $args['before_widget'];
			extract($instance);	
			include(__DIR__.'/views/widget.php');
			echo $args['after_widget'];
			
		}

		public function form($instance) {
			$instance = wp_parse_args((array)$instance, 
				array(				
					'member' => '',			
				));
				extract($instance);
			include(__DIR__.'/views/admin.php');
			
		}

		public function update($new_instance, $old_instance) {
			$instance = $old_instance;
			
			$instance['member'] = $new_instance['member'];
							
			return $instance;
		}		
	}
add_action('widgets_init', create_function('', 'register_widget("teamMember");'));
