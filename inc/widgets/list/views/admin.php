<div id="p_scents">
<?php 
$am = count($instance['items'], COUNT_RECURSIVE);
if ( $am > 1) { ?>
<?php foreach($instance['items'] as $value): ?>
<div class="input-group"><input type="text" id="<?= $this->get_field_id('items'); ?>" name="<?= $this->get_field_name('items'); ?>" class="form-control" placeholder="List Item" value="<?= $value ?>"><span class="input-group-addon"><a href="#" class="add">add</a></span><span class="input-group-addon"><a href="#" class="rem">Remove</a></span></div>
<?php endforeach; ?>
<?php } else { ?>
less than <?= $am ?>
<div class="input-group"><input type="text" id="<?= $this->get_field_id('items'); ?>" name="<?= $this->get_field_name('items'); ?>" class="form-control" placeholder="List Item" value=""><span class="input-group-addon"><a href="#" class="add">add</a></span><span class="input-group-addon"><a href="#" class="rem">Remove</a></span></div>	
<?php } ?>
</div>
<hr>
<label>Style: </label>
	<select id="<?= $this->get_field_id('style'); ?>" name="<?= $this->get_field_name('style'); ?>">
		<option  value="default" <?php selected('', $instance['style'], true);?> >Default</option>
		<option  value="nostyle" <?php selected('nostyle', $instance['style'], true);?>>None</option>
		<option  value="boxed" <?php selected('boxed', $instance['style'], true);?>>Boxed</option>
	</select>
<script>
(function( $ ) {
	$(function() {
	        var scntDiv = $('#p_scents');
	        resort();
	        $('.add').live('click', function() {
	                $('<div class="input-group"><input type="text" id="<?= $this->get_field_id('items'); ?>" name="<?= $this->get_field_name('items'); ?>" class="form-control" placeholder="List Item" value=""><span class="input-group-addon"><a href="#" class="add">add</a></span><span class="input-group-addon"><a href="#" class="rem">Remove</a></span></div>').insertAfter( $(this).closest(".input-group") );
	                resort();
	        });
	        
	        $('.rem').live('click', function() { 
	            $(this).parents('.input-group').remove();
	            resort();
	        });
	    
	    function resort() {
	        $(scntDiv).find("input:text").each(function(index) {
	            $(this).attr("name", "<?= $this->get_field_name('items'); ?>[" + index + "]");
	        }); 
	    }
	});
})(jQuery);
</script>