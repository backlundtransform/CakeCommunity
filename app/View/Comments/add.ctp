<div class="comments form">
<?php echo $this->Form->create('Comment'); ?>
	<fieldset>
		<legend><?php echo __('Add Comment'); ?></legend>
	<?php
		echo $this->Form->input('content');
		echo $this->Form->hidden('user_id', array('value'=>$current_user['id']));
		echo $this->Form->input('post_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
