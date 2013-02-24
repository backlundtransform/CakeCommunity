<div class="users view">

	
	
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		<br>
	
			
		<br>
		<?php echo $this->Html->image($user['User']['image_url'], array('alt' => 'Avatar')); ?><br>
		
		
		<?php if ($current_user['id'] == $user['User']['id'] || $current_user['roles'] == 'admin'): ?>
		<?php echo $this->Html->link('Change Avatar', array('action' => 'avatar', $user['User']['id'])); ?>
		<?php endif; ?>
		<br>
			<?php echo h($user['User']['roles']); ?>
			&nbsp;
		<br>



	<?php if ($current_user['id'] == $user['User']['id'] || $current_user['roles'] == 'admin'): ?>
			<?php echo $this->Html->link(__('Edit Profile'), array('action' => 'edit', $user['User']['id'])); ?>  </li>
			 <?php endif; ?>
	
	<?php if ($current_user['roles'] == 'admin'): ?>		 
	<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete # %s?', $user['User']['id'])); ?> 
		
	 <?php endif; ?>
	
</div>
