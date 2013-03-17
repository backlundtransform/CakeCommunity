<br>
<?php


if ($current_user['roles'] == 'admin') {
	    
	echo $this->Html->link(__('Submit'), array('controller'=> 'Posts', 'action' => 'add'), array('Class' => 'Buttons'));
 
   	}

 ?>
	<?php if (!empty($postcat['Post'])): ?>

	<?php
	
		foreach ($postcat['Post'] as $key => $post): ?>
		<div class="eBlock">

 <div class="eTitle">
<?php    $commentnumber  = $this->requestAction('Posts/view/'.$post['id']); ?>


 
 <?php echo $this->Html->link($post['title'], array('controller'=> 'Posts', 'action' => 'view', 'admin' => false, $post['id'])); ?>
        <span class="commentbubble"> <?php echo $this->Html->link(count($commentnumber), array('controller'=> 'Posts','action' => 'view', $post['id'])); ?>


</span></div>
 
<div class="eMessage">

		<?php echo $post['content']; ?>
		
		
		</div></div>
		
		<div class="eDetails">

Views: <?php echo $post['views']; ?> | Added by: <?php



echo $this->Html->link($addedby[$key]['User']['name'], array('controller' => 'users', 'action' => 'view', $addedby[$key]['User']['id'])); ?>

| Creation time:   <?php echo $post['created']; ?>  |   <?php


echo $this->Html->link('Comments :'.count($commentnumber), array( 'action' => 'view', $post['id'])); ?>



</div>  
		<?php 
				if ($current_user['roles'] == 'admin') {
	    		
					echo $this->Html->link($this->Html->image('p_edit.gif'), array('controller'=>'posts', 'action' => 'edit', $post['id']), array('escape' => false));?>
					
				
					
					<?php  echo $this->Html->link($this->Html->image('p_delete.gif'), array('controller'=>'posts', 'action' => 'delete', $post['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $post['id']));
			
	
 
   					}
		
			 			?><br />
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	
