<br> <br>
<div class='tables'>Member List</div>

	<table cellpadding="0" cellspacing="60">
	<tr>
			
			<th><?php echo $this->Paginator->sort('username'); ?></th>
                         <th><?php echo $this->Paginator->sort('image_url'); ?></th>

			<th><?php echo $this->Paginator->sort('roles'); ?></th>
			<th><?php echo $this->Paginator->sort('Registred'); ?></th>
			
	</tr>
	<?php foreach ($users as $user): ?>
	<tr>

		<td>	<?php echo $this->Html->link($user['User']['username'], array('action' => 'view', $user['User']['id'])); ?>&nbsp;&nbsp;&nbsp;</td>
                        <td>	<?php echo $this->Html->image($user['User']['image_url'], array('alt' => 'Avatar', 'width' => '30px')); ?> </td>
		<td><?php echo h($user['User']['roles']); ?>&nbsp;&nbsp;&nbsp;</td>
		<td><?php echo h($user['User']['Registred']); ?>&nbsp;&nbsp;&nbsp;</td>
		<td class="actions">
		
			<?php if ($current_user['id'] == $user['User']['id'] || $current_user['roles'] == 'admin'): ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete # %s?', $user['User']['id'])); ?>
			 <?php endif; ?>
		</td>
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
