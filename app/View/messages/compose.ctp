           <?php echo $this->Form->create('Message', array(
             'inputDefaults' => array(
        'label' => false,
        'div' => false))); ?>
	<fieldset>
		<legend><?php echo __('Send messages'); ?></legend>
		Recipient
	<?php echo  $this->Form->input('recipient');?>
	Subject
		<?php echo $this->Form->input('subject');?>

		<?php echo $this->Form->input('body', array('rows' => '15', 'cols' => '100', 'class'=>'ckeditor'));
	?>
	</fieldset>       <?php echo $this->Form->end(__('Submit')); ?>