<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Edit User'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('username');
		
                  echo $this->Form->input('Presentation', array('rows' => '15', 'cols' => '100', 'class'=>'ckeditor'));
                
                  ?>

                <?php if ($current_user['roles'] == 'admin'): ?>
	
		<?php 	echo $this->Form->input('roles',  array('type' => 'select', 'options' => array( 'admin' => 'admin', 'checked' => 'checked', 'user' => 'user', 'banned' => 'banned' ))); ?>
		<?php endif; ?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
