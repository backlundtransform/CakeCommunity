

	                    <br>

		<div class="tables">	<?php echo h($user['User']['username']); ?>  </div>

			<div class="inbox">
		<br>
	
			
		<br>
		<?php echo $this->Html->image($user['User']['image_url'], array('alt' => 'Avatar', 'width' => '80')); ?><br>
		
		
		<?php if ($current_user['id'] == $user['User']['id'] || $current_user['roles'] == 'admin'): ?>
		<?php echo $this->Html->link('Change Avatar', array('action' => 'avatar', $user['User']['id'])); ?>
		<?php endif; ?>





                 <br>     <?php if ($current_user['id'] == $user['User']['id']): ?>
                     	<?php    $newmessage  = $this->requestAction('Messages/inbox/'); ?>
		<b><?php echo $this->Html->link('Inbox ('. count($newmessage).')' , array( 'action' => 'inbox')); ?></b>
		<br>   <?php endif ?>
		
                   <hr>
		Group: 	<?php echo h($user['User']['roles']); ?> <br>
		
		Comments: 
                
                 <?php    $comments  = $this->requestAction('Comments/index/'.$user['User']['id'] ); ?>
                <?php echo count($comments) ?> <br>
		<hr>

		<br>	&nbsp;
		About Me:<br>  <?php echo $user['User']['Presentation']; ?>

                    <hr>


	<?php if ($current_user['id'] == $user['User']['id'] || $current_user['roles'] == 'admin'): ?>
			<?php echo $this->Html->link(__('Edit Profile'), array('action' => 'edit', $user['User']['id'])); ?>  </li>
			 <?php endif; ?>
	
	<?php if ($current_user['roles'] == 'admin'): ?>		 
	<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete # %s?', $user['User']['id'])); ?> 
		
	 <?php endif; ?>
	
</div>  