<section class="well">
<hr>
<div class="form-group">
    <div class="input-group">
	    <span class="input-group-addon">
<?php
$type = 'team';	
$args=array(
  'post_type' => $type,
  'post_status' => 'publish',
  'posts_per_page' => -1,
  'caller_get_posts'=> 1);

$my_query = null;
$my_query = new WP_Query($args);

if( $my_query->have_posts() ) {?>
	<label>Choose Team Member: </label>
	
	<select id="<?= $this->get_field_id('member'); ?>" name="<?= $this->get_field_name('member'); ?>">
	<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
		<?php global $id; ?>
  		<option  value="<?= $id ?>" <?php selected($id, $member, true);?> ><?php the_title(); ?></option>
    <?php endwhile; ?>
    </select>
    <?php
}

wp_reset_query();  // Restore global post data stomped by the_post().
?>
	    </span> 

    </div>
</div>
</section>