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



echo $this->Html->link($addedby[$key]['User']['username'], array('controller' => 'users', 'action' => 'view', $addedby[$key]['User']['id'])); ?>

| Creation time:   <?php echo $this->Time->timeAgoInWords($post['created']); ?>  |   <?php


echo $this->Html->link('Comments :'.count($commentnumber), array( 'controller' => 'Posts',  'action' => 'view', $post['id'])); ?>



</div>  
		<?php 
				if ($current_user['roles'] == 'admin') {
	    		
					echo $this->Html->link($this->Html->image('p_edit.gif'), array('controller'=>'posts', 'action' => 'edit', $post['id']), array('escape' => false));?>
					
				
					
					<?php  echo $this->Html->link($this->Html->image('p_delete.gif'), array('controller'=>'posts', 'action' => 'delete', $post['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $post['id']));
			
	
 
   					}
		
			 			?><br />
	<?php endforeach; ?>
	<p>
	</table>
<?php endif; ?>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
	
		if ($this->Paginator->hasPage(2)){

			echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
			echo $this->Paginator->numbers(array('separator' => ''));
			echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
		
			}
	?></div>


	
