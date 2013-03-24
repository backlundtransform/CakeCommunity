

	<table cellpadding="20" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('content'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('Thread_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($Thread_answers as $threadsanswer): ?>

	<tr>
		<td><?php echo $threadsanswer['Threadanswer']['id']; ?>&nbsp;</td>
		<td><?php echo $threadsanswer['Threadanswer']['content']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($threadsanswer['User']['username'], array('controller' => 'users', 'action' => 'view', $threadsanswer['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($threadsanswer['Thread']['title'], array('controller' => 'threads', 'action' => 'view', $threadsanswer['Thread']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $threadsanswer['Threadanswer']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $threadsanswer['Threadanswer']['id'], 'admin'=>false)); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $threadsanswer['Threadanswer']['id'], 'admin'=>false), null, __('Are you sure you want to delete # %s?', $threadsanswer['Threadanswer']['id'])); ?>
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

</div>
