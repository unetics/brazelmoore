<?php
$team = tr_post_type('Video', 'Video', array(
										'supports' => array('title', 'editor', 'thumbnail'  ),
										'taxonomies' => array('category' ),
										));
$team->id = 'video';
$team->icon('play');
$team->title = 'Enter Video Name';
$team->form['editor'] = true; // set


function add_form_content_video_editor() {
$form = tr_form();
$form->text('Youtube URL');

}