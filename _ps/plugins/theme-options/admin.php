<?php
  $utility = new tr_utility();
  $form = new tr_form();
  $form->id = 'tr_theme_options';
  $form->make();
  $form->process(); 
?>

<div class="wrap">
  <h2>Theme Options</h2>
  <?php $form->flash(); ?>
  <div>
    <div id="tr-dev-content" class="typerocket-container typerocket-dev">
        <?php $form->open();

        // Settings
        $utility->buffer();
        $form->image('Logo');
        $form->image('FavIcon');
        $form->text('Copyright');
        $form->text('Analytics');
        $options = ['fixed' => 'fixed',
        			'none' => 'none'];
        $form->select('nav', $options);
                
        $utility->buffer('footer');

        // links
        $utility->buffer();
        $fields = array(
          array('text', array('Link Text')),
          array('text', array('Link URL')),
          array('checkbox', array('External', array(), array('text' => 'This is an external website'), false))
        );

        $form->repeater('Links', $fields, array('label' => 'Custom Links', 'help' => 'Work In Progress will be for social media', 'add_button' => 'Add a Link'));
        $utility->buffer('links');

        // save
        $utility->buffer();
        $form->submit('Save');
        $utility->buffer('save');


        // layout
        $screen = new tr_layout();

        $screen->set_sidebar($utility->buffer['save']);

        $screen->add_tab( array(
            'id' => 'Settings',
            'title' => 'Settings',
            'content' => $utility->buffer['footer']
          ) )->add_tab( array(
            'id' => 'links',
            'title' => 'Links',
            'content' => $utility->buffer['links']
          ) )->make();

        $form->close();
      ?>

    </div>
  </div>

</div>