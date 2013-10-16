


<?php echo $this->Form->create('Thread',array(
             'inputDefaults' => array(
        'label' => false,
        'div' => false))); ?>
        
        

	<fieldset>
		<legend><?php echo __('Add Thread'); ?></legend>
	<?php
		echo "Titel ";
		echo $this->Form->input('title');?></br>
		<?php echo $this->Form->input('content', array('rows' => '15', 'cols' => '100', 'class'=>'ckeditor')); ?></br>
		<?php echo $this->Form->input('cat', array(
                                      'type' => 'select',
                                     'options' => $category,
                                      'selected' => 1
                                  ));
		

	echo $this->Form->hidden('user_id', array('value'=>$current_user['id']));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

