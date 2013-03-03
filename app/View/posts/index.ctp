<br />

<?php  if ($current_user['roles'] == 'admin') {
	    
	echo $this->Html->link(__('Submit'), array('action' => 'add'), array('Class' => 'Buttons'));
 
   	}

 ?><br />
	
	<?php foreach ($posts as $post): ?>
	<?php    $commentnumber  = $this->requestAction('Posts/view/'.$post['Post']['id']); ?>

	<div class="eBlock">

 <div class="eTitle">
 
 <?php echo $this->Html->link($post['Post']['title'], array('action' => 'view', $post['Post']['id'])); ?>
        <span class="commentbubble"> <?php echo $this->Html->link(count($commentnumber), array( 'action' => 'view', $post['Post']['id'])); ?>


</span>
 
 </div>
 
<div class="eMessage">

		<?php echo $post['Post']['content']; ?>
		
		
		</div></div>
		
		<div class="eDetails">

Views: <?php echo $post['Post']['views']; ?> | Added by: <?php echo $this->Html->link($post['User']['name'], array('controller' => 'users', 'action' => 'view', $post['User']['id'])); ?>

| Creation time:   <?php echo $post['Post']['created']; ?> |


    <?php


echo $this->Html->link('Comments :'.count($commentnumber), array( 'action' => 'view', $post['Post']['id'])); ?>



</div>  
			<?php 
				if ($current_user['roles'] == 'admin') {
	    		
					echo $this->Html->link(__('Edit'), array('action' => 'edit', $post['Post']['id']));?>
					
					<br>
					
					<?php  echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $post['Post']['id']), null, __('Are you sure you want to delete # %s?', $post['Post']['id']));
			
	
 
   					}
		
			 			?><br />
	
<?php endforeach; ?>

	<p>
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
	?>
	</div>
</div>  


