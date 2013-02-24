<?php if ($current_user['roles'] == 'admin') : ?>

<div class="posts form">
<?php echo $this->Form->create('Post',array(
             'inputDefaults' => array(
        'label' => false,
        'div' => false))); ?>
        
        

	<fieldset>
		<legend><?php echo __('Add Post'); ?></legend>
	<?php
		echo "Titel ";
		echo $this->Form->input('title');
		echo $this->Form->input('content', array('rows' => '15', 'cols' => '100', 'class'=>'ckeditor')); 
		echo $this->Form->input('cat', array(
                                      'type' => 'select',
                                      'options' => $category,
                                      'selected' => 1
                                  ));
		

		echo $this->Form->input('user_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

<?php endif ?>
