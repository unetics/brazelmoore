<?php
$team = tr_post_type('Gallery', 'Gallery', array(
										'supports' => array('title', 'editor','thumbnail'  ),
										'taxonomies' => array('category' ),
										));
$team->id = 'gallery';
$team->icon('images');
$team->title = 'Enter Gallery Name';
$team->form['editor'] = true; // set


function add_form_content_gallery_ps_editor() {
$form = tr_form();
$form->gallery('Gallery');
}