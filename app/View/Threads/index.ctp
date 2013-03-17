  <br />
<?php
	    
	echo $this->Html->link(__('New Topic'), array('action' => 'add'), array('Class' => 'Buttons'));
 


 ?>
  <br />  <br />     <div class="tables"> New Threads</div>
  
  	<table cellspacing=0>
	<tr >
			
			<th class="threadtop"><?php echo $this->Paginator->sort('title'); ?></th>
                         <th class="threadtop"><?php echo $this->Paginator->sort('views'); ?></th>
                         <th class="threadtop"><?php echo $this->Paginator->sort('User.name', 'Started by'); ?></th>
                          <th class="threadtop"><?php echo $this->Paginator->sort('update', 'Updates'); ?></th>


			
	</tr>
		<?php foreach ($threads as $thread): ?>
	<tr>

		<td class="thread">	 <b><?php echo $this->Html->link($thread['Thread']['title'], array('action' => 'view', $thread['Thread']['id'])); ?></b></td>
                        
                        
                        <td class="thread">	<?php echo $thread['Thread']['views']; ?></td>
		<td class="thread"><?php echo $this->Html->link($thread['User']['name'], array('controller' => 'users', 'action' => 'view', $thread['User']['id'])); ?></td>
		<td class="thread"><?php echo $thread['Thread']['update']?></td>

	</tr>
<?php endforeach; ?>
	</table>
 

	




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


