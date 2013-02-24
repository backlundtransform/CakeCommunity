           <?php echo $this->Form->create('Message'); ?>
	<fieldset>
		<legend><?php echo __('Send messages'); ?></legend>
	<?php
	
               echo  $this->Form->input('recipient');
		echo $this->Form->input('subject');

		echo $this->Form->input('body');
	?>
	</fieldset>       <?php echo $this->Form->end(__('Submit')); ?>