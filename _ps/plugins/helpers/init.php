<?php

/* add function to return specitic meta box */
function get_m($meta) {
 $val =  get_post_meta( get_the_ID(), $meta, true ); 
 return $val;
}