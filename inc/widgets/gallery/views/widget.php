<?php $images = tr_post_field("[tesy]",$gallery);?>

<?php switch ($galleryType): 
	case 'slider': ?>
		<?php include(locate_template('gallery/slider/init.php')); ?>
	<?php break;?>
	<?php case 'carousel': ?>
		<?php include(locate_template('gallery/carousel/init.php')); ?>
	<?php break;?>
<?php endswitch;?>