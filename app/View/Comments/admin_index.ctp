<div class="comments index">
	
	<table cellpadding="25" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('content'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('post_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($comments as $comment): ?>
	<tr>
		<td><?php echo $comment['Comment']['id']; ?>&nbsp;</td>
		<td><?php echo $comment['Comment']['content']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($comment['User']['name'], array('controller' => 'users', 'action' => 'view', $comment['User']['id'], 'admin'=>false)); ?>
		</td>
		<td>
			<?php echo $this->Html->link($comment['Post']['title'], array('controller' => 'posts', 'action' => 'view', $comment['Post']['id'], 'admin'=>false)); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'admin_view', $comment['Comment']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $comment['Comment']['id'], 'admin'=>false)); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $comment['Comment']['id'], 'admin'=>false), null, __('Are you sure you want to delete # %s?', $comment['Comment']['id'])); ?>
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
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>

