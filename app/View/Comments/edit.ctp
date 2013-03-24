


<?php echo $this->Form->create('Comment',array(
             'inputDefaults' => array(
        'label' => false,
        'div' => false))); ?>
	<fieldset>
		<legend><?php echo __('Edit Comment'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('content', array('rows' => '15', 'cols' => '100', 'class'=>'ckeditor')); 
		echo $this->Form->hidden('user_id', array('value'=>$current_user['id']));
		echo $this->Form->hidden('post_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>

