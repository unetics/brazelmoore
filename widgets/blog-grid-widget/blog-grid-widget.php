<?php
/*
Widget Name: Blog Grid
Description: Makes A masonary grid of blog posts.
Author: Mitchell Bray
Author URI: http://webcreationcentre.com.au
*/

class Blog_Grid_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'ps_blog_grid',
			'Blog Grid',
			array(
				'description' => 'Create a grid of your blog posts.',
				'panels_icon' => 'dashicons dashicons-format-aside',
			),
			array(

			),
			array(
                'posts' => array(
                    'type' => 'posts',
                    'label' => __('Select Posts', 'addon-so-widgets-bundle'),
                ),

				'width' => array(
					'type' => 'select',
					'label' => 'Column size',
					'options' => array(
						'full' => 'Full',
						'2' => 'two',
						'3' => 'three',
					),
				),

				'title' => array(
					'type' => 'text',
					'label' => __('Title text', 'siteorigin-widgets'),
				),
				'show_date' => array(
							'type' => 'checkbox',
							'label' => 'Show Date?',
				),	
				'show_categorys' => array(
							'type' => 'checkbox',
							'label' => 'Show Categorys?',
				),	
				'show_author' => array(
							'type' => 'checkbox',
							'label' => 'Show Author?',
				),	

			),
			plugin_dir_path(__FILE__).'../'
		);
	}

	function get_style_name($instance){
		return false;
	}

	function get_template_name($instance){
		return 'base';
	}
}

siteorigin_widget_register('ps_blog_grid', __FILE__, 'Blog_Grid_Widget');

add_action( 'wp_ajax_nopriv_ajax_pagination', 'my_ajax_pagination' );
add_action( 'wp_ajax_ajax_pagination', 'my_ajax_pagination' );

function my_ajax_pagination() {
	
	$results['entry'] = get_ajax_posts($_POST['query_vars']);

	$results['query'] = $_POST['query_vars'];
	if (($_POST['offset'] + $_POST['per_page']) >= $_POST['total']){
		$results['all'] = true;
	}
	
	echo json_encode($results);
	die();
}

function get_ajax_posts($query) {
	$query = wp_parse_args($query,
		array(
			'post_status' => 'publish',
			'posts_per_page' => $_POST['per_page'],
			'offset' =>	$_POST['offset'],		
		));

	$ajax_query = new WP_Query($query);
	
ob_start();
 while ($ajax_query->have_posts()) : $ajax_query->the_post(); ?>

<div class="entry item clearfix" >
	<?php if (has_post_thumbnail()) { ?>
	    <div class="entry-image">
		    <?php echo the_post_thumbnail(); ?>
	    </div>
	<?php } ?>
	<div class="entry-info">
		<div class="entry-title">
		    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		</div>
		<ul class="entry-meta clearfix">
		    <?php if ($_POST['show_date']) { ?><li><?php echo get_the_date(); ?></li><?php } ?>
		    <?php if ($_POST['show_categorys']) { ?><li><?php the_category(', ');?></li><?php } ?>
		    <?php if ($_POST['show_author']) { ?><li>by <?php the_author(); ?></li><?php } ?>
		</ul>
		<div class="entry-content">
		    <p><?php the_excerpt(); ?></p>  
		</div>
	</div>
	<a href="<?php the_permalink(); ?>" class="more-link">Read More</a>
</div>

<?php endwhile; 

return ob_get_clean();
}
