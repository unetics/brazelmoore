<?php
$ajaxUrl = admin_url( 'admin-ajax.php' );	
parse_str($instance['posts'], $query);

$query = siteorigin_widget_post_selector_process_query($query);
log_me($query['posts_per_page']);
$the_query = new WP_Query($query);?>

<div id="posts" class="masonry one-col" >
	
<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>

<div class="entry  item clearfix" >
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
		    <?php if ($instance['show_date']) { ?><li><?php echo get_the_date(); ?></li><?php } ?>
		    <?php if ($instance['show_categorys']) { ?><li><?php the_category(', ');?></li><?php } ?>
		    <?php if ($instance['show_author']) { ?><li>by <?php the_author(); ?></li><?php } ?>
		</ul>
		<div class="entry-content">
		    <p><?php the_excerpt(); ?></p>  
		</div>
	</div>
	<a href="<?php the_permalink(); ?>" class="more-link">Read More</a>
</div>

<?php endwhile; ?>

</div>
<a href="#" class="morePlease btn">load more</a>      



<script>

(function($) {
window.page = '';
  
$(document).on( 'click', '.morePlease', function( event ) {
event.preventDefault();
getMorePosts(page);
})

function getMorePosts(page) { 
	$.ajax({
	url: '<?=$ajaxUrl?>',
	type: 'post',
	data: {
	action: 'ajax_pagination',
	query_vars:'<?=$query?>',
	show_date: <?=($instance['show_date'] != '' ? true : 'null');?>,
	show_categorys: <?=($instance['show_categorys'] != '' ? true : 'null');?>,
	show_author: <?=($instance['show_author'] != '' ? true : 'null');?>,
	per_page: <?=$query['posts_per_page'];?>,
	offset: $('.entry').length,
	total: <?=$the_query->found_posts?>
	}
	}).done(function(response) {
		var obj=$.parseJSON(response);
		window.page = obj.page;
		console.log(obj);
		$("#posts").append(obj.entry);
		if(obj.all){
			$(".morePlease").hide();
		}
	}).fail(function() {
	   alert( 'no result ' ); 
	});
}
})(jQuery);

</script>

