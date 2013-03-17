
<div class="posts form">
<?php echo $this->Form->create('Post',array(
             'inputDefaults' => array(
        'label' => false,
        'div' => false))); ?>
	<fieldset>
		<legend><?php echo __('Edit Post'); ?></legend>
	<?php
		echo $this->Form->input('id');
			echo 'Test';
		echo $this->Form->input('title');
	
		echo $this->Form->input('content', array('rows' => '15', 'cols' => '100', 'class'=>'ckeditor')); ;
			echo $this->Form->hidden('user_id', array('value'=>$current_user['id']));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>


