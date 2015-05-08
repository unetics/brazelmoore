<?php
$faq = tr_post_type('FAQ', 'FAQs', array( 'hierarchical' => true,'supports' => array('title', 'editor')));
$faq->id = 'FAQ';
$faq->icon('images');
$faq->title = 'Enter FAQ';
$faq->form['editor'] = true; // set