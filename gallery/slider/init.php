<?php wp_enqueue_script( 'owlCarousel', get_template_directory_uri().'/gallery/slider/js/owl.carousel.js', array( 'jquery' ) );?>
<?php wp_enqueue_style( 'owlCarousel', get_template_directory_uri().'/gallery/slider/css/owl.carousel.css', false );?>
<?php wp_enqueue_style( 'owlCarouselTheme', get_template_directory_uri().'/gallery/slider/css/owl.theme.css', false );?>
<style type="text/css" media="screen">
.<?= $id; ?> .item img{
  display: block;
  width: 100%;
  height: auto;
  margin: 0 auto;
}
</style>
<div class="<?= $id; ?>">
<?php foreach ($images as $image) { ?>
    <div class="item">
	    <?php $img = wp_get_attachment_image_src($image, 'full') ?>
	    <img class="lazyOwl"  data-src="<?= $img['0'];?>" alt="Lazy Owl Image" >
	</div>
<?php } ?>	
</div>

<script>
/* The Owl Initialization Script
/* The first lines conditionally show the slide animation */
jQuery(function($){
$(document).ready(function() {
 
  $('.<?= $id; ?>').owlCarousel({
    singleItem:true,
    lazyLoad : true,
    autoPlay: <?= $sliderAutoPlay; ?>,
    pagination: <?= $sliderPagination; ?>,
    stopOnHover: <?= $sliderHover; ?>,
    navigation: <?= $sliderNav; ?>,
    autoHeight: true,
  }); 
 
});
});
</script>