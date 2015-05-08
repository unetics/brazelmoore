<?php
$team = tr_post_type('Article', 'Article', array(
										'supports' => array('title','editor', 'excerpt','thumbnail'  ),
										'taxonomies' => array('category' ),
										));
$team->id = 'article';
$team->icon('pen');
$team->title = 'Enter Article Name';
