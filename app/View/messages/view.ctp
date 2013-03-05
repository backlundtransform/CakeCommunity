

 <?php if($current_user['username']=$messages[0]['Message']['recipient']): ?>
      <br><div class='tables'><?php echo $messages[0]['Message']['subject']; ?></div>
      <div class='inbox'>
<?php echo $messages[0]['Message']['body']; ?>
       <br>
       <br>
      <hr>
 <?php echo $this->Form->create('Message', array(
             'inputDefaults' => array(
        'label' => false,
        'div' => false))); ?>
	<fieldset>
		<legend><?php echo __('Reply'); ?></legend>
		Recipient
	<?php echo  $this->Form->input('recipient');?>
	Subject
		<?php echo $this->Form->input('subject');?>

		<?php echo $this->Form->input('body', array('rows' => '15', 'cols' => '100', 'class'=>'ckeditor'));
	?>
	</fieldset>       <?php echo $this->Form->end(__('Submit')); ?>

<?php endif; ?>


</div>