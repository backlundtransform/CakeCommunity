


<?php echo $this->Form->create('Threadanswer',array(
             'inputDefaults' => array(
        'label' => false,
        'div' => false))); ?>
	<fieldset>
		<legend><?php echo __('Edit Answer'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('content', array('rows' => '15', 'cols' => '100', 'class'=>'ckeditor')); 
		echo $this->Form->hidden('user_id', array('value'=>$current_user['id']));
		echo $this->Form->hidden('thread_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>


