<br>
<?php


if ($current_user['roles'] == 'admin') {
	    
	echo $this->Html->link(__('Submit'), array('controller'=> 'Posts', 'action' => 'add'), array('Class' => 'Buttons'));
 
   	}

 ?>
	<?php if (!empty($postcat)): ?>

	<?php
	
		foreach ($postcat as $key => $post): ?>
		<div class="eBlock">

 <div class="eTitle">
<?php   $commentnumber  = $this->requestAction('Posts/view/'.$post['Post']['id']); ?>


 
 <?php echo $this->Html->link($post['Post']['title'], array('controller'=> 'Posts', 'action' => 'view', 'admin' => false, $post['Post']['id'])); ?>
        <span class="commentbubble"> <?php echo $this->Html->link(count($commentnumber), array('controller'=> 'Posts','action' => 'view', $post['Post']['id'])); ?>


</span></div>
 
<div class="eMessage">

		<?php echo $post['Post']['content']; ?>

		
		</div></div>
		
		<div class="eDetails">

Views: <?php echo $post['Post']['views']; ?> | Added by: <?php



echo $this->Html->link($post['User']['name'], array('controller' => 'users', 'action' => 'view', $post['User']['id'])); ?>

| Creation time:   <?php echo $post['Post']['created']; ?>  |   <?php


echo $this->Html->link('Comments :'.count($commentnumber), array( 'action' => 'view', $post['Post']['id'])); ?>



</div>  
			<?php 
				if ($current_user['roles'] == 'admin') {
	    		
					echo $this->Html->link(__('Edit'), array('controller' =>  'posts', 'action' => 'edit', $post['Post']['id']));?>
					
					<br>
					
					<?php  echo $this->Form->postLink(__('Delete'), array('controller' =>  'posts', 'action' => 'delete', $post['Post']['id']), null, __('Are you sure you want to delete # %s?', $post['Post']['id']));
			
	
 
   					}
		
			 			?><br />
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	
